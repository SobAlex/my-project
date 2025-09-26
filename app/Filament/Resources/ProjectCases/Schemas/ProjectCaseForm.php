<?php

namespace App\Filament\Resources\ProjectCases\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
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
                // Before/After Metrics Section
                Placeholder::make('before_after_section')
                    ->content('Метрики "До и После"')
                    ->columnSpanFull(),

                // Traffic
                TextInput::make('traffic_before')
                    ->label('Трафик - До'),
                TextInput::make('traffic_after')
                    ->label('Трафик - После'),

                // Keywords
                TextInput::make('keywords_before')
                    ->label('Ключевые слова - До'),
                TextInput::make('keywords_after')
                    ->label('Ключевые слова - После'),

                // Conversion
                TextInput::make('conversion_before')
                    ->label('Конверсия - До'),
                TextInput::make('conversion_after')
                    ->label('Конверсия - После'),

                // Revenue
                TextInput::make('revenue_before')
                    ->label('Выручка - До'),
                TextInput::make('revenue_after')
                    ->label('Выручка - После'),

                // Appointments
                TextInput::make('appointments_before')
                    ->label('Записи - До'),
                TextInput::make('appointments_after')
                    ->label('Записи - После'),

                // Calls
                TextInput::make('calls_before')
                    ->label('Звонки - До'),
                TextInput::make('calls_after')
                    ->label('Звонки - После'),

                // Leads
                TextInput::make('leads_before')
                    ->label('Лиды - До'),
                TextInput::make('leads_after')
                    ->label('Лиды - После'),

                // Cost per lead
                TextInput::make('cost_per_lead_before')
                    ->label('Цена лида - До'),
                TextInput::make('cost_per_lead_after')
                    ->label('Цена лида - После'),

                // Mobile traffic
                TextInput::make('mobile_traffic_before')
                    ->label('Мобильный трафик - До'),
                TextInput::make('mobile_traffic_after')
                    ->label('Мобильный трафик - После'),

                // Repeat clients
                TextInput::make('repeat_clients_before')
                    ->label('Повторные клиенты - До'),
                TextInput::make('repeat_clients_after')
                    ->label('Повторные клиенты - После'),

                // Enrollments
                TextInput::make('enrollments_before')
                    ->label('Записи на курсы - До'),
                TextInput::make('enrollments_after')
                    ->label('Записи на курсы - После'),

                // Time on site
                TextInput::make('time_on_site_before')
                    ->label('Время на сайте - До'),
                TextInput::make('time_on_site_after')
                    ->label('Время на сайте - После'),

                // Local traffic
                TextInput::make('local_traffic_before')
                    ->label('Локальный трафик - До'),
                TextInput::make('local_traffic_after')
                    ->label('Локальный трафик - После'),

                // Map views
                TextInput::make('map_views_before')
                    ->label('Просмотры на карте - До'),
                TextInput::make('map_views_after')
                    ->label('Просмотры на карте - После'),

                // Reservations
                TextInput::make('reservations_before')
                    ->label('Бронирования - До'),
                TextInput::make('reservations_after')
                    ->label('Бронирования - После'),

                // Average check
                TextInput::make('avg_check_before')
                    ->label('Средний чек - До'),
                TextInput::make('avg_check_after')
                    ->label('Средний чек - После'),

                // B2B traffic
                TextInput::make('b2b_traffic_before')
                    ->label('B2B трафик - До'),
                TextInput::make('b2b_traffic_after')
                    ->label('B2B трафик - После'),

                // Large orders
                TextInput::make('large_orders_before')
                    ->label('Крупные заказы - До'),
                TextInput::make('large_orders_after')
                    ->label('Крупные заказы - После'),

                // Average project
                TextInput::make('avg_project_before')
                    ->label('Средний проект - До'),
                TextInput::make('avg_project_after')
                    ->label('Средний проект - После'),

                // Orders
                TextInput::make('orders_before')
                    ->label('Заказы - До'),
                TextInput::make('orders_after')
                    ->label('Заказы - После'),

                // Inquiries
                TextInput::make('inquiries_before')
                    ->label('Запросы - До'),
                TextInput::make('inquiries_after')
                    ->label('Запросы - После'),

                // Sales
                TextInput::make('sales_before')
                    ->label('Продажи - До'),
                TextInput::make('sales_after')
                    ->label('Продажи - После'),

                // Cost per sale
                TextInput::make('cost_per_sale_before')
                    ->label('Цена продажи - До'),
                TextInput::make('cost_per_sale_after')
                    ->label('Цена продажи - После'),

                // Average order
                TextInput::make('avg_order_before')
                    ->label('Средний заказ - До'),
                TextInput::make('avg_order_after')
                    ->label('Средний заказ - После'),

                // Catalog conversion
                TextInput::make('catalog_conversion_before')
                    ->label('Конверсия каталога - До'),
                TextInput::make('catalog_conversion_after')
                    ->label('Конверсия каталога - После'),

                // Brand traffic
                TextInput::make('brand_traffic_before')
                    ->label('Брендовый трафик - До'),
                TextInput::make('brand_traffic_after')
                    ->label('Брендовый трафик - После'),

                // Product views
                TextInput::make('product_views_before')
                    ->label('Просмотры товаров - До'),
                TextInput::make('product_views_after')
                    ->label('Просмотры товаров - После'),
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
                TextInput::make('result_1'),
                TextInput::make('result_2'),
                TextInput::make('result_3'),
                TextInput::make('result_4'),
                TextInput::make('result_5'),
                TextInput::make('result_6'),
                RichEditor::make('content')
                    ->label('Дополнительная информация')
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
