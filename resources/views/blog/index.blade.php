@extends('layouts.app')

@section('title', 'Блог о SEO и веб-аналитике')
@section('description',
    'Актуальные статьи о SEO, веб-аналитике и продвижении сайтов. Советы экспертов, новости
    поисковых систем и практические руководства.')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Заголовок страницы -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Блог о SEO</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Актуальные статьи о поисковой оптимизации, веб-аналитике и продвижении сайтов.
                Делимся опытом и рассказываем о последних трендах в SEO.
            </p>
        </div>

        <!-- Категории -->
        <div class="grid md:grid-cols-3 gap-6 mb-12">
            <a href="{{ route('blog.seo-news') }}"
                class="group bg-white  shadow-md hover:shadow-lg transition-shadow duration-300 p-6 border border-gray-200 hover:border-cyan-300">
                <div class="flex items-center mb-4">
                    <div class="bg-cyan-100 p-3 ">
                        <i class="material-icons text-cyan-600 text-2xl">trending_up</i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 ml-4 group-hover:text-cyan-600 transition-colors">
                        SEO новости
                    </h3>
                </div>
                <p class="text-gray-600">
                    Последние обновления алгоритмов поисковых систем, новые инструменты и тренды в SEO
                </p>
            </a>

            <a href="{{ route('blog.analytics') }}"
                class="group bg-white  shadow-md hover:shadow-lg transition-shadow duration-300 p-6 border border-gray-200 hover:border-cyan-300">
                <div class="flex items-center mb-4">
                    <div class="bg-cyan-100 p-3 ">
                        <i class="material-icons text-cyan-600 text-2xl">analytics</i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 ml-4 group-hover:text-cyan-600 transition-colors">
                        Аналитика
                    </h3>
                </div>
                <p class="text-gray-600">
                    Настройка и использование систем веб-аналитики для измерения эффективности SEO
                </p>
            </a>

            <a href="{{ route('blog.tips') }}"
                class="group bg-white  shadow-md hover:shadow-lg transition-shadow duration-300 p-6 border border-gray-200 hover:border-cyan-300">
                <div class="flex items-center mb-4">
                    <div class="bg-cyan-100 p-3 ">
                        <i class="material-icons text-cyan-600 text-2xl">tips_and_updates</i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 ml-4 group-hover:text-cyan-600 transition-colors">
                        Советы
                    </h3>
                </div>
                <p class="text-gray-600">
                    Практические советы по оптимизации сайтов, технические рекомендации и лайфхаки
                </p>
            </a>
        </div>

        <!-- Последние статьи -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Последние статьи</h2>

            <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-8">
                @foreach ($articles as $article)
                    <article
                        class="bg-white  shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden border border-gray-200">
                        <div
                            class="aspect-video bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center">
                            <i class="material-icons text-white text-4xl">
                                @if ($article['category'] === 'seo-news')
                                    trending_up
                                @elseif($article['category'] === 'analytics')
                                    analytics
                                @else
                                    tips_and_updates
                                @endif
                            </i>
                        </div>

                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span
                                    class="inline-flex items-center px-3 py-1  text-xs font-medium bg-cyan-100 text-cyan-800">
                                    {{ $article['category_name'] }}
                                </span>
                                <span class="text-gray-500 text-sm ml-auto">
                                    {{ \Carbon\Carbon::parse($article['published_at'])->format('d.m.Y') }}
                                </span>
                            </div>

                            <h3 class="text-xl font-semibold text-gray-900 mb-3 line-clamp-2">
                                <a href="{{ route('blog.article', [$article['category'], $article['slug']]) }}"
                                    class="hover:text-cyan-600 transition-colors">
                                    {{ $article['title'] }}
                                </a>
                            </h3>

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
        </div>
    </div>
@endsection
