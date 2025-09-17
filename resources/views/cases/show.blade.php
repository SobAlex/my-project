@extends('layouts.app')

@section('title', $case['title'] . ' - SEO продвижение сайтов')

@section('content')
    {{-- Hero section --}}
    <section class="section-bg">
        <div>
            <div class="flex items-center mb-8">
                <a href="{{ route('cases') }}" class="text-cyan-600 hover:text-cyan-700 mr-4">
                    <i class="material-icons">arrow_back</i>
                </a>
                <div>
                    <h1 class="text-4xl font-bold text-gray-800 mb-2">{{ $case['title'] }}</h1>
                    <div class="flex items-center text-gray-600">
                        <i class="material-icons mr-2">{{ $serviceData['service_icon'] }}</i>
                        <a href="{{ route('services.seo-promotion') }}"
                            class="hover:text-cyan-600 transition-colors">{{ $serviceData['service_name'] }}</a>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                {{-- Case image --}}
                <div class="relative h-64 lg:h-80 overflow-hidden ">
                    <img src="{{ asset('images/' . $case['image']) }}" alt="{{ $case['title'] }}"
                        class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 text-white">
                        <a href="{{ route('cases.' . $case['industry']) }}"
                            class="bg-cyan-500 hover:bg-cyan-600 px-3 py-1 text-sm font-medium transition-colors inline-block">
                            @switch($case['industry'])
                                @case('clothing')
                                    Одежда
                                @break

                                @case('production')
                                    Производство
                                @break

                                @case('electronics')
                                    Электроника
                                @break

                                @case('furniture')
                                    Мебель
                                @break

                                @default
                                    {{ $case['industry'] }}
                            @endswitch
                        </a>
                    </div>
                </div>

                {{-- Case info --}}
                <div class="space-y-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">Описание проекта</h2>
                        <p class="text-gray-600 leading-relaxed">{{ $case['description'] }}</p>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-gray-50 p-4 ">
                            <div class="text-sm text-gray-500 mb-1">Клиент</div>
                            <div class="font-semibold text-gray-800">{{ $case['client'] }}</div>
                        </div>
                        <div class="bg-gray-50 p-4 ">
                            <div class="text-sm text-gray-500 mb-1">Период</div>
                            <div class="font-semibold text-gray-800">{{ $case['period'] }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Results section --}}
    <section class="section-bg">
        <div>
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Ключевые результаты</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($case['results'] as $result)
                    <div class="flex items-start space-x-3 p-4 bg-white  shadow-sm">
                        <i class="material-icons text-green-500 mt-1">check_circle</i>
                        <span class="text-gray-700">{{ $result }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Before/After section --}}
    @if (isset($case['before_after']) && !empty($case['before_after']))
        <section class="section-bg">
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">До и после</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($case['before_after'] as $metric => $values)
                        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                            <div class="p-4 text-center">
                                <h3 class="font-semibold text-gray-800 mb-4 capitalize">
                                    @switch($metric)
                                        @case('traffic')
                                            Трафик
                                        @break

                                        @case('keywords')
                                            Ключевые слова
                                        @break

                                        @case('conversion')
                                            Конверсия
                                        @break

                                        @case('revenue')
                                            Выручка
                                        @break

                                        @case('appointments')
                                            Записи
                                        @break

                                        @case('calls')
                                            Звонки
                                        @break

                                        @case('leads')
                                            Лиды
                                        @break

                                        @case('cost_per_lead')
                                            Цена лида
                                        @break

                                        @case('mobile_traffic')
                                            Мобильный трафик
                                        @break

                                        @case('repeat_clients')
                                            Повторные клиенты
                                        @break

                                        @case('enrollments')
                                            Записи на курсы
                                        @break

                                        @case('time_on_site')
                                            Время на сайте
                                        @break

                                        @case('local_traffic')
                                            Локальный трафик
                                        @break

                                        @case('map_views')
                                            Просмотры на карте
                                        @break

                                        @case('reservations')
                                            Бронирования
                                        @break

                                        @case('avg_check')
                                            Средний чек
                                        @break

                                        @case('b2b_traffic')
                                            B2B трафик
                                        @break

                                        @case('large_orders')
                                            Крупные заказы
                                        @break

                                        @case('avg_project')
                                            Средний проект
                                        @break

                                        @case('orders')
                                            Заказы
                                        @break

                                        @case('inquiries')
                                            Запросы
                                        @break

                                        @case('sales')
                                            Продажи
                                        @break

                                        @case('cost_per_sale')
                                            Цена продажи
                                        @break

                                        @case('avg_order')
                                            Средний заказ
                                        @break

                                        @case('catalog_conversion')
                                            Конверсия каталога
                                        @break

                                        @case('brand_traffic')
                                            Брендовый трафик
                                        @break

                                        @case('product_views')
                                            Просмотры товаров
                                        @break

                                        @default
                                            {{ ucfirst($metric) }}
                                    @endswitch
                                </h3>
                                <div class="space-y-3">
                                    <div class="text-center p-3 bg-red-50 rounded">
                                        <div class="text-xs text-gray-500 mb-1">До</div>
                                        <div class="text-lg font-bold text-red-600">{{ $values['before'] }}</div>
                                    </div>
                                    <div class="flex justify-center">
                                        <i class="material-icons text-cyan-500">arrow_downward</i>
                                    </div>
                                    <div class="text-center p-3 bg-green-50 rounded">
                                        <div class="text-xs text-gray-500 mb-1">После</div>
                                        <div class="text-lg font-bold text-green-600">{{ $values['after'] }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- CTA section --}}
    <section class="section-bg">
        <div>
            <div class="bg-gradient-to-r from-cyan-500 to-blue-600 text-white  p-8 text-center">
                <h2 class="text-3xl font-bold mb-4">Хотите такой же результат?</h2>
                <p class="text-xl mb-6 opacity-90">Свяжитесь с нами для обсуждения вашего проекта</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button class="bg-white text-cyan-600 px-8 py-3  font-semibold hover:bg-gray-100 transition"
                        onclick="openServiceOrderModal('{{ $serviceData['service_name'] }}')">
                        Заказать услугу
                    </button>
                    <button class="bg-white text-cyan-600 px-8 py-3  font-semibold hover:bg-gray-100 transition"
                        onclick="window.dispatchEvent(new CustomEvent('open-callback'))">
                        Заказать звонок
                    </button>
                </div>
            </div>
        </div>
    </section>

@endsection
