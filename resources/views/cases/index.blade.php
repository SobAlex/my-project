@extends('layouts.app')

@section('title', $title . ' - SEO продвижение сайтов')

@section('content')
    {{-- Hero section --}}
    <section class="section-bg">
        <div class="text-center">
            <h1 class="text-5xl font-bold text-gray-800 mb-6">{{ $title }}</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Реальные результаты нашей работы. Каждый кейс — это история успеха наших клиентов
                и доказательство эффективности наших методов продвижения.
            </p>
        </div>
    </section>

    {{-- Navigation for tags --}}
    <section class="section-bg">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Фильтр по отраслям</h2>
        <div class="flex flex-wrap justify-center gap-3 mb-8">
            <a href="{{ route('cases') }}"
                class="px-4 py-2 rounded-full border-2 border-gray-300 text-gray-600 hover:border-cyan-500 hover:text-cyan-600 transition
                      {{ !$activeTag ? 'border-cyan-500 text-cyan-600 bg-cyan-50' : '' }}">
                <i class="material-icons inline mr-2 text-sm">apps</i>
                Все кейсы
            </a>
            @foreach ($tags as $tagKey => $tagData)
                <a href="{{ route('cases', ['tag' => $tagKey]) }}"
                    class="px-4 py-2 rounded-full border-2 border-{{ $tagData['color'] }}-300 text-{{ $tagData['color'] }}-600 hover:border-{{ $tagData['color'] }}-500 hover:bg-{{ $tagData['color'] }}-50 transition
                          {{ $activeTag === $tagKey ? 'border-' . $tagData['color'] . '-500 bg-' . $tagData['color'] . '-50' : '' }}">
                    <i class="material-icons inline mr-2 text-sm">{{ $tagData['icon'] }}</i>
                    {{ $tagData['name'] }}
                </a>
            @endforeach
        </div>
    </section>

    {{-- Navigation for services --}}
    @if (!$activeTag)
        <section class="section-bg">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Фильтр по услугам</h2>
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                @foreach ($casesData as $serviceKey => $serviceData)
                    <a href="#{{ $serviceKey }}"
                        class="px-6 py-3 rounded-lg border border-cyan-500 text-cyan-600 hover:bg-cyan-500 hover:text-white transition
                          {{ $activeService === $serviceKey ? 'bg-cyan-500 text-white' : '' }}">
                        <i class="material-icons inline mr-2">{{ $serviceData['service_icon'] }}</i>
                        {{ $serviceData['service_name'] }}
                    </a>
                @endforeach
            </div>
        </section>
    @endif

    {{-- Cases by service --}}
    @foreach ($casesData as $serviceKey => $serviceData)
        <section id="{{ $serviceKey }}" class="section-bg {{ $activeService === $serviceKey ? 'scroll-mt-20' : '' }}">
            <div class="mb-12">
                <div class="flex items-center mb-8">
                    <i class="material-icons text-4xl text-cyan-500 mr-4">{{ $serviceData['service_icon'] }}</i>
                    <h2 class="text-3xl font-bold text-gray-800">{{ $serviceData['service_name'] }}</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach ($serviceData['cases'] as $case)
                        <article class="element-bg rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition">
                            {{-- Case image --}}
                            <div class="relative h-48 overflow-hidden">
                                <img src="{{ asset('images/' . $case['image']) }}" alt="{{ $case['title'] }}"
                                    class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                                <div class="absolute bottom-4 left-4 text-white">
                                    <span class="bg-cyan-500 px-3 py-1 rounded-full text-sm font-medium">
                                        {{ $case['industry'] }}
                                    </span>
                                </div>
                            </div>

                            {{-- Case content --}}
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $case['title'] }}</h3>
                                <p class="text-gray-600 mb-4">{{ $case['description'] }}</p>

                                <div class="space-y-2 mb-6">
                                    <div class="flex justify-between">
                                        <span class="text-gray-500">Клиент:</span>
                                        <span class="font-medium">{{ $case['client'] }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-500">Период:</span>
                                        <span class="font-medium">{{ $case['period'] }}</span>
                                    </div>
                                </div>

                                {{-- Tags --}}
                                <div class="mb-6">
                                    <div class="flex flex-wrap gap-2">
                                        @foreach ($case['tags'] as $tagKey)
                                            @if (isset($tags[$tagKey]))
                                                <span
                                                    class="px-3 py-1 rounded-full text-xs font-medium bg-{{ $tags[$tagKey]['color'] }}-100 text-{{ $tags[$tagKey]['color'] }}-700">
                                                    <i
                                                        class="material-icons inline mr-1 text-xs">{{ $tags[$tagKey]['icon'] }}</i>
                                                    {{ $tags[$tagKey]['name'] }}
                                                </span>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                {{-- Key results --}}
                                <div class="mb-6">
                                    <h4 class="font-semibold text-gray-800 mb-3">Ключевые результаты:</h4>
                                    <ul class="space-y-1">
                                        @foreach (array_slice($case['results'], 0, 3) as $result)
                                            <li class="flex items-start">
                                                <i class="material-icons text-green-500 mr-2 text-sm">check_circle</i>
                                                <span class="text-sm text-gray-600">{{ $result }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                {{-- Before/After stats --}}
                                <div class="grid grid-cols-2 gap-4 mb-6 p-4 bg-gray-50 rounded-lg">
                                    <div class="text-center">
                                        <div class="text-xs text-gray-500 mb-1">До</div>
                                        <div class="text-lg font-bold text-red-600">
                                            @if (isset($case['before_after']['before']['traffic']))
                                                {{ $case['before_after']['before']['traffic'] }} посетителей
                                            @elseif(isset($case['before_after']['before']['speed']))
                                                {{ $case['before_after']['before']['speed'] }}
                                            @else
                                                {{ $case['before_after']['before']['unique'] ?? 'Низкие показатели' }}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <div class="text-xs text-gray-500 mb-1">После</div>
                                        <div class="text-lg font-bold text-green-600">
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

                                {{-- CTA button --}}
                                <a href="{{ route('cases.show', ['service' => $serviceKey, 'caseId' => $case['id']]) }}"
                                    class="block w-full bg-cyan-500 text-white text-center py-3 px-4 rounded-lg hover:bg-cyan-600 transition">
                                    Подробнее о кейсе
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endforeach

    {{-- CTA section --}}
    <section class="section-bg">
        <div class="bg-gradient-to-r from-cyan-500 to-blue-600 text-white rounded-2xl p-8 text-center">
            <h2 class="text-3xl font-bold mb-4">Хотите такой же результат?</h2>
            <p class="text-xl mb-6 opacity-90">Свяжитесь с нами для обсуждения вашего проекта</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="bg-white text-cyan-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition"
                    onclick="openServiceOrderModal('Консультация по кейсам')">
                    Получить консультацию
                </button>
                <a href="{{ route('contacts') }}"
                    class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-cyan-600 transition">
                    Связаться с нами
                </a>
            </div>
        </div>
    </section>
@endsection
