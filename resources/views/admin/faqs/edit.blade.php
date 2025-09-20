@extends('admin.layout')

@section('title', 'Редактирование FAQ')

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
                    <h1 class="text-3xl font-bold text-gray-900">Редактирование FAQ</h1>
                    <p class="mt-1 text-sm text-gray-500">Обновите информацию о FAQ</p>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.faqs.update', $faq) }}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Main Form Container -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
            <div class="px-8 py-6 bg-gradient-to-r from-primary to-secondary">
                <h2 class="text-xl font-semibold text-white">Основная информация</h2>
                <p class="mt-1 text-primary-100">Обновите основную информацию о FAQ</p>
            </div>

            <div class="p-8 space-y-8">
                <!-- Question Field -->
                <div class="space-y-2">
                    <label for="question" class="flex items-center text-sm font-semibold text-gray-700">
                        <i class="material-icons text-primary mr-2 text-lg">help_outline</i>
                        Вопрос
                        <span class="text-red-500 ml-1">*</span>
                    </label>
                    <input type="text" name="question" id="question" value="{{ old('question', $faq->question) }}"
                        placeholder="Введите вопрос"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 @error('question') border-red-300 ring-2 ring-red-100 @enderror">
                    @error('question')
                        <p class="flex items-center text-sm text-red-600 mt-1">
                            <i class="material-icons text-sm mr-1">error</i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Answer Field -->
                <div class="space-y-2">
                    <label for="answer" class="flex items-center text-sm font-semibold text-gray-700">
                        <i class="material-icons text-primary mr-2 text-lg">description</i>
                        Ответ
                        <span class="text-red-500 ml-1">*</span>
                    </label>
                    <textarea name="answer" id="answer" rows="6" placeholder="Введите ответ на вопрос"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 @error('answer') border-red-300 ring-2 ring-red-100 @enderror">{{ old('answer', $faq->answer) }}</textarea>
                    @error('answer')
                        <p class="flex items-center text-sm text-red-600 mt-1">
                            <i class="material-icons text-sm mr-1">error</i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Settings Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Sort Order -->
                    <div class="space-y-2">
                        <label for="sort_order" class="flex items-center text-sm font-semibold text-gray-700">
                            <i class="material-icons text-primary mr-2 text-lg">sort</i>
                            Порядок сортировки
                        </label>
                        <input type="number" name="sort_order" id="sort_order"
                            value="{{ old('sort_order', $faq->sort_order) }}" min="0" placeholder="0"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 @error('sort_order') border-red-300 ring-2 ring-red-100 @enderror">
                        @error('sort_order')
                            <p class="flex items-center text-sm text-red-600 mt-1">
                                <i class="material-icons text-sm mr-1">error</i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="space-y-2">
                        <label class="flex items-center text-sm font-semibold text-gray-700">
                            <i class="material-icons text-primary mr-2 text-lg">visibility</i>
                            Статус
                        </label>
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center">
                                <input type="checkbox" name="is_active" id="is_active" value="1"
                                    {{ old('is_active', $faq->is_active) ? 'checked' : '' }}
                                    class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                                <span class="ml-2 text-sm text-gray-700">Активен</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.faqs.index') }}"
                class="inline-flex items-center px-6 py-3 border border-gray-300 text-gray-700 bg-white rounded-xl hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all duration-200">
                <i class="material-icons mr-2">close</i>
                Отмена
            </a>
            <button type="submit"
                class="inline-flex items-center px-8 py-3 border border-transparent rounded-xl text-sm font-semibold text-white bg-cyan-500 hover:bg-cyan-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <i class="material-icons mr-2 text-sm">save</i>
                Обновить FAQ
            </button>
        </div>
    </form>
@endsection
