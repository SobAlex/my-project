@extends('layouts.app')

@section('title', $title . ' - SEO продвижение сайтов')

@section('content')
    {{-- Hero section --}}
    <section class="section-bg">
        <div class="flex flex-col lg:flex-row gap-8 items-center">
            <!-- Левая часть -->
            <div class="flex-1">
                <div class="flex items-center mb-4">
                    <i class="material-icons text-5xl text-cyan-500 mr-4">{{ $service['icon'] }}</i>
                    <h1 class="text-4xl font-bold text-gray-800">{{ $service['name'] }}</h1>
                </div>

                <p class="text-xl text-gray-600 mb-6 leading-relaxed">
                    {{ $service['description'] }}
                </p>

                <div class="flex flex-col sm:flex-row gap-4 mb-8">
                    <div class="bg-cyan-50 p-4 ">
                        <div class="text-sm text-gray-600">Стоимость</div>
                        <div class="text-2xl font-bold text-cyan-600">{{ $service['price'] }}</div>
                    </div>
                    <div class="bg-gray-50 p-4 ">
                        <div class="text-sm text-gray-600">Срок выполнения</div>
                        <div class="text-2xl font-bold text-gray-700">{{ $service['duration'] }}</div>
                    </div>
                </div>

                <button class="btn text-lg px-8 py-3" onclick="openServiceOrderModal('{{ $service['name'] }}')">
                    Заказать услугу
                    </a>
            </div>

            <!-- Правая часть (изображение) -->
            <div class="flex-1">
                <img src="{{ asset('images/human.webp') }}" alt="{{ $service['name'] }}"
                    class="w-full h-96 object-cover  shadow-lg" loading="lazy" decoding="async">
            </div>
        </div>
    </section>

    {{-- Features section --}}
    <section class="section-bg">
        <h2 class="section-title">Что входит в услугу</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($service['features'] as $feature)
                <div class="element-bg p-6 ">
                    <div class="flex items-start">
                        <i class="material-icons text-cyan-500 mr-3 mt-1">check_circle</i>
                        <p class="text-gray-700">{{ $feature }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Process section --}}
    <section class="section-bg">
        <h2 class="section-title">Как мы работаем</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="text-center">
                <div
                    class="bg-cyan-500 text-white  w-16 h-16 flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                    1</div>
                <h3 class="text-lg font-semibold mb-2">Анализ</h3>
                <p class="text-gray-600">Изучаем ваш сайт и конкурентов</p>
            </div>

            <div class="text-center">
                <div
                    class="bg-cyan-500 text-white  w-16 h-16 flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                    2</div>
                <h3 class="text-lg font-semibold mb-2">Планирование</h3>
                <p class="text-gray-600">Разрабатываем стратегию продвижения</p>
            </div>

            <div class="text-center">
                <div
                    class="bg-cyan-500 text-white  w-16 h-16 flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                    3</div>
                <h3 class="text-lg font-semibold mb-2">Реализация</h3>
                <p class="text-gray-600">Выполняем все необходимые работы</p>
            </div>

            <div class="text-center">
                <div
                    class="bg-cyan-500 text-white  w-16 h-16 flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                    4</div>
                <h3 class="text-lg font-semibold mb-2">Контроль</h3>
                <p class="text-gray-600">Отслеживаем результаты и корректируем</p>
            </div>
        </div>
    </section>

    {{-- CTA section --}}
    <section class="section-bg">
        <div class="bg-gradient-to-r from-cyan-500 to-blue-600 text-white  p-8 text-center">
            <h2 class="text-3xl font-bold mb-4">Готовы начать продвижение?</h2>
            <p class="text-xl mb-6 opacity-90">Свяжитесь с нами для консультации и расчета стоимости</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="bg-white text-cyan-600 px-8 py-3  font-semibold hover:bg-gray-100 transition"
                    onclick="openServiceOrderModal('{{ $service['name'] }}')">
                    Заказать услугу
                </button>
                <button class="bg-white text-cyan-600 px-8 py-3  font-semibold hover:bg-gray-100 transition"
                    onclick="window.dispatchEvent(new CustomEvent('open-callback'))">
                    Заказать звонок
                </button>
            </div>
        </div>
    </section>

@endsection
