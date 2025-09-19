@extends('admin.layout')

@section('title', 'Контактные данные')

@section('content')
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 flex items-center">
                            <div class="bg-gradient-to-r from-cyan-500 to-blue-600 p-3 rounded-xl mr-4">
                                <i class="material-icons text-white text-2xl">contact_phone</i>
                            </div>
                            Контактные данные
                        </h1>
                        <p class="mt-3 text-lg text-gray-600">Просмотр и управление контактной информацией</p>
                    </div>
                    <div class="flex space-x-3">
                        <a href="{{ route('admin.contacts.edit') }}"
                            class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-600 hover:to-blue-700 text-white font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 transition-all transform hover:scale-105">
                            <i class="material-icons mr-2 text-sm">edit</i>
                            Редактировать
                        </a>
                    </div>
                </div>
            </div>

            <!-- Flash Messages -->
            @if (session('success'))
                <div class="mb-6 bg-green-50 border-l-4 border-green-400 p-4 rounded-r-lg">
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
                <div class="mb-6 bg-red-50 border-l-4 border-red-400 p-4 rounded-r-lg">
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

            <!-- Contact Settings List -->
            @if ($settings->isNotEmpty())
                <div class="space-y-8">
                    <!-- Basic Contact Information -->
                    <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
                        <div class="bg-gradient-to-r from-cyan-500 to-blue-600 px-6 py-4">
                            <div class="flex items-center">
                                <i class="material-icons text-white text-xl mr-3">business</i>
                                <h2 class="text-xl font-semibold text-white">Основная информация</h2>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @foreach ($settings->whereIn('key', ['address', 'phone', 'email', 'working_hours']) as $setting)
                                    <div class="group p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                                        <div class="flex items-start space-x-3">
                                            <div
                                                class="flex-shrink-0 w-10 h-10 bg-cyan-100 rounded-lg flex items-center justify-center">
                                                @if ($setting->key === 'address')
                                                    <i class="material-icons text-cyan-600">location_on</i>
                                                @elseif($setting->key === 'phone')
                                                    <i class="material-icons text-cyan-600">phone</i>
                                                @elseif($setting->key === 'email')
                                                    <i class="material-icons text-cyan-600">email</i>
                                                @elseif($setting->key === 'working_hours')
                                                    <i class="material-icons text-cyan-600">schedule</i>
                                                @endif
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-center justify-between mb-2">
                                                    <h3 class="text-sm font-semibold text-gray-900">{{ $setting->label }}
                                                    </h3>
                                                    @if ($setting->is_active)
                                                        <span
                                                            class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                            <i class="material-icons text-xs mr-1">check_circle</i>
                                                            Активно
                                                        </span>
                                                    @else
                                                        <span
                                                            class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                            <i class="material-icons text-xs mr-1">cancel</i>
                                                            Неактивно
                                                        </span>
                                                    @endif
                                                </div>
                                                @if ($setting->value)
                                                    <p class="text-sm text-gray-700 font-medium">{{ $setting->value }}</p>
                                                @else
                                                    <p class="text-sm text-gray-400 italic">Значение не задано</p>
                                                @endif
                                                @if ($setting->description)
                                                    <p class="mt-1 text-xs text-gray-500">{{ $setting->description }}</p>
                                                @endif
                                                <div class="mt-2 flex items-center space-x-2 text-xs text-gray-400">
                                                    <span>{{ $setting->key }}</span>
                                                    <span>•</span>
                                                    <span>{{ ucfirst($setting->type) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Social Media Links -->
                    <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
                        <div class="bg-gradient-to-r from-purple-500 to-pink-600 px-6 py-4">
                            <div class="flex items-center">
                                <i class="material-icons text-white text-xl mr-3">share</i>
                                <h2 class="text-xl font-semibold text-white">Социальные сети</h2>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                @foreach ($settings->whereIn('key', ['social_telegram', 'social_whatsapp', 'social_vk']) as $setting)
                                    <div class="group p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                                        <div class="flex items-start space-x-3">
                                            <div
                                                class="flex-shrink-0 w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                                @if ($setting->key === 'social_telegram')
                                                    <i class="material-icons text-purple-600">send</i>
                                                @elseif($setting->key === 'social_whatsapp')
                                                    <i class="material-icons text-purple-600">chat</i>
                                                @elseif($setting->key === 'social_vk')
                                                    <i class="material-icons text-purple-600">group</i>
                                                @endif
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-center justify-between mb-2">
                                                    <h3 class="text-sm font-semibold text-gray-900">{{ $setting->label }}
                                                    </h3>
                                                    @if ($setting->is_active)
                                                        <span
                                                            class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                            <i class="material-icons text-xs mr-1">check_circle</i>
                                                            Активно
                                                        </span>
                                                    @else
                                                        <span
                                                            class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                            <i class="material-icons text-xs mr-1">cancel</i>
                                                            Неактивно
                                                        </span>
                                                    @endif
                                                </div>
                                                @if ($setting->value)
                                                    <a href="{{ $setting->value }}" target="_blank" rel="noopener"
                                                        class="text-sm text-purple-600 hover:text-purple-700 font-medium break-all">
                                                        {{ $setting->value }}
                                                    </a>
                                                @else
                                                    <p class="text-sm text-gray-400 italic">Ссылка не задана</p>
                                                @endif
                                                @if ($setting->description)
                                                    <p class="mt-1 text-xs text-gray-500">{{ $setting->description }}</p>
                                                @endif
                                                <div class="mt-2 flex items-center space-x-2 text-xs text-gray-400">
                                                    <span>{{ $setting->key }}</span>
                                                    <span>•</span>
                                                    <span>{{ ucfirst($setting->type) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Summary Card -->
                    <div class="bg-gradient-to-r from-gray-800 to-gray-900 rounded-2xl p-6 text-white">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-semibold mb-2">Статистика настроек</h3>
                                <div class="flex items-center space-x-6 text-sm">
                                    <div class="flex items-center">
                                        <i class="material-icons text-green-400 mr-2">check_circle</i>
                                        <span>Активных: {{ $settings->where('is_active', true)->count() }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="material-icons text-red-400 mr-2">cancel</i>
                                        <span>Неактивных: {{ $settings->where('is_active', false)->count() }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="material-icons text-blue-400 mr-2">settings</i>
                                        <span>Всего: {{ $settings->count() }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-gray-300">Последнее обновление</p>
                                <p class="text-sm font-medium">
                                    {{ $settings->max('updated_at') ? $settings->max('updated_at')->format('d.m.Y H:i') : 'Неизвестно' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <div class="bg-white rounded-2xl shadow-xl p-12 max-w-md mx-auto">
                        <div
                            class="w-20 h-20 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="material-icons text-white text-3xl">contact_phone</i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Нет настроек контактов</h3>
                        <p class="text-gray-600 mb-8">Начните с создания настроек по умолчанию для управления контактной
                            информацией сайта.</p>
                        <a href="{{ route('admin.contacts.edit') }}"
                            class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-600 hover:to-blue-700 text-white font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 transition-all transform hover:scale-105">
                            <i class="material-icons mr-2 text-sm">add</i>
                            Создать настройки
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
