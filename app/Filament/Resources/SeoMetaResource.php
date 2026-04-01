<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SeoMetaResource\Pages;
use App\Filament\Resources\SeoMetaResource\RelationManagers;
use App\Models\SeoMeta;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SeoMetaResource extends Resource
{
    protected static ?string $model = SeoMeta::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([

            // -------------------------
            // ESSENTIAL SEO
            // -------------------------
            Forms\Components\Section::make('Essential SEO')
                ->description('These fields directly affect how your page appears on Google.')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('SEO Title')
                        ->helperText('Ideal length: 50–60 characters.')
                        ->maxLength(60)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn($state, Forms\Set $set) => $set('og_title', $state)
                        )
                        ->required(),

                    Forms\Components\Textarea::make('meta_description')
                        ->label('Meta Description')
                        ->helperText('Ideal length: 150–160 characters. This appears below your title on Google.')
                        ->maxLength(160)
                        ->rows(3)
                        ->required(),

                    Forms\Components\TextInput::make('canonical_url')
                        ->label('Canonical URL')
                        ->helperText('The preferred URL of this page. Leave blank to use the current page URL.')
                        ->url()
                        ->prefix('https://')
                        ->columnSpanFull(),
                ])
                ->columns(1)
                ->collapsible(),

            // -------------------------
            // OPEN GRAPH / SOCIAL
            // -------------------------
            Forms\Components\Section::make('Social Media (Open Graph)')
                ->description('Controls how your page looks when shared on Facebook, LinkedIn, etc.')
                ->schema([
                    Forms\Components\TextInput::make('og_title')
                        ->label('OG Title')
                        ->helperText('Defaults to SEO Title if left blank.')
                        ->maxLength(95),

                    Forms\Components\Textarea::make('og_description')
                        ->label('OG Description')
                        ->helperText('Defaults to Meta Description if left blank.')
                        ->maxLength(200)
                        ->rows(3),

                    Forms\Components\FileUpload::make('og_image')
                        ->label('OG Image')
                        ->helperText('Recommended size: 1200x630px. Used when your page is shared on social media.')
                        ->image()
                        ->imagePreviewHeight('150')
                        ->columnSpanFull(),

                    Forms\Components\Select::make('og_type')
                        ->label('OG Type')
                        ->helperText('What kind of content is this page?')
                        ->options([
                            'website' => 'Website',
                            'article' => 'Article / Blog Post',
                            'product' => 'Product',
                            'profile' => 'Profile',
                        ])
                        ->default('website'),

                    Forms\Components\Select::make('og_locale')
                        ->label('OG Locale')
                        ->helperText('Language and region of this page.')
                        ->options([
                            'en_PH' => 'English (Philippines)',
                            'en_US' => 'English (US)',
                            'fil_PH' => 'Filipino (Philippines)',
                        ])
                        ->default('en_PH'),
                ])
                ->columns(2)
                ->collapsible(),

            // -------------------------
            // TWITTER / X
            // -------------------------
            Forms\Components\Section::make('Twitter / X Card')
                ->description('Controls how your page looks when shared on Twitter/X.')
                ->schema([
                    Forms\Components\Select::make('twitter_card')
                        ->label('Card Type')
                        ->options([
                            'summary' => 'Summary (small image)',
                            'summary_large_image' => 'Summary with Large Image',
                        ])
                        ->default('summary_large_image'),

                    Forms\Components\TextInput::make('twitter_site')
                        ->label('Twitter @handle')
                        ->helperText('Your company Twitter handle, e.g. @McAsiaFoodtrade')
                        ->prefix('@'),

                    Forms\Components\TextInput::make('twitter_title')
                        ->label('Twitter Title')
                        ->helperText('Defaults to SEO Title if left blank.')
                        ->maxLength(70),

                    Forms\Components\Textarea::make('twitter_description')
                        ->label('Twitter Description')
                        ->helperText('Defaults to Meta Description if left blank.')
                        ->maxLength(200)
                        ->rows(3),

                    Forms\Components\FileUpload::make('twitter_image')
                        ->label('Twitter Image')
                        ->helperText('Recommended size: 1200x628px.')
                        ->image()
                        ->imagePreviewHeight('150')
                        ->columnSpanFull(),
                ])
                ->columns(2)
                ->collapsible(),

            // -------------------------
            // ROBOTS
            // -------------------------
            Forms\Components\Section::make('Search Engine Robots')
                ->description('Control whether search engines can index and follow links on this page.')
                ->schema([
                    Forms\Components\Toggle::make('is_indexed')
                        ->label('Index this page')
                        ->helperText('Turn OFF to hide this page from Google search results.')
                        ->default(true),

                    Forms\Components\Toggle::make('is_followed')
                        ->label('Follow links on this page')
                        ->helperText('Turn OFF to tell Google not to follow links on this page.')
                        ->default(true),
                ])
                ->columns(2)
                ->collapsible(),

            // -------------------------
            // SCHEMA / JSON-LD
            // -------------------------
            Forms\Components\Section::make('Schema / JSON-LD')
                ->description('Structured data helps Google understand your content and can show rich results.')
                ->schema([
                    Forms\Components\Select::make('schema_type')
                        ->label('Schema Type')
                        ->helperText('What type of content is this page?')
                        ->options([
                            'Organization' => 'Organization (Company)',
                            'LocalBusiness' => 'Local Business',
                            'Product' => 'Product',
                            'Article' => 'Article',
                            'BlogPosting' => 'Blog Post',
                            'BreadcrumbList' => 'Breadcrumb',
                            'FAQPage' => 'FAQ Page',
                            'WebPage' => 'Web Page',
                        ])
                        ->searchable(),

                    Forms\Components\KeyValue::make('schema_data')
                        ->label('Schema Data')
                        ->helperText('Key-value pairs that describe this content. E.g. name → McAsia Foodtrade Corporation.')
                        ->columnSpanFull(),
                ])
                ->columns(1)
                ->collapsible(),

            // -------------------------
            // EXTRA / ADVANCED
            // -------------------------
            Forms\Components\Section::make('Advanced')
                ->schema([
                    Forms\Components\TextInput::make('keywords')
                        ->label('Keywords')
                        ->helperText('Comma-separated keywords. Low priority in modern SEO but still used by some platforms.')
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('author')
                        ->label('Author')
                        ->helperText('Name of the author of this page or article.'),

                    Forms\Components\KeyValue::make('extra_meta')
                        ->label('Extra Meta Tags')
                        ->helperText('Any additional custom meta tags you want to add.')
                        ->columnSpanFull(),
                ])
                ->columns(2)
                ->collapsible()
                ->collapsed(),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('seoable_type')
                    ->label('Model')
                    ->formatStateUsing(fn($state) => class_basename($state))
                    ->badge()
                    ->sortable(),

                Tables\Columns\TextColumn::make('seoable_id')
                    ->label('ID')
                    ->sortable(),

                Tables\Columns\TextColumn::make('title')
                    ->label('SEO Title')
                    ->limit(50)
                    ->searchable(),

                Tables\Columns\TextColumn::make('meta_description')
                    ->label('Meta Description')
                    ->limit(60)
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\IconColumn::make('is_indexed')
                    ->label('Indexed')
                    ->boolean(),

                Tables\Columns\IconColumn::make('is_followed')
                    ->label('Followed')
                    ->boolean(),

                Tables\Columns\TextColumn::make('schema_type')
                    ->label('Schema')
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('seoable_type')
                    ->label('Model Type')
                    ->options(fn() => SeoMeta::query()
                        ->distinct()
                        ->pluck('seoable_type')
                        ->mapWithKeys(fn($type) => [$type => class_basename($type)])
                        ->toArray()
                    ),

                Tables\Filters\TernaryFilter::make('is_indexed')
                    ->label('Indexed Pages'),
            ])
            ->defaultSort('updated_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSeoMetas::route('/'),
            'create' => Pages\CreateSeoMeta::route('/create'),
            'edit' => Pages\EditSeoMeta::route('/{record}/edit'),
        ];
    }
}
