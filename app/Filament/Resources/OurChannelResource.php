<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OurChannelResource\Pages;
use App\Models\OurChannel;
use Filament\Forms;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OurChannelResource extends Resource
{
    protected static ?string $model = OurChannel::class;
    protected static ?string $navigationGroup = 'Public Pages';
    protected static ?string $navigationLabel = 'Our Channel';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('subtitle')
                    ->columnSpanFull(),

                Forms\Components\RichEditor::make('description')
                    ->columnSpanFull(),

                Builder::make('content_blocks')
                    ->label('Content Blocks')
                    ->collapsible()
                    ->reorderableWithButtons()
                    ->addActionLabel('Add block')
                    ->blocks([
                        Block::make('paragraph')
                            ->schema([
                                Forms\Components\TextInput::make('heading')
                                    ->maxLength(255),
                                Forms\Components\RichEditor::make('body')
                                    ->required()
                                    ->columnSpanFull(),
                            ])
                            ->columns(1),
                        Block::make('image')
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('public-pages')
                                    ->visibility('public')
                                    ->maxSize(5120)
                                    ->required(),
                                Forms\Components\TextInput::make('caption')
                                    ->maxLength(255),
                            ])
                            ->columns(1),
                    ])
                    ->columnSpanFull(),

                Forms\Components\SpatieMediaLibraryFileUpload::make('banner')
                    ->collection('our-channel-banner')
                    ->image()
                    ->optimize('webp')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->maxSize(5120),

                Forms\Components\Toggle::make('is_published')
                    ->default(true),
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
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOurChannels::route('/'),
            'create' => Pages\CreateOurChannel::route('/create'),
            'edit' => Pages\EditOurChannel::route('/{record}/edit'),
        ];
    }
}
