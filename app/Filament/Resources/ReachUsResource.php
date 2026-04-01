<?php

namespace App\Filament\Resources;

use App\Filament\Components\SeoFields;
use App\Filament\Resources\ReachUsResource\Pages;
use App\Filament\Resources\ReachUsResource\RelationManagers;
use App\Models\ReachUs;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReachUsResource extends Resource
{
    protected static ?string $model = ReachUs::class;
    protected static ?string $navigationGroup = 'Public Pages';
    protected static ?string $navigationLabel = 'Reach Us';
    protected static ?string $label = 'Reach Us';
    protected static ?string $pluralLabel = 'Reach Us';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Reach Us')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Details')
                            ->icon('heroicon-o-cube')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\Textarea::make('subtitle')
                                    ->columnSpanFull(),

                                Forms\Components\RichEditor::make('description')
                                    ->columnSpanFull(),

                                Forms\Components\SpatieMediaLibraryFileUpload::make('banner')
                                    ->collection('reach-us-banner')
                                    ->image()
                                    ->optimize('webp')
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                    ->maxSize(5120),

                                Forms\Components\Toggle::make('is_published')
                                    ->default(true)
                                    ->nullable(),
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
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_published')
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
            'index' => Pages\ListReachUs::route('/'),
            'create' => Pages\CreateReachUs::route('/create'),
            'edit' => Pages\EditReachUs::route('/{record}/edit'),
        ];
    }
}
