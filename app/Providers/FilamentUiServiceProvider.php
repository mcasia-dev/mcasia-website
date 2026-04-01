<?php

namespace App\Providers;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\ServiceProvider;
use Filament\Forms\Components\Field;

class FilamentUiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // When a field has multiple words like "due_date", the label changes from "Due date" to "Due Date".
        Field::configureUsing(function (Field $field) {
            $field->label(function (\Filament\Forms\Components\Component $component) {
                return str($component->getName())
                    ->afterLast('.')
                    ->kebab()
                    ->replace(['-', '_'], ' ')
                    ->ucwords();
            });

            $field->validationAttribute(function (\Filament\Forms\Components\Component $component) {
                return $component->getLabel();
            });

            return $field;
        });

        // Make selects searchable and preloaded by default
        Select::configureUsing(function (Select $field) {
            return $field
                ->searchable()
                ->preload();
        });

        TextColumn::configureUsing(function (TextColumn $textColumn) {
            return $textColumn
                ->searchable()
                ->sortable();
        });

        RichEditor::configureUsing(function (RichEditor $richEditor) {
            return $richEditor
                ->toolbarButtons([
                    'bold',
                    'italic',
                    'underline',
                    'strike',
                    'link',
                    'h1',
                    'h2',
                    'h3',
                    'blockquote',
                    'bulletList',
                    'orderedList',
                    'undo',
                    'redo',
                    'alignStart', 'alignCenter', 'alignEnd', 'alignJustify'
                ]);
        });
    }
}
