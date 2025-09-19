{{-- Footer --}}
<footer class="mt-16 bg-gray-800 text-gray-300">
    <div class="px-6 py-10 grid grid-cols-1 gap-10 sm:grid-cols-2 md:grid-cols-4">
        {{-- Brand / About --}}
        <div>
            <div>
                <a href="{{ route('home') }}"
                    class="font-train text-[34px] text-white hover:text-cyan-400 transition">SobAlex</a>
                <p class="mt-2 text-sm text-gray-400">Оптимизация сайтов и SEO продвижение.</p>
            </div>

            <div class="mt-5">
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
                        <a href="mailto:info@sobalex.com" class="hover:text-cyan-400 transition">info@sobalex.com</a>
                    </li>
                </ul>
            </div>

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
                <li><a href="{{ route('services.seo-promotion') }}" class="hover:text-cyan-400 transition">SEO
                        продвижение</a></li>
                <li><a href="{{ route('services.technical-audit') }}" class="hover:text-cyan-400 transition">Технический
                        аудит</a></li>
                <li><a href="{{ route('services.content-audit') }}" class="hover:text-cyan-400 transition">Аудит
                        коммерческих факторов</a></li>
                <li><a href="{{ route('services.behavioral-audit') }}" class="hover:text-cyan-400 transition">Аудит
                        поведенческих факторов</a></li>
                <li><a href="{{ route('services.link-profile') }}" class="hover:text-cyan-400 transition">Ссылочный
                        профиль</a></li>
                <li><a href="{{ route('services.semantic-core') }}" class="hover:text-cyan-400 transition">Сбор и
                        группировка семантического ядра</a>
                </li>
                <li><a href="{{ route('services.seo-strategy') }}" class="hover:text-cyan-400 transition">Составление
                        SEO стратегии</a></li>
            </ul>
        </div>

        {{-- cases/links --}}
        <div>
            <h4 class="text-white font-semibold tracking-wide uppercase text-sm">Кейсы</h4>
            <ul class="mt-4 space-y-2">
                <li><a href="{{ route('cases') }}" class="hover:text-cyan-400 transition">Все кейсы</a></li>
                @foreach ($activeCategories as $category)
                    <li><a href="{{ route($category['route'], $category['slug']) }}"
                            class="hover:text-cyan-400 transition">{{ $category['name'] }}</a></li>
                @endforeach
            </ul>
        </div>

        {{-- Blog/Links --}}
        <div>
            <h4 class="text-white font-semibold tracking-wide uppercase text-sm">Блог</h4>
            <ul class="mt-4 space-y-2">
                <li><a href="{{ route('blog') }}" class="hover:text-cyan-400 transition">Все статьи</a></li>
                <li><a href="{{ route('blog.seo-news') }}" class="hover:text-cyan-400 transition">SEO новости</a></li>
                <li><a href="{{ route('blog.analytics') }}" class="hover:text-cyan-400 transition">Аналитика</a></li>
                <li><a href="{{ route('blog.tips') }}" class="hover:text-cyan-400 transition">Советы</a></li>
            </ul>
        </div>
    </div>

    <div class="px-6 py-4 border-t border-gray-700 text-sm flex flex-col sm:flex-row items-center justify-between">
        <p class="mb-2 sm:mb-0">© {{ date('Y') }} SobAlex. Все права защищены.</p>
        <div class="flex items-center space-x-4">
            <a href="#" class="hover:text-cyan-400 transition">Политика конфиденциальности</a>
            <span class="text-gray-600">|</span>
            <a href="#" class="hover:text-cyan-400 transition">Пользовательское соглашение</a>
        </div>
    </div>
</footer>
{{-- End footer --}}
