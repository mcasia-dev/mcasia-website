<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductCategoryResource\Pages;
use App\Models\ProductCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class ProductCategoryResource extends Resource
{
    protected static ?string $model = ProductCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?string $navigationGroup = 'Catalog';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('parent_id')
                    ->label('Parent Category')
                    ->relationship('parent', 'name')
                    ->searchable()
                    ->preload()
                    ->nullable(),

                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(120)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function ($state, Forms\Set $set): void {
                        if (filled($state)) {
                            $set('slug', Str::slug((string)$state));
                        }
                    }),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(140)
                    ->unique(ignoreRecord: true),

                Forms\Components\TextInput::make('level')
                    ->numeric()
                    ->required()
                    ->default(1)
                    ->minValue(1)
                    ->maxValue(10),

                Forms\Components\TextInput::make('sort_order')
                    ->numeric()
                    ->required()
                    ->default(0),

                Forms\Components\Toggle::make('is_active')
                    ->required()
                    ->default(true),

                Forms\Components\SpatieMediaLibraryFileUpload::make('icon')
                    ->label('Icon')
                    ->collection('category-icons')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('icon')
                    ->collection('category-icons'),

                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('parent.name')
                    ->label('Parent')
                    ->placeholder('-')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('level')
                    ->sortable(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active'),
            ])
            ->defaultSort('sort_order')
            ->modifyQueryUsing(fn(Builder $query) => $query->orderBy('level')->orderBy('sort_order')->orderBy('name'))
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductCategories::route('/'),
            'create' => Pages\CreateProductCategory::route('/create'),
            'edit' => Pages\EditProductCategory::route('/{record}/edit'),
        ];
    }
}
