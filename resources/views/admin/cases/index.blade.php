@extends('admin.layout')

@section('title', 'Управление кейсами')

@section('content')
    <div class="mb-6">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-900">Управление кейсами</h2>
            <a href="{{ route('admin.cases.create') }}"
                class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-secondary transition-colors">
                <i class="material-icons mr-2">add</i>
                Добавить кейс
            </a>
        </div>
    </div>

    @if ($cases->count() > 0)
        <div class="bg-white shadow overflow-hidden sm:rounded-md">
            <ul class="divide-y divide-gray-200">
                @foreach ($cases as $case)
                    <li class="px-6 py-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-16 w-16">
                                    <img class="h-16 w-16 rounded-lg object-cover"
                                        src="{{ asset('storage/images/' . $case->image) }}" alt="{{ $case->title }}">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $case->title }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{ $case->client }} • {{ $case->industry_name }} • {{ $case->period }}
                                    </div>
                                    <div class="text-xs text-gray-400">
                                        Создан: {{ $case->created_at->format('d.m.Y H:i') }}
                                        @if ($case->user)
                                            • Автор: {{ $case->user->name }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                {{ $case->is_published ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                    {{ $case->is_published ? 'Опубликован' : 'Черновик' }}
                                </span>
                                <div class="flex space-x-1">
                                    <a href="{{ route('admin.cases.show', $case) }}"
                                        class="text-gray-400 hover:text-gray-600">
                                        <i class="material-icons">visibility</i>
                                    </a>
                                    <a href="{{ route('admin.cases.edit', $case) }}"
                                        class="text-gray-400 hover:text-gray-600">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <form action="{{ route('admin.cases.destroy', $case) }}" method="POST" class="inline"
                                        onsubmit="confirmDelete(this); return false;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-gray-400 hover:text-red-600">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $cases->links() }}
        </div>
    @else
        <div class="text-center py-12">
            <i class="material-icons text-gray-400 text-6xl mb-4">folder_open</i>
            <h3 class="text-lg font-medium text-gray-900 mb-2">Кейсы не найдены</h3>
            <p class="text-gray-500 mb-4">Начните с создания первого кейса</p>
            <a href="{{ route('admin.cases.create') }}"
                class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-secondary transition-colors">
                <i class="material-icons mr-2">add</i>
                Добавить кейс
            </a>
        </div>
    @endif
@endsection
