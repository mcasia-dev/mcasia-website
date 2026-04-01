<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\PublicPage\Event;
use App\Models\PublicPage\HomePage;
use App\Models\PublicPage\OurEdge;
use App\Models\PublicPage\OurStory;
use App\Models\PublicPage\Recipe;
use App\Models\OurChannel;
use App\Models\OurImpact;
use App\Models\ReachUs;
use App\Models\SalesAvenue;
use App\Models\SalesAvenueCategory;
use Facades\App\Services\RecipeService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PublicPageController extends Controller
{
    public function home()
    {
        $homePage = HomePage::query()
            ->with('seo')
            ->isPublished()
            ->orderByDesc('updated_at')
            ->first();

        $selectedBrandIds = collect(data_get($homePage?->blocks, 'our_products.brand_ids', []))
            ->filter()
            ->map(fn ($id) => (int) $id)
            ->values();

        $brands = Brand::query()
            ->with(['media'])
            ->isActive()
            ->when(
                $selectedBrandIds->isNotEmpty(),
                fn ($query) => $query->whereIn('id', $selectedBrandIds->all()),
                fn ($query) => $query->orderBy('updated_at', 'asc')
            )
            ->get();

        if ($selectedBrandIds->isNotEmpty()) {
            $brands = $brands->sortBy(fn (Brand $brand) => $selectedBrandIds->search($brand->id))->values();
        }

        if (!$homePage || empty($homePage->blocks)) {
            return view('home-legacy', [
                    'brands' => $brands,
                ] + $this->buildSeoViewData(
                    $homePage,
                    fallbackTitle: 'McAsia Foodtrade Corporation',
                    fallbackDescription: 'McAsia Foodtrade Corporation delivers authentic Asian food products, trusted brands, and culinary solutions across the Philippines.',
                    fallbackImage: asset('images/mcasia_logo_minimal.png')
                ));
        }

        return view('home', [
                'homePage' => $homePage,
                'brands' => $brands,
            ] + $this->buildSeoViewData(
                $homePage,
                titleField: 'name',
                descriptionField: null,
                fallbackTitle: 'McAsia Foodtrade Corporation',
                fallbackDescription: 'McAsia Foodtrade Corporation delivers authentic Asian food products, trusted brands, and culinary solutions across the Philippines.',
                fallbackImage: asset('images/mcasia_logo_minimal.png')
            ));
    }

    public function ourStory()
    {
        $ourStory = OurStory::with(['media', 'seo'])->isPublished()->first();

        return view('our_story', [
                'ourStory' => $ourStory,
            ] + $this->buildSeoViewData(
                $ourStory,
                titleField: 'title',
                descriptionField: 'subtitle',
                fallbackTitle: 'Our Story | ' . config('app.name', 'McAsia Foodtrade Corporation'),
                fallbackDescription: 'Learn more about McAsia Foodtrade Corporation, our story, mission, and values.',
                imageCollection: 'our-story-image',
                fallbackImage: asset('images/HOMEPAGE/1.jpg')
            ));
    }

    public function ourEdge(string $slug)
    {
        $ourEdge = OurEdge::with(['media', 'seo'])->pageBySlug($slug)->isPublished()->first();

        return view('our-edge', [
                'ourEdge' => $ourEdge
            ] + $this->buildSeoViewData(
                $ourEdge,
                titleField: 'title',
                descriptionField: 'description',
                fallbackTitle: ($ourEdge?->title ?: 'Our Edge') . ' | ' . config('app.name', 'McAsia Foodtrade Corporation'),
                fallbackDescription: 'Explore what sets McAsia apart through our capabilities, quality standards, and innovation.',
                imageCollection: 'our-edge-image',
                fallbackImage: asset('images/driven_innovation/1.jpg')
            ));
    }

    public function recipes()
    {
        $recipes = Recipe::with('media')
            ->orderBy('created_at')
            ->isPublished()
            ->latest()
            ->paginate(15)
            ->through(fn(Recipe $recipe): array => RecipeService::formatRecipe($recipe))
            ->withQueryString();

        return view('recipes', [
                'recipes' => $recipes,
            ] + $this->buildSeoViewData(
                null,
                fallbackTitle: 'Recipes | ' . config('app.name', 'McAsia Foodtrade Corporation'),
                fallbackDescription: 'Browse McAsia recipes and discover dishes, ingredients, and cooking inspiration featuring our products.',
                fallbackImage: asset('images/EXPLORE NEW RECEIPES/1.png')
            ));
    }

    public function recipeShow(string $slug)
    {
        $recipe = Recipe::with('media')
            ->with('seo')
            ->isPublished()
            ->where('slug', $slug)
            ->firstOrFail();

        return view('recipe-details', [
                'recipe' => RecipeService::formatRecipe($recipe),
            ] + $this->buildSeoViewData(
                $recipe,
                titleField: 'recipe_name',
                descriptionField: 'description',
                fallbackTitle: ($recipe->recipe_name ?: 'Recipe Details') . ' | ' . config('app.name', 'McAsia Foodtrade Corporation'),
                fallbackDescription: 'View ingredients, cooking steps, and serving inspiration from McAsia recipes.',
                imageCollection: 'recipe-image',
                fallbackImage: asset('images/EXPLORE NEW RECEIPES/1.png')
            ));
    }


    public function newsEvents()
    {
        // We need to check if the sort_no has value that is greater than 1.
        // If yes, use that column to sort the events.
        // If none, use event_date.
        $getLatestColumn = Event::query()
            ->isPublished()
            ->where('sort_no', '>', 0)
            ->exists()
            ? 'sort_no'
            : 'event_date';

        $newEvents = Event::with('media')
            ->isPublished()
            ->orderBy($getLatestColumn)
            ->latest('id')
            ->paginate(15)
            ->through(function (Event $event): array {
                return [
                    'title' => $event->event_name,
                    'date' => optional($event->event_date)->format('F j, Y') ?? '',
                    'description' => trim(strip_tags((string)$event->event_description)),
                    'images' => $event->getMedia('event-images')
                        ->map(fn($media) => $media->getUrl())
                        ->values()
                        ->all(),
                ];
            })
            ->withQueryString();

        return view('news_event', [
                'events' => $newEvents,
            ] + $this->buildSeoViewData(
                null,
                fallbackTitle: 'News & Events | ' . config('app.name', 'McAsia Foodtrade Corporation'),
                fallbackDescription: 'Stay updated with the latest McAsia news, events, launches, and company happenings.',
                fallbackImage: asset('images/EXPLORE NEW RECEIPES/1.png')
            ));
    }

    public function salesAvenue(string $slug)
    {
        $salesAvenue = SalesAvenueCategory::query()
            ->with([
                'seo',
                'salesAvenues' => fn($query) => $query
                    ->with(['seo'])
                    ->isPublished()
                    ->orderByDesc('sales_avenue_sales_avenue_category.is_primary')
                    ->orderBy('title'),
                'salesAvenues.media',
            ])
            ->isActive()
            ->pageBySlug($slug)
            ->firstOrFail();

        dd($salesAvenue);

        return view('sales-venue', [
                'salesAvenue' => $salesAvenue,
            ] + $this->buildSeoViewData(
                $salesAvenue,
                titleField: 'name',
                descriptionField: null,
                fallbackTitle: ($salesAvenue->name ?: 'Sales Avenue') . ' | ' . config('app.name', 'McAsia Foodtrade Corporation'),
                fallbackDescription: 'Discover McAsia sales avenues and channel solutions tailored for your market and business needs.',
                fallbackImage: asset('images/mcasia_logo_minimal.png')
            ));
    }

    public function reachUs()
    {
        $data = ReachUs::with(['media', 'seo'])->isPublished()->first();

        return view('reach_us', [
                'data' => $data
            ] + $this->buildSeoViewData(
                $data,
                titleField: 'title',
                descriptionField: 'subtitle',
                fallbackTitle: ($data?->title ?: 'Reach Us') . ' | ' . config('app.name', 'McAsia Foodtrade Corporation'),
                fallbackDescription: 'Get in touch with McAsia Foodtrade Corporation for inquiries, partnerships, and support.',
                imageCollection: 'reach-us-banner',
                fallbackImage: asset('images/mcasia_logo_minimal.png')
            ));
    }

    public function ourChannel()
    {
        $data = OurChannel::with(['media', 'seo'])->isPublished()->latest('updated_at')->first();

        return view('our_channel', [
                'data' => $data,
            ] + $this->buildSeoViewData(
                $data,
                titleField: 'title',
                descriptionField: 'subtitle',
                fallbackTitle: ($data?->title ?: 'Our Channel') . ' | ' . config('app.name', 'McAsia Foodtrade Corporation'),
                fallbackDescription: 'Explore McAsia channels and how our products reach businesses and consumers across the Philippines.',
                imageCollection: 'our-channel-banner',
                fallbackImage: asset('images/mcasia_logo_minimal.png')
            ));
    }

    public function ourImpact()
    {
        $data = OurImpact::with(['media', 'seo'])->isPublished()->latest('updated_at')->first();

        return view('our_impact', [
                'data' => $data,
            ] + $this->buildSeoViewData(
                $data,
                titleField: 'title',
                descriptionField: 'subtitle',
                fallbackTitle: ($data?->title ?: 'Our Impact') . ' | ' . config('app.name', 'McAsia Foodtrade Corporation'),
                fallbackDescription: 'Learn how McAsia creates value through quality products, trusted partnerships, and community impact.',
                imageCollection: 'our-impact-banner',
                fallbackImage: asset('images/mcasia_logo_minimal.png')
            ));
    }

    public function showBrands(string $slug)
    {
        $brand = Brand::query()->with(['media', 'products.media', 'seo'])->brandBySlug($slug)->firstOrFail();

        return view('show-brand', [
                'brand' => $brand,
            ] + $this->buildSeoViewData(
                $brand,
                titleField: 'brand_name',
                descriptionField: 'brand_description',
                fallbackTitle: ($brand->brand_name ?: 'Brand') . ' | ' . config('app.name', 'McAsia Foodtrade Corporation'),
                fallbackDescription: 'Discover McAsia brand offerings, featured products, and product highlights.',
                imageCollection: 'brand-banner',
                fallbackImage: asset('images/home/banner/homepage-banner-1.jpg')
            ));
    }

    private function buildSeoViewData(
        ?Model  $record,
        ?string $titleField = 'title',
        ?string $descriptionField = 'description',
        ?string $fallbackTitle = null,
        ?string $fallbackDescription = null,
        ?string $imageCollection = null,
        ?string $fallbackImage = null,
    ): array
    {
        $appName = config('app.name', 'McAsia Foodtrade Corporation');

        $titleValue = $titleField ? data_get($record, $titleField) : null;
        $descriptionValue = $descriptionField ? data_get($record, $descriptionField) : null;

        $normalizedDescription = Str::of(strip_tags((string)$descriptionValue))
            ->replaceMatches('/\s+/', ' ')
            ->trim()
            ->limit(160, '')
            ->value();

        $image = null;
        if ($record && $imageCollection && method_exists($record, 'getFirstMediaUrl')) {
            $image = $record->getFirstMediaUrl($imageCollection) ?: null;
        }

        return [
            'seoMeta' => $record?->seo,
            'seoFallbackTitle' => $fallbackTitle ?: ($titleValue ? "{$titleValue} | {$appName}" : $appName),
            'seoFallbackDescription' => $fallbackDescription ?: ($normalizedDescription ?: $appName),
            'seoFallbackImage' => $image ?: $fallbackImage ?: asset('images/mcasia_logo_minimal.png'),
        ];
    }

    public function privacyPolicy()
    {
        return view('privacy_policy');
    }

    public function termsAndConditions()
    {
        return view('termsandcondition');
    }
}
