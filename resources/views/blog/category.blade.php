@extends('layouts.app')

@section('title', $category . ' - Блог SobAlex')
@section('description',
    'Статьи в категории ' .
    $category .
    '. Актуальная информация о SEO, веб-аналитике и продвижении
    сайтов.')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Breadcrumbs -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-cyan-600 inline-flex items-center">
                        <i class="material-icons text-sm mr-1">home</i>
                        Главная
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="material-icons text-gray-400 text-sm">chevron_right</i>
                        <a href="{{ route('blog') }}" class="ml-1 text-gray-700 hover:text-cyan-600 md:ml-2">Блог</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="material-icons text-gray-400 text-sm">chevron_right</i>
                        <span class="ml-1 text-gray-500 md:ml-2">{{ $category }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Заголовок категории -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-cyan-100  mb-4">
                <i class="material-icons text-cyan-600 text-2xl">
                    @if ($categorySlug === 'seo-news')
                        trending_up
                    @elseif($categorySlug === 'analytics')
                        analytics
                    @else
                        tips_and_updates
                    @endif
                </i>
            </div>
            <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $category }}</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                @if ($categorySlug === 'seo-news')
                    Последние новости из мира SEO: обновления алгоритмов поисковых систем, новые инструменты и тренды в
                    поисковой оптимизации.
                @elseif($categorySlug === 'analytics')
                    Все о веб-аналитике: настройка систем аналитики, анализ данных, измерение эффективности SEO-кампаний и
                    конверсий.
                @else
                    Практические советы и рекомендации по SEO: технические аспекты оптимизации, создание контента,
                    внутренняя оптимизация.
                @endif
            </p>
        </div>

        <!-- Статьи категории -->
        <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-8">
            @foreach ($articles as $article)
                <article
                    class="bg-white  shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden border border-gray-200">
                    <div class="aspect-video bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center">
                        <i class="material-icons text-white text-4xl">
                            @if ($categorySlug === 'seo-news')
                                trending_up
                            @elseif($categorySlug === 'analytics')
                                analytics
                            @else
                                tips_and_updates
                            @endif
                        </i>
                    </div>

                    <div class="p-6">
                        <div class="flex items-center mb-3">
                            <span class="inline-flex items-center px-3 py-1  text-xs font-medium bg-cyan-100 text-cyan-800">
                                {{ $article['category_name'] }}
                            </span>
                            <span class="text-gray-500 text-sm ml-auto">
                                {{ \Carbon\Carbon::parse($article['published_at'])->format('d.m.Y') }}
                            </span>
                        </div>

                        <h2 class="text-xl font-semibold text-gray-900 mb-3 line-clamp-2">
                            <a href="{{ route('blog.article', [$article['category'], $article['slug']]) }}"
                                class="hover:text-cyan-600 transition-colors">
                                {{ $article['title'] }}
                            </a>
                        </h2>

                        <p class="text-gray-600 mb-4 line-clamp-3">
                            {{ $article['excerpt'] }}
                        </p>

                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500 flex items-center">
                                <i class="material-icons text-xs mr-1">schedule</i>
                                {{ $article['reading_time'] }} мин чтения
                            </span>

                            <a href="{{ route('blog.article', [$article['category'], $article['slug']]) }}"
                                class="inline-flex items-center text-cyan-600 hover:text-cyan-700 font-medium text-sm">
                                Читать далее
                                <i class="material-icons text-sm ml-1">arrow_forward</i>
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- Другие категории -->
        <div class="mt-16 pt-12 border-t border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900 mb-8 text-center">Другие категории</h2>

            <div class="grid md:grid-cols-2 gap-6 max-w-4xl mx-auto">
                @if ($categorySlug !== 'seo-news')
                    <a href="{{ route('blog.seo-news') }}"
                        class="group bg-white  shadow-md hover:shadow-lg transition-shadow duration-300 p-6 border border-gray-200 hover:border-cyan-300">
                        <div class="flex items-center mb-4">
                            <div class="bg-cyan-100 p-3 ">
                                <i class="material-icons text-cyan-600 text-xl">trending_up</i>
                            </div>
                            <h3
                                class="text-lg font-semibold text-gray-900 ml-4 group-hover:text-cyan-600 transition-colors">
                                SEO новости
                            </h3>
                        </div>
                        <p class="text-gray-600 text-sm">
                            Последние обновления алгоритмов поисковых систем
                        </p>
                    </a>
                @endif

                @if ($categorySlug !== 'analytics')
                    <a href="{{ route('blog.analytics') }}"
                        class="group bg-white  shadow-md hover:shadow-lg transition-shadow duration-300 p-6 border border-gray-200 hover:border-cyan-300">
                        <div class="flex items-center mb-4">
                            <div class="bg-cyan-100 p-3 ">
                                <i class="material-icons text-cyan-600 text-xl">analytics</i>
                            </div>
                            <h3
                                class="text-lg font-semibold text-gray-900 ml-4 group-hover:text-cyan-600 transition-colors">
                                Аналитика
                            </h3>
                        </div>
                        <p class="text-gray-600 text-sm">
                            Настройка и использование систем веб-аналитики
                        </p>
                    </a>
                @endif

                @if ($categorySlug !== 'tips')
                    <a href="{{ route('blog.tips') }}"
                        class="group bg-white  shadow-md hover:shadow-lg transition-shadow duration-300 p-6 border border-gray-200 hover:border-cyan-300">
                        <div class="flex items-center mb-4">
                            <div class="bg-cyan-100 p-3 ">
                                <i class="material-icons text-cyan-600 text-xl">tips_and_updates</i>
                            </div>
                            <h3
                                class="text-lg font-semibold text-gray-900 ml-4 group-hover:text-cyan-600 transition-colors">
                                Советы
                            </h3>
                        </div>
                        <p class="text-gray-600 text-sm">
                            Практические советы по оптимизации сайтов
                        </p>
                    </a>
                @endif
            </div>
        </div>
    </div>
@endsection
