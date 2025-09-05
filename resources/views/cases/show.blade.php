@extends('layouts.app')

@section('title', $title . ' - SEO продвижение сайтов')

@section('content')
    {{-- Hero section --}}
    <section class="section-bg">
        <div class="flex flex-col lg:flex-row gap-8 items-center">
            <!-- Левая часть -->
            <div class="flex-1">
                <div class="flex items-center mb-4">
                    <i class="material-icons text-4xl text-cyan-500 mr-4">{{ $service['service_icon'] }}</i>
                    <span class="text-cyan-600 font-medium">{{ $service['service_name'] }}</span>
                </div>

                <h1 class="text-4xl font-bold text-gray-800 mb-6">{{ $case['title'] }}</h1>
                <p class="text-xl text-gray-600 mb-6 leading-relaxed">{{ $case['description'] }}</p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                    <div class="bg-cyan-50 p-4 rounded-lg">
                        <div class="text-sm text-gray-600">Клиент</div>
                        <div class="text-lg font-bold text-cyan-600">{{ $case['client'] }}</div>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="text-sm text-gray-600">Отрасль</div>
                        <div class="text-lg font-bold text-gray-700">{{ $case['industry'] }}</div>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="text-sm text-gray-600">Период работы</div>
                        <div class="text-lg font-bold text-gray-700">{{ $case['period'] }}</div>
                    </div>
                </div>

                {{-- Tags --}}
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">Отрасли:</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($case['tags'] as $tagKey)
                            @if (isset($tags[$tagKey]))
                                <a href="{{ route('cases', ['tag' => $tagKey]) }}"
                                    class="px-4 py-2 rounded-full text-sm font-medium bg-{{ $tags[$tagKey]['color'] }}-100 text-{{ $tags[$tagKey]['color'] }}-700 hover:bg-{{ $tags[$tagKey]['color'] }}-200 transition">
                                    <i class="material-icons inline mr-2 text-sm">{{ $tags[$tagKey]['icon'] }}</i>
                                    {{ $tags[$tagKey]['name'] }}
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>

                <button class="btn text-lg px-8 py-3" onclick="openServiceOrderModal('{{ $service['service_name'] }}')">
                    Заказать услугу
                </button>
            </div>

            <!-- Правая часть (изображение) -->
            <div class="flex-1">
                <img src="{{ asset('images/' . $case['image']) }}" alt="{{ $case['title'] }}"
                    class="w-full h-96 object-cover rounded-lg shadow-lg" loading="lazy" decoding="async">
            </div>
        </div>
    </section>

    {{-- Results section --}}
    <section class="section-bg">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Достигнутые результаты</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            @foreach ($case['results'] as $result)
                <div class="element-bg p-6 rounded-lg">
                    <div class="flex items-start">
                        <i class="material-icons text-green-500 mr-3 mt-1">check_circle</i>
                        <p class="text-gray-700">{{ $result }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Before/After comparison --}}
        <div class="bg-gradient-to-r from-red-50 to-green-50 rounded-2xl p-8">
            <h3 class="text-2xl font-bold text-gray-800 mb-8 text-center">Сравнение "До" и "После"</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                {{-- Before --}}
                <div class="text-center">
                    <div class="bg-red-100 text-red-800 px-6 py-3 rounded-full text-lg font-bold mb-6">До работы с нами
                    </div>
                    <div class="space-y-4">
                        @foreach ($case['before_after']['before'] as $key => $value)
                            <div class="bg-white p-4 rounded-lg shadow">
                                <div class="text-sm text-gray-500 mb-1">
                                    @if ($key === 'traffic')
                                        Трафик
                                    @elseif($key === 'conversion')
                                        Конверсия
                                    @elseif($key === 'positions')
                                        Средняя позиция
                                    @elseif($key === 'speed')
                                        Скорость загрузки
                                    @elseif($key === 'indexed')
                                        Индексация
                                    @elseif($key === 'bounce')
                                        Отказы
                                    @elseif($key === 'unique')
                                        Уникальность
                                    @elseif($key === 'pages')
                                        Страниц
                                    @elseif($key === 'readability')
                                        Читаемость
                                    @elseif($key === 'tours')
                                        Туров
                                    @elseif($key === 'relevance')
                                        Релевантность
                                    @elseif($key === 'time')
                                        Время на сайте
                                    @elseif($key === 'checkout')
                                        Оформление заказа
                                    @elseif($key === 'mobile')
                                        Мобильная версия
                                    @elseif($key === 'cart')
                                        Средний чек
                                    @elseif($key === 'links')
                                        Ссылки
                                    @elseif($key === 'da')
                                        Авторитетность
                                    @elseif($key === 'toxic')
                                        Токсичные ссылки
                                    @elseif($key === 'quality')
                                        Качественные ссылки
                                    @elseif($key === 'queries')
                                        Запросов
                                    @elseif($key === 'groups')
                                        Групп
                                    @elseif($key === 'strategy')
                                        Стратегия
                                    @elseif($key === 'local')
                                        Локальных запросов
                                    @elseif($key === 'competitors')
                                        Конкурентов
                                    @elseif($key === 'plan')
                                        План
                                    @elseif($key === 'branches')
                                        Филиалов
                                    @elseif($key === 'budget')
                                        Бюджет
                                    @elseif($key === 'analysis')
                                        Анализ
                                    @elseif($key === 'opportunities')
                                        Возможности
                                    @elseif($key === 'kpi')
                                        KPI
                                    @else
                                        {{ ucfirst($key) }}
                                    @endif
                                </div>
                                <div class="text-2xl font-bold text-red-600">{{ $value }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- After --}}
                <div class="text-center">
                    <div class="bg-green-100 text-green-800 px-6 py-3 rounded-full text-lg font-bold mb-6">После работы с
                        нами</div>
                    <div class="space-y-4">
                        @foreach ($case['before_after']['after'] as $key => $value)
                            <div class="bg-white p-4 rounded-lg shadow">
                                <div class="text-sm text-gray-500 mb-1">
                                    @if ($key === 'traffic')
                                        Трафик
                                    @elseif($key === 'conversion')
                                        Конверсия
                                    @elseif($key === 'positions')
                                        Средняя позиция
                                    @elseif($key === 'speed')
                                        Скорость загрузки
                                    @elseif($key === 'indexed')
                                        Индексация
                                    @elseif($key === 'bounce')
                                        Отказы
                                    @elseif($key === 'unique')
                                        Уникальность
                                    @elseif($key === 'pages')
                                        Страниц
                                    @elseif($key === 'readability')
                                        Читаемость
                                    @elseif($key === 'tours')
                                        Туров
                                    @elseif($key === 'relevance')
                                        Релевантность
                                    @elseif($key === 'time')
                                        Время на сайте
                                    @elseif($key === 'checkout')
                                        Оформление заказа
                                    @elseif($key === 'mobile')
                                        Мобильная версия
                                    @elseif($key === 'cart')
                                        Средний чек
                                    @elseif($key === 'links')
                                        Ссылки
                                    @elseif($key === 'da')
                                        Авторитетность
                                    @elseif($key === 'toxic')
                                        Токсичные ссылки
                                    @elseif($key === 'quality')
                                        Качественные ссылки
                                    @elseif($key === 'queries')
                                        Запросов
                                    @elseif($key === 'groups')
                                        Групп
                                    @elseif($key === 'strategy')
                                        Стратегия
                                    @elseif($key === 'local')
                                        Локальных запросов
                                    @elseif($key === 'competitors')
                                        Конкурентов
                                    @elseif($key === 'plan')
                                        План
                                    @elseif($key === 'branches')
                                        Филиалов
                                    @elseif($key === 'budget')
                                        Бюджет
                                    @elseif($key === 'analysis')
                                        Анализ
                                    @elseif($key === 'opportunities')
                                        Возможности
                                    @elseif($key === 'kpi')
                                        KPI
                                    @else
                                        {{ ucfirst($key) }}
                                    @endif
                                </div>
                                <div class="text-2xl font-bold text-green-600">{{ $value }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Process section --}}
    <section class="section-bg">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Как мы работали</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="text-center">
                <div
                    class="bg-cyan-500 text-white rounded-full w-16 h-16 flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                    1</div>
                <h3 class="text-lg font-semibold mb-2">Анализ</h3>
                <p class="text-gray-600">Изучили текущее состояние проекта и выявили проблемы</p>
            </div>

            <div class="text-center">
                <div
                    class="bg-cyan-500 text-white rounded-full w-16 h-16 flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                    2</div>
                <h3 class="text-lg font-semibold mb-2">Планирование</h3>
                <p class="text-gray-600">Разработали детальный план работ и стратегию</p>
            </div>

            <div class="text-center">
                <div
                    class="bg-cyan-500 text-white rounded-full w-16 h-16 flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                    3</div>
                <h3 class="text-lg font-semibold mb-2">Реализация</h3>
                <p class="text-gray-600">Выполнили все запланированные работы</p>
            </div>

            <div class="text-center">
                <div
                    class="bg-cyan-500 text-white rounded-full w-16 h-16 flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                    4</div>
                <h3 class="text-lg font-semibold mb-2">Контроль</h3>
                <p class="text-gray-600">Отслеживали результаты и корректировали подход</p>
            </div>
        </div>
    </section>

    {{-- Related cases --}}
    <section class="section-bg">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Другие кейсы по {{ $service['service_name'] }}</h2>

        <div class="text-center mb-8">
            <a href="{{ route('cases', ['service' => $serviceKey]) }}"
                class="inline-flex items-center px-6 py-3 bg-cyan-500 text-white rounded-lg hover:bg-cyan-600 transition">
                <i class="material-icons mr-2">arrow_back</i>
                Все кейсы по {{ $service['service_name'] }}
            </a>
        </div>
    </section>

    {{-- CTA section --}}
    <section class="section-bg">
        <div class="bg-gradient-to-r from-cyan-500 to-blue-600 text-white rounded-2xl p-8 text-center">
            <h2 class="text-3xl font-bold mb-4">Хотите такой же результат?</h2>
            <p class="text-xl mb-6 opacity-90">Свяжитесь с нами для обсуждения вашего проекта</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="bg-white text-cyan-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition"
                    onclick="openServiceOrderModal('{{ $service['service_name'] }}')">
                    Заказать услугу
                </button>
                <a href="{{ route('contacts') }}"
                    class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-cyan-600 transition">
                    Получить консультацию
                </a>
            </div>
        </div>
    </section>
@endsection
