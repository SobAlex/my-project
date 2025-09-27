<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'SEO продвижение',
                'slug' => 'seo-prodvizhenie',
                'description' => 'Комплексное SEO продвижение сайта в поисковых системах Google и Яндекс',
                'content' => '<h2>SEO продвижение сайтов</h2><p>Профессиональное SEO продвижение сайтов в поисковых системах Google и Яндекс. Увеличиваем органический трафик и конверсию.</p><h3>Что включает:</h3><ul><li>Технический аудит сайта</li><li>Анализ конкурентов</li><li>Подбор ключевых слов</li><li>Оптимизация контента</li><li>Работа с ссылочной массой</li><li>Ежемесячная отчетность</li></ul>',
                'icon' => 'trending_up',
                'color' => '#10B981',
                'price_from' => 50000,
                'price_type' => 'month',
                'features' => [
                    'Технический аудит сайта',
                    'Подбор ключевых слов',
                    'Оптимизация контента',
                    'Работа с ссылками',
                    'Ежемесячные отчеты'
                ],
                'meta_title' => 'SEO продвижение сайтов - Профессиональные услуги',
                'meta_description' => 'Комплексное SEO продвижение сайта в Google и Яндекс. Увеличиваем органический трафик и конверсию. Гарантия результата.',
                'is_published' => true,
                'is_featured' => true,
                'sort_order' => 10,
            ],
            [
                'title' => 'Контекстная реклама',
                'slug' => 'kontekstnaya-reklama',
                'description' => 'Настройка и ведение рекламных кампаний в Google Ads и Яндекс.Директ',
                'content' => '<h2>Контекстная реклама</h2><p>Профессиональная настройка и ведение рекламных кампаний в Google Ads и Яндекс.Директ.</p><h3>Услуги:</h3><ul><li>Анализ ниши и конкурентов</li><li>Настройка кампаний</li><li>Создание объявлений</li><li>Подбор ключевых слов</li><li>Оптимизация и A/B тестирование</li><li>Ежедневный мониторинг</li></ul>',
                'icon' => 'ads_click',
                'color' => '#3B82F6',
                'price_from' => 25000,
                'price_type' => 'month',
                'features' => [
                    'Настройка Google Ads',
                    'Настройка Яндекс.Директ',
                    'A/B тестирование',
                    'Ежедневный мониторинг',
                    'Детальная аналитика'
                ],
                'meta_title' => 'Контекстная реклама Google Ads и Яндекс.Директ',
                'meta_description' => 'Настройка и ведение контекстной рекламы в Google Ads и Яндекс.Директ. Максимальная конверсия при минимальной стоимости клика.',
                'is_published' => true,
                'is_featured' => true,
                'sort_order' => 20,
            ],
            [
                'title' => 'Веб-разработка',
                'slug' => 'veb-razrabotka',
                'description' => 'Разработка современных веб-сайтов и веб-приложений на Laravel, React, Vue.js',
                'content' => '<h2>Веб-разработка</h2><p>Разработка современных веб-сайтов и веб-приложений с использованием актуальных технологий.</p><h3>Технологии:</h3><ul><li>Laravel, PHP</li><li>React, Vue.js, JavaScript</li><li>MySQL, PostgreSQL</li><li>Docker, Git</li><li>Responsive дизайн</li><li>API интеграции</li></ul>',
                'icon' => 'web',
                'color' => '#8B5CF6',
                'price_from' => 100000,
                'price_type' => 'project',
                'features' => [
                    'Современные технологии',
                    'Адаптивный дизайн',
                    'API интеграции',
                    'SEO-оптимизация',
                    'Техническая поддержка'
                ],
                'meta_title' => 'Веб-разработка сайтов и приложений на Laravel',
                'meta_description' => 'Профессиональная разработка сайтов и веб-приложений на Laravel, React, Vue.js. Современные технологии и качественный код.',
                'is_published' => true,
                'is_featured' => true,
                'sort_order' => 30,
            ],
            [
                'title' => 'Аналитика и аудит',
                'slug' => 'analitika-i-audit',
                'description' => 'Комплексный аудит сайта и настройка веб-аналитики для отслеживания эффективности',
                'content' => '<h2>Аналитика и аудит</h2><p>Комплексный анализ вашего сайта и настройка систем аналитики для принятия обоснованных решений.</p><h3>Что включает:</h3><ul><li>Технический аудит сайта</li><li>UX/UI аудит</li><li>SEO аудит</li><li>Настройка Google Analytics</li><li>Настройка Яндекс.Метрики</li><li>Настройка целей и событий</li></ul>',
                'icon' => 'analytics',
                'color' => '#F59E0B',
                'price_from' => 30000,
                'price_type' => 'project',
                'features' => [
                    'Технический аудит',
                    'UX/UI анализ',
                    'SEO аудит',
                    'Настройка аналитики',
                    'Отчеты и рекомендации'
                ],
                'meta_title' => 'Веб-аналитика и аудит сайта - Профессиональные услуги',
                'meta_description' => 'Комплексный аудит сайта и настройка веб-аналитики. Получите детальную информацию о работе вашего сайта.',
                'is_published' => true,
                'is_featured' => false,
                'sort_order' => 40,
            ],
        ];

        foreach ($services as $serviceData) {
            Service::create($serviceData);
        }

        // Создаем дополнительные услуги через фабрику
        Service::factory(6)->create();
    }
}
