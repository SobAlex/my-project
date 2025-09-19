@extends('admin.layout')

@section('title', 'Создание категории блога')

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
                    <h1 class="text-3xl font-bold text-gray-900">Создание категории блога</h1>
                    <p class="mt-1 text-sm text-gray-500">Заполните информацию о новой категории</p>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.blog-categories.store') }}" method="POST" class="space-y-8">
        @csrf

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
                            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}"
                                placeholder="Введите название категории"
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
                            <input type="text" name="slug" id="slug" value="{{ old('slug', $category->slug) }}"
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
                                        value="{{ old('color', $category->color ?: '#06b6d4') }}"
                                        class="w-12 h-12 border border-gray-300 rounded-lg cursor-pointer @error('color') border-red-300 @enderror">
                                    <input type="text" name="color_text" id="color_text"
                                        value="{{ old('color', $category->color ?: '#06b6d4') }}" placeholder="#06b6d4"
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
                                    value="{{ old('icon', $category->icon) }}"
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
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 resize-none @error('description') border-red-300 ring-2 ring-red-100 @enderror">{{ old('description', $category->description) }}</textarea>
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
                                        style="background-color: {{ old('color', $category->color ?: '#06b6d4') }}">
                                        <i class="material-icons"
                                            id="preview-icon-name">{{ old('icon', $category->icon) ?: 'article' }}</i>
                                    </div>
                                    <div>
                                        <div id="preview-name" class="text-sm font-medium text-gray-900">
                                            {{ old('name', $category->name) ?: 'Название категории' }}</div>
                                        <div id="preview-description" class="text-xs text-gray-500">
                                            {{ old('description', $category->description) ?: 'Описание категории' }}</div>
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
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center">
                                    <input type="hidden" name="is_active" value="0">
                                    <input type="checkbox" name="is_active" id="is_active" value="1"
                                        {{ old('is_active', $category->is_active) ? 'checked' : '' }}
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
                                value="{{ old('sort_order', $category->sort_order ?? 0) }}" min="0"
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
                            class="inline-flex items-center px-8 py-3 border border-transparent rounded-xl text-sm font-semibold text-white bg-gradient-to-r from-primary to-secondary hover:from-secondary hover:to-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <i class="material-icons mr-2 text-sm">add</i>
                            Создать категорию
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

            // Initialize preview
            updatePreview();
        });
    </script>

@endsection
