<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of all services.
     */
    public function index()
    {
        $services = Service::published()->ordered()->get();

        return view('services.index', [
            'title' => 'Наши услуги',
            'services' => $services
        ]);
    }

    /**
     * Display the specified service.
     */
    public function show(Service $service)
    {
        if (!$service->is_published) {
            abort(404);
        }

        $relatedServices = Service::published()
            ->where('id', '!=', $service->id)
            ->take(3)
            ->get();

        $servicesFaqs = Faq::visibleOnServices()->get();

        return view('services.show', [
            'title' => $service->meta_title ?: $service->title,
            'service' => $service,
            'relatedServices' => $relatedServices,
            'servicesFaqs' => $servicesFaqs
        ]);
    }
    /**
     * SEO продвижение сайта
     */
    public function seoPromotion()
    {
        $servicesFaqs = \App\Models\Faq::visibleOnServices()->get();

        return view('services.seo-promotion', [
            'title' => 'SEO продвижение сайта',
            'service' => [
                'name' => 'SEO продвижение сайта',
                'description' => 'Комплексное продвижение вашего сайта в поисковых системах. Повышаем позиции, увеличиваем трафик и конверсию с помощью современных SEO-методик.',
                'icon' => 'trending_up',
                'features' => [
                    'Анализ конкурентов и поисковой выдачи',
                    'Оптимизация технических параметров сайта',
                    'Создание качественного контента',
                    'Построение ссылочной массы',
                    'Мониторинг позиций и аналитика',
                    'Регулярные отчеты о проделанной работе'
                ],
                'price' => 'от 50 000 ₽/месяц',
                'duration' => '3-12 месяцев'
            ],
            'servicesFaqs' => $servicesFaqs
        ]);
    }

    /**
     * Технический аудит
     */
    public function technicalAudit()
    {
        $servicesFaqs = \App\Models\Faq::visibleOnServices()->get();

        return view('services.technical-audit', [
            'title' => 'Технический аудит',
            'service' => [
                'name' => 'Технический аудит',
                'description' => 'Детальный анализ технических аспектов сайта для выявления и устранения ошибок, влияющих на SEO.',
                'icon' => 'search',
                'features' => [
                    'Проверка индексации страниц',
                    'Анализ скорости загрузки',
                    'Проверка мобильной адаптивности',
                    'Аудит структуры URL',
                    'Проверка мета-тегов и заголовков',
                    'Анализ внутренней перелинковки'
                ],
                'price' => 'от 15 000 ₽',
                'duration' => '5-7 дней'
            ],
            'servicesFaqs' => $servicesFaqs
        ]);
    }

    /**
     * Аудит контент-факторов
     */
    public function contentAudit()
    {
        $servicesFaqs = \App\Models\Faq::visibleOnServices()->get();

        return view('services.content-audit', [
            'title' => 'Аудит коммерческих факторов',
            'service' => [
                'name' => 'Аудит коммерческих факторов',
                'description' => 'Анализ коммерческих факторов: качество текстов, уникальность, релевантность запросам пользователей.',
                'icon' => 'content_copy',
                'features' => [
                    'Анализ уникальности контента',
                    'Проверка релевантности текстов',
                    'Оценка качества заголовков',
                    'Анализ ключевых слов',
                    'Проверка структуры контента',
                    'Рекомендации по улучшению'
                ],
                'price' => 'от 12 000 ₽',
                'duration' => '3-5 дней'
            ],
            'servicesFaqs' => $servicesFaqs
        ]);
    }

    /**
     * Аудит поведенческих факторов
     */
    public function behavioralAudit()
    {
        $servicesFaqs = \App\Models\Faq::visibleOnServices()->get();

        return view('services.behavioral-audit', [
            'title' => 'Аудит поведенческих факторов',
            'service' => [
                'name' => 'Аудит поведенческих факторов',
                'description' => 'Проверка поведенческих факторов: удобство использования, скорость загрузки, адаптивность.',
                'icon' => 'pageview',
                'features' => [
                    'Анализ пользовательского опыта',
                    'Проверка удобства навигации',
                    'Тестирование на разных устройствах',
                    'Анализ времени на сайте',
                    'Проверка конверсионных элементов',
                    'Рекомендации по улучшению UX'
                ],
                'price' => 'от 18 000 ₽',
                'duration' => '5-7 дней'
            ],
            'servicesFaqs' => $servicesFaqs
        ]);
    }

    /**
     * Ссылочный профиль
     */
    public function linkProfile()
    {
        $servicesFaqs = \App\Models\Faq::visibleOnServices()->get();

        return view('services.link-profile', [
            'title' => 'Ссылочный профиль',
            'service' => [
                'name' => 'Ссылочный профиль',
                'description' => 'Анализ и оптимизация ссылочной массы для улучшения авторитетности сайта в поисковых системах.',
                'icon' => 'link',
                'features' => [
                    'Анализ существующих ссылок',
                    'Выявление токсичных ссылок',
                    'Планирование ссылочной стратегии',
                    'Поиск качественных доноров',
                    'Размещение обратных ссылок',
                    'Мониторинг ссылочной массы'
                ],
                'price' => 'от 25 000 ₽/месяц',
                'duration' => '3-6 месяцев'
            ],
            'servicesFaqs' => $servicesFaqs
        ]);
    }

    /**
     * Сбор и группировка семантического ядра
     */
    public function semanticCore()
    {
        $servicesFaqs = \App\Models\Faq::visibleOnServices()->get();

        return view('services.semantic-core', [
            'title' => 'Сбор и группировка семантического ядра',
            'service' => [
                'name' => 'Сбор и группировка семантического ядра',
                'description' => 'Систематизация семантического ядра для эффективного продвижения по целевым запросам.',
                'icon' => 'category',
                'features' => [
                    'Сбор ключевых запросов',
                    'Кластеризация запросов',
                    'Анализ частотности',
                    'Определение приоритетных запросов',
                    'Создание карты запросов',
                    'Планирование контент-стратегии'
                ],
                'price' => 'от 20 000 ₽',
                'duration' => '7-10 дней'
            ],
            'servicesFaqs' => $servicesFaqs
        ]);
    }

    /**
     * Составление SEO стратегии
     */
    public function seoStrategy()
    {
        $servicesFaqs = \App\Models\Faq::visibleOnServices()->get();

        return view('services.seo-strategy', [
            'title' => 'Составление SEO стратегии',
            'service' => [
                'name' => 'Составление SEO стратегии',
                'description' => 'Разработка комплексного плана продвижения с учетом специфики бизнеса и конкурентной среды.',
                'icon' => 'assessment',
                'features' => [
                    'Анализ бизнеса и конкурентов',
                    'Определение целевой аудитории',
                    'Выбор ключевых запросов',
                    'Планирование этапов продвижения',
                    'Расчет бюджета и сроков',
                    'Создание детального плана работ'
                ],
                'price' => 'от 30 000 ₽',
                'duration' => '10-14 дней'
            ],
            'servicesFaqs' => $servicesFaqs
        ]);
    }
}
