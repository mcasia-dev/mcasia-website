<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomePageResource\Pages;
use App\Models\PublicPage\HomePage;
use Filament\Forms;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class HomePageResource extends Resource
{
    protected static ?string $model = HomePage::class;
    protected static ?string $navigationGroup = 'Public Pages';
    protected static ?string $navigationIcon = 'heroicon-o-home';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug((string) $state))),

                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(HomePage::class, 'slug', fn ($record) => $record),

                Toggle::make('is_published')
                    ->label('Is Published')
                    ->default(false),

                Builder::make('blocks')
                    ->label('Sections')
                    ->collapsible()
                    ->reorderableWithButtons()
                    ->addActionLabel('Add section')
                    ->blocks([
                        Block::make('hero')
                            ->label('Hero')
                            ->schema([
                                TextInput::make('eyebrow')->maxLength(80)->default('Our Story'),
                                TextInput::make('heading')->required()->maxLength(255),
                                Textarea::make('subheading')->rows(3),
                                FileUpload::make('background_image')
                                    ->image()
                                    ->multiple()
                                    ->maxFiles(8)
                                    ->disk('public')
                                    ->directory('home-blocks')
                                    ->visibility('public')
                                    ->maxSize(5120),
                                TextInput::make('button_label')->maxLength(80),
                                TextInput::make('button_url')->maxLength(255),
                                Select::make('text_align')
                                    ->options([
                                        'left' => 'Left',
                                        'center' => 'Center',
                                        'right' => 'Right',
                                    ])
                                    ->default('center'),
                            ])->columns(2),

                        Block::make('image_text')
                            ->label('Image + Text')
                            ->schema([
                                TextInput::make('title')->required()->maxLength(255),
                                Textarea::make('body')->rows(5),
                                TextInput::make('image_label')
                                    ->label('Image Label')
                                    ->maxLength(120),
                                FileUpload::make('image')
                                    ->image()
                                    ->multiple()
                                    ->maxFiles(8)
                                    ->disk('public')
                                    ->directory('home-blocks')
                                    ->visibility('public')
                                    ->maxSize(5120),
                                Select::make('image_display')
                                    ->label('Image Display')
                                    ->options([
                                        'carousel' => 'Carousel',
                                        'grid' => 'Grid',
                                    ])
                                    ->default('carousel')
                                    ->required()
                                    ->live(),
                                Select::make('grid_columns')
                                    ->label('Grid Columns')
                                    ->options([
                                        '2' => '2 Columns',
                                        '3' => '3 Columns',
                                        '4' => '4 Columns',
                                    ])
                                    ->default('2')
                                    ->visible(fn (Forms\Get $get): bool => $get('image_display') === 'grid'),
                                Select::make('image_position')
                                    ->options([
                                        'left' => 'Image Left',
                                        'right' => 'Image Right',
                                    ])
                                    ->default('left'),
                                TextInput::make('button_label')->maxLength(80),
                                TextInput::make('button_url')->maxLength(255),
                            ])->columns(2),

                        Block::make('cards')
                            ->label('Cards')
                            ->schema([
                                TextInput::make('title')->maxLength(255),
                                Select::make('grid_columns')
                                    ->label('Columns')
                                    ->options([
                                        '1' => '1 Column',
                                        '2' => '2 Columns',
                                        '3' => '3 Columns',
                                        '4' => '4 Columns',
                                    ])
                                    ->default('3')
                                    ->required(),
                                Repeater::make('items')
                                    ->schema([
                                        TextInput::make('title')->required()->maxLength(255),
                                        Textarea::make('description')->rows(3),
                                        FileUpload::make('image')
                                            ->image()
                                            ->multiple()
                                            ->maxFiles(8)
                                            ->disk('public')
                                            ->directory('home-blocks')
                                            ->visibility('public')
                                            ->maxSize(4096),
                                        TextInput::make('button_label')->maxLength(80),
                                        TextInput::make('button_url')->maxLength(255),
                                    ])
                                    ->defaultItems(3)
                                    ->columns(2)
                                    ->columnSpanFull(),
                            ]),

                        Block::make('cta')
                            ->label('Call To Action')
                            ->schema([
                                TextInput::make('title')->required()->maxLength(255),
                                Textarea::make('description')->rows(4),
                                TextInput::make('button_label')->required()->maxLength(80),
                                TextInput::make('button_url')->required()->maxLength(255),
                                Select::make('theme')
                                    ->options([
                                        'red' => 'Red',
                                        'dark' => 'Dark',
                                        'light' => 'Light',
                                    ])
                                    ->default('red'),
                            ])->columns(2),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('slug')
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
            'index' => Pages\ListHomePages::route('/'),
            'create' => Pages\CreateHomePage::route('/create'),
            'edit' => Pages\EditHomePage::route('/{record}/edit'),
        ];
    }
}
