@extends('layouts.app')

@section('title', 'SEO продвижение сайтов в интернете new')

@section('content')
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
                <form action="{{ route('contact.hero') }}" method="POST"
                    class="flex flex-col gap-4 w-full
                lg:flex-row lg:space-x-4 lg:space-y-0 lg:items-end lg:justify-start relative
                h-full">
                    <!-- h-full для высоты -->
                    @csrf

                    <div class="flex-1">
                        <label for="name_hero" class="block mb-1">Имя:</label>
                        <input type="text" id="name_hero" name="name" required placeholder="Ваше имя"
                            class="w-full px-3 py-2" aria-required="true" aria-label="Ваше имя"
                            aria-invalid="@error('name', 'hero') true @else false @enderror"
                            aria-describedby="name_hero_error" />
                        @error('name', 'hero')
                            <p id="name_hero_error" class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex-1">
                        <label for="phone_hero" class="block mb-1">Телефон:</label>
                        <input type="tel" id="phone_hero" name="phone" required pattern="\+?\d{7,15}"
                            placeholder="+7XXXXXXXXXX" class="w-full px-3 py-2" aria-required="true" aria-label="Телефон"
                            aria-invalid="@error('phone', 'hero') true @else false @enderror"
                            aria-describedby="phone_hero_error" />
                        @error('phone', 'hero')
                            <p id="phone_hero_error" class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn whitespace-nowrap px-6 py-2 self-start lg:self-auto"
                        aria-label="Отправить заявку">
                        Отправить заявку
                    </button>
                </form>
            </div>

            <!-- Правая часть (картинка) -->
            <div class="w-full md:basis-1/2 lg:basis-1/3 md:w-auto flex justify-center items-stretch px-4 py-6">
                <img src="{{ Vite::asset('resources/images/human.webp') }}" alt="right photo"
                    class="w-full h-full object-cover" loading="eager" decoding="async" fetchpriority="high" />
            </div>
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
                            система учета и контроля задач.</p>
                    </div>
                </div>
            </li>

            <li class="element-bg p-4 flex justify-center items-start">
                <div class="flex flex-col items-center">
                    <i class="material-icons md-48 mb-3" aria-label="Участие в тематических конференциях" role="img"
                        style="font-size:48px;">groups</i>
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
                    <i class="material-icons md-48 mb-3" aria-label="Сертифицированные специалисты" role="img"
                        style="font-size:48px;">verified</i>
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

        <div class="grid grid-cols-1 gap-4
        sm:grid-cols-2
        md:grid-cols-3
        lg:grid-cols-4 lg:gap-6">
            {{-- Card service --}}
            <article class="element-bg shadow flex flex-col
            sm:col-span-2
            md:row-span-2">
                {{-- Card service top --}}
                <div class="flex flex-col flex-[2] p-4">
                    <div class="flex flex-col items-center mb-4">
                        <i class="material-icons mb-3" style="font-size: 48px;">trending_up</i>
                        <h3 class="text-xl font-semibold mb-2 text-center"><a href="#" class="hover:text-cyan-500">SEO
                                продвижение сайта</a></h3>
                        <p class="text-gray-600 mb-4 text-center">Комплексное продвижение вашего сайта в
                            поисковых системах. Повышаем позиции, увеличиваем трафик и конверсию с помощью
                            современных SEO-методик.</p>
                    </div>
                    <div class="mt-auto mb-4">
                        <button class="btn self-center"
                            onclick="openServiceOrderModal('SEO продвижение сайта')">Заказать</button>
                    </div>
                </div>
                {{-- End card service top --}}

                {{-- Card service bottom --}}
                <div class="flex-[1] relative overflow-hidden -b">
                    <img src="{{ Vite::asset('resources/images/human.webp') }}" alt="SEO кейсы"
                        class="w-full h-full object-cover" loading="lazy" decoding="async">
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
                        <button class="btn self-center"
                            onclick="openServiceOrderModal('Технический аудит')">Заказать</button>
                    </div>
                </div>
                {{-- End card service top --}}

                {{-- Card service bottom --}}
                <div class="flex-[1] relative overflow-hidden -b">
                    <img src="{{ Vite::asset('resources/images/human.webp') }}" alt="Технический аудит кейсы"
                        class="w-full h-full object-cover" loading="lazy" decoding="async">
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
                        <button class="btn self-center" onclick="openServiceOrderModal('Аудит КФ')">Заказать</button>
                    </div>
                </div>
                {{-- End card service top --}}

                {{-- Card service bottom --}}
                <div class="flex-[1] relative overflow-hidden -b">
                    <img src="{{ Vite::asset('resources/images/human.webp') }}" alt="Аудит КФ кейсы"
                        class="w-full h-full object-cover" loading="lazy" decoding="async">
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
                        <button class="btn self-center" onclick="openServiceOrderModal('Аудит ПФ')">Заказать</button>
                    </div>
                </div>
                {{-- End card service top --}}

                {{-- Card service bottom --}}
                <div class="flex-[1] relative overflow-hidden -b">
                    <img src="{{ Vite::asset('resources/images/human.webp') }}" alt="Аудит ПФ кейсы"
                        class="w-full h-full object-cover" loading="lazy" decoding="async">
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
                        <button class="btn self-center"
                            onclick="openServiceOrderModal('Ссылочный профиль')">Заказать</button>
                    </div>
                </div>
                {{-- End card service top --}}

                {{-- Card service bottom --}}
                <div class="flex-[1] relative overflow-hidden -b">
                    <img src="{{ Vite::asset('resources/images/human.webp') }}" alt="Ссылочный профиль кейсы"
                        class="w-full h-full object-cover" loading="lazy" decoding="async">
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
                        <button class="btn self-center"
                            onclick="openServiceOrderModal('Сбор и группировка СЯ')">Заказать</button>
                    </div>
                </div>
                {{-- End card service top --}}

                {{-- Card service bottom --}}
                <div class="flex-[1] relative overflow-hidden -b">
                    <img src="{{ Vite::asset('resources/images/human.webp') }}" alt="СЯ кейсы"
                        class="w-full h-full object-cover" loading="lazy" decoding="async">
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
                        <button class="btn self-center"
                            onclick="openServiceOrderModal('Составление SEO стратегии')">Заказать</button>
                    </div>
                </div>
                {{-- End card service top --}}

                {{-- Card service bottom --}}
                <div class="flex-[1] relative overflow-hidden -b">
                    <img src="{{ Vite::asset('resources/images/human.webp') }}" alt="SEO стратегия кейсы"
                        class="w-full h-full object-cover" loading="lazy" decoding="async">
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
    <section id="contact-form" class="section-bg flex flex-col lg:items-start items-center lg:flex-row lg:justify-around">
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
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
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

                        <a href="mailto:hello@example.com" class="text-blue-600 hover:text-blue-800">info@sobalex.com</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Column -->
        <div class="w-full sm:w-2/3 md:basis-1/3">
            <h3 class="section-title" id="contact_form_title">Отправить заявку</h3>

            <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4"
                aria-labelledby="contact_form_title">
                @csrf
                <div>
                    <label for="name_contact">Имя</label>

                    <input type="text" name="name" id="name_contact" required aria-required="true"
                        aria-label="Имя" class="mt-1 block w-full bg-white focus:ring-blue-500 focus:border-blue-500"
                        aria-invalid="@error('name', 'contact') true @else false @enderror"
                        aria-describedby="name_contact_error">
                    @error('name', 'contact')
                        <p id="name_contact_error" class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email_contact">Email</label>

                    <input type="email" name="email" id="email_contact" required aria-required="true"
                        aria-label="Email" class="mt-1 block w-full bg-white focus:ring-blue-500 focus:border-blue-500"
                        aria-invalid="@error('email', 'contact') true @else false @enderror"
                        aria-describedby="email_contact_error">
                    @error('email', 'contact')
                        <p id="email_contact_error" class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="phone_contact">Телефон</label>

                    <input type="tel" name="phone" id="phone_contact" aria-label="Телефон"
                        class="mt-1 block w-full bg-white focus:ring-blue-500 focus:border-blue-500"
                        aria-invalid="@error('phone', 'contact') true @else false @enderror"
                        aria-describedby="phone_contact_error">
                    @error('phone', 'contact')
                        <p id="phone_contact_error" class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="message_contact">Сообщение</label>

                    <textarea name="message" id="message_contact" rows="5" required aria-required="true" aria-label="Сообщение"
                        class="mt-1 block w-full bg-white focus:ring-blue-500 focus:border-blue-500"
                        aria-invalid="@error('message', 'contact') true @else false @enderror" aria-describedby="message_contact_error">
                    </textarea>
                    @error('message', 'contact')
                        <p id="message_contact_error" class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="btn" aria-label="Отправить сообщение">Отправить</button>
                </div>
            </form>
        </div>
    </section>
    {{-- End form --}}
@endsection
