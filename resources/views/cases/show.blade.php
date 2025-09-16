@extends('layouts.app')

@section('title', $case['title'] . ' - SEO продвижение сайтов')

@section('content')
    {{-- Hero section --}}
    <section class="section-bg">
        <div class="max-w-4xl mx-auto">
            <div class="flex items-center mb-8">
                <a href="{{ route('cases') }}" class="text-cyan-600 hover:text-cyan-700 mr-4">
                    <i class="material-icons">arrow_back</i>
                </a>
                <div>
                    <h1 class="text-4xl font-bold text-gray-800 mb-2">{{ $case['title'] }}</h1>
                    <div class="flex items-center text-gray-600">
                        <i class="material-icons mr-2">{{ $serviceData['service_icon'] }}</i>
                        <span>{{ $serviceData['service_name'] }}</span>
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
                        <span class="bg-cyan-500 px-3 py-1  text-sm font-medium">
                            {{ $case['industry'] }}
                        </span>
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
        <div class="max-w-4xl mx-auto">
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
    <section class="section-bg">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">До и после</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="text-center p-8 bg-red-50 ">
                    <div class="text-2xl font-bold text-red-600 mb-2">До</div>
                    <div class="text-lg">
                        @if (isset($case['before_after']['before']['traffic']))
                            {{ $case['before_after']['before']['traffic'] }} посетителей
                        @elseif(isset($case['before_after']['before']['speed']))
                            {{ $case['before_after']['before']['speed'] }}
                        @else
                            {{ $case['before_after']['before']['unique'] ?? 'Низкие показатели' }}
                        @endif
                    </div>
                </div>
                <div class="text-center p-8 bg-green-50 ">
                    <div class="text-2xl font-bold text-green-600 mb-2">После</div>
                    <div class="text-lg">
                        @if (isset($case['before_after']['after']['traffic']))
                            {{ $case['before_after']['after']['traffic'] }} посетителей
                        @elseif(isset($case['before_after']['after']['speed']))
                            {{ $case['before_after']['after']['speed'] }}
                        @else
                            {{ $case['before_after']['after']['unique'] ?? 'Высокие показатели' }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA section --}}
    <section class="section-bg">
        <div class="max-w-4xl mx-auto">
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
