@extends('layouts.app')

@section('title', $title)
@section('meta_description', $service->meta_description)
@section('meta_keywords', $service->meta_keywords)

@section('content')
    <!-- Breadcrumbs -->
    <div class="pt-8">
        @include('partials.breadcrumbs', [
            'breadcrumbs' => [
                ['title' => 'Услуги', 'url' => route('services.index')],
                ['title' => $service->title, 'url' => null]
            ],
        ])
    </div>

    {{-- Hero section --}}
    <section class="section-bg">
        <div class="flex flex-col lg:flex-row gap-8 items-start">
            <!-- Левая часть -->
            <div class="flex-1">
                <div class="flex items-center mb-6">
                    @if($service->icon)
                        <div class="w-16 h-16 rounded-xl flex items-center justify-center mr-6 shadow-lg"
                             style="background: linear-gradient(135deg, {{ $service->color }}20, {{ $service->color }}10); border: 2px solid {{ $service->color }}40;">
                            <i class="material-icons text-4xl" style="color: {{ $service->color }}">{{ $service->icon }}</i>
                        </div>
                    @endif
                    <div>
                        <h1 class="text-4xl font-bold text-gray-800">{{ $service->title }}</h1>
                        @if($service->is_featured)
                            <span class="inline-block mt-2 px-3 py-1 bg-yellow-100 text-yellow-800 text-sm rounded-full">
                                Рекомендуемая услуга
                            </span>
                        @endif
                    </div>
                </div>

                <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                    {{ $service->description }}
                </p>

                <div class="flex flex-col sm:flex-row gap-4 mb-8">
                    <div class="p-4 rounded-lg" style="background-color: {{ $service->color }}10; border: 1px solid {{ $service->color }}30;">
                        <div class="text-sm text-gray-600">Стоимость</div>
                        <div class="text-2xl font-bold" style="color: {{ $service->color }}">{{ $service->formatted_price }}</div>
                    </div>
                    @if($service->price_type)
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <div class="text-sm text-gray-600">Тип оплаты</div>
                            <div class="text-2xl font-bold text-gray-700">
                                @switch($service->price_type)
                                    @case('hour')
                                        Почасовая
                                        @break
                                    @case('month')
                                        Ежемесячная
                                        @break
                                    @case('project')
                                        За проект
                                        @break
                                    @default
                                        {{ $service->price_type }}
                                @endswitch
                            </div>
                        </div>
                    @endif
                </div>

                <div class="flex flex-col sm:flex-row gap-4 mb-8">
                    <button class="btn text-lg px-8 py-3" onclick="openServiceOrderModal('{{ $service->title }}')">
                        Заказать услугу
                    </button>
                    <a href="{{ route('contacts') }}" class="btn-outline text-lg px-8 py-3 text-center">
                        Получить консультацию
                    </a>
                </div>
            </div>

            <!-- Правая часть (изображение) -->
            @if($service->image)
                <div class="flex-1 lg:max-w-md">
                    <div class="aspect-square bg-gray-100 rounded-2xl overflow-hidden shadow-lg">
                        <img src="{{ asset('storage/' . $service->image) }}"
                             alt="{{ $service->title }}"
                             class="w-full h-full object-cover">
                    </div>
                </div>
            @endif
        </div>
    </section>

    {{-- Content section --}}
    @if($service->content)
        <section class="section-bg">
            <div class="prose prose-lg max-w-none">
                {!! $service->content !!}
            </div>
        </section>
    @endif

    {{-- Features section --}}
    @if($service->features && is_array($service->features) && count($service->features) > 0)
        <section class="section-bg">
            <h2 class="section-title">Что входит в услугу</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($service->features as $feature)
                    @if(is_string($feature))
                        <div class="flex items-start p-4 bg-white rounded-lg shadow-sm border border-gray-100">
                            <div class="flex-shrink-0 mr-4">
                                <div class="w-8 h-8 rounded-full flex items-center justify-center" style="background-color: {{ $service->color }}20;">
                                    <i class="material-icons text-sm" style="color: {{ $service->color }}">check</i>
                                </div>
                            </div>
                            <div class="text-gray-700">{{ $feature }}</div>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
    @endif

    {{-- Related Services --}}
    @if($relatedServices->count() > 0)
        <section class="section-bg">
            <h2 class="section-title">Другие услуги</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($relatedServices as $relatedService)
                    <article class="element-bg shadow-md hover:shadow-lg transition-shadow duration-300">
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                @if($relatedService->icon)
                                    <div class="w-10 h-10 rounded-lg flex items-center justify-center mr-4"
                                         style="background-color: {{ $relatedService->color }}20; border: 1px solid {{ $relatedService->color }}40;">
                                        <i class="material-icons text-xl" style="color: {{ $relatedService->color }}">{{ $relatedService->icon }}</i>
                                    </div>
                                @endif
                                <h3 class="text-lg font-semibold">
                                    <a href="{{ route('services.show', $relatedService->slug) }}" class="hover:text-cyan-500">
                                        {{ $relatedService->title }}
                                    </a>
                                </h3>
                            </div>
                            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($relatedService->description, 100) }}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-semibold" style="color: {{ $relatedService->color }}">
                                    {{ $relatedService->formatted_price }}
                                </span>
                                <a href="{{ route('services.show', $relatedService->slug) }}" class="text-cyan-500 text-sm font-medium hover:underline">
                                    Подробнее →
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    @endif

    {{-- FAQ Section --}}
    @if($servicesFaqs->count() > 0)
        <section class="section-bg">
            <h2 class="section-title">Часто задаваемые вопросы</h2>
            <div class="max-w-3xl mx-auto">
                @foreach($servicesFaqs as $faq)
                    <div class="mb-4">
                        <details class="group">
                            <summary class="flex items-center justify-between w-full p-4 bg-white rounded-lg shadow-sm border border-gray-200 cursor-pointer hover:bg-gray-50">
                                <span class="font-medium text-gray-800">{{ $faq->question }}</span>
                                <i class="material-icons text-gray-400 group-open:rotate-180 transition-transform">expand_more</i>
                            </summary>
                            <div class="p-4 bg-gray-50 rounded-b-lg border-x border-b border-gray-200">
                                <p class="text-gray-600">{{ $faq->answer }}</p>
                            </div>
                        </details>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- CTA Section --}}
    <section class="bg-gradient-to-r from-cyan-500 to-blue-600 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Готовы заказать {{ $service->title }}?</h2>
            <p class="text-xl mb-8 opacity-90">Свяжитесь с нами для обсуждения деталей и получения персонального предложения</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button onclick="openServiceOrderModal('{{ $service->title }}')" class="bg-white text-cyan-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                    Заказать услугу
                </button>
                <a href="{{ route('contacts') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-cyan-600 transition-colors">
                    Связаться с нами
                </a>
            </div>
        </div>
    </section>
@endsection
