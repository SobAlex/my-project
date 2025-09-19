<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Админ-панель') - SEO продвижение</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#06b6d4',
                        secondary: '#0891b2'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-100">
    <div class="min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <h1 class="text-xl font-bold text-gray-900">Админ-панель</h1>
                    </div>
                    <nav class="flex space-x-4">
                        <a href="{{ route('admin.cases.index') }}"
                            class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('admin.cases.*') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                            Кейсы
                        </a>
                        <a href="{{ route('admin.blogs.index') }}"
                            class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('admin.blogs.*') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                            Блоги
                        </a>
                        <a href="{{ route('admin.blog-categories.index') }}"
                            class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('admin.blog-categories.*') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                            Категории блогов
                        </a>
                        <a href="{{ route('admin.industry-categories.index') }}"
                            class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('admin.industry-categories.*') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                            Категории отраслей
                        </a>
                        <a href="{{ route('admin.contacts.edit') }}"
                            class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('admin.contacts.*') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                            Контакты
                        </a>
                        <a href="{{ route('admin.faqs.index') }}"
                            class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('admin.faqs.*') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                            FAQ
                        </a>
                        <a href="{{ route('home') }}"
                            class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">
                            На сайт
                        </a>
                    </nav>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <!-- Flash Messages -->
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <!-- TinyMCE -->
    <script src="{{ asset('tinymce/js/tinymce/tinymce.min.js') }}"></script>

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- JavaScript -->
    <script>
        // Подтверждение удаления
        function confirmDelete(form) {
            if (confirm('Вы уверены, что хотите удалить этот кейс?')) {
                form.submit();
            }
        }

        // Инициализация TinyMCE
        function initTinyMCE() {
            const contentElement = document.getElementById('content');

            if (typeof tinymce !== 'undefined' && contentElement) {
                tinymce.init({
                    selector: '#content',
                    height: 400,
                    menubar: false,
                    plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table help wordcount',
                    toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | removeformat | code | help',
                    content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; }',
                    branding: false,
                    promotion: false,
                    // Настройки для загрузки изображений с компьютера
                    file_picker_callback: function(callback, value, meta) {
                        if (meta.filetype === 'image') {
                            var input = document.createElement('input');
                            input.setAttribute('type', 'file');
                            input.setAttribute('accept', 'image/*');

                            input.onchange = function() {
                                var file = this.files[0];
                                if (file) {
                                    var formData = new FormData();
                                    formData.append('file', file);
                                    formData.append('_token', document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute('content'));

                                    fetch('/admin/upload-image', {
                                            method: 'POST',
                                            body: formData,
                                            headers: {
                                                'X-Requested-With': 'XMLHttpRequest'
                                            }
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            if (data.location) {
                                                callback(data.location, {
                                                    title: file.name
                                                });
                                            } else {
                                                alert('Ошибка загрузки изображения');
                                            }
                                        })
                                        .catch(error => {
                                            console.error('Upload error:', error);
                                            alert('Ошибка загрузки изображения');
                                        });
                                }
                            };

                            input.click();
                        }
                    },
                    // Список предустановленных изображений
                    image_list: [{
                            title: 'Human 1',
                            value: '/images/human.jpeg'
                        },
                        {
                            title: 'Human 2',
                            value: '/images/human2.jpeg'
                        },
                        {
                            title: 'Human WebP',
                            value: '/images/human.webp'
                        }
                    ],
                    // Настройки для изображений
                    image_advtab: true,
                    image_caption: true,
                    image_description: true,
                    image_title: true,
                    setup: function(editor) {
                        // TinyMCE editor setup completed
                    }
                });
            }
        }

        // Инициализация при загрузке DOM
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(initTinyMCE, 100);
        });

        // Дополнительная инициализация при полной загрузке страницы
        window.addEventListener('load', function() {
            setTimeout(initTinyMCE, 200);
        });
    </script>

    @stack('scripts')
</body>

</html>
