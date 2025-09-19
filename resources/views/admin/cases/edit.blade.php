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
                    <p class="mt-1 text-sm text-gray-500">Обновите информацию о кейсе</p>
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

    <form action="{{ route('admin.cases.update', $case) }}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Main Form Container -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
            <div class="px-8 py-6 bg-gradient-to-r from-primary to-secondary">
                <h2 class="text-xl font-semibold text-white">Основная информация</h2>
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
                                    @foreach ($industries as $key => $name)
                                        <option value="{{ $key }}"
                                            {{ old('industry', $case->industry) == $key ? 'selected' : '' }}>
                                            {{ $name }}
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

                        <!-- Image Selection -->
                        <div class="space-y-2">
                            <label for="image" class="flex items-center text-sm font-semibold text-gray-700">
                                <i class="material-icons text-primary mr-2 text-lg">image</i>
                                Изображение
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <select name="image" id="image"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 @error('image') border-red-300 ring-2 ring-red-100 @enderror">
                                <option value="">Выберите изображение</option>
                                <option value="human.jpeg"
                                    {{ old('image', $case->image) == 'human.jpeg' ? 'selected' : '' }}>human.jpeg</option>
                                <option value="human2.jpeg"
                                    {{ old('image', $case->image) == 'human2.jpeg' ? 'selected' : '' }}>human2.jpeg
                                </option>
                                <option value="human.webp"
                                    {{ old('image', $case->image) == 'human.webp' ? 'selected' : '' }}>human.webp</option>
                            </select>
                            @error('image')
                                <p class="flex items-center text-sm text-red-600 mt-1">
                                    <i class="material-icons text-red-500 mr-1 text-sm">error</i>
                                    {{ $message }}
                                </p>
                            @enderror
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

        <!-- Results Section -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
            <div class="px-8 py-6 bg-gradient-to-r from-green-500 to-emerald-600">
                <h2 class="text-xl font-semibold text-white">Результаты проекта</h2>
                <p class="mt-1 text-green-100">Опишите достигнутые результаты</p>
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
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
            <div class="px-8 py-6 bg-gradient-to-r from-blue-500 to-indigo-600">
                <h2 class="text-xl font-semibold text-white">Метрики до/после</h2>
                <p class="mt-1 text-blue-100">Покажите количественные результаты работы</p>
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

                        <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
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
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
            <div class="px-8 py-6 bg-gradient-to-r from-purple-500 to-pink-600">
                <h2 class="text-xl font-semibold text-white">Дополнительный контент</h2>
                <p class="mt-1 text-purple-100">Создайте подробное описание проекта с помощью редактора</p>
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
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
            <div class="px-8 py-6 bg-gradient-to-r from-gray-600 to-gray-700">
                <h2 class="text-xl font-semibold text-white">Настройки публикации</h2>
                <p class="mt-1 text-gray-300">Управляйте видимостью и порядком отображения кейса</p>
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
                                        {{ old('is_published', $case->is_published) ? 'checked' : '' }}
                                        class="h-5 w-5 text-primary focus:ring-primary border-gray-300 rounded transition-colors duration-200">
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
                            <label for="sort_order" class="block text-sm font-medium text-gray-700">
                                Приоритет отображения
                            </label>
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
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
            <div class="px-8 py-6 bg-gradient-to-r from-gray-50 to-gray-100 border-t border-gray-200">
                <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <div class="flex items-center text-sm text-gray-500">
                        <i class="material-icons mr-2 text-sm">info</i>
                        Все поля отмеченные <span class="text-red-500 font-semibold">*</span> обязательны для заполнения
                    </div>

                    <div class="flex space-x-4">
                        <a href="{{ route('admin.cases.index') }}"
                            class="inline-flex items-center px-6 py-3 border border-gray-300 rounded-xl text-sm font-semibold text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-200 shadow-sm">
                            <i class="material-icons mr-2 text-sm">close</i>
                            Отмена
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-8 py-3 border border-transparent rounded-xl text-sm font-semibold text-white bg-gradient-to-r from-primary to-secondary hover:from-secondary hover:to-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
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
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const submitButton = form.querySelector('button[type="submit"]');

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

        });
    </script>

@endsection
