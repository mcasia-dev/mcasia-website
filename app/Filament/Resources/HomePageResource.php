<?php

namespace App\Filament\Resources;

use App\Filament\Components\SeoFields;
use App\Filament\Resources\HomePageResource\Pages;
use App\Models\Brand;
use App\Models\PublicPage\HomePage;
use App\Models\PublicPage\Recipe;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

class HomePageResource extends Resource
{
    protected static ?string $model = HomePage::class;
    protected static ?string $navigationGroup = 'Public Pages';
    protected static ?string $navigationIcon = 'heroicon-o-home';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Home Page')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Details')
                            ->icon('heroicon-o-cube')
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug((string)$state))),

                                TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(HomePage::class, 'slug', fn($record) => $record),

                                Toggle::make('is_published')
                                    ->label('Is Published')
                                    ->default(true),

                                Forms\Components\Section::make('Banner')
                                    ->schema([
                                        TextInput::make('blocks.banner.eyebrow')
                                            ->label('Header Note')
                                            ->maxLength(80)
                                            ->default('Our Story'),

                                        TextInput::make('blocks.banner.title')
                                            ->label('Banner Title')
                                            ->required()
                                            ->maxLength(255)
                                            ->default('HOME TO YOUR ASIAN CRAVINGS'),

                                        TextInput::make('blocks.banner.button_label')
                                            ->maxLength(80)
                                            ->default('Read More'),

                                        ...static::getLinkFieldSchema(
                                            pathPrefix: 'blocks.banner',
                                            defaultUrl: '/our-story',
                                        ),

                                        FileUpload::make('blocks.banner.images')
                                            ->label('Banner Images')
                                            ->image()
                                            ->multiple()
                                            ->maxFiles(8)
                                            ->disk('public')
                                            ->directory('home-blocks/banner')
                                            ->visibility('public')
                                            ->maxSize(5120)
                                            ->columnSpanFull(),
                                    ])
                                    ->collapsible()
                                    ->columns(2)
                                    ->columnSpanFull(),

                                Forms\Components\Section::make('Home To Your Asian Cravings')
                                    ->schema([
                                        Repeater::make('blocks.home_to_your_asian_cravings.items')
                                            ->label('Cards')
                                            ->schema([
                                                TextInput::make('title')
                                                    ->required()
                                                    ->maxLength(255),

                                                Forms\Components\RichEditor::make('description')
                                                    ->columnSpanFull(),

                                                FileUpload::make('image')
                                                    ->image()
                                                    ->disk('public')
                                                    ->directory('home-blocks/asian-cravings')
                                                    ->visibility('public')
                                                    ->maxSize(5120)
                                                    ->columnSpanFull(),

                                                TextInput::make('button_label')
                                                    ->maxLength(80)
                                                    ->default('Learn More'),

                                                ...static::getLinkFieldSchema(
                                                    pathPrefix: '',
                                                    defaultUrl: '/our-story',
                                                ),
                                            ])
                                            ->default([
                                                [
                                                    'title' => 'About Us',
                                                    'description' => 'We source and import a diverse selection of authentic Asian food products from countries such as Japan, China, Thailand, Malaysia, Indonesia, Taiwan, and more.',
                                                    'button_label' => 'Learn More',
                                                    'button_url' => '/our-story',
                                                ],
                                                [
                                                    'title' => 'Our Impact',
                                                    'description' => 'For years, we have served as a reliable bridge between world-class brands and Filipino consumers, ensuring access to safe, high-quality food and beverage products that enrich everyday life.',
                                                    'button_label' => 'Learn More',
                                                    'button_url' => '/our_impact',
                                                ],
                                                [
                                                    'title' => 'Our Channel',
                                                    'description' => 'We take pride in building strong and lasting partnerships that bring high-quality food products closer to consumers. Our distribution channels are strategically developed to ensure efficiency, consistency, and excellence nationwide.',
                                                    'button_label' => 'Learn More',
                                                    'button_url' => '/our_channel',
                                                ],
                                                [
                                                    'title' => 'Reach Us',
                                                    'description' => 'We believe that open communication is key to lasting partnerships. Our dedicated representatives are here to provide support, answer your questions, and explore opportunities that align with your business needs.',
                                                    'button_label' => 'Learn More',
                                                    'button_url' => '/reach_us',
                                                ],
                                            ])
                                            ->minItems(4)
                                            ->maxItems(4)
                                            ->addable(false)
                                            ->deletable(false)
                                            ->reorderable(false)
                                            ->columns(2)
                                            ->columnSpanFull(),
                                    ])
                                    ->collapsible()
                                    ->columnSpanFull(),

                                Forms\Components\Section::make('Our Products')
                                    ->schema([
                                        TextInput::make('blocks.our_products.title')
                                            ->required()
                                            ->maxLength(255)
                                            ->default('Our Products'),

                                        Forms\Components\RichEditor::make('blocks.our_products.description')
                                            ->columnSpanFull()
                                            ->default('We offer a carefully curated portfolio of authentic Asian food and beverage products, spanning Cooking Essentials, Frozen Meat & Seafood, Beverages, and Snacks, bringing genuine flavors and quality to modern consumers.'),

                                        TextInput::make('blocks.our_products.button_label')
                                            ->maxLength(80)
                                            ->default('All Products'),

                                        ...static::getLinkFieldSchema(
                                            pathPrefix: 'blocks.our_products',
                                            defaultUrl: '/products/cooking-essentials/cooking-essentials-canned-goods',
                                        ),

                                        Repeater::make('blocks.our_products.highlights')
                                            ->label('Product Highlights')
                                            ->schema([
                                                TextInput::make('label')
                                                    ->required()
                                                    ->maxLength(120),

                                                FileUpload::make('image')
                                                    ->image()
                                                    ->disk('public')
                                                    ->directory('home-blocks/products')
                                                    ->visibility('public')
                                                    ->maxSize(5120),
                                            ])
                                            ->default([
                                                ['label' => 'Cooking Essentials'],
                                                ['label' => 'Frozen Meat & Seafood'],
                                                ['label' => 'Beverages'],
                                                ['label' => 'Snacks'],
                                            ])
                                            ->minItems(4)
                                            ->maxItems(4)
                                            ->addable(false)
                                            ->deletable(false)
                                            ->reorderable(false)
                                            ->columns(2)
                                            ->columnSpanFull(),

                                        Select::make('blocks.our_products.brand_ids')
                                            ->label('Featured Brands')
                                            ->options(fn(): array => Brand::query()
                                                ->isActive()
                                                ->orderBy('brand_name')
                                                ->pluck('brand_name', 'id')
                                                ->all())
                                            ->multiple()
                                            ->preload()
                                            ->searchable()
                                            ->columnSpanFull(),
                                    ])
                                    ->collapsible()
                                    ->columns(2)
                                    ->columnSpanFull(),

                                Forms\Components\Section::make('Our Recipes')
                                    ->schema([
                                        TextInput::make('blocks.our_recipes.eyebrow')
                                            ->maxLength(80)
                                            ->default('Recipes'),

                                        TextInput::make('blocks.our_recipes.title')
                                            ->required()
                                            ->maxLength(255)
                                            ->default('Cook Like A Chef!'),

                                        Forms\Components\RichEditor::make('blocks.our_recipes.description')
                                            ->columnSpanFull()
                                            ->default("Turn every meal into a moment that brings families together and sparks inspiration in the kitchen. Discover our Asian recipes, crafted with a chef's touch and made to be shared."),

                                        TextInput::make('blocks.our_recipes.button_label')
                                            ->maxLength(80)
                                            ->default('View Recipes'),

                                        ...static::getLinkFieldSchema(
                                            pathPrefix: 'blocks.our_recipes',
                                            defaultUrl: '/recipes',
                                        ),

                                        FileUpload::make('blocks.our_recipes.banner_image')
                                            ->image()
                                            ->disk('public')
                                            ->directory('home-blocks/recipes')
                                            ->visibility('public')
                                            ->maxSize(5120),

                                        Select::make('blocks.our_recipes.recipe_ids')
                                            ->label('Featured Recipes')
                                            ->options(fn(): array => Recipe::query()
                                                ->isPublished()
                                                ->orderBy('recipe_name')
                                                ->pluck('recipe_name', 'id')
                                                ->all())
                                            ->multiple()
                                            ->preload()
                                            ->searchable()
                                            ->columnSpanFull(),
                                    ])
                                    ->collapsible()
                                    ->columns(2)
                                    ->columnSpanFull(),
                            ]),
                        Forms\Components\Tabs\Tab::make('SEO')
                            ->icon('heroicon-o-magnifying-glass')
                            ->schema(SeoFields::make()),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_published')
                    ->boolean(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHomePages::route('/'),
            'create' => Pages\CreateHomePage::route('/create'),
            'edit' => Pages\EditHomePage::route('/{record}/edit'),
        ];
    }

    protected static function getLinkFieldSchema(string $pathPrefix, string $defaultUrl): array
    {
        $linkTypePath = static::qualifyPath($pathPrefix, 'link_type');
        $externalUrlPath = static::qualifyPath($pathPrefix, 'external_button_url');
        $buttonUrlPath = static::qualifyPath($pathPrefix, 'button_url');

        return [
            Select::make($linkTypePath)
                ->label('Button Route')
                ->options(fn (): array => static::getWebRouteOptions() + ['other' => 'Other / External Link'])
                ->searchable()
                ->preload()
                ->default($defaultUrl)
                ->dehydrated(false)
                ->live()
                ->afterStateHydrated(function ($state, callable $set, Forms\Get $get) use ($linkTypePath, $externalUrlPath, $buttonUrlPath, $defaultUrl): void {
                    $savedUrl = $get($buttonUrlPath);
                    $routeOptions = static::getWebRouteOptions();

                    if (! filled($savedUrl)) {
                        $set($linkTypePath, $defaultUrl);
                        $set($buttonUrlPath, $defaultUrl);

                        return;
                    }

                    if (array_key_exists($savedUrl, $routeOptions)) {
                        $set($linkTypePath, $savedUrl);
                        $set($externalUrlPath, null);

                        return;
                    }

                    $set($linkTypePath, 'other');
                    $set($externalUrlPath, $savedUrl);
                })
                ->afterStateUpdated(function ($state, callable $set, Forms\Get $get) use ($externalUrlPath, $buttonUrlPath, $defaultUrl): void {
                    if ($state === 'other') {
                        $set($buttonUrlPath, $get($externalUrlPath));

                        return;
                    }

                    $set($externalUrlPath, null);
                    $set($buttonUrlPath, $state ?: $defaultUrl);
                }),

            TextInput::make($externalUrlPath)
                ->label('Custom / External URL')
                ->helperText('Use this only if the button should open a page that is not in the route list above. Enter the full link, for example: https://mcasiafoodtrade.ph/')
                ->placeholder('https://mcasiafoodtrade.ph/')
                ->dehydrated(false)
                ->visible(fn (Forms\Get $get): bool => $get($linkTypePath) === 'other')
                ->live(onBlur: true)
                ->afterStateUpdated(function ($state, callable $set) use ($buttonUrlPath): void {
                    $set($buttonUrlPath, $state);
                }),

            Forms\Components\Hidden::make($buttonUrlPath)
                ->default($defaultUrl),
        ];
    }

    protected static function qualifyPath(string $prefix, string $field): string
    {
        return filled($prefix) ? "{$prefix}.{$field}" : $field;
    }

    protected static function getWebRouteOptions(): array
    {
        return collect(Route::getRoutes())
            ->filter(function ($route): bool {
                $methods = $route->methods();
                $uri = $route->uri();
                $middleware = $route->middleware();

                return in_array('GET', $methods, true)
                    && ! in_array('POST', $methods, true)
                    && in_array('web', $middleware, true)
                    && ! str_contains($uri, '{')
                    && ! str_starts_with($uri, 'admin')
                    && ! str_starts_with($uri, 'livewire')
                    && ! str_starts_with($uri, '_');
            })
            ->mapWithKeys(function ($route): array {
                $uri = '/' . ltrim($route->uri(), '/');
                $uri = $uri === '//' ? '/' : $uri;

                $label = str($route->getName() ?: $uri)
                    ->replace(['-', '_', '.'], ' ')
                    ->headline()
                    ->toString();

                return [$uri => $label . ' (' . $uri . ')'];
            })
            ->sortKeys()
            ->all();
    }
}
