@extends('layouts.app')

@section('title', 'SEO продвижение сайтов в интернете')

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
                    @if($heroSection)
                        {{ $heroSection->title }}
                    @else
                        Загружу работой ваших менеджеров по продажам<br>SEO продвижение сайтов в интернете.
                    @endif
                </h1>

                @if($heroSection && $heroSection->description)
                    <!-- Описание -->
                    <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                        {{ $heroSection->description }}
                    </p>
                @endif

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
                            aria-invalid="@if (isset($errors) && $errors->has('name')) true @else false @endif"
                            aria-describedby="name_hero_error" />
                        @if (isset($errors) && $errors->has('name'))
                            <p id="name_hero_error" class="mt-1 text-sm text-red-600">{{ $errors->first('name') }}</p>
                        @endif
                    </div>

                    <div class="flex-1">
                        <label for="phone_hero" class="block mb-1">Телефон:</label>
                        <input type="tel" id="phone_hero" name="phone" required placeholder="+7 (999) 999-99-99"
                            class="w-full px-3 py-2" aria-required="true" aria-label="Телефон"
                            aria-invalid="@if (isset($errors) && $errors->has('phone')) true @else false @endif"
                            aria-describedby="phone_hero_error" />
                        @if (isset($errors) && $errors->has('phone'))
                            <p id="phone_hero_error" class="mt-1 text-sm text-red-600">{{ $errors->first('phone') }}</p>
                        @endif
                    </div>

                    <button type="submit" class="btn whitespace-nowrap px-6 py-2 self-start lg:self-auto"
                        aria-label="@if($heroSection) {{ $heroSection->button_text }} @else Отправить заявку @endif">
                        @if($heroSection)
                            {{ $heroSection->button_text }}
                        @else
                            Отправить заявку
                        @endif
                    </button>
                </form>
            </div>

            <!-- Правая часть (картинка) -->
            <div class="w-full md:basis-1/2 lg:basis-1/3 md:w-auto flex justify-center items-stretch px-4 py-6">
                @if($heroSection && $heroSection->image)
                    <img src="{{ $heroSection->image_url }}" alt="{{ $heroSection->title }}" class="w-full h-full object-cover"
                        loading="eager" decoding="async" fetchpriority="high" />
                @else
                    <img src="{{ asset('images/human.webp') }}" alt="right photo" class="w-full h-full object-cover"
                        loading="eager" decoding="async" fetchpriority="high" />
                @endif
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
                    <i class="material-icons text-cyan-500 md-48 mb-3" aria-label="Опыт более 5 лет" role="img"
                        style="font-size: 48px;">star</i>
                    <div class="text-center">
                        <h3 class="text-lg font-semibold">Опыт более 5 лет</h3>
                        <p class="text-base text-gray-600">Описание 1</p>
                    </div>
                </div>
            </li>

            <li class="element-bg p-4 flex justify-center items-start">
                <div class="flex flex-col items-center">
                    <i class="material-icons text-cyan-500 md-48 mb-3" aria-label="CRM" role="img"
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
                    <i class="material-icons text-cyan-500 md-48 mb-3" aria-label="Участие в тематических конференциях"
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
                    <i class="material-icons text-cyan-500 md-48 mb-3" aria-label="Сертифицированные специалисты"
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

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 lg:gap-6">
            @forelse($featuredServices as $service)
                <article class="element-bg shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col @if($loop->first) sm:col-span-2 md:row-span-1 @endif">
                    <div class="flex flex-col flex-[2] p-4">
                        <div class="flex flex-col items-center mb-4">
                            @if($service->icon)
                                <i class="material-icons mb-3" style="font-size: 48px; color: {{ $service->color ?? '#06b6d4' }};">{{ $service->icon }}</i>
                            @endif
                            <h3 class="@if($loop->first) text-xl @else text-lg @endif font-semibold mb-2 text-center">
                                <a href="{{ route('services.show', $service->slug) }}" class="hover:text-cyan-500">
                                    {{ $service->title }}
                                </a>
                            </h3>
                            <p class="text-gray-600 mb-4 text-center">{{ $service->description }}</p>

                            @if($service->price_from)
                                <div class="text-sm text-gray-500 mb-2">{{ $service->formatted_price }}</div>
                            @endif
                        </div>
                        <div class="mt-auto mb-4">
                            <button class="btn self-center" onclick="openServiceOrderModal('{{ $service->title }}')">
                                Заказать
                            </button>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500">Услуги временно недоступны</p>
                </div>
            @endforelse
        </div>

        @if($featuredServices->count() > 0)
            <div class="text-center mt-8">
                <a href="{{ route('services.index') }}" class="btn-outline">
                    Все услуги
                </a>
            </div>
        @endif
    </section>
    {{-- End service --}}

    {{-- Cases --}}
    <section id="cases" class="section-bg">
        <h2 class="section-title">Наши кейсы</h2>
        <p class="text-center text-gray-600 mb-8 max-w-3xl mx-auto">
            Реальные результаты нашей работы. Каждый кейс — это история успеха наших клиентов
            и доказательство эффективности наших методов продвижения.
        </p>

        @if (!empty($latestCases))
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($latestCases as $case)
                    <article
                        class="element-bg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col h-full">
                        {{-- Case image --}}
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ $case['image_url'] }}" alt="{{ $case['title'] }}"
                                class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                            <div class="absolute bottom-4 left-4 text-white">
                                @if ($case['has_valid_category'])
                                    <a href="{{ route('cases.category', $case['industry']) }}"
                                        class="bg-cyan-500 hover:bg-cyan-600 px-3 py-1 text-sm font-medium transition-colors inline-block">
                                        {{ $case['industry_name'] }}
                                    </a>
                                @else
                                    <span class="bg-gray-500 px-3 py-1 text-sm font-medium inline-block">
                                        {{ $case['industry_name'] }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Case content --}}
                        <div class="p-6 flex-1 flex flex-col">
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $case['title'] }}</h3>
                                <p class="text-sm text-gray-500 mb-3">{{ $case['client'] }} • {{ $case['period'] }}</p>
                                <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                    {{ Str::limit($case['description_clean'], 120) }}
                                </p>

                                {{-- Key metrics --}}
                                <div class="space-y-2 mb-4">
                                    @if (!empty($case['results']) && is_array($case['results']))
                                        @foreach (array_slice($case['results'], 0, 2) as $result)
                                            <div class="flex items-center text-sm">
                                                <i class="material-icons text-green-500 mr-2 text-base">trending_up</i>
                                                <span class="text-gray-700 font-medium">{{ $result }}</span>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            {{-- CTA button --}}
                            <a href="{{ route('cases.show', $case['id']) }}"
                                class="block w-full bg-cyan-500 text-white text-center py-3 px-4 hover:bg-cyan-600 transition mt-auto">
                                Подробнее о кейсе
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            {{-- View all cases button --}}
            <div class="text-center mt-8">
                <a href="{{ route('cases') }}" class="btn inline-flex items-center">
                    Все кейсы
                    <i class="material-icons ml-2">arrow_forward</i>
                </a>
            </div>
        @else
            <div class="text-center py-16">
                <h3 class="text-2xl font-bold text-gray-600 mb-4">Кейсы временно недоступны</h3>
                <p class="text-gray-500 mb-8">В данный момент у нас нет доступных кейсов для отображения.</p>
            </div>
        @endif
    </section>
    {{-- End cases --}}

    {{-- Blog --}}
    <section id="blog" class="section-bg">
        <h2 class="section-title">Последние статьи</h2>
        <p class="text-center text-gray-600 mb-8 max-w-3xl mx-auto">
            Полезные материалы о SEO, аналитике и продвижении сайтов.
            Делимся опытом и актуальными новостями из мира поисковой оптимизации.
        </p>

        @if (!empty($latestArticles))
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($latestArticles as $article)
                    <article
                        class="element-bg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col h-full">
                        {{-- Article image --}}
                        @if ($article->image)
                            <div class="relative h-48 overflow-hidden">
                                <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                            </div>
                        @else
                            <div
                                class="relative h-48 overflow-hidden bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center">
                                <i class="material-icons text-white text-6xl">
                                    @if ($article->blogCategory && $article->blogCategory->slug === 'seo-news')
                                        trending_up
                                    @elseif($article->blogCategory && $article->blogCategory->slug === 'analytics')
                                        analytics
                                    @else
                                        tips_and_updates
                                    @endif
                                </i>
                            </div>
                        @endif

                        {{-- Article content --}}
                        <div class="p-6 flex-1 flex flex-col">
                            <div class="flex-1">
                                {{-- Category and date --}}
                                <div class="flex items-center justify-between mb-3">
                                    <a href="{{ route('blog.category', $article->blogCategory->slug ?? 'uncategorized') }}"
                                        class="inline-flex items-center px-3 py-1 text-xs font-medium bg-cyan-100 text-cyan-800 hover:bg-cyan-200 transition-colors">
                                        {{ $article->category_name }}
                                    </a>
                                    <span class="text-gray-500 text-sm">
                                        {{ $article->formatted_published_at }}
                                    </span>
                                </div>

                                {{-- Title --}}
                                <h3 class="text-lg font-bold text-gray-800 mb-3 line-clamp-2">
                                    <a href="{{ $article->url }}"
                                        class="hover:text-cyan-600 transition-colors">
                                        {{ $article->title }}
                                    </a>
                                </h3>

                                {{-- Excerpt --}}
                                <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                    {{ $article->excerpt }}
                                </p>

                                {{-- Reading time --}}
                                <div class="flex items-center text-sm text-gray-500 mb-4">
                                    <i class="material-icons text-xs mr-1">schedule</i>
                                    <span>{{ $article->reading_time ?? '5' }} мин чтения</span>
                                </div>
                            </div>

                            {{-- CTA button --}}
                            <a href="{{ $article->url }}"
                                class="block w-full bg-cyan-500 text-white text-center py-3 px-4 hover:bg-cyan-600 transition mt-auto">
                                Читать статью
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            {{-- View all articles button --}}
            <div class="text-center mt-8">
                <a href="{{ route('blog') }}" class="btn inline-flex items-center">
                    Все статьи
                    <i class="material-icons ml-2">arrow_forward</i>
                </a>
            </div>
        @else
            <div class="text-center py-16">
                <h3 class="text-2xl font-bold text-gray-600 mb-4">Статьи временно недоступны</h3>
                <p class="text-gray-500 mb-8">В данный момент у нас нет доступных статей для отображения.</p>
            </div>
        @endif
    </section>
    {{-- End blog --}}

    {{-- FAQ --}}
    <div id="faq">
        @include('partials.faq-section')
    </div>
    {{-- End FAQ --}}

    {{-- Reviews --}}
    <section id="reviews" class="section-bg">
        <h2 class="section-title">Отзывы наших клиентов</h2>
        <p class="text-center text-gray-600 mb-8 max-w-3xl mx-auto">
            Реальные истории успеха от наших клиентов. Узнайте, как мы помогли им достичь
            выдающихся результатов в SEO-продвижении.
        </p>

        @if (!empty($randomReviews))
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($randomReviews as $review)
                    <article
                        class="element-bg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col h-full">
                        {{-- Review content --}}
                        <div class="p-6 flex-1 flex flex-col">
                            <div class="flex-1">
                                {{-- Rating --}}
                                <div class="flex items-center mb-4">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="material-icons text-yellow-400 text-sm">
                                            {{ $i <= $review['rating'] ? 'star' : 'star_border' }}
                                        </i>
                                    @endfor
                                </div>

                                {{-- Review text --}}
                                <blockquote class="text-gray-700 mb-6 flex-1 italic line-clamp-4">
                                    "{{ $review['text'] }}"
                                </blockquote>
                            </div>

                            {{-- Author info --}}
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-full overflow-hidden mr-4 flex-shrink-0">
                                    <img src="{{ asset('images/' . $review['avatar']) }}" alt="{{ $review['name'] }}"
                                        class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="font-semibold text-gray-900 text-sm">
                                        {{ $review['name'] }}
                                    </div>
                                    <div class="text-gray-600 text-xs">
                                        {{ $review['position'] }}
                                    </div>
                                    <div class="text-gray-500 text-xs">
                                        {{ $review['company'] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="text-center py-16">
                <h3 class="text-2xl font-bold text-gray-600 mb-4">Отзывы временно недоступны</h3>
                <p class="text-gray-500 mb-8">В данный момент у нас нет доступных отзывов для отображения.</p>
            </div>
        @endif
    </section>
    {{-- End reviews --}}

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
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-cyan-500 flex-shrink-0 mt-0.5"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>

                    <div>
                        <h3>Наш офис:</h3>
                        <p>{{ $contactInfo['address'] }}</p>
                    </div>
                </div>

                <!-- Phone -->
                <div class="flex items-start space-x-3">
                    <!-- Phone Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-cyan-500 flex-shrink-0 mt-0.5"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>

                    <div>
                        <h3 class="font-medium text-gray-700">Телефон:</h3>
                        <a href="tel:{{ str_replace(' ', '', $contactInfo['phone']) }}" class="text-cyan-500">{{ $contactInfo['phone'] }}</a>
                    </div>
                </div>

                <!-- Email -->
                <div class="flex items-start space-x-3">
                    <!-- Mail Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-cyan-500 flex-shrink-0 mt-0.5"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>

                    <div>
                        <h3 class="font-medium text-gray-700">Email:</h3>
                        <a href="mailto:{{ $contactInfo['email'] }}" class="text-cyan-500">{{ $contactInfo['email'] }}</a>
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

                    <input type="text" name="name" id="name_contact" required placeholder="Ваше имя"
                        aria-required="true" aria-label="Имя"
                        class="mt-1 block w-full bg-white focus:ring-blue-500 focus:border-blue-500"
                        aria-invalid="@if (isset($errors) && $errors->has('name')) true @else false @endif"
                        aria-describedby="name_contact_error">
                    @if (isset($errors) && $errors->has('name'))
                        <p id="name_contact_error" class="mt-1 text-sm text-red-600">{{ $errors->first('name') }}</p>
                    @endif
                </div>

                <div>
                    <label for="email_contact">Email</label>

                    <input type="email" name="email" id="email_contact" required placeholder="your@email.com"
                        aria-required="true" aria-label="Email"
                        class="mt-1 block w-full bg-white focus:ring-blue-500 focus:border-blue-500"
                        aria-invalid="@if (isset($errors) && $errors->has('email')) true @else false @endif"
                        aria-describedby="email_contact_error">
                    @if (isset($errors) && $errors->has('email'))
                        <p id="email_contact_error" class="mt-1 text-sm text-red-600">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <div>
                    <label for="phone_contact">Телефон *</label>

                    <input type="tel" name="phone" id="phone_contact" required aria-label="Телефон"
                        placeholder="+7 (999) 999-99-99"
                        class="mt-1 block w-full bg-white focus:ring-blue-500 focus:border-blue-500"
                        aria-invalid="@if (isset($errors) && $errors->has('phone')) true @else false @endif"
                        aria-describedby="phone_contact_error">
                    @if (isset($errors) && $errors->has('phone'))
                        <p id="phone_contact_error" class="mt-1 text-sm text-red-600">{{ $errors->first('phone') }}</p>
                    @endif
                </div>

                <div>
                    <label for="message_contact">Сообщение</label>

                    <textarea name="message" id="message_contact" rows="5" required placeholder="Расскажите о вашем проекте..."
                        aria-required="true" aria-label="Сообщение"
                        class="mt-1 block w-full bg-white focus:ring-blue-500 focus:border-blue-500"
                        aria-invalid="@if (isset($errors) && $errors->has('message')) true @else false @endif"
                        aria-describedby="message_contact_error">
                    </textarea>
                    @if (isset($errors) && $errors->has('message'))
                        <p id="message_contact_error" class="mt-1 text-sm text-red-600">{{ $errors->first('message') }}
                        </p>
                    @endif
                </div>

                <div>
                    <button type="submit" class="btn" aria-label="Отправить сообщение">Отправить</button>
                </div>
            </form>
        </div>
    </section>
    {{-- End form --}}
@endsection
