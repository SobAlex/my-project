@extends('admin.layout')

@section('title', 'Создание кейса')

@section('content')
    <div class="mb-6">
        <div class="flex items-center">
            <a href="{{ route('admin.cases.index') }}" class="text-gray-400 hover:text-gray-600 mr-4">
                <i class="material-icons">arrow_back</i>
            </a>
            <h2 class="text-2xl font-bold text-gray-900">Создание кейса</h2>
        </div>
    </div>

    <form action="{{ route('admin.cases.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
            <div class="grid grid-cols-1 gap-6">
                <!-- Основная информация -->
                <div class="col-span-1">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Основная информация</h3>

                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Название кейса *</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $case->title) }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm @error('title') border-red-300 @enderror">
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="client" class="block text-sm font-medium text-gray-700">Клиент *</label>
                            <input type="text" name="client" id="client" value="{{ old('client', $case->client) }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm @error('client') border-red-300 @enderror">
                            @error('client')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="industry" class="block text-sm font-medium text-gray-700">Отрасль *</label>
                                <select name="industry" id="industry"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm @error('industry') border-red-300 @enderror">
                                    <option value="">Выберите отрасль</option>
                                    @foreach ($industries as $key => $name)
                                        <option value="{{ $key }}"
                                            {{ old('industry', $case->industry) == $key ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('industry')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="period" class="block text-sm font-medium text-gray-700">Период работы
                                    *</label>
                                <input type="text" name="period" id="period"
                                    value="{{ old('period', $case->period) }}" placeholder="например: 6 месяцев"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm @error('period') border-red-300 @enderror">
                                @error('period')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700">Изображение *</label>
                            <select name="image" id="image"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm @error('image') border-red-300 @enderror">
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
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Описание проекта
                                *</label>
                            <textarea name="description" id="description" rows="4"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm @error('description') border-red-300 @enderror">{{ old('description', $case->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Результаты -->
                <div class="col-span-1">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Результаты</h3>

                    <div class="space-y-4">
                        @for ($i = 1; $i <= 6; $i++)
                            <div>
                                <label for="result_{{ $i }}" class="block text-sm font-medium text-gray-700">
                                    Результат {{ $i }}
                                    @if ($i == 1)
                                        <span class="text-red-500">*</span>
                                    @endif
                                </label>
                                <input type="text" name="result_{{ $i }}" id="result_{{ $i }}"
                                    value="{{ old('result_' . $i, $case->{'result_' . $i}) }}"
                                    placeholder="например: Рост трафика на 400%"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm @error('result_' . $i) border-red-300 @enderror">
                                @error('result_' . $i)
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        @endfor
                    </div>
                </div>

                <!-- Метрики до/после -->
                <div class="col-span-1">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Метрики до/после</h3>

                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Название метрики</label>
                                <input type="text" name="metric_name_1" value="{{ old('metric_name_1', 'traffic') }}"
                                    placeholder="например: traffic"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <label class="block text-xs text-gray-500">До</label>
                                    <input type="text" name="metric_before_1"
                                        value="{{ old('metric_before_1', '2,500') }}" placeholder="2,500"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                                </div>
                                <div>
                                    <label class="block text-xs text-gray-500">После</label>
                                    <input type="text" name="metric_after_1"
                                        value="{{ old('metric_after_1', '12,000') }}" placeholder="12,000"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Название метрики</label>
                                <input type="text" name="metric_name_2"
                                    value="{{ old('metric_name_2', 'keywords') }}" placeholder="например: keywords"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <label class="block text-xs text-gray-500">До</label>
                                    <input type="text" name="metric_before_2"
                                        value="{{ old('metric_before_2', '25') }}" placeholder="25"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                                </div>
                                <div>
                                    <label class="block text-xs text-gray-500">После</label>
                                    <input type="text" name="metric_after_2"
                                        value="{{ old('metric_after_2', '150') }}" placeholder="150"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Название метрики</label>
                                <input type="text" name="metric_name_3"
                                    value="{{ old('metric_name_3', 'conversion') }}" placeholder="например: conversion"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <label class="block text-xs text-gray-500">До</label>
                                    <input type="text" name="metric_before_3"
                                        value="{{ old('metric_before_3', '1.2%') }}" placeholder="1.2%"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                                </div>
                                <div>
                                    <label class="block text-xs text-gray-500">После</label>
                                    <input type="text" name="metric_after_3"
                                        value="{{ old('metric_after_3', '3.8%') }}" placeholder="3.8%"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Название метрики</label>
                                <input type="text" name="metric_name_4" value="{{ old('metric_name_4', 'revenue') }}"
                                    placeholder="например: revenue"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <label class="block text-xs text-gray-500">До</label>
                                    <input type="text" name="metric_before_4"
                                        value="{{ old('metric_before_4', '₽450K') }}" placeholder="₽450K"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                                </div>
                                <div>
                                    <label class="block text-xs text-gray-500">После</label>
                                    <input type="text" name="metric_after_4"
                                        value="{{ old('metric_after_4', '₽1.7M') }}" placeholder="₽1.7M"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Дополнительный контент -->
                <div class="col-span-2">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Дополнительный контент</h3>

                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                            Текстовый контент
                        </label>
                        <textarea name="content" id="content" rows="10"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm @error('content') border-red-300 @enderror">{{ old('content') }}</textarea>
                        @error('content')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-sm text-gray-500">Используйте редактор для создания богатого текстового
                            контента</p>
                    </div>
                </div>

                <!-- Настройки -->
                <div class="col-span-1">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Настройки</h3>

                    <div class="space-y-4">
                        <div class="flex items-center">
                            <input type="checkbox" name="is_published" id="is_published" value="1"
                                {{ old('is_published', $case->is_published) ? 'checked' : '' }}
                                class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                            <label for="is_published" class="ml-2 block text-sm text-gray-900">
                                Опубликовать кейс
                            </label>
                        </div>

                        <div>
                            <label for="sort_order" class="block text-sm font-medium text-gray-700">Порядок
                                сортировки</label>
                            <input type="number" name="sort_order" id="sort_order"
                                value="{{ old('sort_order', $case->sort_order ?? 0) }}" min="0"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Кнопки -->
        <div class="flex justify-end space-x-3">
            <a href="{{ route('admin.cases.index') }}"
                class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                Отмена
            </a>
            <button type="submit"
                class="bg-primary py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                Создать кейс
            </button>
        </div>
    </form>

    <script>
        // Динамическое создание полей для метрик
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');

            form.addEventListener('submit', function(e) {
                // Удаляем старые скрытые поля если есть
                const existingHidden = form.querySelectorAll('input[name^="before_after"]');
                existingHidden.forEach(input => input.remove());

                // Создаем поля для метрик
                for (let i = 1; i <= 4; i++) {
                    const name = document.querySelector(`input[name="metric_name_${i}"]`).value;
                    const before = document.querySelector(`input[name="metric_before_${i}"]`).value;
                    const after = document.querySelector(`input[name="metric_after_${i}"]`).value;

                    if (name && before && after) {
                        // Создаем скрытые поля для before_after
                        const beforeInput = document.createElement('input');
                        beforeInput.type = 'hidden';
                        beforeInput.name = `before_after[${name}][before]`;
                        beforeInput.value = before;
                        form.appendChild(beforeInput);

                        const afterInput = document.createElement('input');
                        afterInput.type = 'hidden';
                        afterInput.name = `before_after[${name}][after]`;
                        afterInput.value = after;
                        form.appendChild(afterInput);
                    }
                }
            });
        });
    </script>

@endsection
