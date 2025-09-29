{{-- Одиночный Hero блок --}}
<div class="hero-container flex flex-col md:flex-row gap-4">
    <!-- Левая часть -->
    <div class="w-full md:basis-1/2 lg:basis-2/3 md:w-auto flex flex-col justify-between px-4 pt-4 pb-16 text-center sm:text-left">
        <!-- Контент -->
        <div>
            <!-- Заголовок -->
            <h1 class="text-3xl leading-relaxed mb-6 sm:mb-8">
                {{ $heroSection->title }}
            </h1>

            @if($heroSection->description)
                <!-- Описание -->
                <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                    {{ $heroSection->description }}
                </p>
            @endif
        </div>

        <!-- Форма -->
        <form action="{{ route('contact.hero') }}" method="POST"
            class="flex flex-col gap-4 w-full lg:flex-row lg:space-x-4 lg:space-y-0 lg:items-end lg:justify-start mt-8">
            @csrf

            <div class="flex-1">
                <label for="name_hero" class="block mb-1">Имя:</label>
                <input type="text" id="name_hero" name="name" required placeholder="Ваше имя"
                    class="w-full px-3 py-2 rounded-lg" aria-required="true" aria-label="Ваше имя"
                    aria-invalid="@if (isset($errors) && $errors->has('name')) true @else false @endif"
                    aria-describedby="name_hero_error" />
                @if (isset($errors) && $errors->has('name'))
                    <p id="name_hero_error" class="mt-1 text-sm text-red-600">{{ $errors->first('name') }}</p>
                @endif
            </div>

            <div class="flex-1">
                <label for="phone_hero" class="block mb-1">Телефон:</label>
                <input type="tel" id="phone_hero" name="phone" required placeholder="+7 (999) 999-99-99"
                    class="w-full px-3 py-2 rounded-lg" aria-required="true" aria-label="Телефон"
                    aria-invalid="@if (isset($errors) && $errors->has('phone')) true @else false @endif"
                    aria-describedby="phone_hero_error" />
                @if (isset($errors) && $errors->has('phone'))
                    <p id="phone_hero_error" class="mt-1 text-sm text-red-600">{{ $errors->first('phone') }}</p>
                @endif
            </div>

            <button type="submit" class="btn whitespace-nowrap px-6 py-2 self-start lg:self-auto"
                aria-label="{{ $heroSection->button_text }}">
                {{ $heroSection->button_text }}
            </button>
        </form>
    </div>

    <!-- Правая часть (картинка) -->
    <div class="w-full md:basis-1/2 lg:basis-1/3 md:w-auto hero-image-container px-4 py-6 overflow-hidden flex items-center justify-center">
        @if($heroSection->image)
            <img src="{{ $heroSection->image_url }}" alt="{{ $heroSection->title }}" class="w-full h-full object-cover rounded-lg"
                loading="eager" decoding="async" fetchpriority="high" />
        @else
            <img src="{{ asset('images/human.webp') }}" alt="{{ $heroSection->title }}" class="w-full h-full object-cover rounded-lg"
                loading="eager" decoding="async" fetchpriority="high" />
        @endif
    </div>
</div>
