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
        {{-- header --}}
        <header class="flex justify-between items-center py-7 border-b border-b-cyan-500">
            <div>
                <a class="font-train text-4xl text-cyan-500" href="#">SobAlex</a>
                <p>Оптимизация сайтов</p>
            </div>

            <nav class="basis-2/4" aria-label="Главное меню">
                <ul class="flex justify-center">
                    <li><a class="p-4" href="#">Услуги</a></li>
                    <li><a class="p-4" href="#">Блог</a></li>
                    <li><a class="p-4" href="#">Кейсы</a></li>
                    <li><a class="p-4" href="#">Контакты</a></li>
                </ul>
            </nav>

            <button
                class="bg-transparent hover:bg-gray-500 hover:text-white py-2 px-4 border border-gray-700 hover:border-transparent">Связаться
                с нами
            </button>
        </header>

        <main>
            {{-- hero --}}
            <section id="hero" class="section-bg">
                <h1 class="section-title">hero</h1>
                <div class="flex flex-col sm:flex-row gap-4">
                    <div class="bg-gray-200 w-full sm:basis-1/2 sm:w-auto">
                        <p>left text</p>
                        <button>call</button>
                    </div>
                    <div class="bg-gray-200 w-full sm:basis-1/2 sm:w-auto">
                        <img src="" alt="right foto">
                    </div>
                </div>
            </section>
            {{-- End hero --}}

            {{-- Why we --}}
            <section id="why" class="section-bg">
                <h2 class="section-title">Почему мы</h2>
                <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                    <li class="bg-gray-200">
                        <div>
                            <img src="" alt="icon1">
                            <div>
                                <h3>Потому что 1</h3>
                                <p>Описание 1</p>
                            </div>
                        </div>
                    </li>

                    <li class="bg-gray-200">
                        <div>
                            <img src="" alt="icon2">
                            <div>
                                <h3>Потому что 2</h3>
                                <p>Описание 2</p>
                            </div>
                        </div>
                    </li>

                    <li class="bg-gray-200">
                        <div>
                            <img src="" alt="icon3">
                            <div>
                                <h3>Потому что 3</h3>
                                <p>Описание 3</p>
                            </div>
                        </div>
                    </li>

                    <li class="bg-gray-200">
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
                        class="bg-gray-100 p-4 rounded shadow
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
                    <article class="bg-gray-100 p-4 rounded shadow">
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
                    <article class="bg-gray-100 p-4 rounded shadow">
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
                    <article class="bg-gray-100 p-4 rounded shadow">
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
                    <article class="bg-gray-100 p-4 rounded shadow">
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
                    <article class="bg-gray-100 p-4 rounded shadow">
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
                    <article class="bg-gray-100 p-4 rounded shadow">
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
                <div class="w-full sm:w-2/3 md:basis-1/3 mb-9 lg:mb-0">
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
                <div class="w-full sm:w-2/3 md:basis-1/3">
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
        <footer class="section-bg grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-4">
            {{-- Footer col --}}
            <div>
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
            <div>
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
            <div>
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
            <div>
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
