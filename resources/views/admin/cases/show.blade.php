@extends('admin.layout')

@section('title', 'Просмотр кейса')

@section('content')
    <div class="mb-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <a href="{{ route('admin.cases.index') }}" class="text-gray-400 hover:text-gray-600 mr-4">
                    <i class="material-icons">arrow_back</i>
                </a>
                <h2 class="text-2xl font-bold text-gray-900">Просмотр кейса</h2>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('admin.cases.edit', $case) }}"
                    class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-secondary transition-colors">
                    <i class="material-icons mr-2">edit</i>
                    Редактировать
                </a>
                <form action="{{ route('admin.cases.destroy', $case) }}" method="POST" class="inline"
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
                        <p class="mt-1 text-sm text-gray-900">{{ $case->title }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Клиент</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $case->client }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Отрасль</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $case->industry_name }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Период</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $case->period }}</p>
                    </div>
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-500">Описание</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $case->description }}</p>
                </div>
            </div>

            <!-- Результаты -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Результаты</h3>

                <div class="space-y-2">
                    @for ($i = 1; $i <= 6; $i++)
                        @if ($case->{'result_' . $i})
                            <div class="flex items-center">
                                <i class="material-icons text-green-500 mr-2 text-sm">check_circle</i>
                                <span class="text-sm text-gray-700">{{ $case->{'result_' . $i} }}</span>
                            </div>
                        @endif
                    @endfor
                </div>
            </div>

            <!-- Метрики до/после -->
            @if ($case->before_after && count($case->before_after) > 0)
                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Метрики до/после</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach ($case->before_after as $metric => $values)
                            <div class="border rounded-lg p-4">
                                <h4 class="font-medium text-gray-900 mb-3 capitalize">
                                    @switch($metric)
                                        @case('traffic')
                                            Трафик
                                        @break

                                        @case('keywords')
                                            Ключевые слова
                                        @break

                                        @case('conversion')
                                            Конверсия
                                        @break

                                        @case('revenue')
                                            Выручка
                                        @break

                                        @default
                                            {{ ucfirst($metric) }}
                                    @endswitch
                                </h4>
                                <div class="space-y-2">
                                    <div class="flex justify-between">
                                        <span class="text-sm text-gray-500">До:</span>
                                        <span class="text-sm font-medium text-red-600">{{ $values['before'] }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-sm text-gray-500">После:</span>
                                        <span class="text-sm font-medium text-green-600">{{ $values['after'] }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Дополнительный контент -->
            @if ($case->content)
                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Дополнительный контент</h3>
                    <div class="prose max-w-none">
                        {!! $case->content !!}
                    </div>
                </div>
            @endif
        </div>

        <!-- Боковая панель -->
        <div class="space-y-6">
            <!-- Изображение -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Изображение</h3>
                <img src="{{ asset('images/' . $case->image) }}" alt="{{ $case->title }}"
                    class="w-full h-48 object-cover rounded-lg">
            </div>

            <!-- Статус и настройки -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Статус и настройки</h3>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Статус</label>
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium mt-1
                        {{ $case->is_published ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $case->is_published ? 'Опубликован' : 'Черновик' }}
                        </span>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Порядок сортировки</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $case->sort_order }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">ID кейса</label>
                        <p class="mt-1 text-sm text-gray-900 font-mono">{{ $case->case_id }}</p>
                    </div>
                </div>
            </div>

            <!-- Информация о создании -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Информация о создании</h3>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Создан</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $case->created_at->format('d.m.Y H:i') }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Обновлен</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $case->updated_at->format('d.m.Y H:i') }}</p>
                    </div>

                    @if ($case->user)
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Автор</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $case->user->name }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Действия -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Действия</h3>

                <div class="space-y-2">
                    <a href="{{ route('cases.show', $case->case_id) }}" target="_blank"
                        class="block w-full text-center bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition-colors">
                        <i class="material-icons mr-2 text-sm">open_in_new</i>
                        Посмотреть на сайте
                    </a>

                    <a href="{{ route('admin.cases.edit', $case) }}"
                        class="block w-full text-center bg-primary text-white px-4 py-2 rounded-lg hover:bg-secondary transition-colors">
                        <i class="material-icons mr-2 text-sm">edit</i>
                        Редактировать
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
