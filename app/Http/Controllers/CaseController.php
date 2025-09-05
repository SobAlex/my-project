<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaseController extends Controller
{
    /**
     * Получить все теги
     */
    private function getTags()
    {
        return [
            'clothing' => ['name' => 'Одежда', 'icon' => 'checkroom', 'color' => 'pink'],
            'production' => ['name' => 'Производство', 'icon' => 'precision_manufacturing', 'color' => 'blue'],
            'electronics' => ['name' => 'Электроника', 'icon' => 'devices', 'color' => 'indigo'],
            'furniture' => ['name' => 'Мебель', 'icon' => 'chair', 'color' => 'brown']
        ];
    }

    /**
     * Получить все кейсы, сгруппированные по услугам
     */
    private function getCasesData()
    {
        return $this->getAllCasesData();
    }

    /**
     * Получить все кейсы, отфильтрованные по тегу
     */
    private function getCasesByTag($tag)
    {
        $casesData = $this->getCasesData();
        $filteredCases = [];

        foreach ($casesData as $serviceKey => $serviceData) {
            $serviceCases = [];
            foreach ($serviceData['cases'] as $case) {
                if (in_array($tag, $case['tags'])) {
                    $serviceCases[] = $case;
                }
            }
            if (!empty($serviceCases)) {
                $filteredCases[$serviceKey] = $serviceData;
                $filteredCases[$serviceKey]['cases'] = $serviceCases;
            }
        }

        return $filteredCases;
    }

    /**
     * Страница со всеми кейсами
     */
    public function index(Request $request)
    {
        $casesData = $this->getCasesData();
        $activeService = $request->get('service'); // Для якорных ссылок
        $activeTag = $request->get('tag'); // Для фильтрации по тегам
        $tags = $this->getTags();

        // Если указан тег, фильтруем кейсы
        if ($activeTag && isset($tags[$activeTag])) {
            $casesData = $this->getCasesByTag($activeTag);
        }

        return view('cases.index', [
            'title' => $activeTag ? 'Кейсы по тегу: ' . $tags[$activeTag]['name'] : 'Кейсы',
            'casesData' => $casesData,
            'activeService' => $activeService,
            'activeTag' => $activeTag,
            'tags' => $tags
        ]);
    }

    /**
     * Страница отдельного кейса
     */
    public function show($service, $caseId)
    {
        $casesData = $this->getCasesData();
        $tags = $this->getTags();

        if (!isset($casesData[$service])) {
            abort(404);
        }

        $serviceData = $casesData[$service];
        $case = collect($serviceData['cases'])->firstWhere('id', $caseId);

        if (!$case) {
            abort(404);
        }

        return view('cases.show', [
            'title' => $case['title'] . ' - Кейс',
            'case' => $case,
            'service' => $serviceData,
            'serviceKey' => $service,
            'tags' => $tags
        ]);
    }

    /**
     * Получить все данные кейсов с тегами
     */
    private function getAllCasesData()
    {
        return [
            'seo-promotion' => [
                'service_name' => 'SEO продвижение сайта',
                'service_icon' => 'trending_up',
                'cases' => [
                    [
                        'id' => 'seo-case-1',
                        'title' => 'Продвижение интернет-магазина электроники',
                        'description' => 'Увеличение органического трафика на 300% за 8 месяцев',
                        'client' => 'TechStore',
                        'industry' => 'Электроника',
                        'period' => '8 месяцев',
                        'tags' => ['electronics'],
                        'results' => [
                            'Рост органического трафика на 300%',
                            'Увеличение конверсии на 45%',
                            'Выход в ТОП-3 по 50+ ключевым запросам',
                            'ROI составил 250%'
                        ],
                        'image' => 'human.webp',
                        'before_after' => [
                            'before' => ['traffic' => '2,500', 'conversion' => '1.2%', 'positions' => '45'],
                            'after' => ['traffic' => '10,000', 'conversion' => '1.74%', 'positions' => '8']
                        ]
                    ],
                    [
                        'id' => 'seo-case-2',
                        'title' => 'Продвижение сайта медицинской клиники',
                        'description' => 'Завоевание лидерства в локальном поиске',
                        'client' => 'Медицинский центр "Здоровье"',
                        'industry' => 'Медицина',
                        'period' => '6 месяцев',
                        'tags' => ['clothing'],
                        'results' => [
                            'Рост трафика на 400%',
                            'Увеличение заявок на 200%',
                            'Выход в ТОП-1 по локальным запросам',
                            'Снижение стоимости привлечения клиента на 60%'
                        ],
                        'image' => 'human.webp',
                        'before_after' => [
                            'before' => ['traffic' => '1,200', 'conversion' => '2.1%', 'positions' => '38'],
                            'after' => ['traffic' => '6,000', 'conversion' => '4.2%', 'positions' => '3']
                        ]
                    ]
                ]
            ],
            'technical-audit' => [
                'service_name' => 'Технический аудит',
                'service_icon' => 'search',
                'cases' => [
                    [
                        'id' => 'tech-case-1',
                        'title' => 'Аудит крупного корпоративного портала',
                        'description' => 'Выявление и устранение критических технических проблем',
                        'client' => 'Корпорация "МеталлСтрой"',
                        'industry' => 'Строительство',
                        'period' => '2 недели',
                        'tags' => ['production'],
                        'results' => [
                            'Устранение 15 критических ошибок',
                            'Ускорение загрузки на 65%',
                            'Улучшение индексации на 40%',
                            'Снижение отказов на 30%'
                        ],
                        'image' => 'human.webp',
                        'before_after' => [
                            'before' => ['speed' => '4.2с', 'indexed' => '60%', 'bounce' => '45%'],
                            'after' => ['speed' => '1.5с', 'indexed' => '84%', 'bounce' => '31%']
                        ]
                    ],
                    [
                        'id' => 'tech-case-2',
                        'title' => 'Аудит интернет-магазина мебели',
                        'description' => 'Оптимизация технических параметров для лучшей индексации',
                        'client' => 'Мебельный салон "Комфорт"',
                        'industry' => 'Мебель',
                        'period' => '10 дней',
                        'tags' => ['furniture'],
                        'results' => [
                            'Исправление 8 технических ошибок',
                            'Улучшение мобильной версии',
                            'Оптимизация структуры URL',
                            'Настройка правильных редиректов'
                        ],
                        'image' => 'human.webp',
                        'before_after' => [
                            'before' => ['mobile' => '65%', 'urls' => 'Проблемы', 'redirects' => 'Неправильные'],
                            'after' => ['mobile' => '95%', 'urls' => 'Оптимизированы', 'redirects' => 'Настроены']
                        ]
                    ]
                ]
            ],
            'content-audit' => [
                'service_name' => 'Аудит контент-факторов',
                'service_icon' => 'content_copy',
                'cases' => [
                    [
                        'id' => 'content-case-1',
                        'title' => 'Аудит контента образовательного портала',
                        'description' => 'Анализ и оптимизация текстового контента',
                        'client' => 'Образовательный центр "Знания"',
                        'industry' => 'Образование',
                        'period' => '3 недели',
                        'tags' => ['clothing'],
                        'results' => [
                            'Повышение уникальности до 95%',
                            'Оптимизация 200+ страниц',
                            'Улучшение читаемости текстов',
                            'Добавление недостающих мета-тегов'
                        ],
                        'image' => 'human.webp',
                        'before_after' => [
                            'before' => ['unique' => '67%', 'pages' => '200', 'readability' => 'Сложная'],
                            'after' => ['unique' => '95%', 'pages' => '200', 'readability' => 'Простая']
                        ]
                    ],
                    [
                        'id' => 'content-case-2',
                        'title' => 'Аудит контента туристического сайта',
                        'description' => 'Оптимизация описаний туров и услуг',
                        'client' => 'Турагентство "Отпуск"',
                        'industry' => 'Туризм',
                        'period' => '2 недели',
                        'tags' => ['electronics'],
                        'results' => [
                            'Создание уникальных описаний для 150 туров',
                            'Оптимизация под ключевые запросы',
                            'Улучшение структуры контента',
                            'Повышение релевантности страниц'
                        ],
                        'image' => 'human.webp',
                        'before_after' => [
                            'before' => ['tours' => '150', 'unique' => '45%', 'relevance' => 'Низкая'],
                            'after' => ['tours' => '150', 'unique' => '98%', 'relevance' => 'Высокая']
                        ]
                    ]
                ]
            ],
            'behavioral-audit' => [
                'service_name' => 'Аудит поведенческих факторов',
                'service_icon' => 'pageview',
                'cases' => [
                    [
                        'id' => 'behavioral-case-1',
                        'title' => 'Аудит UX банковского сайта',
                        'description' => 'Улучшение пользовательского опыта и конверсии',
                        'client' => 'Банк "Финансы"',
                        'industry' => 'Финансы',
                        'period' => '4 недели',
                        'tags' => ['production'],
                        'results' => [
                            'Увеличение времени на сайте на 40%',
                            'Снижение отказов на 35%',
                            'Улучшение навигации',
                            'Повышение конверсии на 25%'
                        ],
                        'image' => 'human.webp',
                        'before_after' => [
                            'before' => ['time' => '2:30', 'bounce' => '55%', 'conversion' => '2.1%'],
                            'after' => ['time' => '3:30', 'bounce' => '36%', 'conversion' => '2.6%']
                        ]
                    ],
                    [
                        'id' => 'behavioral-case-2',
                        'title' => 'Аудит UX интернет-магазина одежды',
                        'description' => 'Оптимизация процесса покупки',
                        'client' => 'Бутик "Стиль"',
                        'industry' => 'Мода',
                        'period' => '3 недели',
                        'tags' => ['clothing'],
                        'results' => [
                            'Упрощение процесса оформления заказа',
                            'Улучшение фильтров товаров',
                            'Оптимизация мобильной версии',
                            'Увеличение среднего чека на 20%'
                        ],
                        'image' => 'human.webp',
                        'before_after' => [
                            'before' => ['checkout' => '5 шагов', 'mobile' => '70%', 'cart' => '1,200₽'],
                            'after' => ['checkout' => '3 шага', 'mobile' => '92%', 'cart' => '1,440₽']
                        ]
                    ]
                ]
            ],
            'link-profile' => [
                'service_name' => 'Ссылочный профиль',
                'service_icon' => 'link',
                'cases' => [
                    [
                        'id' => 'link-case-1',
                        'title' => 'Построение ссылочной массы для IT-компании',
                        'description' => 'Создание качественного ссылочного профиля',
                        'client' => 'IT-компания "ТехноСофт"',
                        'industry' => 'IT',
                        'period' => '5 месяцев',
                        'tags' => ['electronics'],
                        'results' => [
                            'Получение 150 качественных ссылок',
                            'Повышение авторитетности домена',
                            'Улучшение позиций по конкурентным запросам',
                            'Рост трафика на 180%'
                        ],
                        'image' => 'human.webp',
                        'before_after' => [
                            'before' => ['links' => '45', 'da' => '25', 'traffic' => '3,200'],
                            'after' => ['links' => '195', 'da' => '42', 'traffic' => '8,960']
                        ]
                    ],
                    [
                        'id' => 'link-case-2',
                        'title' => 'Очистка ссылочного профиля юридической фирмы',
                        'description' => 'Удаление токсичных ссылок и построение качественной массы',
                        'client' => 'Юридическая фирма "Право"',
                        'industry' => 'Юриспруденция',
                        'period' => '3 месяца',
                        'tags' => ['production'],
                        'results' => [
                            'Удаление 80 токсичных ссылок',
                            'Получение 60 качественных ссылок',
                            'Восстановление позиций после санкций',
                            'Стабилизация трафика'
                        ],
                        'image' => 'human.webp',
                        'before_after' => [
                            'before' => ['toxic' => '80', 'quality' => '20', 'positions' => 'Снижение'],
                            'after' => ['toxic' => '0', 'quality' => '80', 'positions' => 'Восстановлены']
                        ]
                    ]
                ]
            ],
            'semantic-core' => [
                'service_name' => 'Сбор и группировка семантического ядра',
                'service_icon' => 'category',
                'cases' => [
                    [
                        'id' => 'semantic-case-1',
                        'title' => 'Семантическое ядро для автосалона',
                        'description' => 'Создание структурированного ядра из 2000+ запросов',
                        'client' => 'Автосалон "АвтоМир"',
                        'industry' => 'Автомобили',
                        'period' => '2 недели',
                        'tags' => ['production'],
                        'results' => [
                            'Собрано 2,500 ключевых запросов',
                            'Создано 15 тематических групп',
                            'Определены приоритетные запросы',
                            'Разработана контент-стратегия'
                        ],
                        'image' => 'human.webp',
                        'before_after' => [
                            'before' => ['queries' => '200', 'groups' => '5', 'strategy' => 'Отсутствует'],
                            'after' => ['queries' => '2,500', 'groups' => '15', 'strategy' => 'Готова']
                        ]
                    ],
                    [
                        'id' => 'semantic-case-2',
                        'title' => 'Семантическое ядро для ресторана',
                        'description' => 'Анализ локальных запросов и конкурентов',
                        'client' => 'Ресторан "Вкус"',
                        'industry' => 'Ресторанный бизнес',
                        'period' => '10 дней',
                        'tags' => ['furniture'],
                        'results' => [
                            'Собрано 800 локальных запросов',
                            'Проанализированы конкуренты',
                            'Выявлены возможности для роста',
                            'Создан план продвижения'
                        ],
                        'image' => 'human.webp',
                        'before_after' => [
                            'before' => ['local' => '50', 'competitors' => 'Не изучены', 'plan' => 'Нет'],
                            'after' => ['local' => '800', 'competitors' => '15', 'plan' => 'Готов']
                        ]
                    ]
                ]
            ],
            'seo-strategy' => [
                'service_name' => 'Составление SEO стратегии',
                'service_icon' => 'assessment',
                'cases' => [
                    [
                        'id' => 'strategy-case-1',
                        'title' => 'SEO стратегия для сети фитнес-клубов',
                        'description' => 'Комплексная стратегия продвижения 5 филиалов',
                        'client' => 'Фитнес-сеть "Сила"',
                        'industry' => 'Фитнес',
                        'period' => '2 недели',
                        'tags' => ['clothing'],
                        'results' => [
                            'Создана стратегия для 5 филиалов',
                            'Определены приоритетные направления',
                            'Рассчитан бюджет и сроки',
                            'Разработан план на 12 месяцев'
                        ],
                        'image' => 'human.webp',
                        'before_after' => [
                            'before' => ['branches' => '5', 'strategy' => 'Нет', 'budget' => 'Не определен'],
                            'after' => ['branches' => '5', 'strategy' => 'Готова', 'budget' => '500,000₽']
                        ]
                    ],
                    [
                        'id' => 'strategy-case-2',
                        'title' => 'SEO стратегия для интернет-магазина детских товаров',
                        'description' => 'Долгосрочная стратегия продвижения в конкурентной нише',
                        'client' => 'Магазин "Детки"',
                        'industry' => 'Детские товары',
                        'period' => '3 недели',
                        'tags' => ['furniture'],
                        'results' => [
                            'Проанализирована конкурентная среда',
                            'Выявлены возможности для роста',
                            'Создана поэтапная стратегия',
                            'Определены KPI и метрики'
                        ],
                        'image' => 'human.webp',
                        'before_after' => [
                            'before' => ['analysis' => 'Поверхностный', 'opportunities' => 'Не выявлены', 'kpi' => 'Нет'],
                            'after' => ['analysis' => 'Глубокий', 'opportunities' => '15', 'kpi' => 'Определены']
                        ]
                    ]
                ]
            ]
        ];
    }
}
