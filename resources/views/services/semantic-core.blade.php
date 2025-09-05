@extends('layouts.app')

@section('title', $title . ' - SEO продвижение сайтов')

@section('content')
    {{-- Hero section --}}
    <section class="section-bg">
        <div class="flex flex-col lg:flex-row gap-8 items-center">
            <!-- Левая часть -->
            <div class="flex-1">
                <div class="flex items-center mb-4">
                    <i class="material-icons text-5xl text-cyan-500 mr-4">{{ $service['icon'] }}</i>
                    <h1 class="text-4xl font-bold text-gray-800">{{ $service['name'] }}</h1>
                </div>

                <p class="text-xl text-gray-600 mb-6 leading-relaxed">
                    {{ $service['description'] }}
                </p>

                <div class="flex flex-col sm:flex-row gap-4 mb-8">
                    <div class="bg-cyan-50 p-4 rounded-lg">
                        <div class="text-sm text-gray-600">Стоимость</div>
                        <div class="text-2xl font-bold text-cyan-600">{{ $service['price'] }}</div>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="text-sm text-gray-600">Срок выполнения</div>
                        <div class="text-2xl font-bold text-gray-700">{{ $service['duration'] }}</div>
                    </div>
                </div>

                <button class="btn text-lg px-8 py-3" onclick="openServiceOrderModal('{{ $service['name'] }}')">
                    Заказать услугу
                </button>
            </div>

            <!-- Правая часть (изображение) -->
            <div class="flex-1">
                <img src="{{ Vite::asset('resources/images/human.webp') }}" alt="{{ $service['name'] }}"
                    class="w-full h-96 object-cover rounded-lg shadow-lg" loading="lazy" decoding="async">
            </div>
        </div>
    </section>

    {{-- Features section --}}
    <section class="section-bg">
        <h2 class="section-title">Что входит в услугу</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($service['features'] as $feature)
                <div class="element-bg p-6 rounded-lg">
                    <div class="flex items-start">
                        <i class="material-icons text-cyan-500 mr-3 mt-1">check_circle</i>
                        <p class="text-gray-700">{{ $feature }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- CTA section --}}
    <section class="section-bg">
        <div class="bg-gradient-to-r from-cyan-500 to-blue-600 text-white rounded-2xl p-8 text-center">
            <h2 class="text-3xl font-bold mb-4">Готовы начать продвижение?</h2>
            <p class="text-xl mb-6 opacity-90">Свяжитесь с нами для консультации и расчета стоимости</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="bg-white text-cyan-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition"
                    onclick="openServiceOrderModal('{{ $service['name'] }}')">
                    Заказать услугу
                </button>
                <a href="#contact-form"
                    class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-cyan-600 transition">
                    Получить консультацию
                </a>
            </div>
        </div>
    </section>

    {{-- Contact form section --}}
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
                        <a href="tel:88001234567" class="text-blue-600 hover:text-blue-800">8 800 123 45 67</a>
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
                        <a href="mailto:info@sobalex.com" class="text-blue-600 hover:text-blue-800">info@sobalex.com</a>
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
                    <input type="text" name="name" id="name_contact" required aria-required="true" aria-label="Имя"
                        class="mt-1 block w-full bg-white focus:ring-blue-500 focus:border-blue-500"
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
@endsection
