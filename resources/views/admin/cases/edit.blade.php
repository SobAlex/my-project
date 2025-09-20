@extends('admin.layout')

@section('title', 'Редактирование кейса')

@section('content')
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.cases.index') }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 hover:text-gray-700 transition-colors duration-200">
                    <i class="material-icons mr-2">arrow_back</i>
                    Назад к списку
                </a>
                <div class="h-6 w-px bg-gray-300"></div>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Редактирование кейса</h1>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <span
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $case->is_published ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                    {{ $case->is_published ? 'Опубликован' : 'Черновик' }}
                </span>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.cases.update', $case) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Main Form Container -->
        <div class="bg-white shadow-md rounded-2xl overflow-hidden">
            <div class="px-8 py-6 bg-gradient-to-r from-primary to-secondary">
                <h2 class="text-xl font-semibold">Основная информация</h2>
                <p class="mt-1 text-primary-100">Заполните основную информацию о кейсе</p>
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
                                Название кейса
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <input type="text" name="title" id="title" value="{{ old('title', $case->title) }}"
                                placeholder="Введите название кейса"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 @error('title') border-red-300 ring-2 ring-red-100 @enderror">
                            @error('title')
                                <p class="flex items-center text-sm text-red-600 mt-1">
                                    <i class="material-icons text-red-500 mr-1 text-sm">error</i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Client Field -->
                        <div class="space-y-2">
                            <label for="client" class="flex items-center text-sm font-semibold text-gray-700">
                                <i class="material-icons text-primary mr-2 text-lg">business</i>
                                Клиент
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <input type="text" name="client" id="client" value="{{ old('client', $case->client) }}"
                                placeholder="Название компании клиента"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 @error('client') border-red-300 ring-2 ring-red-100 @enderror">
                            @error('client')
                                <p class="flex items-center text-sm text-red-600 mt-1">
                                    <i class="material-icons text-red-500 mr-1 text-sm">error</i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Industry and Period -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="industry" class="flex items-center text-sm font-semibold text-gray-700">
                                    <i class="material-icons text-primary mr-2 text-lg">category</i>
                                    Отрасль
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <select name="industry" id="industry"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 @error('industry') border-red-300 ring-2 ring-red-100 @enderror">
                                    <option value="">Выберите отрасль</option>
                                    @php
                                        $industryCategories = \App\Models\IndustryCategory::active()->ordered()->get();
                                    @endphp
                                    @foreach ($industryCategories as $category)
                                        <option value="{{ $category->slug }}"
                                            {{ old('industry', $case->industry) == $category->slug ? 'selected' : '' }}
                                            data-color="{{ $category->color }}" data-icon="{{ $category->icon }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('industry')
                                    <p class="flex items-center text-sm text-red-600 mt-1">
                                        <i class="material-icons text-red-500 mr-1 text-sm">error</i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="period" class="flex items-center text-sm font-semibold text-gray-700">
                                    <i class="material-icons text-primary mr-2 text-lg">schedule</i>
                                    Период работы
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input type="text" name="period" id="period"
                                    value="{{ old('period', $case->period) }}" placeholder="например: 6 месяцев"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 @error('period') border-red-300 ring-2 ring-red-100 @enderror">
                                @error('period')
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
                        <!-- Description Field -->
                        <div class="space-y-2">
                            <label for="description" class="flex items-center text-sm font-semibold text-gray-700">
                                <i class="material-icons text-primary mr-2 text-lg">description</i>
                                Описание проекта
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <textarea name="description" id="description" rows="8"
                                placeholder="Опишите суть проекта, задачи и подходы к их решению"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 resize-none @error('description') border-red-300 ring-2 ring-red-100 @enderror">{{ old('description', $case->description) }}</textarea>
                            @error('description')
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
                <p class="mt-1">Загрузите изображение для кейса</p>
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
                                    @if ($case->image)
                                        <div class="relative group">
                                            <img src="{{ asset('storage/images/' . $case->image) }}" alt="Current image"
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

        <!-- Results Section -->
        <div class="bg-white shadow-md rounded-2xl overflow-hidden">
            <div class="px-8 py-6 bg-gradient-to-r">
                <h2 class="text-xl font-semibold">Ключевые результаты</h2>
                <p class="mt-1">Опишите достигнутые
                    результаты</p>
            </div>

            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @for ($i = 1; $i <= 6; $i++)
                        <div class="space-y-2">
                            <label for="result_{{ $i }}"
                                class="flex items-center text-sm font-semibold text-gray-700">
                                <div
                                    class="w-8 h-8 bg-green-100 text-green-600 rounded-full flex items-center justify-center mr-3 text-sm font-bold">
                                    {{ $i }}
                                </div>
                                Результат {{ $i }}
                            </label>
                            <input type="text" name="result_{{ $i }}" id="result_{{ $i }}"
                                value="{{ old('result_' . $i, $case->{'result_' . $i}) }}"
                                placeholder="например: Рост трафика на 400%"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 @error('result_' . $i) border-red-300 ring-2 ring-red-100 @enderror">
                            @error('result_' . $i)
                                <p class="flex items-center text-sm text-red-600 mt-1">
                                    <i class="material-icons text-red-500 mr-1 text-sm">error</i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    @endfor
                </div>
            </div>
        </div>

        <!-- Metrics Section -->
        <div class="bg-white shadow-md rounded-2xl overflow-hidden">
            <div class="px-8 py-6 bg-gradient-to-r from-blue-500 to-indigo-600">
                <h2 class="text-xl font-semibold">Метрики до/после</h2>
                <p class="mt-1">Покажите количественные результаты работы</p>
            </div>

            <div class="p-8">
                <div class="space-y-8">
                    @php
                        $beforeAfter = $case->before_after ?? [];
                        $metrics = array_keys($beforeAfter);
                    @endphp

                    @for ($i = 1; $i <= 4; $i++)
                        @php
                            $metricName = $metrics[$i - 1] ?? '';
                            $metricData = $beforeAfter[$metricName] ?? ['before' => '', 'after' => ''];
                        @endphp

                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <div
                                    class="w-10 h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mr-4 text-lg font-bold">
                                    {{ $i }}
                                </div>
                                <h3 class="text-lg font-semibold text-gray-800">Метрика {{ $i }}</h3>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                                <!-- Metric Name -->
                                <div class="space-y-2">
                                    <label class="flex items-center text-sm font-semibold text-gray-700">
                                        <i class="material-icons text-blue-500 mr-2 text-lg">label</i>
                                        Название метрики
                                    </label>
                                    <input type="text" name="metric_name_{{ $i }}"
                                        value="{{ old('metric_name_' . $i, $metricName) }}"
                                        placeholder="например: traffic"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                </div>

                                <!-- Before Value -->
                                <div class="space-y-2">
                                    <label class="flex items-center text-sm font-semibold text-gray-700">
                                        <i class="material-icons text-red-500 mr-2 text-lg">trending_down</i>
                                        Значение "До"
                                    </label>
                                    <input type="text" name="metric_before_{{ $i }}"
                                        value="{{ old('metric_before_' . $i, $metricData['before'] ?? '') }}"
                                        placeholder="2,500"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-200">
                                </div>

                                <!-- After Value -->
                                <div class="space-y-2">
                                    <label class="flex items-center text-sm font-semibold text-gray-700">
                                        <i class="material-icons text-green-500 mr-2 text-lg">trending_up</i>
                                        Значение "После"
                                    </label>
                                    <input type="text" name="metric_after_{{ $i }}"
                                        value="{{ old('metric_after_' . $i, $metricData['after'] ?? '') }}"
                                        placeholder="12,000"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200">
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>

        <!-- Content Section -->
        <div class="bg-white shadow-md rounded-2xl overflow-hidden">
            <div class="px-8 py-6 bg-gradient-to-r from-purple-500 to-pink-600">
                <h2 class="text-xl font-semibold">Дополнительный контент</h2>
                <p class="mt-1">Создайте подробное описание проекта с помощью редактора</p>
            </div>

            <div class="p-8">
                <div class="space-y-4">
                    <label for="content" class="flex items-center text-sm font-semibold text-gray-700">
                        <i class="material-icons text-purple-500 mr-2 text-lg">article</i>
                        Текстовый контент
                    </label>
                    <textarea name="content" id="content" rows="12"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 @error('content') border-red-300 ring-2 ring-red-100 @enderror">{{ old('content', $case->content) }}</textarea>
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
                <h2 class="text-xl font-semibold">SEO настройки</h2>
                <p class="mt-1">Настройте мета-теги для поисковых систем</p>
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
                            value="{{ old('meta_title', $case->meta_title) }}"
                            placeholder="SEO заголовок для поисковых систем"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200 @error('meta_title') border-red-300 ring-2 ring-red-100 @enderror">
                        @error('meta_title')
                            <p class="flex items-center text-sm text-red-600 mt-1">
                                <i class="material-icons text-red-500 mr-1 text-sm">error</i>
                                {{ $message }}
                            </p>
                        @enderror
                        <div class="flex justify-between items-center text-xs text-gray-500">
                            <span>Если не указан, будет использован основной заголовок кейса</span>
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
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200 resize-none @error('meta_description') border-red-300 ring-2 ring-red-100 @enderror">{{ old('meta_description', $case->meta_description) }}</textarea>
                        @error('meta_description')
                            <p class="flex items-center text-sm text-red-600 mt-1">
                                <i class="material-icons text-red-500 mr-1 text-sm">error</i>
                                {{ $message }}
                            </p>
                        @enderror
                        <div class="flex justify-between items-center text-xs text-gray-500">
                            <span>Если не указано, будет использовано основное описание кейса</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Settings Section -->
        <div class="bg-white shadow-md rounded-2xl overflow-hidden">
            <div class="px-8 py-6 bg-gradient-to-r from-gray-600 to-gray-700">
                <h2 class="text-xl font-semibold">Настройки публикации</h2>
                <p class="mt-1">Управляйте видимостью и порядком отображения кейса</p>
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
                                        {{ old('is_published', $case->is_published) ? 'checked' : '' }}
                                        class="h-5 w-5 text-primary focus:ring-primary border-2 border-gray-300 rounded transition-colors duration-200">
                                    <label for="is_published" class="ml-3 text-sm font-medium text-gray-900">
                                        Опубликовать кейс
                                    </label>
                                </div>
                                <div class="flex-1">
                                    <p class="text-xs text-gray-500">
                                        Опубликованные кейсы отображаются на сайте
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
                            <input type="number" name="sort_order" id="sort_order"
                                value="{{ old('sort_order', $case->sort_order ?? 0) }}" min="0" placeholder="0"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200">
                            <p class="text-xs text-gray-500">
                                Чем меньше число, тем выше кейс в списке
                            </p>
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
                        <a href="{{ route('admin.cases.index') }}"
                            class="inline-flex items-center px-6 py-3 border border-gray-300 rounded-xl text-sm font-semibold text-gray-700 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-200 shadow-sm">
                            <i class="material-icons mr-2 text-sm">close</i>
                            Отмена
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-8 py-3 border border-transparent rounded-xl text-sm font-semibold text-white bg-cyan-500 hover:bg-cyan-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 transition-all duration-200 shadow-sm hover:shadow-md">
                            <i class="material-icons mr-2 text-sm">save</i>
                            Обновить кейс
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        // Enhanced form validation and UX
        // Убираем DOMContentLoaded и делаем скрипт сразу выполняемым
        (function() {
            const form = document.querySelector('form');
            const submitButton = form.querySelector('button[type="submit"]');
            const industrySelect = document.getElementById('industry');
            const industryPreview = document.getElementById('industry-preview');
            const previewIcon = document.getElementById('preview-icon');
            const previewName = document.getElementById('preview-name');
            const previewDescription = document.getElementById('preview-description');

            // Industry category preview functionality
            function updateIndustryPreview() {
                if (!industrySelect || !industryPreview) return;

                const selectedOption = industrySelect.options[industrySelect.selectedIndex];

                if (selectedOption.value) {
                    const color = selectedOption.getAttribute('data-color');
                    const icon = selectedOption.getAttribute('data-icon');
                    const name = selectedOption.textContent;

                    // Update preview elements only if they exist
                    if (previewIcon) {
                        previewIcon.style.backgroundColor = color;
                        const iconElement = previewIcon.querySelector('i');
                        if (iconElement) {
                            iconElement.textContent = icon || 'business';
                        }
                    }
                    if (previewName) {
                        previewName.textContent = name;
                    }
                    if (previewDescription) {
                        previewDescription.textContent = selectedOption.getAttribute('data-description') || '';
                    }

                    // Show preview
                    industryPreview.classList.remove('hidden');
                } else {
                    // Hide preview
                    industryPreview.classList.add('hidden');
                }
            }

            // Initialize preview on page load
            if (industrySelect) {
                updateIndustryPreview();
                // Update preview when selection changes
                industrySelect.addEventListener('change', updateIndustryPreview);
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

            // Image preview functionality
            const imageInput = document.getElementById('image');
            const uploadArea = document.getElementById('upload-area');
            const fileInfo = document.getElementById('file-info');
            const fileName = document.getElementById('file-name');
            const imagePreview = document.getElementById('image-preview');
            const previewImg = document.getElementById('preview-img');
            const noPreview = document.getElementById('no-preview');

            console.log('Elements found:', {
                imageInput: !!imageInput,
                uploadArea: !!uploadArea,
                fileInfo: !!fileInfo,
                fileName: !!fileName,
                imagePreview: !!imagePreview,
                previewImg: !!previewImg,
                noPreview: !!noPreview
            });

            // Если элементы не найдены, выходим
            if (!imageInput || !uploadArea || !fileInfo || !fileName || !imagePreview || !previewImg || !noPreview) {
                return;
            }

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
                // Validate file type
                if (!file.type.startsWith('image/')) {
                    alert('Пожалуйста, выберите файл изображения');
                    return false;
                }

                // Validate file size (5MB)
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

            // Clear preview button
            if (clearPreviewBtn) {
                clearPreviewBtn.addEventListener('click', function() {
                    imageInput.value = '';
                    hidePreview();
                });
            }

        })();
    </script>

@endsection
