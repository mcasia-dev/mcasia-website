<?php

namespace App\Filament\Resources;

use App\Filament\Components\SeoFields;
use App\Filament\Resources\SalesAvenueResource\Pages;
use App\Filament\Resources\SalesAvenueResource\RelationManagers;
use App\Models\SalesAvenue;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SalesAvenueResource extends Resource
{
    protected static ?string $model = SalesAvenue::class;
    protected static ?string $navigationGroup = 'Sales Avenue';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Sales Avenue')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Details')
                            ->icon('heroicon-o-cube')
                            ->schema([
                                Forms\Components\Section::make('')
                                    ->schema([
                                        Forms\Components\Select::make('categories')
                                            ->label('Sales Avenue Categories')
                                            ->relationship('categories', 'name')
                                            ->required()
                                            ->multiple()
                                            ->searchable()
                                            ->preload(),

                                        Forms\Components\TextInput::make('title')
                                            ->required()
                                            ->maxLength(255),

                                        Forms\Components\Toggle::make('is_published')
                                            ->label('Is Published')
                                            ->default(true)
                                            ->required(),

                                        Forms\Components\TextInput::make('grid_no')
                                            ->label('No. of grids')
                                            ->helperText('Number of grids to be display.')
                                            ->required()
                                            ->default(3),

                                        Forms\Components\RichEditor::make('content')
                                            ->columnSpanFull(),

                                        Forms\Components\SpatieMediaLibraryFileUpload::make('banner')
                                            ->collection('sales-avenue-banner')
                                            ->image()
                                            ->optimize('webp')
                                            ->imageEditor()
                                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                            ->maxSize(5120)
                                            ->multiple()
                                            ->required(),

                                    ])->columnSpanFull(),

                                Forms\Components\Section::make('')
                                    ->schema([
                                        ...static::getImageFieldTypeSchema(),
                                        ...static::getPlainImagesSchema(),
                                        ...static::getClickableImagesSchema(),
                                    ])->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('SEO')
                            ->icon('heroicon-o-magnifying-glass')
                            ->schema(SeoFields::make())
                    ])
                    ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Is Published')
                    ->sortable()
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSalesAvenues::route('/'),
            'create' => Pages\CreateSalesAvenue::route('/create'),
            'edit' => Pages\EditSalesAvenue::route('/{record}/edit'),
        ];
    }

    protected static function getImageFieldTypeSchema(): array
    {
        return [
            Forms\Components\Select::make('image_field_type')
                ->label('Image Field Type')
                ->options([
                    'plain' => 'Multiple Images Only',
                    'clickable' => 'Images With Links',
                ])
                ->helperText('Choose whether this sales avenue should use a simple image gallery or clickable images with a link per image.')
                ->default('plain')
                ->required()
                ->native(false)
                ->live(),
        ];
    }

    protected static function getPlainImagesSchema(): array
    {
        return [
            Forms\Components\SpatieMediaLibraryFileUpload::make('images')
                ->label('Images')
                ->collection('sales-avenue-images')
                ->image()
                ->optimize('webp')
                ->imageEditor()
                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                ->maxSize(5120)
                ->multiple()
                ->reorderable()
                ->visible(fn(Forms\Get $get): bool => $get('image_field_type') === 'plain')
                ->nullable(),
        ];
    }

    protected static function getClickableImagesSchema(): array
    {
        return [
            Forms\Components\Repeater::make('image_links')
                ->label('Clickable Images')
                ->helperText('Add each image together with the link it should open when clicked.')
                ->schema([
                    Forms\Components\FileUpload::make('image')
                        ->label('Image')
                        ->image()
                        ->disk('public')
                        ->directory('sales-avenues/clickable-images')
                        ->visibility('public')
                        ->imageEditor()
                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                        ->maxSize(5120)
                        ->required()
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('link_url')
                        ->label('Link URL')
                        ->helperText('Enter the page to open when this image is clicked. Use a full URL like https://example.com or a site path like /reach-us.')
                        ->maxLength(2048)
                        ->placeholder('https://example.com or /reach-us')
                        ->required()
                        ->columnSpanFull(),

                    TextInput::make('title')
                        ->label('Title')
                        ->nullable()
                        ->columnSpanFull(),
                ])
                ->reorderableWithButtons()
                ->collapsible()
                ->cloneable()
                ->addActionLabel('Add clickable image')
                ->columns(2)
                ->columnSpanFull()
                ->visible(fn(Forms\Get $get): bool => $get('image_field_type') === 'clickable')
                ->nullable(),
        ];
    }
}
