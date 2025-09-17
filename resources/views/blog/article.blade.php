@extends('layouts.app')

@section('title', $article['title'] . ' - Блог SobAlex')
@section('description', $article['excerpt'])

@section('content')
    <!-- Breadcrumbs -->
    <div class="max-w-7xl mx-auto pt-8">
        @include('partials.breadcrumbs', [
            'breadcrumbs' => [
                ['title' => 'Блог', 'url' => route('blog')],
                ['title' => $article['category_name'], 'url' => route('blog.' . $article['category'])],
                ['title' => $article['title'], 'url' => null, 'truncate' => true],
            ],
        ])
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Заголовок статьи -->
        <article class="bg-white  shadow-lg overflow-hidden border border-gray-200">
            <!-- Изображение статьи -->
            <div class="aspect-video bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center">
                <i class="material-icons text-white text-6xl">
                    @if ($article['category'] === 'seo-news')
                        trending_up
                    @elseif($article['category'] === 'analytics')
                        analytics
                    @else
                        tips_and_updates
                    @endif
                </i>
            </div>

            <div class="p-8">
                <!-- Метаданные статьи -->
                <div class="flex flex-wrap items-center gap-4 mb-6">
                    <span class="inline-flex items-center px-3 py-1  text-sm font-medium bg-cyan-100 text-cyan-800">
                        {{ $article['category_name'] }}
                    </span>
                    <span class="text-gray-500 text-sm flex items-center">
                        <i class="material-icons text-xs mr-1">schedule</i>
                        {{ $article['reading_time'] }} мин чтения
                    </span>
                    <span class="text-gray-500 text-sm flex items-center">
                        <i class="material-icons text-xs mr-1">calendar_today</i>
                        {{ \Carbon\Carbon::parse($article['published_at'])->format('d.m.Y') }}
                    </span>
                </div>

                <!-- Заголовок -->
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6 leading-tight">
                    {{ $article['title'] }}
                </h1>

                <!-- Описание -->
                <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                    {{ $article['excerpt'] }}
                </p>

                <!-- Содержание статьи -->
                <div class="prose prose-lg max-w-none">
                    {!! $article['content'] !!}
                </div>
            </div>
        </article>

        <!-- Навигация между статьями -->
        <div class="mt-12 pt-8 border-t border-gray-200">
            <div class="flex items-center justify-between">
                <a href="{{ route('blog.' . $article['category']) }}"
                    class="inline-flex items-center px-6 py-3 border border-gray-300  text-gray-700 hover:text-cyan-600 hover:border-cyan-300 transition-colors">
                    <i class="material-icons text-sm mr-2">arrow_back</i>
                    Все статьи в категории
                </a>

                <a href="{{ route('blog') }}"
                    class="inline-flex items-center px-6 py-3 bg-cyan-600 text-white  hover:bg-cyan-700 transition-colors">
                    Все статьи блога
                    <i class="material-icons text-sm ml-2">arrow_forward</i>
                </a>
            </div>
        </div>

        <!-- Похожие статьи -->
        @php
            $relatedArticles = collect([
                [
                    'id' => 1,
                    'title' => 'Google обновил алгоритм ранжирования: что изменилось в 2024 году',
                    'slug' => 'google-algorithm-update-2024',
                    'category' => 'seo-news',
                    'category_name' => 'SEO новости',
                ],
                [
                    'id' => 4,
                    'title' => 'Как настроить Google Analytics 4 для SEO: пошаговое руководство',
                    'slug' => 'google-analytics-4-seo-setup',
                    'category' => 'analytics',
                    'category_name' => 'Аналитика',
                ],
                [
                    'id' => 7,
                    'title' => '15 простых способов ускорить загрузку сайта',
                    'slug' => '15-ways-to-speed-up-website',
                    'category' => 'tips',
                    'category_name' => 'Советы',
                ],
            ])
                ->reject(function ($relatedArticle) use ($article) {
                    return $relatedArticle['id'] === $article['id'];
                })
                ->take(3);
        @endphp

        @if ($relatedArticles->count() > 0)
            <div class="mt-16">
                <h2 class="text-2xl font-bold text-gray-900 mb-8">Похожие статьи</h2>

                <div class="grid md:grid-cols-3 gap-6">
                    @foreach ($relatedArticles as $relatedArticle)
                        <a href="{{ route('blog.article', [$relatedArticle['category'], $relatedArticle['slug']]) }}"
                            class="group bg-white  shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden border border-gray-200">
                            <div
                                class="aspect-video bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center">
                                <i class="material-icons text-white text-2xl">
                                    @if ($relatedArticle['category'] === 'seo-news')
                                        trending_up
                                    @elseif($relatedArticle['category'] === 'analytics')
                                        analytics
                                    @else
                                        tips_and_updates
                                    @endif
                                </i>
                            </div>

                            <div class="p-4">
                                <span
                                    class="inline-flex items-center px-2 py-1  text-xs font-medium bg-cyan-100 text-cyan-800 mb-2">
                                    {{ $relatedArticle['category_name'] }}
                                </span>

                                <h3
                                    class="text-lg font-semibold text-gray-900 group-hover:text-cyan-600 transition-colors line-clamp-2">
                                    {{ $relatedArticle['title'] }}
                                </h3>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
