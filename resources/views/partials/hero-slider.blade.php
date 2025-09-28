{{-- Hero слайдер --}}
<div class="hero-slider" data-slider>
    <!-- Слайды -->
    <div class="hero-slides" data-slides>
        @foreach($heroSections as $index => $heroSection)
            <div class="hero-slide {{ $index === 0 ? 'active' : '' }}" data-slide="{{ $index }}">
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
                                <label for="name_hero_{{ $index }}" class="block mb-1">Имя:</label>
                                <input type="text" id="name_hero_{{ $index }}" name="name" required placeholder="Ваше имя"
                                    class="w-full px-3 py-2" aria-required="true" aria-label="Ваше имя"
                                    aria-invalid="@if (isset($errors) && $errors->has('name')) true @else false @endif"
                                    aria-describedby="name_hero_{{ $index }}_error" />
                                @if (isset($errors) && $errors->has('name'))
                                    <p id="name_hero_{{ $index }}_error" class="mt-1 text-sm text-red-600">{{ $errors->first('name') }}</p>
                                @endif
                            </div>

                            <div class="flex-1">
                                <label for="phone_hero_{{ $index }}" class="block mb-1">Телефон:</label>
                                <input type="tel" id="phone_hero_{{ $index }}" name="phone" required placeholder="+7 (999) 999-99-99"
                                    class="w-full px-3 py-2" aria-required="true" aria-label="Телефон"
                                    aria-invalid="@if (isset($errors) && $errors->has('phone')) true @else false @endif"
                                    aria-describedby="phone_hero_{{ $index }}_error" />
                                @if (isset($errors) && $errors->has('phone'))
                                    <p id="phone_hero_{{ $index }}_error" class="mt-1 text-sm text-red-600">{{ $errors->first('phone') }}</p>
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
            </div>
        @endforeach
    </div>

    <!-- Навигация -->
    <div class="hero-navigation">
        <!-- Стрелки -->
        <button class="hero-nav-btn hero-prev" data-prev aria-label="Предыдущий слайд">
            <i class="material-icons">chevron_left</i>
        </button>
        <button class="hero-nav-btn hero-next" data-next aria-label="Следующий слайд">
            <i class="material-icons">chevron_right</i>
        </button>

        <!-- Индикаторы -->
        <div class="hero-indicators">
            @foreach($heroSections as $index => $heroSection)
                <button class="hero-indicator {{ $index === 0 ? 'active' : '' }}"
                    data-indicator="{{ $index }}"
                    aria-label="Слайд {{ $index + 1 }}">
                </button>
            @endforeach
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const slider = document.querySelector('[data-slider]');
    if (!slider) return;

    const slides = slider.querySelectorAll('[data-slide]');
    const indicators = slider.querySelectorAll('[data-indicator]');
    const prevBtn = slider.querySelector('[data-prev]');
    const nextBtn = slider.querySelector('[data-next]');

    let currentSlide = 0;
    let autoplayInterval;

    console.log('Hero slider initialized:', slides.length, 'slides');

    function showSlide(index) {
        console.log('Showing slide:', index);
        // Убираем активный класс у всех слайдов и индикаторов
        slides.forEach(slide => slide.classList.remove('active'));
        indicators.forEach(indicator => indicator.classList.remove('active'));

        // Добавляем активный класс к нужным элементам
        slides[index].classList.add('active');
        indicators[index].classList.add('active');

        currentSlide = index;
    }

    function nextSlide() {
        const next = (currentSlide + 1) % slides.length;
        showSlide(next);
    }

    function prevSlide() {
        const prev = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(prev);
    }

    function startAutoplay() {
        autoplayInterval = setInterval(nextSlide, 5000); // 5 секунд
        console.log('Autoplay started');
    }

    function stopAutoplay() {
        clearInterval(autoplayInterval);
        console.log('Autoplay stopped');
    }

    // Обработчики событий
    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            console.log('Next button clicked');
            nextSlide();
            stopAutoplay();
            startAutoplay(); // Перезапускаем автопрокрутку
        });
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', () => {
            console.log('Prev button clicked');
            prevSlide();
            stopAutoplay();
            startAutoplay(); // Перезапускаем автопрокрутку
        });
    }

    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => {
            console.log('Indicator clicked:', index);
            showSlide(index);
            stopAutoplay();
            startAutoplay(); // Перезапускаем автопрокрутку
        });
    });

    // Останавливаем автопрокрутку при наведении
    slider.addEventListener('mouseenter', stopAutoplay);
    slider.addEventListener('mouseleave', startAutoplay);

    // Запускаем автопрокрутку
    startAutoplay();
});
</script>
