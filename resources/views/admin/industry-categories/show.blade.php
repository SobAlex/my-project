@extends('admin.layout')

@section('title', 'Просмотр категории отрасли')

@section('content')
    <div class="mb-6">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-900">Просмотр категории отрасли</h2>
            <div class="flex space-x-3">
                <a href="{{ route('admin.industry-categories.edit', $industryCategory) }}"
                    class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-secondary transition-colors">
                    <i class="material-icons mr-2">edit</i>
                    Редактировать
                </a>
                <a href="{{ route('admin.industry-categories.index') }}" class="text-gray-600 hover:text-gray-900">
                    <i class="material-icons mr-2">arrow_back</i>
                    Назад к списку
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <!-- Основная информация -->
        <div class="lg:col-span-2">
            <div class="bg-white shadow sm:rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Основная информация</h3>
                </div>
                <div class="px-6 py-4 space-y-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-16 w-16 rounded-lg flex items-center justify-center text-white text-2xl"
                            style="background-color: {{ $industryCategory->color }}">
                            @if ($industryCategory->icon)
                                <i class="material-icons">{{ $industryCategory->icon }}</i>
                            @else
                                <i class="material-icons">business</i>
                            @endif
                        </div>
                        <div class="ml-4">
                            <h4 class="text-xl font-semibold text-gray-900">{{ $industryCategory->name }}</h4>
                            <p class="text-sm text-gray-500">Слаг: {{ $industryCategory->slug }}</p>
                        </div>
                    </div>

                    @if ($industryCategory->description)
                        <div>
                            <h5 class="text-sm font-medium text-gray-700 mb-2">Описание</h5>
                            <p class="text-sm text-gray-600">{{ $industryCategory->description }}</p>
                        </div>
                    @endif

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <h5 class="text-sm font-medium text-gray-700">Статус</h5>
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                {{ $industryCategory->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $industryCategory->is_active ? 'Активна' : 'Неактивна' }}
                            </span>
                        </div>
                        <div>
                            <h5 class="text-sm font-medium text-gray-700">Порядок сортировки</h5>
                            <p class="text-sm text-gray-600">{{ $industryCategory->sort_order }}</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <h5 class="text-sm font-medium text-gray-700">Цвет</h5>
                            <div class="flex items-center space-x-2">
                                <div class="h-6 w-6 rounded border border-gray-300"
                                    style="background-color: {{ $industryCategory->color }}"></div>
                                <span class="text-sm text-gray-600">{{ $industryCategory->color }}</span>
                            </div>
                        </div>
                        @if ($industryCategory->icon)
                            <div>
                                <h5 class="text-sm font-medium text-gray-700">Иконка</h5>
                                <div class="flex items-center space-x-2">
                                    <i class="material-icons text-gray-600">{{ $industryCategory->icon }}</i>
                                    <span class="text-sm text-gray-600">{{ $industryCategory->icon }}</span>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <h5 class="text-sm font-medium text-gray-700">Создана</h5>
                            <p class="text-sm text-gray-600">{{ $industryCategory->created_at->format('d.m.Y H:i') }}</p>
                        </div>
                        <div>
                            <h5 class="text-sm font-medium text-gray-700">Обновлена</h5>
                            <p class="text-sm text-gray-600">{{ $industryCategory->updated_at->format('d.m.Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Связанные кейсы -->
        <div class="lg:col-span-1">
            <div class="bg-white shadow sm:rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Связанные кейсы</h3>
                </div>
                <div class="px-6 py-4">
                    @if ($industryCategory->cases->count() > 0)
                        <div class="space-y-3">
                            @foreach ($industryCategory->cases as $case)
                                <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded object-cover"
                                            src="{{ asset('images/' . $case->image) }}" alt="{{ $case->title }}">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate">
                                            {{ $case->title }}
                                        </p>
                                        <p class="text-xs text-gray-500">
                                            {{ $case->client }} • {{ $case->period }}
                                        </p>
                                    </div>
                                    <a href="{{ route('admin.cases.show', $case) }}"
                                        class="text-gray-400 hover:text-gray-600">
                                        <i class="material-icons text-sm">visibility</i>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-6">
                            <i class="material-icons text-gray-400 text-4xl mb-2">folder_open</i>
                            <p class="text-sm text-gray-500">Нет связанных кейсов</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Действия -->
    <div class="mt-6 flex justify-between">
        <form action="{{ route('admin.industry-categories.destroy', $industryCategory) }}" method="POST"
            onsubmit="confirmDelete(this); return false;">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
                <i class="material-icons mr-2">delete</i>
                Удалить категорию
            </button>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        function confirmDelete(form) {
            if (confirm('Вы уверены, что хотите удалить эту категорию? Это действие нельзя отменить.')) {
                form.submit();
            }
        }
    </script>
@endpush
