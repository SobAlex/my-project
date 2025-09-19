@extends('admin.layout')

@section('title', 'Создание статьи')

@section('content')
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.blogs.index') }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 hover:text-gray-700 transition-colors duration-200">
                    <i class="material-icons mr-2">arrow_back</i>
                    Назад к списку
                </a>
                <div class="h-6 w-px bg-gray-300"></div>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Создание статьи</h1>
                    <p class="mt-1 text-sm text-gray-500">Заполните информацию о новой статье</p>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.blogs.store') }}" method="POST" class="space-y-8">
        @csrf

        <!-- Main Form Container -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
            <div class="px-8 py-6 bg-gradient-to-r from-primary to-secondary">
                <h2 class="text-xl font-semibold text-white">Основная информация</h2>
                <p class="mt-1 text-primary-100">Заполните основную информацию о статье</p>
            </div>

            <div class="p-8 space-y-8">
                <!-- Basic Information Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Title Field -->
                        <div class="space-y-2">
                            <label for="title" class="flex items-center text-sm font-semibold text-gray-700">
                                <i class="material-icons text-primary mr-2 text-lg">title</i>
                                Название статьи
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}"
                                placeholder="Введите название статьи"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 @error('title') border-red-300 ring-2 ring-red-100 @enderror">
                            @error('title')
                                <p class="flex items-center text-sm text-red-600 mt-1">
                                    <i class="material-icons text-red-500 mr-1 text-sm">error</i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Slug Field -->
                        <div class="space-y-2">
                            <label for="slug" class="flex items-center text-sm font-semibold text-gray-700">
                                <i class="material-icons text-primary mr-2 text-lg">link</i>
                                URL статьи
                            </label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug', $blog->slug) }}"
                                placeholder="Будет сгенерирован автоматически"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 @error('slug') border-red-300 ring-2 ring-red-100 @enderror">
                            @error('slug')
                                <p class="flex items-center text-sm text-red-600 mt-1">
                                    <i class="material-icons text-red-500 mr-1 text-sm">error</i>
                                    {{ $message }}
                                </p>
                            @enderror
                            <p class="text-xs text-gray-500">Если не указан, будет сгенерирован из названия</p>
                        </div>

                        <!-- Category and Image -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="category" class="flex items-center text-sm font-semibold text-gray-700">
                                    <i class="material-icons text-primary mr-2 text-lg">category</i>
                                    Категория
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <select name="category" id="category"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 @error('category') border-red-300 ring-2 ring-red-100 @enderror">
                                    <option value="">Выберите категорию</option>
                                    @foreach ($categories as $key => $name)
                                        <option value="{{ $key }}"
                                            {{ old('category', $blog->category) == $key ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <p class="flex items-center text-sm text-red-600 mt-1">
                                        <i class="material-icons text-red-500 mr-1 text-sm">error</i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="image" class="flex items-center text-sm font-semibold text-gray-700">
                                    <i class="material-icons text-primary mr-2 text-lg">image</i>
                                    Изображение
                                </label>
                                <select name="image" id="image"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 @error('image') border-red-300 ring-2 ring-red-100 @enderror">
                                    <option value="">Выберите изображение</option>
                                    <option value="human.jpeg"
                                        {{ old('image', $blog->image) == 'human.jpeg' ? 'selected' : '' }}>human.jpeg
                                    </option>
                                    <option value="human2.jpeg"
                                        {{ old('image', $blog->image) == 'human2.jpeg' ? 'selected' : '' }}>human2.jpeg
                                    </option>
                                    <option value="human.webp"
                                        {{ old('image', $blog->image) == 'human.webp' ? 'selected' : '' }}>human.webp
                                    </option>
                                </select>
                                @error('image')
                                    <p class="flex items-center text-sm text-red-600 mt-1">
                                        <i class="material-icons text-red-500 mr-1 text-sm">error</i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Excerpt Field -->
                        <div class="space-y-2">
                            <label for="excerpt" class="flex items-center text-sm font-semibold text-gray-700">
                                <i class="material-icons text-primary mr-2 text-lg">description</i>
                                Краткое описание
                            </label>
                            <textarea name="excerpt" id="excerpt" rows="6" placeholder="Краткое описание статьи для превью"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 resize-none @error('excerpt') border-red-300 ring-2 ring-red-100 @enderror">{{ old('excerpt', $blog->excerpt) }}</textarea>
                            @error('excerpt')
                                <p class="flex items-center text-sm text-red-600 mt-1">
                                    <i class="material-icons text-red-500 mr-1 text-sm">error</i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Content Section -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
            <div class="px-8 py-6 bg-gradient-to-r from-purple-500 to-pink-600">
                <h2 class="text-xl font-semibold text-white">Содержание статьи</h2>
                <p class="mt-1 text-purple-100">Создайте подробное содержание с помощью редактора</p>
            </div>

            <div class="p-8">
                <div class="space-y-4">
                    <label for="content" class="flex items-center text-sm font-semibold text-gray-700">
                        <i class="material-icons text-purple-500 mr-2 text-lg">article</i>
                        Текстовый контент
                    </label>
                    <textarea name="content" id="content" rows="12"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 @error('content') border-red-300 ring-2 ring-red-100 @enderror">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="flex items-center text-sm text-red-600 mt-1">
                            <i class="material-icons text-red-500 mr-1 text-sm">error</i>
                            {{ $message }}
                        </p>
                    @enderror
                    <div class="flex items-center text-sm text-gray-500 bg-purple-50 px-4 py-3 rounded-lg">
                        <i class="material-icons text-purple-500 mr-2 text-sm">info</i>
                        Используйте редактор для создания богатого текстового контента с форматированием, изображениями и
                        ссылками
                    </div>
                </div>
            </div>
        </div>

        <!-- SEO Section -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
            <div class="px-8 py-6 bg-gradient-to-r from-orange-500 to-red-600">
                <h2 class="text-xl font-semibold text-white">SEO настройки</h2>
                <p class="mt-1 text-orange-100">Настройте мета-теги для поисковых систем</p>
            </div>

            <div class="p-8">
                <div class="space-y-6">
                    <!-- Meta Title -->
                    <div class="space-y-2">
                        <label for="meta_title" class="flex items-center text-sm font-semibold text-gray-700">
                            <i class="material-icons text-orange-500 mr-2 text-lg">title</i>
                            Meta Title
                        </label>
                        <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title') }}"
                            placeholder="SEO заголовок для поисковых систем"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200 @error('meta_title') border-red-300 ring-2 ring-red-100 @enderror">
                        @error('meta_title')
                            <p class="flex items-center text-sm text-red-600 mt-1">
                                <i class="material-icons text-red-500 mr-1 text-sm">error</i>
                                {{ $message }}
                            </p>
                        @enderror
                        <div class="flex justify-between items-center text-xs text-gray-500">
                            <span>Если не указан, будет использован основной заголовок статьи</span>
                        </div>
                    </div>

                    <!-- Meta Description -->
                    <div class="space-y-2">
                        <label for="meta_description" class="flex items-center text-sm font-semibold text-gray-700">
                            <i class="material-icons text-orange-500 mr-2 text-lg">description</i>
                            Meta Description
                        </label>
                        <textarea name="meta_description" id="meta_description" rows="3"
                            placeholder="SEO описание для поисковых систем"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200 resize-none @error('meta_description') border-red-300 ring-2 ring-red-100 @enderror">{{ old('meta_description') }}</textarea>
                        @error('meta_description')
                            <p class="flex items-center text-sm text-red-600 mt-1">
                                <i class="material-icons text-red-500 mr-1 text-sm">error</i>
                                {{ $message }}
                            </p>
                        @enderror
                        <div class="flex justify-between items-center text-xs text-gray-500">
                            <span>Если не указано, будет использовано краткое описание статьи</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Settings Section -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
            <div class="px-8 py-6 bg-gradient-to-r from-gray-600 to-gray-700">
                <h2 class="text-xl font-semibold text-white">Настройки публикации</h2>
                <p class="mt-1 text-gray-300">Управляйте видимостью и порядком отображения статьи</p>
            </div>

            <div class="p-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Publication Status -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                            <i class="material-icons text-gray-600 mr-2">visibility</i>
                            Статус публикации
                        </h3>

                        <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center">
                                    <input type="checkbox" name="is_published" id="is_published" value="1"
                                        {{ old('is_published', $blog->is_published) ? 'checked' : '' }}
                                        class="h-5 w-5 text-primary focus:ring-primary border-gray-300 rounded transition-colors duration-200">
                                    <label for="is_published" class="ml-3 text-sm font-medium text-gray-900">
                                        Опубликовать статью
                                    </label>
                                </div>
                                <div class="flex-1">
                                    <p class="text-xs text-gray-500">
                                        Опубликованные статьи отображаются на сайте
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sort Order and Published Date -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                            <i class="material-icons text-gray-600 mr-2">sort</i>
                            Порядок и дата
                        </h3>

                        <div class="space-y-4">
                            <div class="space-y-2">
                                <label for="sort_order" class="block text-sm font-medium text-gray-700">
                                    Приоритет отображения
                                </label>
                                <input type="number" name="sort_order" id="sort_order"
                                    value="{{ old('sort_order', $blog->sort_order ?? 0) }}" min="0"
                                    placeholder="0"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200">
                                <p class="text-xs text-gray-500">
                                    Чем меньше число, тем выше статья в списке
                                </p>
                            </div>

                            <div class="space-y-2">
                                <label for="published_at" class="block text-sm font-medium text-gray-700">
                                    Дата публикации
                                </label>
                                <input type="datetime-local" name="published_at" id="published_at"
                                    value="{{ old('published_at') }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200">
                                <p class="text-xs text-gray-500">
                                    Если не указана, будет установлена текущая дата при публикации
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
            <div class="px-8 py-6 bg-gradient-to-r from-gray-50 to-gray-100 border-t border-gray-200">
                <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <div class="flex items-center text-sm text-gray-500">
                        <i class="material-icons mr-2 text-sm">info</i>
                        Все поля отмеченные <span class="text-red-500 font-semibold">*</span> обязательны для заполнения
                    </div>

                    <div class="flex space-x-4">
                        <a href="{{ route('admin.blogs.index') }}"
                            class="inline-flex items-center px-6 py-3 border border-gray-300 rounded-xl text-sm font-semibold text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-200 shadow-sm">
                            <i class="material-icons mr-2 text-sm">close</i>
                            Отмена
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-8 py-3 border border-transparent rounded-xl text-sm font-semibold text-white bg-gradient-to-r from-primary to-secondary hover:from-secondary hover:to-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <i class="material-icons mr-2 text-sm">add</i>
                            Создать статью
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        // Enhanced form validation and UX
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const submitButton = form.querySelector('button[type="submit"]');
            const titleInput = document.getElementById('title');
            const slugInput = document.getElementById('slug');

            // Автоматическая генерация slug из title
            titleInput.addEventListener('input', function() {
                if (!slugInput.value) {
                    slugInput.value = this.value
                        .toLowerCase()
                        .replace(/[^a-z0-9\s-]/g, '')
                        .replace(/\s+/g, '-')
                        .replace(/-+/g, '-')
                        .trim('-');
                }
            });

            // Add loading state to submit button
            form.addEventListener('submit', function() {
                submitButton.disabled = true;
                submitButton.innerHTML =
                    '<i class="material-icons mr-2 text-sm animate-spin">refresh</i>Создание...';
            });

            // Add smooth scrolling to error fields
            const errorFields = form.querySelectorAll('.border-red-300');
            if (errorFields.length > 0) {
                errorFields[0].scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }

        });
    </script>

@endsection
