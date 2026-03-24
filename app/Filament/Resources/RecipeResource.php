<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RecipeResource\Pages;
use App\Filament\Resources\RecipeResource\RelationManagers;
use App\Models\PublicPage\OurEdge;
use App\Models\PublicPage\Recipe;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class RecipeResource extends Resource
{
    protected static ?string $model = Recipe::class;
    protected static ?string $navigationGroup = 'Public Pages';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('recipe_name')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function ($state, Forms\Set $set) {
                        if (filled($state)) {
                            $set('slug', Str::slug((string)$state));
                        }
                    }),

                Forms\Components\TextInput::make('slug')
                    ->readOnly()
                    ->maxLength(255)
                    ->unique(Recipe::class, 'slug', fn($record) => $record),

                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),

                Forms\Components\Repeater::make('ingredients')
                    ->schema([
                        Forms\Components\TextInput::make('item')->required()->label('Ingredient'),
                        Forms\Components\TextInput::make('amount')->label('Amount'),
                        Forms\Components\TextInput::make('unit')->label('Unit'),
                    ])
                    ->columns(3)
                    ->defaultItems(1)
                    ->columnSpanFull(),

                Forms\Components\RichEditor::make('instructions')
                    ->columnSpanFull(),

                Forms\Components\SpatieMediaLibraryFileUpload::make('thumbnail_image')
                    ->label('Thumbnail Image')
                    ->collection('recipe-image')
                    ->image()
                    ->imageEditor()
                    ->optimize('webp')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->maxSize(5120)
                    ->required(),

                Forms\Components\SpatieMediaLibraryFileUpload::make('recipe_video')
                    ->label('Recipe Video')
                    ->collection('recipe-video')
                    ->acceptedFileTypes(['video/mp4', 'video/quicktime', 'video/x-msvideo', 'video/webm'])
                    ->maxSize(102400),

                Forms\Components\Toggle::make('is_published')
                    ->default(true)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('recipe_name')
                    ->label('Recipe Name')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Is Published')
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
            'index' => Pages\ListRecipes::route('/'),
            'create' => Pages\CreateRecipe::route('/create'),
            'edit' => Pages\EditRecipe::route('/{record}/edit'),
        ];
    }
}
