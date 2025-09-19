@extends('admin.layout')

@section('title', 'Просмотр статьи')

@section('content')
    <div class="mb-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <a href="{{ route('admin.blogs.index') }}" class="text-gray-400 hover:text-gray-600 mr-4">
                    <i class="material-icons">arrow_back</i>
                </a>
                <h2 class="text-2xl font-bold text-gray-900">Просмотр статьи</h2>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('admin.blogs.edit', $blog) }}"
                    class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-secondary transition-colors">
                    <i class="material-icons mr-2">edit</i>
                    Редактировать
                </a>
                <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" class="inline"
                    onsubmit="confirmDelete(this); return false;">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
                        <i class="material-icons mr-2">delete</i>
                        Удалить
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Основная информация -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Основная информация</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Название</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $blog->title }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">URL</label>
                        <p class="mt-1 text-sm text-gray-900 font-mono">{{ $blog->slug }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Категория</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $blog->category_name }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Дата публикации</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $blog->formatted_published_at ?? 'Не опубликовано' }}</p>
                    </div>
                </div>

                @if ($blog->excerpt)
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-500">Краткое описание</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $blog->excerpt }}</p>
                    </div>
                @endif
            </div>

            <!-- Контент -->
            @if ($blog->content)
                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Содержание статьи</h3>
                    <div class="prose max-w-none">
                        {!! $blog->content !!}
                    </div>
                </div>
            @endif

            <!-- SEO настройки -->
            @if ($blog->meta_title || $blog->meta_description)
                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">SEO настройки</h3>

                    @if ($blog->meta_title)
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-500">Meta Title</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $blog->meta_title }}</p>
                        </div>
                    @endif

                    @if ($blog->meta_description)
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Meta Description</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $blog->meta_description }}</p>
                        </div>
                    @endif
                </div>
            @endif
        </div>

        <!-- Боковая панель -->
        <div class="space-y-6">
            <!-- Изображение -->
            @if ($blog->image)
                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Изображение</h3>
                    <img src="{{ asset('images/' . $blog->image) }}" alt="{{ $blog->title }}"
                        class="w-full h-48 object-cover rounded-lg">
                </div>
            @endif

            <!-- Статус и настройки -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Статус и настройки</h3>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Статус</label>
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium mt-1
                        {{ $blog->is_published ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $blog->is_published ? 'Опубликован' : 'Черновик' }}
                        </span>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Порядок сортировки</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $blog->sort_order }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">ID статьи</label>
                        <p class="mt-1 text-sm text-gray-900 font-mono">{{ $blog->id }}</p>
                    </div>
                </div>
            </div>

            <!-- Информация о создании -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Информация о создании</h3>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Создан</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $blog->created_at->format('d.m.Y H:i') }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Обновлен</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $blog->updated_at->format('d.m.Y H:i') }}</p>
                    </div>

                    @if ($blog->user)
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Автор</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $blog->user->name }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Действия -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Действия</h3>

                <div class="space-y-2">
                    @if ($blog->is_published)
                        <a href="{{ route('blog.article', ['category' => $blog->category, 'slug' => $blog->slug]) }}"
                            target="_blank"
                            class="block w-full text-center bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition-colors">
                            <i class="material-icons mr-2 text-sm">open_in_new</i>
                            Посмотреть на сайте
                        </a>
                    @endif

                    <a href="{{ route('admin.blogs.edit', $blog) }}"
                        class="block w-full text-center bg-primary text-white px-4 py-2 rounded-lg hover:bg-secondary transition-colors">
                        <i class="material-icons mr-2 text-sm">edit</i>
                        Редактировать
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(form) {
            if (confirm('Вы уверены, что хотите удалить эту статью?')) {
                form.submit();
            }
        }
    </script>
@endsection
