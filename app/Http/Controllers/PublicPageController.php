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
use Illuminate\Http\Request;

class PublicPageController extends Controller
{
    public function home()
    {
        $homePage = HomePage::query()
            ->isPublished()
            ->orderByDesc('updated_at')
            ->first();

        if (!$homePage || empty($homePage->blocks)) {
            $brands = Brand::query()
                ->with(['media'])
                ->isActive()
                ->orderBy('updated_at', 'asc')
                ->get();

            return view('home-legacy', [
                'brands' => $brands,
            ]);
        }

        return view('home', [
            'homePage' => $homePage,
        ]);
    }

    public function ourStory()
    {
        $ourStory = OurStory::with('media')->isPublished()->first();

        return view('our_story', [
            'ourStory' => $ourStory
        ]);
    }

    public function ourEdge(string $slug)
    {
        $ourEdge = OurEdge::with('media')->pageBySlug($slug)->isPublished()->first();

        return view('our-edge', [
            'ourEdge' => $ourEdge
        ]);
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
        ]);
    }

    public function recipeShow(string $slug)
    {
        $recipe = Recipe::with('media')
            ->isPublished()
            ->where('slug', $slug)
            ->firstOrFail();

        return view('recipe-details', [
            'recipe' => RecipeService::formatRecipe($recipe),
        ]);
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
        ]);
    }

    public function salesAvenue(string $slug)
    {
        $salesAvenue = SalesAvenueCategory::query()
            ->with([
                'salesAvenues' => fn($query) => $query
                    ->isPublished()
                    ->orderByDesc('sales_avenue_sales_avenue_category.is_primary')
                    ->orderBy('title'),
                'salesAvenues.media',
            ])
            ->isActive()
            ->pageBySlug($slug)
            ->firstOrFail();

        return view('sales-venue', [
            'salesAvenue' => $salesAvenue,
        ]);
    }

    public function reachUs()
    {
        $data = ReachUs::with(['media'])->isPublished()->first();

        return view('reach_us', [
            'data' => $data
        ]);
    }

    public function ourChannel()
    {
        $data = OurChannel::with('media')->isPublished()->latest('updated_at')->first();

        return view('our_channel', [
            'data' => $data,
        ]);
    }

    public function ourImpact()
    {
        $data = OurImpact::with('media')->isPublished()->latest('updated_at')->first();

        return view('our_impact', [
            'data' => $data,
        ]);
    }

    public function showBrands(string $slug)
    {
        $brand = Brand::query()->with(['media', 'products.media'])->brandBySlug($slug)->firstOrFail();

        return view('show-brand', [
            'brand' => $brand,
        ]);
    }
}
