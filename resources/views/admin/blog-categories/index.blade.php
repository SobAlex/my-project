@extends('admin.layout')

@section('title', 'Категории блогов')

@section('content')
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Категории блогов</h1>
                    <p class="mt-1 text-sm text-gray-500">Управление категориями статей блога</p>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.blog-categories.create') }}"
                    class="inline-flex items-center px-6 py-3 border border-transparent rounded-xl text-sm font-semibold text-white bg-gradient-to-r from-primary to-secondary hover:from-secondary hover:to-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    <i class="material-icons mr-2 text-sm">add</i>
                    Создать категорию
                </a>
            </div>
        </div>
    </div>

    <!-- Categories Grid -->
    <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
        <div class="px-8 py-6 bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800">Список категорий</h2>
            <p class="mt-1 text-sm text-gray-600">Всего категорий: {{ $categories->total() }}</p>
        </div>

        @if ($categories->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Категория
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Описание
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Статей
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Статус
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Порядок
                            </th>
                            <th class="px-6 py-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Действия
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($categories as $category)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded-lg flex items-center justify-center text-white text-sm mr-4"
                                            style="background-color: {{ $category->color }}">
                                            <i class="material-icons">{{ $category->icon }}</i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ $category->name }}</div>
                                            <div class="text-sm text-gray-500">{{ $category->slug }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 max-w-xs truncate">
                                        {{ $category->description ?: 'Нет описания' }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $category->blogs_count }} статей
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex flex-col space-y-1">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $category->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $category->is_active ? 'Активна' : 'Неактивна' }}
                                        </span>
                                        @if (!$category->is_active && $category->blogs_count > 0)
                                            <span
                                                class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-yellow-100 text-yellow-800">
                                                <i class="material-icons text-xs mr-1">visibility_off</i>
                                                {{ $category->blogs_count }} статей скрыто
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $category->sort_order }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex items-center justify-end space-x-2">
                                        <a href="{{ route('admin.blog-categories.show', $category) }}"
                                            class="text-gray-400 hover:text-gray-600 transition-colors duration-200"
                                            title="Просмотр">
                                            <i class="material-icons text-sm">visibility</i>
                                        </a>
                                        <a href="{{ route('admin.blog-categories.edit', $category) }}"
                                            class="text-primary hover:text-secondary transition-colors duration-200"
                                            title="Редактировать">
                                            <i class="material-icons text-sm">edit</i>
                                        </a>
                                        <form action="{{ route('admin.blog-categories.destroy', $category) }}"
                                            method="POST" class="inline"
                                            onsubmit="return confirm('Вы уверены, что хотите удалить эту категорию?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-400 hover:text-red-600 transition-colors duration-200"
                                                title="Удалить">
                                                <i class="material-icons text-sm">delete</i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-8 py-4 bg-gray-50 border-t border-gray-200">
                {{ $categories->links() }}
            </div>
        @else
            <div class="px-8 py-12 text-center">
                <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                    <i class="material-icons text-gray-400 text-4xl">category</i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Категории не найдены</h3>
                <p class="text-gray-500 mb-6">Создайте первую категорию для блога</p>
                <a href="{{ route('admin.blog-categories.create') }}"
                    class="inline-flex items-center px-6 py-3 border border-transparent rounded-xl text-sm font-semibold text-white bg-gradient-to-r from-primary to-secondary hover:from-secondary hover:to-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    <i class="material-icons mr-2 text-sm">add</i>
                    Создать категорию
                </a>
            </div>
        @endif
    </div>
@endsection
