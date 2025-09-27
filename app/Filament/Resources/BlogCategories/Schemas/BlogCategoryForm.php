<?php

namespace App\Filament\Resources\BlogCategories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ColorPicker;
use Filament\Schemas\Schema;

class BlogCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (string $operation, $state, callable $set) {
                        if ($operation !== 'create') {
                            return;
                        }
                        $set('slug', \Illuminate\Support\Str::slug($state));
                    }),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (callable $set, $state) => $set('slug', \Illuminate\Support\Str::slug($state))),
                Textarea::make('description')
                    ->columnSpanFull(),
                ColorPicker::make('color')
                    ->required()
                    ->default('#06b6d4')
                    ->hex()
                    ->formatStateUsing(fn ($state) => $state ?: '#06b6d4')
                    ->live()
                    ->helperText('Выберите цвет для категории блога'),
                TextInput::make('icon')
                    ->required()
                    ->default('article'),
                Toggle::make('is_active')
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
