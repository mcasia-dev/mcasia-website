<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OurStoryResource\Pages;
use App\Filament\Resources\OurStoryResource\RelationManagers;
use App\Models\PublicPage\OurStory;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OurStoryResource extends Resource
{
    protected static ?string $model = OurStory::class;
    protected static ?string $navigationGroup = 'Public Pages';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                TextInput::make('subtitle')
                    ->nullable()
                    ->maxLength(500),

                RichEditor::make('description')
                    ->nullable()
                    ->columnSpanFull(),

                Repeater::make('timeline_items')
                    ->label('Timeline')
                    ->nullable()
                    ->reorderableWithButtons()
                    ->collapsible()
                    ->cloneable()
                    ->addActionLabel('Add milestone')
                    ->schema([
                        TextInput::make('year')
                            ->required()
                            ->maxLength(50)
                            ->placeholder('2012 or Today'),
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('The Beginning'),
                        RichEditor::make('body')
                            ->required()
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'strike',
                                'link',
                                'h2',
                                'h3',
                                'bulletList',
                                'orderedList',
                            ])
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                SpatieMediaLibraryFileUpload::make('banner')
                    ->collection('our-story-image')
                    ->image()
                    ->optimize('webp')
                    ->imageEditor()
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->maxSize(5120),

                Toggle::make('is_published')
                    ->label('Is Published')
                    ->default(true)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Published'),
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
            'index' => Pages\ListOurStories::route('/'),
            'create' => Pages\CreateOurStory::route('/create'),
            'edit' => Pages\EditOurStory::route('/{record}/edit'),
        ];
    }
}
