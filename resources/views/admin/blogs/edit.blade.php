@extends('admin.layout')

@section('title', 'Редактирование статьи')

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
                    <h1 class="text-3xl font-bold text-gray-900">Редактирование статьи</h1>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <span
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $blog->is_published ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                    {{ $blog->is_published ? 'Опубликован' : 'Черновик' }}
                </span>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Main Form Container -->
        <div class="bg-white shadow-md rounded-2xl overflow-hidden">
            <div class="px-8 py-6 bg-gradient-to-r from-primary to-secondary">
                <h2 class="text-xl font-semibold">Основная информация</h2>
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

                        <!-- Category Field -->
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
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Excerpt Field -->
                        <div class="space-y-2">
                            <label for="excerpt" class="flex items-center text-sm font-semibold text-gray-700">
                                <i class="material-icons text-primary mr-2 text-lg">description</i>
                                Краткое описание
                            </label>
                            <textarea name="excerpt" id="excerpt" rows="8" placeholder="Краткое описание статьи для превью"
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

        <!-- Images Section -->
        <div class="bg-white shadow-md rounded-2xl overflow-hidden">
            <div class="px-8 py-6 bg-gradient-to-r from-primary to-secondary">
                <h2 class="text-xl font-semibold">Изображения</h2>
                <p class="mt-1 text-primary-100">Загрузите изображение для статьи</p>
            </div>

            <div class="p-8">
                <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">
                    <!-- File Upload Section -->
                    <div class="space-y-4">
                        <div class="text-center">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Загрузить новое изображение</h3>
                        </div>

                        <!-- Hidden file input -->
                        <input type="file" name="image" id="image" accept="image/*" class="hidden">

                        <!-- Custom upload area -->
                        <div id="upload-area"
                            class="relative border-2 border-dashed border-gray-300 rounded-xl p-8 text-center cursor-pointer hover:border-primary hover:bg-primary-50 transition-all duration-200 @error('image') border-red-300 bg-red-50 @enderror">

                            <!-- Upload icon and text -->
                            <div class="space-y-3">
                                <div class="mx-auto w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                                    <i class="material-icons text-gray-400 text-3xl">cloud_upload</i>
                                </div>

                                <div>
                                    <p class="text-lg font-medium text-gray-700">Выберите изображение</p>
                                    <p class="text-sm text-gray-500 mt-1">или перетащите файл сюда</p>
                                </div>

                                <div class="text-xs text-gray-400">
                                    JPG, PNG, WebP до 5MB
                                </div>
                            </div>

                            <!-- Selected file info -->
                            <div id="file-info" class="hidden mt-4 p-3 bg-primary-50 rounded-lg">
                                <div class="flex items-center justify-center space-x-2">
                                    <i class="material-icons text-primary text-sm">image</i>
                                    <span id="file-name" class="text-sm font-medium text-primary"></span>
                                </div>
                            </div>
                        </div>

                        @error('image')
                            <div class="bg-red-50 border border-red-200 rounded-lg p-3">
                                <p class="flex items-center text-sm text-red-600">
                                    <i class="material-icons text-red-500 mr-2 text-sm">error</i>
                                    {{ $message }}
                                </p>
                            </div>
                        @enderror
                    </div>

                    <!-- Images Section -->
                    <div class="space-y-4">
                        <div class="text-center">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Изображения</h3>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <!-- Current Image -->
                            <div class="space-y-2">
                                <h5 class="text-sm font-medium text-gray-700 text-center">Текущее</h5>
                                <div class="flex justify-center">
                                    @if ($blog->image)
                                        <div class="relative group">
                                            <img src="{{ $blog->image_url }}" alt="Current image"
                                                class="w-40 h-40 object-cover rounded-xl border border-gray-300">
                                            <div
                                                class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 rounded-xl flex items-center justify-center transition-all duration-200">
                                                <span
                                                    class="text-white text-sm font-medium opacity-0 group-hover:opacity-100 transition-opacity duration-200 bg-black bg-opacity-50 px-3 py-1 rounded-full">
                                                    Текущее
                                                </span>
                                            </div>
                                        </div>
                                    @else
                                        <div
                                            class="flex flex-col items-center justify-center h-40 w-40 border-2 border-dashed border-gray-300 rounded-xl bg-white">
                                            <i class="material-icons text-gray-400 text-3xl mb-2">image_not_supported</i>
                                            <p class="text-sm text-gray-500 font-medium">Нет изображения</p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- New Image Preview -->
                            <div class="space-y-2">
                                <h5 class="text-sm font-medium text-gray-700 text-center">Новое</h5>
                                <div class="flex justify-center">
                                    <div id="image-preview" class="hidden">
                                        <div class="relative group">
                                            <img id="preview-img" src="" alt="Preview"
                                                class="w-40 h-40 object-cover rounded-xl border border-gray-300">
                                            <div
                                                class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 rounded-xl flex items-center justify-center transition-all duration-200">
                                                <span
                                                    class="text-white text-sm font-medium opacity-0 group-hover:opacity-100 transition-opacity duration-200 bg-black bg-opacity-50 px-3 py-1 rounded-full">
                                                    Новое
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="no-preview"
                                        class="h-40 w-40 border-2 border-dashed border-gray-200 rounded-xl bg-gray-50">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Section -->
        <div class="bg-white shadow-md rounded-2xl overflow-hidden">
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
                    <textarea name="content" id="content" rows="12" placeholder="Напишите содержание статьи..."
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 @error('content') border-red-300 ring-2 ring-red-100 @enderror">{{ old('content', $blog->content) }}</textarea>
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
        <div class="bg-white shadow-md rounded-2xl overflow-hidden">
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
                        <input type="text" name="meta_title" id="meta_title"
                            value="{{ old('meta_title', $blog->meta_title) }}"
                            placeholder="SEO заголовок для поисковых систем"
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
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200 resize-none @error('meta_description') border-red-300 ring-2 ring-red-100 @enderror">{{ old('meta_description', $blog->meta_description) }}</textarea>
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
        <div class="bg-white shadow-md rounded-2xl overflow-hidden">
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

                        <div class="p-6">
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center">
                                    <input type="checkbox" name="is_published" id="is_published" value="1"
                                        {{ old('is_published', $blog->is_published) ? 'checked' : '' }}
                                        class="h-5 w-5 text-primary focus:ring-primary border-2 border-gray-300 rounded transition-colors duration-200">
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
                                    placeholder="0" placeholder="0"
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
                                    value="{{ old('published_at', $blog->published_at ? $blog->published_at->format('Y-m-d\TH:i') : '') }}"
                                    placeholder="Выберите дату и время публикации"
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
        <div class="bg-white shadow-md rounded-2xl overflow-hidden">
            <div class="px-8 py-6 bg-gradient-to-r from-gray-50 to-gray-100 border-t border-gray-200">
                <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <div class="flex items-center text-sm text-gray-500">
                        <i class="material-icons mr-2 text-sm">info</i>
                        Все поля отмеченные <span class="text-red-500 font-semibold">*</span> обязательны для заполнения
                    </div>

                    <div class="flex space-x-4">
                        <a href="{{ route('admin.blogs.index') }}"
                            class="inline-flex items-center px-6 py-3 border border-gray-300 rounded-xl text-sm font-semibold text-gray-700 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-200 shadow-sm">
                            <i class="material-icons mr-2 text-sm">close</i>
                            Отмена
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-8 py-3 border border-transparent rounded-xl text-sm font-semibold text-white bg-cyan-500 hover:bg-cyan-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 transition-all duration-200 shadow-sm hover:shadow-md">
                            <i class="material-icons mr-2 text-sm">save</i>
                            Обновить статью
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        // Enhanced form validation and UX
        (function() {
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

            // Image preview functionality
            const imageInput = document.getElementById('image');
            const uploadArea = document.getElementById('upload-area');
            const fileInfo = document.getElementById('file-info');
            const fileName = document.getElementById('file-name');
            const imagePreview = document.getElementById('image-preview');
            const previewImg = document.getElementById('preview-img');
            const noPreview = document.getElementById('no-preview');

            if (imageInput && uploadArea && fileInfo && fileName && imagePreview && previewImg && noPreview) {
                function showPreview(file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImg.src = e.target.result;
                        imagePreview.classList.remove('hidden');
                        noPreview.classList.add('hidden');
                    };
                    reader.readAsDataURL(file);
                }

                function hidePreview() {
                    imagePreview.classList.add('hidden');
                    noPreview.classList.remove('hidden');
                }

                function updateFileInfo(file) {
                    fileName.textContent = file.name;
                    fileInfo.classList.remove('hidden');
                }

                function hideFileInfo() {
                    fileInfo.classList.add('hidden');
                }

                function validateFile(file) {
                    if (!file.type.startsWith('image/')) {
                        alert('Пожалуйста, выберите файл изображения');
                        return false;
                    }

                    if (file.size > 5 * 1024 * 1024) {
                        alert('Размер файла не должен превышать 5MB');
                        return false;
                    }

                    return true;
                }

                function handleFile(file) {
                    if (validateFile(file)) {
                        updateFileInfo(file);
                        showPreview(file);
                    } else {
                        imageInput.value = '';
                    }
                }

                // Click to select file
                uploadArea.addEventListener('click', function() {
                    imageInput.click();
                });

                // File input change
                imageInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        handleFile(file);
                    } else {
                        hideFileInfo();
                        hidePreview();
                    }
                });

                // Drag and drop functionality
                uploadArea.addEventListener('dragover', function(e) {
                    e.preventDefault();
                    uploadArea.classList.add('border-primary', 'bg-primary-50');
                });

                uploadArea.addEventListener('dragleave', function(e) {
                    e.preventDefault();
                    uploadArea.classList.remove('border-primary', 'bg-primary-50');
                });

                uploadArea.addEventListener('drop', function(e) {
                    e.preventDefault();
                    uploadArea.classList.remove('border-primary', 'bg-primary-50');

                    const files = e.dataTransfer.files;
                    if (files.length > 0) {
                        const file = files[0];
                        imageInput.files = files;
                        handleFile(file);
                    }
                });
            }

            // Add loading state to submit button
            form.addEventListener('submit', function() {
                submitButton.disabled = true;
                submitButton.innerHTML =
                    '<i class="material-icons mr-2 text-sm animate-spin">refresh</i>Сохранение...';
            });

            // Add smooth scrolling to error fields
            const errorFields = form.querySelectorAll('.border-red-300');
            if (errorFields.length > 0) {
                errorFields[0].scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        })();
    </script>

@endsection
