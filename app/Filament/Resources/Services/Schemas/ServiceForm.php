<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Placeholder;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
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
                    ->rows(3)
                    ->columnSpanFull(),
                RichEditor::make('content')
                    ->toolbarButtons([
                        'bold', 'italic', 'link', 'bulletList', 'orderedList',
                        'h2', 'h3', 'blockquote', 'codeBlock'
                    ])
                    ->columnSpanFull(),
                ColorPicker::make('color')
                    ->required()
                    ->default('#06b6d4')
                    ->hex()
                    ->formatStateUsing(fn ($state) => $state ?: '#06b6d4')
                    ->live()
                    ->helperText('Выберите цвет для услуги'),
                Placeholder::make('icon_preview')
                    ->label('Превью иконки')
                    ->content(function ($get) {
                        $icon = $get('icon') ?: 'business';
                        $color = $get('color') ?: '#06b6d4';

                        return new \Illuminate\Support\HtmlString(
                            '<div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg border border-gray-200">' .
                            '<div class="inline-flex items-center justify-center w-10 h-10 rounded-lg shadow-sm border" style="background-color: ' . $color . '20; border-color: ' . $color . '40;">' .
                            '<i class="material-icons text-xl" style="color: ' . $color . '">' . $icon . '</i>' .
                            '</div>' .
                            '<div class="flex flex-col">' .
                            '<span class="text-sm font-medium text-gray-900">' . $icon . '</span>' .
                            '<span class="text-xs text-gray-500">' . $color . '</span>' .
                            '</div>' .
                            '</div>'
                        );
                    })
                    ->hidden(fn ($get) => empty($get('icon'))),
                TextInput::make('icon')
                    ->live()
                    ->helperText('Введите название иконки Material Icons (например: business, trending_up, web)')
                    ->placeholder('business'),
                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('images')
                    ->visibility('public'),
                TextInput::make('price_from')
                    ->numeric()
                    ->prefix('₽')
                    ->helperText('Укажите стартовую цену или оставьте пустым для "По договоренности"'),
                Select::make('price_type')
                    ->options([
                        'project' => 'За проект',
                        'hour' => 'За час',
                        'month' => 'За месяц',
                    ])
                    ->default('project')
                    ->required(),
Repeater::make('features')
                    ->simple(
                        TextInput::make('feature')
                            ->placeholder('Особенность услуги')
                    )
                    ->addActionLabel('Добавить особенность')
                    ->columnSpanFull()
                    ->grid(2),
                TextInput::make('meta_title')
                    ->helperText('Заголовок для поисковых систем'),
                Textarea::make('meta_description')
                    ->rows(3)
                    ->helperText('Описание для поисковых систем'),
                TextInput::make('meta_keywords')
                    ->helperText('Ключевые слова через запятую'),
                Toggle::make('is_published')
                    ->default(true),
                Toggle::make('is_featured')
                    ->helperText('Рекомендуемая услуга'),
                Toggle::make('show_on_homepage')
                    ->label('Показывать на главной')
                    ->helperText('Услуга будет отображаться в секции услуг на главной странице'),
                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0)
                    ->helperText('Порядок сортировки'),
            ]);
    }
}
