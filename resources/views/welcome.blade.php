<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SEO продвижение сайтов в интернете</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="wrapper">

        {{-- header --}}
        <header>
            <a href="">logo</a>

            <nav aria-label="Главное меню">
                <ul>
                    <li><a href="#">Услуги</a></li>
                    <li><a href="#">Блог</a></li>
                    <li><a href="#">Кейсы</a></li>
                    <li><a href="#">Контакты</a></li>
                </ul>
            </nav>

            <button>Связаться с нами</button>
        </header>

        <main>
            {{-- hero --}}
            <section id="hero">
                <h1>hero</h1>

                <div>
                    <div>
                        <p>left text</p>
                        <button>call</button>
                    </div>

                    <div>
                        <img src="" alt="right foto">
                    </div>
                </div>
            </section>
            {{-- End hero --}}

            {{-- Why we --}}
            <section id="why">
                <h2>Почему мы</h2>

                <ul>
                    {{-- Card why --}}
                    <li>
                        <div>
                            <img src="" alt="icon1">
                            <div>
                                <h3>Потому что 1</h3>
                                <p>Описание 1</p>
                            </div>
                        </div>
                    </li>
                    {{-- End card why --}}

                    {{-- Card why --}}
                    <li>
                        <div>
                            <img src="" alt="icon2">
                            <div>
                                <h3>Потому что 2</h3>
                                <p>Описание 2</p>
                            </div>
                        </div>
                    </li>
                    {{-- End card why --}}

                    {{-- Card why --}}
                    <li>
                        <div>
                            <img src="" alt="icon3">
                            <div>
                                <h3>Потому что 3</h3>
                                <p>Описание 3</p>
                            </div>
                        </div>
                    </li>
                    {{-- End card why --}}

                    {{-- Card why --}}
                    <li>
                        <div>
                            <img src="" alt="icon4">
                            <div>
                                <h3>Потому что 4</h3>
                                <p>Описание 4</p>
                            </div>
                        </div>
                    </li>
                    {{-- End card why --}}
                </ul>
            </section>
            {{-- End why we --}}

            {{-- Service --}}
            <section id="services">
                <h2>Услуги</h2>

                <div>
                    {{-- Card service --}}
                    <article>
                        {{-- Card service top --}}
                        <div>
                            <img src="" alt="icon Кейсы">
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
                    <article>
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
                    <article>
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
                    <article>
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
                    <article>
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
                    <article>
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
                </div>
            </section>
            {{-- End service --}}

            {{-- Review --}}
            <section id="reviews">
                <h2>Отзывы</h2>
                <p>Код яндекса виджет</p>
            </section>
            {{-- End review --}}

            {{-- Form --}}
            <section id="contact-form">
                <h2>Форма</h2>
                <form action=""></form>
            </section>
            {{-- End form --}}
        </main>

        {{-- Footer --}}
        <footer>
            {{-- Footer col --}}
            <div>
                <p>Колонка 1</p>

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
                <p>Колонка 2</p>

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
                <p>Колонка 3</p>

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
                <p>Колонка 4</p>

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
