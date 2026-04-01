<?php

namespace App\Filament\Components;

use Filament\Forms;

/**
 * SeoFields
 *
 * A reusable Filament form component that adds an SEO tab/section
 * to ANY Filament Resource (Posts, Products, Pages, etc.)
 *
 * Usage inside any Resource form:
 *
 *   use App\Filament\Components\SeoFields;
 *
 *   public static function form(Form $form): Form
 *   {
 *       return $form->schema([
 *           Forms\Components\Tabs::make('Content')
 *               ->tabs([
 *                   Forms\Components\Tabs\Tab::make('Content')
 *                       ->schema([...your normal fields...]),
 *
 *                   Forms\Components\Tabs\Tab::make('SEO')
 *                       ->schema(SeoFields::make()),
 *               ]),
 *       ]);
 *   }
 */
class SeoFields
{
    /**
     * Returns the full array of SEO form fields.
     * Drop this into any Filament Resource form schema.
     */
    public static function make(): array
    {
        return [

            // ── ESSENTIAL ─────────────────────────────────────────
            Forms\Components\Section::make('Essential SEO')
                ->schema([
                    Forms\Components\TextInput::make('seo.title')
                        ->label('SEO Title')
                        ->helperText('50–60 characters ideal.')
                        ->maxLength(60)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn($state, Forms\Set $set) => $set('seo.og_title', $state)
                        ),

                    Forms\Components\Textarea::make('seo.meta_description')
                        ->label('Meta Description')
                        ->helperText('150–160 characters ideal.')
                        ->maxLength(160)
                        ->rows(3),

                    Forms\Components\TextInput::make('seo.canonical_url')
                        ->label('Canonical URL')
                        ->url()
                        ->prefix('https://')
                        ->columnSpanFull(),
                ])
                ->columns(1)
                ->collapsible(),

            // ── OPEN GRAPH ────────────────────────────────────────
            Forms\Components\Section::make('Social Media (Open Graph)')
                ->schema([
                    Forms\Components\TextInput::make('seo.og_title')
                        ->label('OG Title')
                        ->maxLength(95),

                    Forms\Components\Textarea::make('seo.og_description')
                        ->label('OG Description')
                        ->maxLength(200)
                        ->rows(3),

                    Forms\Components\FileUpload::make('seo.og_image')
                        ->label('OG Image (1200×630px)')
                        ->image()
                        ->columnSpanFull(),

                    Forms\Components\Select::make('seo.og_type')
                        ->label('OG Type')
                        ->options([
                            'website' => 'Website',
                            'article' => 'Article',
                            'product' => 'Product',
                        ])
                        ->default('website'),

                    Forms\Components\Select::make('seo.og_locale')
                        ->label('OG Locale')
                        ->required()
                        ->options([
                            'en_PH' => 'English (Philippines)',
                            'en_US' => 'English (US)',
                            'fil_PH' => 'Filipino',
                        ])
                        ->default('en_PH'),
                ])
                ->columns(2)
                ->collapsible(),

            // ── TWITTER ───────────────────────────────────────────
            Forms\Components\Section::make('Twitter / X Card')
                ->schema([
                    Forms\Components\Select::make('seo.twitter_card')
                        ->label('Card Type')
                        ->options([
                            'summary' => 'Summary',
                            'summary_large_image' => 'Large Image',
                        ])
                        ->default('summary_large_image'),

                    Forms\Components\TextInput::make('seo.twitter_site')
                        ->label('Twitter @handle')
                        ->prefix('@'),

                    Forms\Components\TextInput::make('seo.twitter_title')
                        ->label('Twitter Title')
                        ->maxLength(70),

                    Forms\Components\Textarea::make('seo.twitter_description')
                        ->label('Twitter Description')
                        ->maxLength(200)
                        ->rows(2),
                ])
                ->columns(2)
                ->collapsible(),

            // ── ROBOTS ────────────────────────────────────────────
            Forms\Components\Section::make('Robots')
                ->schema([
                    Forms\Components\Toggle::make('seo.is_indexed')
                        ->label('Index this page')
                        ->default(true),

                    Forms\Components\Toggle::make('seo.is_followed')
                        ->label('Follow links')
                        ->default(true),
                ])
                ->columns(2)
                ->collapsible(),

            // ── SCHEMA ────────────────────────────────────────────
            Forms\Components\Section::make('Schema / JSON-LD')
                ->schema([
                    Forms\Components\Select::make('seo.schema_type')
                        ->label('Schema Type')
                        ->options([
                            'Organization' => 'Organization',
                            'LocalBusiness' => 'Local Business',
                            'Product' => 'Product',
                            'Article' => 'Article',
                            'BlogPosting' => 'Blog Post',
                            'FAQPage' => 'FAQ Page',
                            'WebPage' => 'Web Page',
                        ])
                        ->searchable(),

                    Forms\Components\KeyValue::make('seo.schema_data')
                        ->label('Schema Data')
                        ->columnSpanFull(),
                ])
                ->columns(1)
                ->collapsible(),

            // ── EXTRA / ADVANCED ────────────────────────────────────────────
            Forms\Components\Section::make('Advanced')
                ->schema([
                    Forms\Components\TextInput::make('seo.keywords')
                        ->label('Keywords')
                        ->helperText('Comma-separated keywords. Low priority in modern SEO but still used by some platforms.')
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('seo.author')
                        ->label('Author')
                        ->helperText('Name of the author of this page or article.'),

                    Forms\Components\TextInput::make('seo.publisher')
                        ->label('Publisher')
                        ->helperText('Defaults to McAsia Foodtrade Corporation if left blank.')
                        ->placeholder('McAsia Foodtrade Corporation'),

                    Forms\Components\KeyValue::make('seo.extra_meta')
                        ->label('Extra Meta Tags')
                        ->helperText('Any additional custom meta tags you want to add.')
                        ->columnSpanFull(),
                ])
                ->columns(2)
                ->collapsible()
                ->collapsed(),

        ];
    }
}
