<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OurEdgeResource\Pages;
use App\Filament\Resources\OurEdgeResource\RelationManagers;
use App\Models\PublicPage\OurEdge;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class OurEdgeResource extends Resource
{
    protected static ?string $model = OurEdge::class;
    protected static ?string $navigationGroup = 'Public Pages';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live()
                    ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),

                TextInput::make('slug')
                    ->readOnly()
                    ->required()
                    ->unique(OurEdge::class, 'slug', fn($record) => $record),

                Forms\Components\RichEditor::make('description')
                    ->nullable()
                    ->columnSpanFull(),

                Forms\Components\RichEditor::make('content')
                    ->nullable()
                    ->columnSpanFull(),

                Forms\Components\SpatieMediaLibraryFileUpload::make('image')
                    ->collection('our-edge-image')
                    ->image()
                    ->optimize('webp')
                    ->imageEditor()
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->maxSize(5120),

                TextInput::make('sort_order')
                    ->label('Sort Order')
                    ->default(1)
                    ->required(),

                Forms\Components\Toggle::make('is_published')
                    ->label('Published')
                    ->default(true)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Published')
                    ->sortable(),
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
            'index' => Pages\ListOurEdges::route('/'),
            'create' => Pages\CreateOurEdge::route('/create'),
            'edit' => Pages\EditOurEdge::route('/{record}/edit'),
        ];
    }
}
