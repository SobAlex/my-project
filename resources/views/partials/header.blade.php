<header class="border-b border-cyan-500 py-2 flex items-center justify-between relative" x-data="{ open: false }">
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
                    class="flex items-center text-gray-700 hover:text-cyan-500 focus:outline-none" type="button"
                    aria-haspopup="true" :aria-expanded="dd.toString()">
                    Услуги
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="dd" @mouseenter="dd = true" @mouseleave="dd = false"
                    class="absolute left-0 mt-2 bg-white shadow-lg  z-10 w-48"
                    x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150"
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
        <button class="btn" @click="$dispatch('open-callback')">
            Заказать звонок
        </button>
    </div>

    <!-- Бургер справа (<lg) -->
    <button @click="open = !open" class="lg:hidden flex-shrink-0 focus:outline-none ml-4" aria-label="Открыть меню"
        :aria-expanded="open.toString()">
        <svg x-show="!open" class="w-7 h-7 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            style="display: block;">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg x-show="open" class="w-7 h-7 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            style="display: none;">
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
                        :class="msub ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
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
