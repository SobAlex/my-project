<?php

namespace App\Filament\Resources\ProjectCases\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProjectCaseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('case_id')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('client')
                    ->required(),
                Select::make('industry_category_id')
                    ->relationship('industryCategory', 'name', function ($query) {
                        $query->where('is_active', true);
                    })
                    ->required()
                    ->searchable()
                    ->preload()
                    ->options(function () {
                        return \App\Models\IndustryCategory::active()
                            ->get()
                            ->mapWithKeys(fn ($category) => [
                                $category->id => $category->name
                            ]);
                    }),
                TextInput::make('period')
                    ->required(),
                // Минимальный тестовый пример для отладки
                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('images')
                    ->visibility('public'),
                RichEditor::make('description')
                    ->label('Описание проекта')
                    ->required()
                    ->default('')
                    ->rules(['max:5000'])
                    ->toolbarButtons([
                        'attachFiles',
                        'blockquote',
                        'bold',
                        'bulletList',
                        'codeBlock',
                        'h1',
                        'h2',
                        'h3',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'strike',
                        'underline',
                        'undo',
                    ])
                    ->columnSpanFull(),
                // === 📊 МЕТРИКИ ДО/ПОСЛЕ ===
                Repeater::make('metrics')
                    ->label('Метрики "До и После"')
                    ->schema([
                        TextInput::make('name')
                            ->label('Название метрики')
                            ->placeholder('Например: Трафик, Конверсия, Лиды')
                            ->required(),
                        TextInput::make('before')
                            ->label('До')
                            ->placeholder('Значение до'),
                        TextInput::make('after')
                            ->label('После')
                            ->placeholder('Значение после'),
                    ])
                    ->addActionLabel('Добавить метрику')
                    ->reorderableWithButtons()
                    ->collapsible()
                    ->columnSpanFull()
                    ->grid(3),
                TextInput::make('service_key')
                    ->required()
                    ->default('seo-promotion'),
                Toggle::make('is_published')
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),

                // === 🎯 РЕЗУЛЬТАТЫ ПРОЕКТА ===
                Repeater::make('results')
                    ->label('Результаты проекта')
                    ->simple(
                        TextInput::make('result')
                            ->placeholder('Результат проекта')
                            ->required()
                    )
                    ->addActionLabel('Добавить результат')
                    ->reorderableWithButtons()
                    ->collapsible()
                    ->columnSpanFull()
                    ->grid(2),
                RichEditor::make('content')
                    ->label('Дополнительная информация')
                    ->default('')
                    ->rules(['max:10000'])
                    ->toolbarButtons([
                        'attachFiles',
                        'blockquote',
                        'bold',
                        'bulletList',
                        'codeBlock',
                        'h1',
                        'h2',
                        'h3',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'strike',
                        'underline',
                        'undo',
                    ])
                    ->columnSpanFull(),
                TextInput::make('meta_title')
                    ->label('SEO Заголовок')
                    ->placeholder('Введите SEO заголовок'),
                Textarea::make('meta_description')
                    ->label('SEO Описание')
                    ->placeholder('Введите SEO описание')
                    ->columnSpanFull(),
            ]);
    }
}
