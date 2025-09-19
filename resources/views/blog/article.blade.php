@extends('layouts.app')

@section('title', $article->title . ' - Блог SobAlex')
@section('description', $article->excerpt)

@section('content')
    <!-- Breadcrumbs -->
    <div class="pt-8">
        @include('partials.breadcrumbs', [
            'breadcrumbs' => [
                ['title' => 'Блог', 'url' => route('blog')],
                ['title' => $article->category_name, 'url' => route('blog.category', $article->category)],
                ['title' => $article->title, 'url' => null, 'truncate' => true],
            ],
        ])
    </div>

    <div class="max-w-4xl mx-auto py-12">
        <!-- Заголовок статьи -->
        <article class="bg-white  shadow-lg overflow-hidden border border-gray-200">
            <!-- Изображение статьи -->
            @if ($article->image)
                <div class="aspect-video bg-cover bg-center"
                    style="background-image: url('{{ asset('images/' . $article->image) }}')">
                </div>
            @else
                <div class="aspect-video bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center">
                    <i class="material-icons text-white text-6xl">
                        @if ($article->category === 'seo-news')
                            trending_up
                        @elseif($article->category === 'analytics')
                            analytics
                        @else
                            tips_and_updates
                        @endif
                    </i>
                </div>
            @endif

            <div class="p-8">
                <!-- Метаданные статьи -->
                <div class="flex flex-wrap items-center gap-4 mb-6">
                    <span class="inline-flex items-center px-3 py-1  text-sm font-medium bg-cyan-100 text-cyan-800">
                        {{ $article->category_name }}
                    </span>
                    <span class="text-gray-500 text-sm flex items-center">
                        <i class="material-icons text-xs mr-1">schedule</i>
                        {{ $article->reading_time ?? '5' }} мин чтения
                    </span>
                    <span class="text-gray-500 text-sm flex items-center">
                        <i class="material-icons text-xs mr-1">calendar_today</i>
                        {{ $article->formatted_published_at }}
                    </span>
                </div>

                <!-- Заголовок -->
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6 leading-tight">
                    {{ $article->title }}
                </h1>

                <!-- Описание -->
                <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                    {{ $article->excerpt }}
                </p>

                <!-- Содержание статьи -->
                <div class="prose prose-lg max-w-none">
                    {!! $article->content !!}
                </div>
            </div>
        </article>

        <!-- Навигация между статьями -->
        <div class="mt-12 pt-8 border-t border-gray-200">
            <div class="flex items-center justify-between">
                <a href="{{ route('blog.category', $article->category) }}" class="btn inline-flex items-center">
                    <i class="material-icons text-sm mr-2">arrow_back</i>
                    Все статьи в категории
                </a>

                <a href="{{ route('blog') }}" class="btn inline-flex items-center">
                    Все статьи блога
                    <i class="material-icons text-sm ml-2">arrow_forward</i>
                </a>
            </div>
        </div>

        <!-- Похожие статьи -->
        @if ($relatedArticles->count() > 0)
            <div class="mt-16">
                <h2 class="text-2xl font-bold text-gray-900 mb-8">Похожие статьи</h2>

                <div class="grid md:grid-cols-3 gap-6">
                    @foreach ($relatedArticles as $relatedArticle)
                        <a href="{{ route('blog.article', [$relatedArticle->category, $relatedArticle->slug]) }}"
                            class="group bg-white  shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden border border-gray-200">
                            @if ($relatedArticle->image)
                                <div class="aspect-video bg-cover bg-center"
                                    style="background-image: url('{{ asset('images/' . $relatedArticle->image) }}')">
                                </div>
                            @else
                                <div
                                    class="aspect-video bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center">
                                    <i class="material-icons text-white text-2xl">
                                        @if ($relatedArticle->category === 'seo-news')
                                            trending_up
                                        @elseif($relatedArticle->category === 'analytics')
                                            analytics
                                        @else
                                            tips_and_updates
                                        @endif
                                    </i>
                                </div>
                            @endif

                            <div class="p-4">
                                <span
                                    class="inline-flex items-center px-2 py-1  text-xs font-medium bg-cyan-100 text-cyan-800 mb-2">
                                    {{ $relatedArticle->category_name }}
                                </span>

                                <h3
                                    class="text-lg font-semibold text-gray-900 group-hover:text-cyan-600 transition-colors line-clamp-2">
                                    {{ $relatedArticle->title }}
                                </h3>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
