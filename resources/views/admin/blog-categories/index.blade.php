@extends('admin.layout')

@section('title', 'Категории блогов')

@section('content')
    <div class="mb-6">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-900">Категории блогов</h2>
            <a href="{{ route('admin.blog-categories.create') }}"
                class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-secondary transition-colors">
                <i class="material-icons mr-2">add</i>
                Добавить категорию
            </a>
        </div>
    </div>

    @if ($categories->count() > 0)
        <div class="bg-white shadow overflow-hidden sm:rounded-md">
            <ul class="divide-y divide-gray-200">
                @foreach ($categories as $category)
                    <li class="px-6 py-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-16 w-16">
                                    <div class="h-16 w-16 rounded-lg flex items-center justify-center text-white text-lg"
                                        style="background-color: {{ $category->color }}">
                                        <i class="material-icons">{{ $category->icon }}</i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $category->name }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{ $category->slug }} • {{ $category->blogs_count }} статей
                                    </div>
                                    <div class="text-xs text-gray-400">
                                        Порядок: {{ $category->sort_order }}
                                        @if ($category->description)
                                            • {{ Str::limit($category->description, 50) }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                {{ $category->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                    {{ $category->is_active ? 'Активна' : 'Неактивна' }}
                                </span>
                                <div class="flex space-x-1">
                                    <a href="{{ route('admin.blog-categories.show', $category) }}"
                                        class="text-gray-400 hover:text-gray-600">
                                        <i class="material-icons">visibility</i>
                                    </a>
                                    <a href="{{ route('admin.blog-categories.edit', $category) }}"
                                        class="text-gray-400 hover:text-gray-600">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <form action="{{ route('admin.blog-categories.destroy', $category) }}" method="POST"
                                        class="inline" onsubmit="confirmDelete(this); return false;">
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
            {{ $categories->links() }}
        </div>
    @else
        <div class="bg-white shadow overflow-hidden sm:rounded-md">
            <div class="px-6 py-12 text-center">
                <div class="mx-auto w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                    <i class="material-icons text-gray-400 text-2xl">category</i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Категории не найдены</h3>
                <p class="text-gray-500 mb-6">Создайте первую категорию для блога</p>
                <a href="{{ route('admin.blog-categories.create') }}"
                    class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-secondary transition-colors">
                    <i class="material-icons mr-2">add</i>
                    Создать категорию
                </a>
            </div>
        </div>
    @endif
@endsection
