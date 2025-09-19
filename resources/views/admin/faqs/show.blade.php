@extends('admin.layout')

@section('title', 'Просмотр FAQ')

@section('content')
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.faqs.index') }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 hover:text-gray-700 transition-colors duration-200">
                    <i class="material-icons mr-2">arrow_back</i>
                    Назад к списку
                </a>
                <div class="h-6 w-px bg-gray-300"></div>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Просмотр FAQ</h1>
                    <p class="mt-1 text-sm text-gray-500">Детальная информация о FAQ</p>
                </div>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('admin.faqs.edit', $faq) }}"
                    class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all transform hover:scale-105">
                    <i class="material-icons mr-2 text-sm">edit</i>
                    Редактировать
                </a>
                <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" class="inline"
                    onsubmit="return confirm('Вы уверены, что хотите удалить этот FAQ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all transform hover:scale-105">
                        <i class="material-icons mr-2 text-sm">delete</i>
                        Удалить
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="space-y-8">
        <!-- FAQ Details Card -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
            <div class="px-8 py-6 bg-gradient-to-r from-primary to-secondary">
                <h2 class="text-xl font-semibold text-white">Информация о FAQ</h2>
                <p class="mt-1 text-primary-100">Детальная информация о часто задаваемом вопросе</p>
            </div>

            <div class="p-8 space-y-8">
                <!-- Question Section -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center">
                                <i class="material-icons text-primary text-2xl">help_outline</i>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Вопрос</h3>
                            <p class="text-sm text-gray-500">Основной вопрос FAQ</p>
                        </div>
                    </div>
                    <div class="ml-15">
                        <p class="text-lg text-gray-800 leading-relaxed">{{ $faq->question }}</p>
                    </div>
                </div>

                <!-- Answer Section -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center">
                                <i class="material-icons text-primary text-2xl">description</i>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Ответ</h3>
                            <p class="text-sm text-gray-500">Подробный ответ на вопрос</p>
                        </div>
                    </div>
                    <div class="ml-15">
                        <div class="prose max-w-none">
                            {!! nl2br(e($faq->answer)) !!}
                        </div>
                    </div>
                </div>

                <!-- Settings Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 pt-8 border-t border-gray-200">
                    <!-- Sort Order -->
                    <div class="space-y-2">
                        <div class="flex items-center space-x-2">
                            <i class="material-icons text-primary">sort</i>
                            <h4 class="text-sm font-semibold text-gray-700">Порядок сортировки</h4>
                        </div>
                        <p class="text-2xl font-bold text-gray-900">{{ $faq->sort_order }}</p>
                    </div>

                    <!-- Status -->
                    <div class="space-y-2">
                        <div class="flex items-center space-x-2">
                            <i class="material-icons text-primary">visibility</i>
                            <h4 class="text-sm font-semibold text-gray-700">Статус</h4>
                        </div>
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                            {{ $faq->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $faq->is_active ? 'Активен' : 'Неактивен' }}
                        </span>
                    </div>

                    <!-- Created Date -->
                    <div class="space-y-2">
                        <div class="flex items-center space-x-2">
                            <i class="material-icons text-primary">schedule</i>
                            <h4 class="text-sm font-semibold text-gray-700">Дата создания</h4>
                        </div>
                        <p class="text-sm text-gray-900">{{ $faq->created_at->format('d.m.Y H:i') }}</p>
                    </div>
                </div>

                @if ($faq->updated_at != $faq->created_at)
                    <div class="pt-8 border-t border-gray-200">
                        <div class="flex items-center space-x-2">
                            <i class="material-icons text-primary">update</i>
                            <h4 class="text-sm font-semibold text-gray-700">Последнее обновление</h4>
                        </div>
                        <p class="text-sm text-gray-900 mt-1">{{ $faq->updated_at->format('d.m.Y H:i') }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
