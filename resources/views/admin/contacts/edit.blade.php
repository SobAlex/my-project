@extends('admin.layout')

@section('title', 'Редактирование контактов')

@section('content')
    <div class="mb-6">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-900">Редактирование контактов</h2>
            <a href="{{ route('admin.contacts.index') }}"
                class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-secondary transition-colors">
                <i class="material-icons mr-2">visibility</i>
                Просмотр
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-6 bg-green-50 border-l-4 border-green-400 p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="material-icons text-green-400">check_circle</i>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-green-700 font-medium">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="mb-6 bg-red-50 border-l-4 border-red-400 p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="material-icons text-red-400">error</i>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-red-700 font-medium">{{ session('error') }}</p>
                </div>
            </div>
        </div>
    @endif

    @if ($settings->isEmpty())
        <div class="mb-6 bg-yellow-50 border border-yellow-200 rounded-lg p-4">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <i class="material-icons text-yellow-500">warning</i>
                </div>
                <div class="ml-4 flex-1">
                    <h3 class="text-lg font-medium text-yellow-800">Настройки контактов не найдены</h3>
                    <p class="mt-2 text-yellow-700">Создать настройки по умолчанию для начала работы?</p>
                    <div class="mt-4">
                        <form action="{{ route('admin.contacts.create-defaults') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit"
                                class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded-lg transition-colors">
                                <i class="material-icons mr-2 text-sm">add</i>
                                Создать настройки по умолчанию
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($settings->isNotEmpty())
        <form action="{{ route('admin.contacts.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Basic Contact Information -->
            <div class="bg-white shadow overflow-hidden sm:rounded-md">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Основная информация</h3>
                </div>
                <div class="px-6 py-4 space-y-6">
                    @foreach ($settings->whereIn('key', ['address', 'phone', 'email', 'working_hours']) as $index => $setting)
                        <div class="space-y-2">
                            <div class="flex items-center justify-between">
                                <label class="text-sm font-medium text-gray-700">
                                    {{ $setting->label }}
                                </label>
                                <div class="flex items-center space-x-2">
                                    <input type="checkbox" name="settings[{{ $index }}][is_active]" value="1"
                                        {{ old('settings.' . $index . '.is_active', $setting->is_active) ? 'checked' : '' }}
                                        class="h-4 w-4 text-cyan-600 focus:ring-cyan-500 border-gray-300 rounded">
                                    <span class="text-xs text-gray-500">Активно</span>
                                </div>
                            </div>
                            @if ($setting->description)
                                <p class="text-sm text-gray-500">{{ $setting->description }}</p>
                            @endif

                            <input type="hidden" name="settings[{{ $index }}][id]" value="{{ $setting->id }}">

                            @if ($setting->type === 'email')
                                <input type="email" name="settings[{{ $index }}][value]"
                                    value="{{ old('settings.' . $index . '.value', $setting->value) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 @error('settings.' . $index . '.value') border-red-300 @enderror"
                                    placeholder="Введите {{ strtolower($setting->label) }}">
                            @elseif($setting->type === 'phone')
                                <input type="tel" name="settings[{{ $index }}][value]"
                                    value="{{ old('settings.' . $index . '.value', $setting->value) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 @error('settings.' . $index . '.value') border-red-300 @enderror"
                                    placeholder="Введите {{ strtolower($setting->label) }}">
                            @elseif($setting->type === 'url')
                                <input type="url" name="settings[{{ $index }}][value]"
                                    value="{{ old('settings.' . $index . '.value', $setting->value) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 @error('settings.' . $index . '.value') border-red-300 @enderror"
                                    placeholder="Введите {{ strtolower($setting->label) }}">
                            @else
                                <input type="text" name="settings[{{ $index }}][value]"
                                    value="{{ old('settings.' . $index . '.value', $setting->value) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 @error('settings.' . $index . '.value') border-red-300 @enderror"
                                    placeholder="Введите {{ strtolower($setting->label) }}">
                            @endif

                            @error('settings.' . $index . '.value')
                                <p class="text-sm text-red-600 flex items-center">
                                    <i class="material-icons text-sm mr-1">error</i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Social Media Links -->
            <div class="bg-white shadow overflow-hidden sm:rounded-md">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Социальные сети</h3>
                </div>
                <div class="px-6 py-4 space-y-6">
                    @foreach ($settings->whereIn('key', ['social_telegram', 'social_whatsapp', 'social_vk']) as $socialIndex => $setting)
                        <div class="space-y-2">
                            <div class="flex items-center justify-between">
                                <label class="text-sm font-medium text-gray-700">
                                    {{ $setting->label }}
                                </label>
                                <div class="flex items-center space-x-2">
                                    <input type="checkbox" name="settings[{{ $socialIndex + 4 }}][is_active]"
                                        value="1"
                                        {{ old('settings.' . ($socialIndex + 4) . '.is_active', $setting->is_active) ? 'checked' : '' }}
                                        class="h-4 w-4 text-cyan-600 focus:ring-cyan-500 border-gray-300 rounded">
                                    <span class="text-xs text-gray-500">Активно</span>
                                </div>
                            </div>
                            @if ($setting->description)
                                <p class="text-sm text-gray-500">{{ $setting->description }}</p>
                            @endif

                            <input type="hidden" name="settings[{{ $socialIndex + 4 }}][id]" value="{{ $setting->id }}">

                            <input type="url" name="settings[{{ $socialIndex + 4 }}][value]"
                                value="{{ old('settings.' . ($socialIndex + 4) . '.value', $setting->value) }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 @error('settings.' . ($socialIndex + 4) . '.value') border-red-300 @enderror"
                                placeholder="https://example.com">

                            @error('settings.' . ($socialIndex + 4) . '.value')
                                <p class="text-sm text-red-600 flex items-center">
                                    <i class="material-icons text-sm mr-1">error</i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Form Actions -->
            <div class="bg-white shadow overflow-hidden sm:rounded-md">
                <div class="px-6 py-4 flex items-center justify-between">
                    <div class="text-sm text-gray-500">
                        <i class="material-icons text-sm mr-1">info</i>
                        Изменения будут применены на всех страницах сайта
                    </div>
                    <div class="flex space-x-4">
                        <a href="{{ route('admin.contacts.index') }}"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 transition-colors">
                            <i class="material-icons mr-2 text-sm">close</i>
                            Отмена
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-cyan-500 hover:bg-cyan-600 text-white font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 transition-colors">
                            <i class="material-icons mr-2 text-sm">save</i>
                            Сохранить изменения
                        </button>
                    </div>
                </div>
            </div>
        </form>
    @endif
@endsection
