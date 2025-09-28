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
use Illuminate\Support\HtmlString;

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

                // === HTML КОНТЕНТ ===
                Textarea::make('content')
                    ->label('Контент (HTML)')
                    ->rows(8)
                    ->live(onBlur: true)
                    ->helperText('Вводите HTML-код. Используйте теги: <p>, <h2>, <h3>, <ul>, <li>, <strong>, <em>, <a>')
                    ->columnSpanFull(),

                Placeholder::make('content_preview')
                    ->label('Предпросмотр контента')
                    ->content(function ($get) {
                        $content = $get('content');
                        if (!$content) {
                            return new HtmlString('<div class="text-gray-500 italic p-4 bg-gray-50 rounded-lg">Введите контент выше для предпросмотра</div>');
                        }

                        return new HtmlString(
                            '<div class="p-4 bg-white border rounded-lg shadow-sm" style="max-height: 300px; overflow-y: auto;">' .
                            '<div style="color: #4b5563; line-height: 1.6;">' .
                            '<style scoped>' .
                            '.preview-content h1 { font-size: 2rem; font-weight: bold; color: #1f2937; margin: 1.5rem 0 1rem 0; }' .
                            '.preview-content h2 { font-size: 1.75rem; font-weight: bold; color: #1f2937; margin: 1.25rem 0 0.75rem 0; }' .
                            '.preview-content h3 { font-size: 1.5rem; font-weight: 600; color: #1f2937; margin: 1rem 0 0.5rem 0; }' .
                            '.preview-content p { margin-bottom: 1rem; color: #4b5563; line-height: 1.6; }' .
                            '.preview-content ul { list-style-type: disc; list-style-position: inside; margin-bottom: 1rem; }' .
                            '.preview-content ol { list-style-type: decimal; list-style-position: inside; margin-bottom: 1rem; }' .
                            '.preview-content li { margin-bottom: 0.5rem; color: #4b5563; }' .
                            '.preview-content strong { font-weight: 600; color: #1f2937; }' .
                            '.preview-content em { font-style: italic; }' .
                            '.preview-content a { color: #0891b2; text-decoration: underline; }' .
                            '</style>' .
                            '<div class="preview-content">' . $content . '</div>' .
                            '</div>' .
                            '</div>'
                        );
                    })
                    ->hidden(fn ($get) => empty($get('content')))
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

                // === SEO НАСТРОЙКИ ===
                TextInput::make('meta_title')
                    ->label('Meta Title')
                    ->helperText('Заголовок для поисковых систем')
                    ->columnSpanFull(),
                Textarea::make('meta_description')
                    ->label('Meta Description')
                    ->rows(3)
                    ->helperText('Описание для поисковых систем')
                    ->columnSpanFull(),
                TextInput::make('meta_keywords')
                    ->label('Meta Keywords')
                    ->helperText('Ключевые слова через запятую')
                    ->columnSpanFull(),

                // === НАСТРОЙКИ ПУБЛИКАЦИИ ===
                Toggle::make('is_published')
                    ->label('Опубликовано')
                    ->default(true)
                    ->helperText('Услуга будет доступна на сайте'),
                Toggle::make('is_featured')
                    ->label('Рекомендуемая')
                    ->helperText('Услуга будет отмечена как рекомендуемая'),
                Toggle::make('show_on_homepage')
                    ->label('Показывать на главной')
                    ->helperText('Услуга будет отображаться в секции услуг на главной странице'),
                TextInput::make('sort_order')
                    ->label('Порядок сортировки')
                    ->numeric()
                    ->default(0)
                    ->helperText('Чем меньше число, тем выше в списке'),

                // === 🔗 СВЯЗИ ===

                // Связанные услуги
                TextInput::make('related_service_1_id')
                    ->label('🔗 ID связанной услуги #1')
                    ->numeric()
                    ->helperText('Введите ID услуги для отображения в блоке "Другие услуги"'),

                TextInput::make('related_service_2_id')
                    ->label('🔗 ID связанной услуги #2')
                    ->numeric()
                    ->helperText('Введите ID услуги для отображения в блоке "Другие услуги"'),

                TextInput::make('related_service_3_id')
                    ->label('🔗 ID связанной услуги #3')
                    ->numeric()
                    ->helperText('Введите ID услуги для отображения в блоке "Другие услуги"'),

                // Полезные статьи
                TextInput::make('related_article_1_id')
                    ->label('📰 ID полезной статьи #1')
                    ->numeric()
                    ->helperText('Введите ID статьи для отображения в блоке "Полезные статьи"'),

                TextInput::make('related_article_2_id')
                    ->label('📰 ID полезной статьи #2')
                    ->numeric()
                    ->helperText('Введите ID статьи для отображения в блоке "Полезные статьи"'),

                TextInput::make('related_article_3_id')
                    ->label('📰 ID полезной статьи #3')
                    ->numeric()
                    ->helperText('Введите ID статьи для отображения в блоке "Полезные статьи"'),

                // Связанные кейсы
                TextInput::make('related_case_1_id')
                    ->label('💼 ID связанного кейса #1')
                    ->numeric()
                    ->helperText('Введите ID кейса для отображения в блоке "Наши кейсы"'),

                TextInput::make('related_case_2_id')
                    ->label('💼 ID связанного кейса #2')
                    ->numeric()
                    ->helperText('Введите ID кейса для отображения в блоке "Наши кейсы"'),

                TextInput::make('related_case_3_id')
                    ->label('💼 ID связанного кейса #3')
                    ->numeric()
                    ->helperText('Введите ID кейса для отображения в блоке "Наши кейсы"'),
            ]);
    }
}
