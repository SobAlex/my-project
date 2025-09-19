@extends('admin.layout')

@section('title', 'Создание категории отрасли')

@section('content')
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.industry-categories.index') }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 hover:text-gray-700 transition-colors duration-200">
                    <i class="material-icons mr-2">arrow_back</i>
                    Назад к списку
                </a>
                <div class="h-6 w-px bg-gray-300"></div>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Создание категории отрасли</h1>
                    <p class="mt-1 text-sm text-gray-500">Создайте новую категорию отрасли</p>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.industry-categories.store') }}" method="POST" class="space-y-8">
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
                                URL-слаг
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
                        </div>

                        <!-- Description Field -->
                        <div class="space-y-2">
                            <label for="description" class="flex items-center text-sm font-semibold text-gray-700">
                                <i class="material-icons text-primary mr-2 text-lg">description</i>
                                Описание категории
                            </label>
                            <textarea name="description" id="description" rows="4" placeholder="Опишите категорию отрасли"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 resize-none @error('description') border-red-300 ring-2 ring-red-100 @enderror">{{ old('description', $category->description) }}</textarea>
                            @error('description')
                                <p class="flex items-center text-sm text-red-600 mt-1">
                                    <i class="material-icons text-red-500 mr-1 text-sm">error</i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Icon and Color -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="icon" class="flex items-center text-sm font-semibold text-gray-700">
                                    <i class="material-icons text-primary mr-2 text-lg">palette</i>
                                    Иконка
                                </label>
                                <input type="text" name="icon" id="icon"
                                    value="{{ old('icon', $category->icon) }}" placeholder="business"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 @error('icon') border-red-300 ring-2 ring-red-100 @enderror">
                                @error('icon')
                                    <p class="flex items-center text-sm text-red-600 mt-1">
                                        <i class="material-icons text-red-500 mr-1 text-sm">error</i>
                                        {{ $message }}
                                    </p>
                                @enderror
                                <p class="text-xs text-gray-500 mt-1">Например: business, store, factory, shopping_cart</p>
                            </div>

                            <div class="space-y-2">
                                <label for="color" class="flex items-center text-sm font-semibold text-gray-700">
                                    <i class="material-icons text-primary mr-2 text-lg">color_lens</i>
                                    Цвет
                                </label>
                                <div class="flex rounded-xl shadow-sm">
                                    <input type="color" name="color" id="color"
                                        value="{{ old('color', $category->color) }}"
                                        class="h-12 w-16 border-gray-300 rounded-l-xl focus:ring-2 focus:ring-primary focus:border-transparent @error('color') border-red-300 ring-2 ring-red-100 @enderror">
                                    <input type="text" name="color_text" id="color_text"
                                        value="{{ old('color', $category->color) }}"
                                        class="flex-1 min-w-0 block w-full px-4 py-3 border-gray-300 rounded-r-xl focus:ring-2 focus:ring-primary focus:border-transparent sm:text-sm @error('color') border-red-300 ring-2 ring-red-100 @enderror"
                                        placeholder="#3B82F6">
                                </div>
                                @error('color')
                                    <p class="flex items-center text-sm text-red-600 mt-1">
                                        <i class="material-icons text-red-500 mr-1 text-sm">error</i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <!-- Sort Order and Status -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="sort_order" class="flex items-center text-sm font-semibold text-gray-700">
                                    <i class="material-icons text-primary mr-2 text-lg">sort</i>
                                    Порядок сортировки
                                </label>
                                <input type="number" name="sort_order" id="sort_order"
                                    value="{{ old('sort_order', $category->sort_order) }}" min="0" placeholder="0"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 @error('sort_order') border-red-300 ring-2 ring-red-100 @enderror">
                                @error('sort_order')
                                    <p class="flex items-center text-sm text-red-600 mt-1">
                                        <i class="material-icons text-red-500 mr-1 text-sm">error</i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label class="flex items-center text-sm font-semibold text-gray-700">
                                    <i class="material-icons text-primary mr-2 text-lg">visibility</i>
                                    Статус
                                </label>
                                <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-xl border border-gray-200">
                                    <div class="flex items-center">
                                        <input type="checkbox" name="is_active" id="is_active" value="1"
                                            {{ old('is_active', $category->is_active) ? 'checked' : '' }}
                                            class="h-5 w-5 text-primary focus:ring-primary border-gray-300 rounded transition-colors duration-200">
                                        <label for="is_active" class="ml-3 text-sm font-medium text-gray-900">
                                            Активна
                                        </label>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-xs text-gray-500">
                                            Активные категории отображаются в выпадающих списках
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Preview Section -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
            <div class="px-8 py-6 bg-gradient-to-r from-green-500 to-emerald-600">
                <h2 class="text-xl font-semibold text-white">Предварительный просмотр</h2>
                <p class="mt-1 text-green-100">Как будет выглядеть категория в интерфейсе</p>
            </div>

            <div class="p-8">
                <div class="flex items-center justify-center">
                    <div class="flex items-center p-6 bg-gray-50 rounded-xl border-2 border-dashed border-gray-300">
                        <div class="flex-shrink-0 h-16 w-16 rounded-xl flex items-center justify-center text-white text-2xl shadow-lg"
                            id="preview-color" style="background-color: {{ old('color', $category->color) }}">
                            <i class="material-icons"
                                id="preview-icon">{{ old('icon', $category->icon) ?: 'business' }}</i>
                        </div>
                        <div class="ml-6">
                            <div class="text-lg font-semibold text-gray-900" id="preview-name">
                                {{ old('name', $category->name) ?: 'Название категории' }}
                            </div>
                            <div class="text-sm text-gray-500" id="preview-slug">
                                Слаг: {{ old('slug', $category->slug) ?: 'slug' }}
                            </div>
                            <div class="text-xs text-gray-400 mt-1" id="preview-description">
                                {{ old('description', $category->description) ?: 'Описание категории' }}
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
                        <a href="{{ route('admin.industry-categories.index') }}"
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
@endsection

@push('scripts')
    <script>
        // Enhanced form validation and UX
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const submitButton = form.querySelector('button[type="submit"]');
            const colorInput = document.getElementById('color');
            const colorTextInput = document.getElementById('color_text');
            const nameInput = document.getElementById('name');
            const slugInput = document.getElementById('slug');
            const iconInput = document.getElementById('icon');
            const descriptionInput = document.getElementById('description');
            const previewColor = document.getElementById('preview-color');
            const previewIcon = document.getElementById('preview-icon');
            const previewName = document.getElementById('preview-name');
            const previewSlug = document.getElementById('preview-slug');
            const previewDescription = document.getElementById('preview-description');

            // Color synchronization
            function syncColors() {
                colorTextInput.value = colorInput.value;
                previewColor.style.backgroundColor = colorInput.value;
            }

            colorInput.addEventListener('input', syncColors);

            colorTextInput.addEventListener('input', function() {
                if (this.value.match(/^#[0-9A-F]{6}$/i)) {
                    colorInput.value = this.value;
                    previewColor.style.backgroundColor = this.value;
                }
            });

            // Name synchronization
            nameInput.addEventListener('input', function() {
                previewName.textContent = this.value || 'Название категории';
            });

            // Slug synchronization
            slugInput.addEventListener('input', function() {
                previewSlug.textContent = 'Слаг: ' + (this.value || 'slug');
            });

            // Icon synchronization
            iconInput.addEventListener('input', function() {
                if (this.value) {
                    previewIcon.textContent = this.value;
                } else {
                    previewIcon.textContent = 'business';
                }
            });

            // Description synchronization
            descriptionInput.addEventListener('input', function() {
                previewDescription.textContent = this.value || 'Описание категории';
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

            // Initialize preview on page load
            syncColors();
        });
    </script>
@endpush
