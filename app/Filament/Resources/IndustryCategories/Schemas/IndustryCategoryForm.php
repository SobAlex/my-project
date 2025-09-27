<?php

namespace App\Filament\Resources\IndustryCategories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ColorPicker;
use Filament\Schemas\Schema;

class IndustryCategoryForm
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
                TextInput::make('icon'),
                ColorPicker::make('color')
                    ->required()
                    ->default('#3B82F6')
                    ->hex()
                    ->formatStateUsing(fn ($state) => $state ?: '#3B82F6')
                    ->live()
                    ->helperText('Выберите цвет для категории индустрии'),
                Toggle::make('is_active')
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
