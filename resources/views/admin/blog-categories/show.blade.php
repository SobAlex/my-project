@extends('admin.layout')

@section('title', 'Просмотр категории блога')

@section('content')
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.blog-categories.index') }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 hover:text-gray-700 transition-colors duration-200">
                    <i class="material-icons mr-2">arrow_back</i>
                    Назад к списку
                </a>
                <div class="h-6 w-px bg-gray-300"></div>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Просмотр категории</h1>
                    <p class="mt-1 text-sm text-gray-500">Информация о категории блога</p>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <span
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $blogCategory->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $blogCategory->is_active ? 'Активна' : 'Неактивна' }}
                </span>
                <a href="{{ route('admin.blog-categories.edit', $blogCategory) }}"
                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg text-sm font-medium text-white bg-primary hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors duration-200">
                    <i class="material-icons mr-2 text-sm">edit</i>
                    Редактировать
                </a>
            </div>
        </div>
    </div>

    <!-- Category Details -->
    <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
        <div class="px-8 py-6 bg-gradient-to-r from-primary to-secondary">
            <div class="flex items-center space-x-4">
                <div class="w-16 h-16 rounded-xl flex items-center justify-center text-white text-2xl"
                    style="background-color: {{ $blogCategory->color }}">
                    <i class="material-icons">{{ $blogCategory->icon }}</i>
                </div>
                <div>
                    <h2 class="text-2xl font-semibold text-white">{{ $blogCategory->name }}</h2>
                    <p class="mt-1 text-primary-100">{{ $blogCategory->slug }}</p>
                </div>
            </div>
        </div>

        <div class="p-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Basic Information -->
                <div class="space-y-6">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="material-icons text-primary mr-2">info</i>
                        Основная информация
                    </h3>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Название</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $blogCategory->name }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">URL (slug)</label>
                            <p class="mt-1 text-sm text-gray-900 font-mono">{{ $blogCategory->slug }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Описание</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $blogCategory->description ?: 'Нет описания' }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Цвет</label>
                            <div class="mt-1 flex items-center space-x-3">
                                <div class="w-8 h-8 rounded-lg border border-gray-300"
                                    style="background-color: {{ $blogCategory->color }}"></div>
                                <span class="text-sm text-gray-900 font-mono">{{ $blogCategory->color }}</span>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Иконка</label>
                            <div class="mt-1 flex items-center space-x-3">
                                <div class="w-8 h-8 rounded-lg flex items-center justify-center text-white text-sm"
                                    style="background-color: {{ $blogCategory->color }}">
                                    <i class="material-icons">{{ $blogCategory->icon }}</i>
                                </div>
                                <span class="text-sm text-gray-900 font-mono">{{ $blogCategory->icon }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Settings -->
                <div class="space-y-6">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="material-icons text-primary mr-2">settings</i>
                        Настройки
                    </h3>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Статус</label>
                            <div class="mt-1">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $blogCategory->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $blogCategory->is_active ? 'Активна' : 'Неактивна' }}
                                </span>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Порядок сортировки</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $blogCategory->sort_order }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Дата создания</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $blogCategory->created_at->format('d.m.Y H:i') }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Дата обновления</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $blogCategory->updated_at->format('d.m.Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Blogs -->
    @if ($blogCategory->blogs->count() > 0)
        <div class="mt-8 bg-white shadow-xl rounded-2xl overflow-hidden">
            <div class="px-8 py-6 bg-gradient-to-r from-blue-500 to-indigo-600">
                <h2 class="text-xl font-semibold text-white">Связанные статьи</h2>
                <p class="mt-1 text-blue-100">Статьи в этой категории ({{ $blogCategory->blogs->count() }})</p>
            </div>

            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($blogCategory->blogs as $blog)
                        <div
                            class="bg-gray-50 rounded-xl p-6 border border-gray-200 hover:shadow-md transition-shadow duration-200">
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 rounded-lg flex items-center justify-center text-white text-sm flex-shrink-0"
                                    style="background-color: {{ $blogCategory->color }}">
                                    <i class="material-icons">{{ $blogCategory->icon }}</i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-sm font-medium text-gray-900 line-clamp-2 mb-2">
                                        {{ $blog->title }}
                                    </h4>
                                    <p class="text-xs text-gray-500 mb-3 line-clamp-2">
                                        {{ $blog->excerpt ?: 'Нет описания' }}
                                    </p>
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs text-gray-500">
                                            {{ $blog->formatted_published_at }}
                                        </span>
                                        <span
                                            class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ $blog->is_published ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ $blog->is_published ? 'Опубликована' : 'Черновик' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="mt-8 bg-white shadow-xl rounded-2xl overflow-hidden">
            <div class="px-8 py-12 text-center">
                <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                    <i class="material-icons text-gray-400 text-4xl">article</i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Нет связанных статей</h3>
                <p class="text-gray-500 mb-6">В этой категории пока нет статей блога</p>
                <a href="{{ route('admin.blogs.create') }}"
                    class="inline-flex items-center px-6 py-3 border border-transparent rounded-xl text-sm font-semibold text-white bg-gradient-to-r from-primary to-secondary hover:from-secondary hover:to-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    <i class="material-icons mr-2 text-sm">add</i>
                    Создать статью
                </a>
            </div>
        </div>
    @endif

    <!-- Action Buttons -->
    <div class="mt-8 bg-white shadow-xl rounded-2xl overflow-hidden">
        <div class="px-8 py-6 bg-gradient-to-r from-gray-50 to-gray-100 border-t border-gray-200">
            <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0 sm:space-x-4">
                <div class="flex items-center text-sm text-gray-500">
                    <i class="material-icons mr-2 text-sm">info</i>
                    Категория создана {{ $blogCategory->created_at->diffForHumans() }}
                </div>

                <div class="flex space-x-4">
                    <a href="{{ route('admin.blog-categories.index') }}"
                        class="inline-flex items-center px-6 py-3 border border-gray-300 rounded-xl text-sm font-semibold text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-200 shadow-sm">
                        <i class="material-icons mr-2 text-sm">arrow_back</i>
                        К списку
                    </a>
                    <a href="{{ route('admin.blog-categories.edit', $blogCategory) }}"
                        class="inline-flex items-center px-6 py-3 border border-transparent rounded-xl text-sm font-semibold text-white bg-gradient-to-r from-primary to-secondary hover:from-secondary hover:to-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <i class="material-icons mr-2 text-sm">edit</i>
                        Редактировать
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
