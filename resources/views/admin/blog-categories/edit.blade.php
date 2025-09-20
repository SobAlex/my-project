@extends('admin.layout')

@section('title', 'Редактирование категории блога')

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
                    <h1 class="text-3xl font-bold text-gray-900">Редактирование категории</h1>
                    <p class="mt-1 text-sm text-gray-500">Обновите информацию о категории</p>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <span
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $blogCategory->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $blogCategory->is_active ? 'Активна' : 'Неактивна' }}
                </span>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.blog-categories.update', $blogCategory) }}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Main Form Container -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
            <div class="px-8 py-6 bg-gradient-to-r from-primary to-secondary">
                <h2 class="text-xl font-semibold text-white">Основная информация</h2>
                <p class="mt-1 text-primary-100">Заполните основную информацию о категории</p>
            </div>

            <div class="p-8 space-y-8">
                <!-- Basic Information Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Name Field -->
                        <div class="space-y-2">
                            <label for="name" class="flex items-center text-sm font-semibold text-gray-700">
                                <i class="material-icons text-primary mr-2 text-lg">title</i>
                                Название категории
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <input type="text" name="name" id="name"
                                value="{{ old('name', $blogCategory->name) }}" placeholder="Введите название категории"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 @error('name') border-red-300 ring-2 ring-red-100 @enderror">
                            @error('name')
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
                                URL категории
                            </label>
                            <input type="text" name="slug" id="slug"
                                value="{{ old('slug', $blogCategory->slug) }}"
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

                        <!-- Color and Icon -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="color" class="flex items-center text-sm font-semibold text-gray-700">
                                    <i class="material-icons text-primary mr-2 text-lg">palette</i>
                                    Цвет
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <div class="flex items-center space-x-3">
                                    <input type="color" name="color" id="color"
                                        value="{{ old('color', $blogCategory->color) }}"
                                        class="w-12 h-12 border border-gray-300 rounded-lg cursor-pointer @error('color') border-red-300 @enderror">
                                    <input type="text" name="color_text" id="color_text"
                                        value="{{ old('color', $blogCategory->color) }}" placeholder="#06b6d4"
                                        class="flex-1 px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 @error('color') border-red-300 ring-2 ring-red-100 @enderror">
                                </div>
                                @error('color')
                                    <p class="flex items-center text-sm text-red-600 mt-1">
                                        <i class="material-icons text-red-500 mr-1 text-sm">error</i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="icon" class="flex items-center text-sm font-semibold text-gray-700">
                                    <i class="material-icons text-primary mr-2 text-lg">image</i>
                                    Иконка
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input type="text" name="icon" id="icon"
                                    value="{{ old('icon', $blogCategory->icon) }}"
                                    placeholder="например: article, trending_up, analytics"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 @error('icon') border-red-300 ring-2 ring-red-100 @enderror">
                                @error('icon')
                                    <p class="flex items-center text-sm text-red-600 mt-1">
                                        <i class="material-icons text-red-500 mr-1 text-sm">error</i>
                                        {{ $message }}
                                    </p>
                                @enderror
                                <p class="text-xs text-gray-500">Введите название иконки Material Icons (например: article,
                                    trending_up, analytics)</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Description Field -->
                        <div class="space-y-2">
                            <label for="description" class="flex items-center text-sm font-semibold text-gray-700">
                                <i class="material-icons text-primary mr-2 text-lg">description</i>
                                Описание категории
                            </label>
                            <textarea name="description" id="description" rows="6" placeholder="Краткое описание категории"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 resize-none @error('description') border-red-300 ring-2 ring-red-100 @enderror">{{ old('description', $blogCategory->description) }}</textarea>
                            @error('description')
                                <p class="flex items-center text-sm text-red-600 mt-1">
                                    <i class="material-icons text-red-500 mr-1 text-sm">error</i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Preview -->
                        <div class="space-y-2">
                            <label class="flex items-center text-sm font-semibold text-gray-700">
                                <i class="material-icons text-primary mr-2 text-lg">preview</i>
                                Предварительный просмотр
                            </label>
                            <div id="category-preview" class="p-4 bg-gray-50 rounded-xl border border-gray-200">
                                <div class="flex items-center space-x-3">
                                    <div id="preview-icon"
                                        class="w-10 h-10 rounded-lg flex items-center justify-center text-white text-sm"
                                        style="background-color: {{ old('color', $blogCategory->color) }}">
                                        <i class="material-icons"
                                            id="preview-icon-name">{{ old('icon', $blogCategory->icon) }}</i>
                                    </div>
                                    <div>
                                        <div id="preview-name" class="text-sm font-medium text-gray-900">
                                            {{ old('name', $blogCategory->name) }}</div>
                                        <div id="preview-description" class="text-xs text-gray-500">
                                            {{ old('description', $blogCategory->description) ?: 'Описание категории' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Settings Section -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
            <div class="px-8 py-6 bg-gradient-to-r from-gray-600 to-gray-700">
                <h2 class="text-xl font-semibold text-white">Настройки</h2>
                <p class="mt-1 text-gray-300">Управляйте видимостью и порядком отображения категории</p>
            </div>

            <div class="p-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Status -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                            <i class="material-icons text-gray-600 mr-2">visibility</i>
                            Статус активности
                        </h3>

                        <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                            <div class="space-y-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex items-center">
                                        <input type="hidden" name="is_active" value="0">
                                        <input type="checkbox" name="is_active" id="is_active" value="1"
                                            {{ old('is_active', $blogCategory->is_active) ? 'checked' : '' }}
                                            class="h-5 w-5 text-primary focus:ring-primary border-gray-300 rounded transition-colors duration-200">
                                        <label for="is_active" class="ml-3 text-sm font-medium text-gray-900">
                                            Активная категория
                                        </label>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-xs text-gray-500">
                                            Активные категории отображаются в блоге
                                        </p>
                                    </div>
                                </div>

                                @if ($blogCategory->blogs()->count() > 0)
                                    <div class="mt-4 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                                        <div class="flex items-start space-x-3">
                                            <i class="material-icons text-yellow-600 text-sm mt-0.5">warning</i>
                                            <div class="flex-1">
                                                <p class="text-sm text-yellow-800 font-medium">
                                                    В этой категории {{ $blogCategory->blogs()->count() }} статей
                                                </p>
                                                <p class="text-xs text-yellow-700 mt-1">
                                                    При деактивации категории все статьи будут скрыты с сайта
                                                </p>
                                                <div class="mt-3">
                                                    <label class="flex items-center">
                                                        <input type="checkbox" name="force_deactivate"
                                                            id="force_deactivate" value="1"
                                                            class="h-4 w-4 text-yellow-600 focus:ring-yellow-500 border-gray-300 rounded">
                                                        <span class="ml-2 text-xs text-yellow-800 font-medium">
                                                            Принудительно деактивировать (скрыть все статьи)
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Sort Order -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                            <i class="material-icons text-gray-600 mr-2">sort</i>
                            Порядок сортировки
                        </h3>

                        <div class="space-y-2">
                            <label for="sort_order" class="block text-sm font-medium text-gray-700">
                                Приоритет отображения
                            </label>
                            <input type="number" name="sort_order" id="sort_order"
                                value="{{ old('sort_order', $blogCategory->sort_order) }}" min="0"
                                placeholder="0"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200">
                            <p class="text-xs text-gray-500">
                                Чем меньше число, тем выше категория в списке
                            </p>
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
                        <a href="{{ route('admin.blog-categories.index') }}"
                            class="inline-flex items-center px-6 py-3 border border-gray-300 rounded-xl text-sm font-semibold text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-200 shadow-sm">
                            <i class="material-icons mr-2 text-sm">close</i>
                            Отмена
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-8 py-3 border border-transparent rounded-xl text-sm font-semibold text-white bg-cyan-500 hover:bg-cyan-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <i class="material-icons mr-2 text-sm">save</i>
                            Обновить категорию
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
            const nameInput = document.getElementById('name');
            const slugInput = document.getElementById('slug');
            const colorInput = document.getElementById('color');
            const colorTextInput = document.getElementById('color_text');
            const iconSelect = document.getElementById('icon');
            const descriptionInput = document.getElementById('description');

            // Preview elements
            const previewIcon = document.getElementById('preview-icon');
            const previewIconName = document.getElementById('preview-icon-name');
            const previewName = document.getElementById('preview-name');
            const previewDescription = document.getElementById('preview-description');

            // Автоматическая генерация slug из name
            nameInput.addEventListener('input', function() {
                if (!slugInput.value) {
                    slugInput.value = this.value
                        .toLowerCase()
                        .replace(/[^a-z0-9\s-]/g, '')
                        .replace(/\s+/g, '-')
                        .replace(/-+/g, '-')
                        .trim('-');
                }
                updatePreview();
            });

            // Синхронизация цветов
            colorInput.addEventListener('input', function() {
                colorTextInput.value = this.value;
                updatePreview();
            });

            colorTextInput.addEventListener('input', function() {
                if (this.value.match(/^#[0-9A-Fa-f]{6}$/)) {
                    colorInput.value = this.value;
                    updatePreview();
                }
            });

            // Обновление иконки
            iconSelect.addEventListener('change', updatePreview);

            // Обновление описания
            descriptionInput.addEventListener('input', updatePreview);

            // Функция обновления предварительного просмотра
            function updatePreview() {
                previewName.textContent = nameInput.value || 'Название категории';
                previewDescription.textContent = descriptionInput.value || 'Описание категории';
                previewIcon.style.backgroundColor = colorInput.value;
                previewIconName.textContent = iconSelect.value || 'article';
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

            // Initialize preview
            updatePreview();
        });
    </script>

@endsection
