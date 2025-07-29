<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SEO продвижение сайтов в интернете</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Train+One&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="max-w-7xl mx-auto px-6">

        <header class="w-full bg-white border-b border-gray-200 px-4 py-2 flex items-center justify-between relative"
            x-data="{ open: false }">
            <!-- Логотип слева -->
            <div>
                <a href="#" class="font-train text-[38px] text-cyan-500 whitespace-nowrap">SobAlex
                </a>

                <p class="text-md">Оптимизация сайтов</p>
            </div>

            <!-- Главное меню (по центру ≥lg) -->
            <nav class="flex-1 flex items-center justify-center">
                <ul class="hidden lg:flex items-center space-x-8">
                    <li class="relative" x-data="{ dd: false }">
                        <button @mouseenter="dd = true" @mouseleave="dd = false" @click="dd = !dd"
                            class="flex items-center text-gray-700 hover:text-blue-600 focus:outline-none"
                            type="button" aria-haspopup="true" :aria-expanded="dd.toString()">
                            Первый пункт
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="dd" @mouseenter="dd = true" @mouseleave="dd = false"
                            class="absolute left-0 mt-2 bg-white shadow-lg rounded z-10 w-48"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            style="display: none;">
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Пункт 2.1</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Пункт 2.2</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Пункт 2.3</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Пункт 2.4</a>
                        </div>
                    </li>
                    <li><a href="#" class="text-gray-700 hover:text-blue-600">Второй пункт</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-blue-600">Третий пункт</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-blue-600">Четвёртый пункт</a></li>
                </ul>
            </nav>

            <!-- Кнопка "Заказать звонок" (только ≥lg) -->
            <div class="hidden lg:block ml-4">
                <button class="bg-blue-600 text-white px-6 py-2 rounded shadow hover:bg-blue-700 transition">
                    Заказать звонок
                </button>
            </div>

            <!-- Бургер справа (<lg) -->
            <button @click="open = !open" class="lg:hidden flex-shrink-0 focus:outline-none ml-4"
                aria-label="Открыть меню" :aria-expanded="open.toString()">
                <svg x-show="!open" class="w-7 h-7 text-gray-700" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" style="display: block;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="open" class="w-7 h-7 text-gray-700" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" style="display: none;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Мобильное меню -->
            <div x-show="open" @click.away="open = false"
                class="absolute left-0 right-0 top-full bg-white shadow-lg z-50 lg:hidden"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform -translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform -translate-y-2" style="display: none;">
                <ul class="flex flex-col space-y-6 p-6">
                    <li x-data="{ msub: false }">
                        <button @click="msub = !msub"
                            class="w-full text-left flex items-center justify-between text-gray-700 hover:text-blue-600 text-lg font-medium mt-4"
                            type="button" :aria-expanded="msub.toString()" aria-haspopup="true">
                            Первый пункт
                            <svg class="w-5 h-5 ml-2 transform transition-transform duration-200"
                                :class="msub ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="msub" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 max-h-0" x-transition:enter-end="opacity-100 max-h-96"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 max-h-96" x-transition:leave-end="opacity-0 max-h-0"
                            class="pl-6 space-y-6 overflow-hidden" style="display: none;">
                            <a href="#" class="block mt-6 text-gray-700 hover:text-blue-600 text-base">Пункт
                                2.1</a>
                            <a href="#" class="block text-gray-700 hover:text-blue-600 text-base">Пункт 2.2</a>
                            <a href="#" class="block text-gray-700 hover:text-blue-600 text-base">Пункт 2.3</a>
                            <a href="#" class="block text-gray-700 hover:text-blue-600 text-base">Пункт 2.4</a>
                        </div>
                    </li>
                    <li><a href="#" class="text-gray-700 hover:text-blue-600 text-lg font-medium">Второй
                            пункт</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-blue-600 text-lg font-medium">Третий
                            пункт</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-blue-600 text-lg font-medium">Четвёртый
                            пункт</a></li>
                </ul>
            </div>
        </header>

        <main>
            {{-- hero --}}
            <section id="hero" class="section-bg">
                <h1 class="section-title">hero</h1>
                <div class="flex flex-col sm:flex-row gap-4">
                    <div class="element-bg w-full sm:basis-1/2 sm:w-auto">
                        <p>Обеспечу ваших менеджеров по продажам работой - SEO продвижение сайтов в интернете.</p>
                        <button>call</button>
                    </div>
                    <div class="w-full sm:basis-1/2 sm:w-auto">
                        <img src="{{ Vite::asset('resources/images/human.webp') }}" alt="right foto">
                    </div>
                </div>
            </section>
            {{-- End hero --}}

            {{-- Why we --}}
            <section id="why" class="section-bg">
                <h2 class="section-title">Почему мы</h2>
                <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                    <li class="element-bg">
                        <div>
                            <img src="" alt="icon1">
                            <div>
                                <h3>Потому что 1</h3>
                                <p>Описание 1</p>
                            </div>
                        </div>
                    </li>

                    <li class="element-bg">
                        <div>
                            <img src="" alt="icon2">
                            <div>
                                <h3>Потому что 2</h3>
                                <p>Описание 2</p>
                            </div>
                        </div>
                    </li>

                    <li class="element-bg">
                        <div>
                            <img src="" alt="icon3">
                            <div>
                                <h3>Потому что 3</h3>
                                <p>Описание 3</p>
                            </div>
                        </div>
                    </li>

                    <li class="element-bg">
                        <div>
                            <img src="" alt="icon4">
                            <div>
                                <h3>Потому что 4</h3>
                                <p>Описание 4</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </section>
            {{-- End why we --}}

            {{-- Service --}}
            <section id="services" class="section-bg">
                <h2 class="section-title">Услуги</h2>

                <div
                    class="grid grid-cols-1 gap-4
           sm:grid-cols-2
           md:grid-cols-3
           lg:grid-cols-4 lg:gap-6">
                    {{-- Card service --}}
                    <article
                        class="element-bg p-4 rounded shadow
                    sm:col-span-2
                    md:row-span-2">
                        {{-- Card service top --}}
                        <div>
                            <img src="" alt="icon Кейсы">
                            <div>
                                <h3><a href="#">SEO продвижение сайта</a></h3>
                                <p>Краткое описание</p>
                            </div>
                            <button>Заказать</button>
                        </div>
                        {{-- End card service top --}}

                        {{-- Card service bottom --}}
                        <div>
                            <a href="#"><img src="" alt="Кейсы"></a>
                            <p>Кейсы текст поверх изображения</p>
                        </div>
                        {{-- End card service bottom --}}
                    </article>
                    {{-- End service card --}}

                    {{-- Card service --}}
                    <article class="element-bg p-4 rounded shadow">
                        {{-- Card service top --}}
                        <div>
                            <img src="" alt="icon">
                            <div>
                                <h3><a href="#">Технический аудит</a></h3>
                                <p>Краткое описание</p>
                            </div>
                            <button>Заказать</button>
                        </div>
                        {{-- End card service top --}}

                        {{-- Card service bottom --}}
                        <div>
                            <a href="#"><img src="" alt="Кейсы"></a>
                            <p>Кейсы текст поверх изображения</p>
                        </div>
                        {{-- End card service bottom --}}
                    </article>
                    {{-- End service card --}}

                    {{-- Card service --}}
                    <article class="element-bg p-4">
                        {{-- Card service top --}}
                        <div>
                            <img src="" alt="icon Кейсы">
                            <div>
                                <h3><a href="#">Аудит КФ</a></h3>
                                <p>Краткое описание</p>
                            </div>
                            <button>Заказать</button>
                        </div>
                        {{-- End card service top --}}

                        {{-- Card service bottom --}}
                        <div>
                            <a href="#"><img src="" alt="Кейсы"></a>
                            <p>Кейсы текст поверх изображения</p>
                        </div>
                        {{-- End card service bottom --}}
                    </article>
                    {{-- End service card --}}

                    {{-- Card service --}}
                    <article class="element-bg p-4 rounded shadow">
                        {{-- Card service top --}}
                        <div>
                            <img src="" alt="icon Кейсы">
                            <div>
                                <h3><a href="#">Аудит ПФ</a></h3>
                                <p>Краткое описание</p>
                            </div>
                            <button>Заказать</button>
                        </div>
                        {{-- End card service top --}}

                        {{-- Card service bottom --}}
                        <div>
                            <a href="#"><img src="" alt="Кейсы"></a>
                            <p>Кейсы текст поверх изображения</p>
                        </div>
                        {{-- End card service bottom --}}
                    </article>
                    {{-- End service card --}}

                    {{-- Card service --}}
                    <article class="element-bg p-4 rounded shadow">
                        {{-- Card service top --}}
                        <div>
                            <img src="" alt="icon Кейсы">
                            <div>
                                <h3><a href="#">Ссылочный профиль</a></h3>
                                <p>Краткое описание</p>
                            </div>
                            <button>Заказать</button>
                        </div>
                        {{-- End card service top --}}

                        {{-- Card service bottom --}}
                        <div>
                            <a href="#"><img src="" alt="Кейсы"></a>
                            <p>Кейсы текст поверх изображения</p>
                        </div>
                        {{-- End card service bottom --}}
                    </article>
                    {{-- End service card --}}

                    {{-- Card service --}}
                    <article class="element-bg p-4 rounded shadow">
                        {{-- Card service top --}}
                        <div>
                            <img src="" alt="icon Кейсы">
                            <div>
                                <h3><a href="#">Сбор и группировка СЯ</a></h3>
                                <p>Краткое описание</p>
                            </div>
                            <button>Заказать</button>
                        </div>
                        {{-- End card service top --}}

                        {{-- Card service bottom --}}
                        <div>
                            <a href="#"><img src="" alt="Кейсы"></a>
                            <p>Кейсы текст поверх изображения</p>
                        </div>
                        {{-- End card service bottom --}}
                    </article>
                    {{-- End service card --}}

                    {{-- Card service --}}
                    <article class="element-bg p-4 rounded shadow">
                        {{-- Card service top --}}
                        <div>
                            <img src="" alt="icon Кейсы">
                            <div>
                                <h3><a href="#">Составление SEO стратегии</a></h3>
                                <p>Краткое описание</p>
                            </div>
                            <button>Заказать</button>
                        </div>
                        {{-- End card service top --}}

                        {{-- Card service bottom --}}
                        <div>
                            <a href="#"><img src="" alt="Кейсы"></a>
                            <p>Кейсы текст поверх изображения</p>
                        </div>
                        {{-- End card service bottom --}}
                    </article>
                    {{-- End service card --}}
                </div>
            </section>
            {{-- End service --}}

            {{-- Review --}}
            <section id="reviews" class="section-bg">
                <h2 class="section-title">Отзывы</h2>
                <div>Код яндекса виджет</div>
            </section>
            {{-- End review --}}

            {{-- Form --}}
            <section id="contact-form" class="section-bg flex flex-col items-center lg:flex-row lg:justify-around">
                <!-- Contact Information Column -->
                <div class="element-bg w-full sm:w-2/3 md:basis-1/3 mb-9 lg:mb-0">
                    <h2 class="section-title">Контакты</h2>

                    <p class="mb-6">Заполните форму, и наша команда свяжется с вами в течение 24 часов. Или
                        свяжитесь с нами напрямую:</p>

                    <div class="space-y-4">
                        <!-- Address -->
                        <div class="flex items-start space-x-3">
                            <!-- Location Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 flex-shrink-0 mt-0.5"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>

                            <div>
                                <h3>Наш офис:</h3>
                                <p>г. Санкт-Петербург, Невский проспект, 7</p>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-start space-x-3">
                            <!-- Phone Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 flex-shrink-0 mt-0.5"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>

                            <div>
                                <h3 class="font-medium text-gray-700">Телефон:</h3>
                                <!-- Replace with your actual phone number -->
                                <a href="tel:88001234567" class="text-blue-600 hover:text-blue-800">8 800 123 45
                                    67</a>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start space-x-3">
                            <!-- Mail Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 flex-shrink-0 mt-0.5"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>

                            <div>
                                <h3 class="font-medium text-gray-700">Email:</h3>

                                <a href="mailto:hello@example.com"
                                    class="text-blue-600 hover:text-blue-800">info@sobalex.com</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Column -->
                <div class="element-bg w-full sm:w-2/3 md:basis-1/3">
                    <h3 class="section-title">Отправить заявку</h3>

                    <form action="#" method="POST" class="space-y-4">
                        <div>
                            <label for="name">Имя</label>

                            <input type="text" name="name" id="name" required
                                class="mt-1 block w-full bg-white focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div>
                            <label for="email">Email</label>

                            <input type="email" name="email" id="email" required
                                class="mt-1 block w-full bg-white focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div>
                            <label for="phone">Телефон</label>

                            <input type="tel" name="phone" id="phone"
                                class="mt-1 block w-full bg-white focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div>
                            <label for="message">Сообщение</label>

                            <textarea name="message" id="message" rows="5" required
                                class="mt-1 block w-full bg-white focus:ring-blue-500 focus:border-blue-500">
                                </textarea>
                        </div>

                        <div>
                            <button type="submit">Отправить</button>
                        </div>
                    </form>
                </div>
            </section>
            {{-- End form --}}
        </main>

        {{-- Footer --}}
        <footer class="mt-7 grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-4">
            {{-- Footer col --}}
            <div class="element-bg">
                <p>Контакты</p>

                <ul>
                    <li><a href="#">Item 1 col 1</a></li>
                    <li><a href="#">Item 2 col 1</a></li>
                    <li><a href="#">Item 3 col 1</a></li>
                    <li><a href="#">Item 4 col 1</a></li>
                </ul>
            </div>
            {{-- End footer col --}}

            {{-- Footer col --}}
            <div class="element-bg">
                <p>Услуги</p>

                <ul>
                    <li><a href="#">Item 1 col 2</a></li>
                    <li><a href="#">Item 2 col 2</a></li>
                    <li><a href="#">Item 3 col 2</a></li>
                    <li><a href="#">Item 4 col 2</a></li>
                </ul>
            </div>
            {{-- End footer col --}}

            {{-- Footer col --}}
            <div class="element-bg">
                <p>Блог</p>

                <ul>
                    <li><a href="#">Item 1 col 3</a></li>
                    <li><a href="#">Item 2 col 3</a></li>
                    <li><a href="#">Item 3 col 3</a></li>
                    <li><a href="#">Item 4 col 3</a></li>
                </ul>
            </div>
            {{-- End footer col --}}

            {{-- Footer col --}}
            <div class="element-bg">
                <p>Информация</p>

                <ul>
                    <li><a href="#">Item 1 col 4</a></li>
                    <li><a href="#">Item 2 col 4</a></li>
                    <li><a href="#">Item 3 col 4</a></li>
                    <li><a href="#">Item 4 col 4</a></li>
                </ul>
            </div>
            {{-- End footer col --}}
        </footer>
        {{-- End footer --}}
    </div>
</body>

</html>
