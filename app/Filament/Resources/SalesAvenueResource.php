<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SalesAvenueResource\Pages;
use App\Filament\Resources\SalesAvenueResource\RelationManagers;
use App\Models\SalesAvenue;
use Filament\Forms;
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
                Forms\Components\Select::make('categories')
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

                Forms\Components\SpatieMediaLibraryFileUpload::make('images')
                    ->collection('sales-avenue-images')
                    ->image()
                    ->optimize('webp')
                    ->imageEditor()
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->maxSize(5120)
                    ->multiple()
                    ->reorderable()
                    ->nullable(),
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
}
