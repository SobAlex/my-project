@extends('admin.layout')

@section('title', 'Управление FAQ')

@section('content')
    <div class="mb-6">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-900">Управление FAQ</h2>
            <a href="{{ route('admin.faqs.create') }}"
                class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-secondary transition-colors">
                <i class="material-icons mr-2">add</i>
                Добавить FAQ
            </a>
        </div>
    </div>

    @if ($faqs->count() > 0)
        <div class="bg-white shadow overflow-hidden sm:rounded-md">
            <ul class="divide-y divide-gray-200">
                @foreach ($faqs as $faq)
                    <li class="px-6 py-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-16 w-16">
                                    <div class="h-16 w-16 rounded-lg bg-gray-200 flex items-center justify-center">
                                        <i class="material-icons text-gray-400">help_outline</i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $faq->question }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{ Str::limit(strip_tags($faq->answer), 100) }}
                                    </div>
                                    <div class="text-xs text-gray-400">
                                        Создан: {{ $faq->created_at->format('d.m.Y H:i') }} • Порядок:
                                        {{ $faq->sort_order }}
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                {{ $faq->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                    {{ $faq->is_active ? 'Активен' : 'Неактивен' }}
                                </span>
                                <div class="flex space-x-1">
                                    <a href="{{ route('admin.faqs.show', $faq) }}"
                                        class="text-gray-400 hover:text-gray-600">
                                        <i class="material-icons">visibility</i>
                                    </a>
                                    <a href="{{ route('admin.faqs.edit', $faq) }}"
                                        class="text-gray-400 hover:text-gray-600">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" class="inline"
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
    @else
        <div class="text-center py-12">
            <i class="material-icons text-gray-400 text-6xl mb-4">help_outline</i>
            <h3 class="text-lg font-medium text-gray-900 mb-2">FAQ не найдены</h3>
            <p class="text-gray-500 mb-4">Начните с создания первого FAQ</p>
            <a href="{{ route('admin.faqs.create') }}"
                class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-secondary transition-colors">
                <i class="material-icons mr-2">add</i>
                Добавить FAQ
            </a>
        </div>
    @endif

    <script>
        function confirmDelete(form) {
            if (confirm('Вы уверены, что хотите удалить этот FAQ?')) {
                form.submit();
            }
        }
    </script>
@endsection
