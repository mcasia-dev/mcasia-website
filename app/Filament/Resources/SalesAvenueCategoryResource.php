<?php

namespace App\Filament\Resources;

use App\Filament\Components\SeoFields;
use App\Filament\Resources\SalesAvenueCategoryResource\Pages;
use App\Filament\Resources\SalesAvenueCategoryResource\RelationManagers;
use App\Models\PublicPage\Recipe;
use App\Models\SalesAvenueCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class SalesAvenueCategoryResource extends Resource
{
    protected static ?string $model = SalesAvenueCategory::class;
    protected static ?string $navigationGroup = 'Sales Avenue';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Sales Avenue Category')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Details')
                            ->icon('heroicon-o-cube')
                            ->schema([
                                Forms\Components\Select::make('parent_id')
                                    ->relationship('parent', 'name'),

                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function ($state, Forms\Set $set) {
                                        if (filled($state)) {
                                            $set('slug', Str::slug((string) $state));
                                        }
                                    }),

                                Forms\Components\TextInput::make('slug')
                                    ->readOnly()
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(SalesAvenueCategory::class, 'slug', fn ($record) => $record),

                                Forms\Components\TextInput::make('level')
                                    ->numeric(),

                                Forms\Components\TextInput::make('sort_order')
                                    ->label('Sort Order')
                                    ->numeric(),

                                Forms\Components\Toggle::make('is_active')
                                    ->label('Is Active')
                                    ->default(true)
                                    ->required(),
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
                Tables\Columns\TextColumn::make('parent.name')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),

                Tables\Columns\TextColumn::make('level')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Sort Order')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Is Active')
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
            'index' => Pages\ListSalesAvenueCategories::route('/'),
            'create' => Pages\CreateSalesAvenueCategory::route('/create'),
            'edit' => Pages\EditSalesAvenueCategory::route('/{record}/edit'),
        ];
    }
}
