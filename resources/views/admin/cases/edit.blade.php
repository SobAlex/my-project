@extends('admin.layout')

@section('title', 'Редактирование кейса')

@section('content')
    <div class="mb-6">
        <div class="flex items-center">
            <a href="{{ route('admin.cases.index') }}" class="text-gray-400 hover:text-gray-600 mr-4">
                <i class="material-icons">arrow_back</i>
            </a>
            <h2 class="text-2xl font-bold text-gray-900">Редактирование кейса</h2>
        </div>
    </div>

    <form action="{{ route('admin.cases.update', $case) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

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
                        @php
                            $beforeAfter = $case->before_after ?? [];
                            $metrics = array_keys($beforeAfter);
                        @endphp

                        @for ($i = 1; $i <= 4; $i++)
                            @php
                                $metricName = $metrics[$i - 1] ?? '';
                                $metricData = $beforeAfter[$metricName] ?? ['before' => '', 'after' => ''];
                            @endphp

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Название метрики</label>
                                    <input type="text" name="metric_name_{{ $i }}"
                                        value="{{ old('metric_name_' . $i, $metricName) }}" placeholder="например: traffic"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                                </div>
                                <div class="grid grid-cols-2 gap-2">
                                    <div>
                                        <label class="block text-xs text-gray-500">До</label>
                                        <input type="text" name="metric_before_{{ $i }}"
                                            value="{{ old('metric_before_' . $i, $metricData['before'] ?? '') }}"
                                            placeholder="2,500"
                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-xs text-gray-500">После</label>
                                        <input type="text" name="metric_after_{{ $i }}"
                                            value="{{ old('metric_after_' . $i, $metricData['after'] ?? '') }}"
                                            placeholder="12,000"
                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                                    </div>
                                </div>
                            </div>
                        @endfor
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
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm @error('content') border-red-300 @enderror">{{ old('content', $case->content) }}</textarea>
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
                Обновить кейс
            </button>
        </div>
    </form>

@endsection
