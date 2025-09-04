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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="max-w-7xl mx-auto px-6">

        <header class="border-b border-cyan-500 py-2 flex items-center justify-between relative"
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
                            class="flex items-center text-gray-700 hover:text-cyan-500 focus:outline-none"
                            type="button" aria-haspopup="true" :aria-expanded="dd.toString()">
                            Услуги
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="dd" @mouseenter="dd = true" @mouseleave="dd = false"
                            class="absolute left-0 mt-2 bg-white shadow-lg  z-10 w-48"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            style="display: none;">
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">SEO продвижение
                                сайта</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Технический
                                аудит</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Аудит КФ</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Аудит ПФ</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Ссылочный
                                профиль</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Сбор и группировка
                                СЯ</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Составление SEO
                                стратегии</a>
                        </div>
                    </li>
                    <li><a href="#" class="text-gray-700 hover:text-cyan-500">Кейсы</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-cyan-500">Блог</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-cyan-500">Контакты</a></li>
                </ul>
            </nav>

            <!-- Кнопка "Заказать звонок" (только ≥lg) -->
            <div class="hidden lg:block ml-4">
                <button class="btn">
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
                            class="w-full text-left flex items-center justify-between text-gray-700 hover:text-cyan-500 text-lg font-medium mt-4"
                            type="button" :aria-expanded="msub.toString()" aria-haspopup="true">
                            Услуги
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
                            <a href="#" class="block mt-6 text-gray-700 hover:text-cyan-500 text-base">SEO
                                продвижение сайта</a>
                            <a href="#" class="block text-gray-700 hover:text-cyan-500 text-base">Технический
                                аудит</a>
                            <a href="#" class="block text-gray-700 hover:text-cyan-500 text-base">Аудит КФ</a>
                            <a href="#" class="block text-gray-700 hover:text-cyan-500 text-base">Аудит ПФ</a>
                            <a href="#" class="block text-gray-700 hover:text-cyan-500 text-base">Ссылочный
                                профиль</a>
                            <a href="#" class="block text-gray-700 hover:text-cyan-500 text-base">Сбор и
                                группировка СЯ</a>
                            <a href="#" class="block text-gray-700 hover:text-cyan-500 text-base">Составление
                                SEO стратегии</a>
                        </div>
                    </li>
                    <li><a href="#" class="text-gray-700 hover:text-cyan-500 text-lg font-medium">Кейсы</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-cyan-500 text-lg font-medium">Блог</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-cyan-500 text-lg font-medium">Контакты</a>
                    </li>
                </ul>
            </div>
        </header>

        <main>
            {{-- hero --}}
            <section id="hero" class="section-bg">
                <div class="flex flex-col md:flex-row gap-4">
                    <!-- Левая часть -->
                    <div
                        class="w-full md:basis-1/2 lg:basis-2/3 md:w-auto flex flex-col justify-between
                px-4 py-6
                text-center sm:text-left">

                        <!-- Заголовок -->
                        <h1 class="text-3xl leading-relaxed mb-6 sm:mb-8">
                            Загружу работой ваших менеджеров по продажам<br>SEO продвижение сайтов в интернете.
                        </h1>

                        <!-- Форма -->
                        <form action="" method="POST"
                            class="flex flex-col gap-4 w-full
             lg:flex-row lg:space-x-4 lg:space-y-0 lg:items-end lg:justify-start relative
             h-full">
                            <!-- h-full для высоты -->

                            <div class="flex-1">
                                <label for="name" class="block mb-1">Имя:</label>
                                <input type="text" id="name" name="name" required placeholder="Ваше имя"
                                    class="w-full px-3 py-2" />
                            </div>

                            <div class="flex-1">
                                <label for="phone" class="block mb-1">Телефон:</label>
                                <input type="tel" id="phone" name="phone" required pattern="\+?\d{7,15}"
                                    placeholder="+7XXXXXXXXXX" class="w-full px-3 py-2" />
                            </div>

                            <button type="submit" class="btn whitespace-nowrap px-6 py-2 self-start lg:self-auto">
                                Отправить заявку
                            </button>
                        </form>
                    </div>

                    <!-- Правая часть (картинка) -->
                    <div
                        class="w-full md:basis-1/2 lg:basis-1/3 md:w-auto flex justify-center items-stretch px-4 py-6">
                        <img src="{{ Vite::asset('resources/images/human.webp') }}" alt="right foto"
                            class="w-full h-full object-cover" />
                    </div>
            </section>
            {{-- End hero --}}

            {{-- Why we --}}
            <section id="why" class="section-bg">
                <h2 class="section-title">Почему мы</h2>
                <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <li class="element-bg p-4 flex justify-center items-start">
                        <div class="flex flex-col items-center">
                            <i class="material-icons md-48 mb-3" aria-label="Опыт более 5 лет" role="img"
                                style="font-size: 48px;">star</i>
                            <div class="text-center">
                                <h3 class="text-lg font-semibold">Опыт более 5 лет</h3>
                                <p class="text-base text-gray-600">Описание 1</p>
                            </div>
                        </div>
                    </li>

                    <li class="element-bg p-4 flex justify-center items-start">
                        <div class="flex flex-col items-center">
                            <i class="material-icons md-48 mb-3" aria-label="CRM" role="img"
                                style="font-size:48px;">dashboard</i>
                            <div class="text-center">
                                <h3 class="text-lg font-semibold">Собственная CRM</h3>
                                <p class="text-base text-gray-600">С учетом специфики продвижения сайтов и
                                    многозадачности разработана собственная
                                    сисема учета и контроля задач.</p>
                            </div>
                        </div>
                    </li>

                    <li class="element-bg p-4 flex justify-center items-start">
                        <div class="flex flex-col items-center">
                            <i class="material-icons md-48 mb-3" aria-label="Участие в тематических конференциях"
                                role="img" style="font-size:48px;">groups</i>
                            <div class="text-center">
                                <h3 class="text-lg font-semibold">Регулярное участие в тематических конференциях</h3>
                                <p class="text-base text-gray-600">Поисковые системы постоянно улучшают алгоритмы
                                    ранжирования. Мы в курсе всех
                                    изменений и следим за ситуацией.</p>
                            </div>
                        </div>
                    </li>

                    <li class="element-bg p-4 flex justify-center items-start">
                        <div class="flex flex-col items-center px-10">
                            <i class="material-icons md-48 mb-3" aria-label="Сертифицированные специалисты"
                                role="img" style="font-size:48px;">verified</i>
                            <div class="text-center">
                                <h3 class="text-lg font-semibold">Сертифицированные специалисты</h3>
                                <p class="text-base text-gray-600">Ежегодное подтверждение квалификации в Яндекс</p>
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
                        class="element-bg shadow flex flex-col
                    sm:col-span-2
                    md:row-span-2">
                        {{-- Card service top --}}
                        <div class="flex flex-col flex-[2] p-4">
                            <div class="flex flex-col items-center mb-4">
                                <i class="material-icons mb-3" style="font-size: 48px;">trending_up</i>
                                <h3 class="text-xl font-semibold mb-2 text-center"><a href="#"
                                        class="hover:text-cyan-500">SEO продвижение сайта</a></h3>
                                <p class="text-gray-600 mb-4 text-center">Комплексное продвижение вашего сайта в
                                    поисковых системах. Повышаем позиции, увеличиваем трафик и конверсию с помощью
                                    современных SEO-методик.</p>
                            </div>
                            <div class="mt-auto mb-4">
                                <button class="btn self-center">Заказать</button>
                            </div>
                        </div>
                        {{-- End card service top --}}

                        {{-- Card service bottom --}}
                        <div class="flex-[1] relative overflow-hidden -b">
                            <img src="{{ Vite::asset('resources/images/human.webp') }}" alt="SEO кейсы"
                                class="w-full h-full object-cover">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <a href="#"
                                    class="text-white text-center font-medium drop-shadow-lg hover:text-cyan-300">Успешные
                                    кейсы SEO
                                    продвижения</a>
                            </div>
                        </div>
                        {{-- End card service bottom --}}
                    </article>
                    {{-- End service card --}}

                    {{-- Card service --}}
                    <article class="element-bg shadow flex flex-col">
                        {{-- Card service top --}}
                        <div class="flex flex-col flex-[2] p-4">
                            <div class="flex flex-col items-center mb-4">
                                <i class="material-icons mb-3" style="font-size: 48px;">search</i>
                                <h3 class="text-lg font-semibold mb-2 text-center"><a href="#"
                                        class="hover:text-cyan-500">Технический аудит</a></h3>
                                <p class="text-gray-600 mb-4 text-center">Детальный анализ технических аспектов сайта
                                    для выявления и устранения ошибок, влияющих на SEO.</p>
                            </div>
                            <div class="mt-auto mb-4">
                                <button class="btn self-center">Заказать</button>
                            </div>
                        </div>
                        {{-- End card service top --}}

                        {{-- Card service bottom --}}
                        <div class="flex-[1] relative overflow-hidden -b">
                            <img src="{{ Vite::asset('resources/images/human.webp') }}" alt="Технический аудит кейсы"
                                class="w-full h-full object-cover">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <a href="#"
                                    class="text-white text-center text-sm font-medium drop-shadow-lg hover:text-cyan-300">Результаты
                                    аудита</a>
                            </div>
                        </div>
                        {{-- End card service bottom --}}
                    </article>
                    {{-- End service card --}}

                    {{-- Card service --}}
                    <article class="element-bg shadow flex flex-col">
                        {{-- Card service top --}}
                        <div class="flex flex-col flex-[2] p-4">
                            <div class="flex flex-col items-center mb-4">
                                <i class="material-icons mb-3" style="font-size: 48px;">content_copy</i>
                                <h3 class="text-lg font-semibold mb-2 text-center"><a href="#"
                                        class="hover:text-cyan-500">Аудит КФ</a></h3>
                                <p class="text-gray-600 mb-4 text-center">Анализ контент-факторов: качество текстов,
                                    уникальность, релевантность запросам пользователей.</p>
                            </div>
                            <div class="mt-auto mb-4">
                                <button class="btn self-center">Заказать</button>
                            </div>
                        </div>
                        {{-- End card service top --}}

                        {{-- Card service bottom --}}
                        <div class="flex-[1] relative overflow-hidden -b">
                            <img src="{{ Vite::asset('resources/images/human.webp') }}" alt="Аудит КФ кейсы"
                                class="w-full h-full object-cover">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <a href="#"
                                    class="text-white text-center text-sm font-medium drop-shadow-lg hover:text-cyan-300">Анализ
                                    контента</a>
                            </div>
                        </div>
                        {{-- End card service bottom --}}
                    </article>
                    {{-- End service card --}}

                    {{-- Card service --}}
                    <article class="element-bg shadow flex flex-col">
                        {{-- Card service top --}}
                        <div class="flex flex-col flex-[2] p-4">
                            <div class="flex flex-col items-center mb-4">
                                <i class="material-icons mb-3" style="font-size: 48px;">pageview</i>
                                <h3 class="text-lg font-semibold mb-2 text-center"><a href="#"
                                        class="hover:text-cyan-500">Аудит ПФ</a></h3>
                                <p class="text-gray-600 mb-4 text-center">Проверка поведенческих факторов: удобство
                                    использования, скорость загрузки, адаптивность.</p>
                            </div>
                            <div class="mt-auto mb-4">
                                <button class="btn self-center">Заказать</button>
                            </div>
                        </div>
                        {{-- End card service top --}}

                        {{-- Card service bottom --}}
                        <div class="flex-[1] relative overflow-hidden -b">
                            <img src="{{ Vite::asset('resources/images/human.webp') }}" alt="Аудит ПФ кейсы"
                                class="w-full h-full object-cover">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <a href="#"
                                    class="text-white text-center text-sm font-medium drop-shadow-lg hover:text-cyan-300">UX
                                    анализ</a>
                            </div>
                        </div>
                        {{-- End card service bottom --}}
                    </article>
                    {{-- End service card --}}

                    {{-- Card service --}}
                    <article class="element-bg shadow flex flex-col">
                        {{-- Card service top --}}
                        <div class="flex flex-col flex-[2] p-4">
                            <div class="flex flex-col items-center mb-4">
                                <i class="material-icons mb-3" style="font-size: 48px;">link</i>
                                <h3 class="text-lg font-semibold mb-2 text-center"><a href="#"
                                        class="hover:text-cyan-500">Ссылочный профиль</a></h3>
                                <p class="text-gray-600 mb-4 text-center">Анализ и оптимизация ссылочной массы для
                                    улучшения авторитетности сайта в поисковых системах.</p>
                            </div>
                            <div class="mt-auto mb-4">
                                <button class="btn self-center">Заказать</button>
                            </div>
                        </div>
                        {{-- End card service top --}}

                        {{-- Card service bottom --}}
                        <div class="flex-[1] relative overflow-hidden -b">
                            <img src="{{ Vite::asset('resources/images/human.webp') }}" alt="Ссылочный профиль кейсы"
                                class="w-full h-full object-cover">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <a href="#"
                                    class="text-white text-center text-sm font-medium drop-shadow-lg hover:text-cyan-300">Ссылочная
                                    стратегия</a>
                            </div>
                        </div>
                        {{-- End card service bottom --}}
                    </article>
                    {{-- End service card --}}

                    {{-- Card service --}}
                    <article class="element-bg shadow flex flex-col">
                        {{-- Card service top --}}
                        <div class="flex flex-col flex-[2] p-4">
                            <div class="flex flex-col items-center mb-4">
                                <i class="material-icons mb-3" style="font-size: 48px;">category</i>
                                <h3 class="text-lg font-semibold mb-2 text-center"><a href="#"
                                        class="hover:text-cyan-500">Сбор и группировка СЯ</a></h3>
                                <p class="text-gray-600 mb-4 text-center">Систематизация семантического ядра для
                                    эффективного продвижения по целевым запросам.</p>
                            </div>
                            <div class="mt-auto mb-4">
                                <button class="btn self-center">Заказать</button>
                            </div>
                        </div>
                        {{-- End card service top --}}

                        {{-- Card service bottom --}}
                        <div class="flex-[1] relative overflow-hidden -b">
                            <img src="{{ Vite::asset('resources/images/human.webp') }}" alt="СЯ кейсы"
                                class="w-full h-full object-cover">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <a href="#"
                                    class="text-white text-center text-sm font-medium drop-shadow-lg hover:text-cyan-300">Семантическое
                                    ядро</a>
                            </div>
                        </div>
                        {{-- End card service bottom --}}
                    </article>
                    {{-- End service card --}}

                    {{-- Card service --}}
                    <article class="element-bg shadow flex flex-col">
                        {{-- Card service top --}}
                        <div class="flex flex-col flex-[2] p-4">
                            <div class="flex flex-col items-center mb-4">
                                <i class="material-icons mb-3" style="font-size: 48px;">assessment</i>
                                <h3 class="text-lg font-semibold mb-2 text-center"><a href="#"
                                        class="hover:text-cyan-500">Составление SEO стратегии</a></h3>
                                <p class="text-gray-600 mb-4 text-center">Разработка комплексного плана продвижения с
                                    учетом специфики бизнеса и конкурентной среды.</p>
                            </div>
                            <div class="mt-auto mb-4">
                                <button class="btn self-center">Заказать</button>
                            </div>
                        </div>
                        {{-- End card service top --}}

                        {{-- Card service bottom --}}
                        <div class="flex-[1] relative overflow-hidden -b">
                            <img src="{{ Vite::asset('resources/images/human.webp') }}" alt="SEO стратегия кейсы"
                                class="w-full h-full object-cover">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <a href="#"
                                    class="text-white text-center text-sm font-medium drop-shadow-lg hover:text-cyan-300">SEO
                                    план</a>
                            </div>
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
            <section id="contact-form"
                class="section-bg flex flex-col lg:items-start items-center lg:flex-row lg:justify-around">
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
                            <button type="submit" class="btn">Отправить</button>
                        </div>
                    </form>
                </div>
            </section>
            {{-- End form --}}
        </main>

        {{-- Footer --}}
        <footer class="mt-16 bg-gray-800 text-gray-300">
            <div class="px-6 py-10 grid grid-cols-1 gap-10 sm:grid-cols-2 md:grid-cols-4">
                {{-- Brand / About --}}
                <div>
                    <a href="#" class="font-train text-[34px] text-white">SobAlex</a>
                    <p class="mt-2 text-sm text-gray-400">Оптимизация сайтов и SEO продвижение.</p>

                    <div class="mt-5 flex items-center space-x-4">
                        <a href="#" aria-label="Telegram" class="hover:text-cyan-400 transition">
                            <i class="material-icons">send</i>
                        </a>
                        <a href="#" aria-label="YouTube" class="hover:text-cyan-400 transition">
                            <i class="material-icons">smart_display</i>
                        </a>
                        <a href="#" aria-label="GitHub" class="hover:text-cyan-400 transition">
                            <i class="material-icons">code</i>
                        </a>
                    </div>
                </div>

                {{-- Services --}}
                <div>
                    <h4 class="text-white font-semibold tracking-wide uppercase text-sm">Услуги</h4>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#" class="hover:text-cyan-400 transition">SEO продвижение</a></li>
                        <li><a href="#" class="hover:text-cyan-400 transition">Технический аудит</a></li>
                        <li><a href="#" class="hover:text-cyan-400 transition">Аудит КФ</a></li>
                        <li><a href="#" class="hover:text-cyan-400 transition">Аудит ПФ</a></li>
                    </ul>
                </div>

                {{-- Blog/Links --}}
                <div>
                    <h4 class="text-white font-semibold tracking-wide uppercase text-sm">Блог</h4>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#" class="hover:text-cyan-400 transition">Последние статьи</a></li>
                        <li><a href="#" class="hover:text-cyan-400 transition">Кейсы</a></li>
                        <li><a href="#" class="hover:text-cyan-400 transition">Гайды</a></li>
                        <li><a href="#" class="hover:text-cyan-400 transition">Новости</a></li>
                    </ul>
                </div>

                {{-- Contacts --}}
                <div>
                    <h4 class="text-white font-semibold tracking-wide uppercase text-sm">Контакты</h4>
                    <ul class="mt-4 space-y-3">
                        <li class="flex items-start space-x-3">
                            <i class="material-icons mt-0.5">place</i>
                            <span>г. Санкт-Петербург, Невский пр., 7</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <i class="material-icons mt-0.5">call</i>
                            <a href="tel:88001234567" class="hover:text-cyan-400 transition">8 800 123 45 67</a>
                        </li>
                        <li class="flex items-start space-x-3">
                            <i class="material-icons mt-0.5">mail</i>
                            <a href="mailto:info@sobalex.com"
                                class="hover:text-cyan-400 transition">info@sobalex.com</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div
                class="px-6 py-4 border-t border-gray-700 text-sm flex flex-col sm:flex-row items-center justify-between">
                <p class="mb-2 sm:mb-0">© {{ date('Y') }} SobAlex. Все права защищены.</p>
                <div class="flex items-center space-x-4">
                    <a href="#" class="hover:text-cyan-400 transition">Политика конфиденциальности</a>
                    <span class="text-gray-600">|</span>
                    <a href="#" class="hover:text-cyan-400 transition">Пользовательское соглашение</a>
                </div>
            </div>
        </footer>
        {{-- End footer --}}
    </div>
</body>

</html>
