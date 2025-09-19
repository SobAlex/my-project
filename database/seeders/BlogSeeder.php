<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\User;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Получаем первого пользователя или создаем тестового
        $user = User::first();
        if (!$user) {
            $user = User::create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
            ]);
        }

        $blogs = [
            [
                'title' => 'Новые алгоритмы Google: что изменилось в 2024 году',
                'slug' => 'google-algorithms-2024',
                'excerpt' => 'Обзор последних обновлений поисковых алгоритмов Google и их влияние на SEO.',
                'content' => '<p>В 2024 году Google представил несколько важных обновлений своих алгоритмов, которые существенно повлияли на ранжирование сайтов в поисковой выдаче.</p><p>Основные изменения включают:</p><ul><li>Улучшенное понимание контекста запросов</li><li>Больший акцент на пользовательском опыте</li><li>Обновленные критерии оценки качества контента</li></ul>',
                'image' => 'human.jpeg',
                'category' => 'seo-news',
                'meta_title' => 'Google алгоритмы 2024: обновления и влияние на SEO',
                'meta_description' => 'Подробный обзор новых алгоритмов Google 2024 года и их влияния на поисковую оптимизацию сайтов.',
                'is_published' => true,
                'sort_order' => 1,
                'user_id' => $user->id,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Анализ Core Web Vitals: как улучшить показатели',
                'slug' => 'core-web-vitals-analysis',
                'excerpt' => 'Практическое руководство по анализу и улучшению Core Web Vitals для повышения рейтинга сайта.',
                'content' => '<p>Core Web Vitals стали одним из ключевых факторов ранжирования в Google. В этой статье мы разберем, как правильно анализировать и улучшать эти показатели.</p><p>Основные метрики Core Web Vitals:</p><ul><li>LCP (Largest Contentful Paint)</li><li>FID (First Input Delay)</li><li>CLS (Cumulative Layout Shift)</li></ul>',
                'image' => 'human2.jpeg',
                'category' => 'analytics',
                'meta_title' => 'Core Web Vitals: анализ и улучшение показателей',
                'meta_description' => 'Полное руководство по анализу и оптимизации Core Web Vitals для улучшения SEO и пользовательского опыта.',
                'is_published' => true,
                'sort_order' => 2,
                'user_id' => $user->id,
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => '10 способов увеличить органический трафик на 200%',
                'slug' => 'increase-organic-traffic-200-percent',
                'excerpt' => 'Проверенные методы увеличения органического трафика, которые помогут значительно улучшить видимость сайта.',
                'content' => '<p>Увеличение органического трафика - одна из главных задач SEO. В этой статье мы поделимся проверенными методами, которые помогут увеличить трафик на 200% и более.</p><p>Ключевые стратегии:</p><ol><li>Оптимизация существующего контента</li><li>Создание качественного контента</li><li>Улучшение технического SEO</li><li>Работа с внутренними ссылками</li></ol>',
                'image' => 'human.webp',
                'category' => 'tips',
                'meta_title' => 'Как увеличить органический трафик на 200%: 10 проверенных способов',
                'meta_description' => 'Практические советы и стратегии для увеличения органического трафика на 200% и более.',
                'is_published' => true,
                'sort_order' => 3,
                'user_id' => $user->id,
                'published_at' => now()->subDays(1),
            ],
            [
                'title' => 'Яндекс.Вебмастер: новые возможности 2024',
                'slug' => 'yandex-webmaster-2024-features',
                'excerpt' => 'Обзор новых функций и возможностей Яндекс.Вебмастера, которые помогут в продвижении сайта.',
                'content' => '<p>Яндекс.Вебмастер получил несколько важных обновлений в 2024 году. Рассмотрим новые возможности и их практическое применение.</p><p>Новые функции включают:</p><ul><li>Улучшенную аналитику индексации</li><li>Новые инструменты для работы с контентом</li><li>Расширенные возможности мониторинга</li></ul>',
                'image' => 'human.jpeg',
                'category' => 'seo-news',
                'meta_title' => 'Яндекс.Вебмастер 2024: новые возможности и функции',
                'meta_description' => 'Обзор новых функций Яндекс.Вебмастера 2024 года и их применение для SEO-продвижения.',
                'is_published' => true,
                'sort_order' => 4,
                'user_id' => $user->id,
                'published_at' => now()->subHours(12),
            ],
            [
                'title' => 'Мобильная оптимизация: тренды и лучшие практики',
                'slug' => 'mobile-optimization-trends-2024',
                'excerpt' => 'Актуальные тренды мобильной оптимизации и лучшие практики для создания мобильно-дружественных сайтов.',
                'content' => '<p>Мобильная оптимизация становится все более важной для успеха сайта. Рассмотрим актуальные тренды и лучшие практики.</p><p>Ключевые аспекты мобильной оптимизации:</p><ul><li>Адаптивный дизайн</li><li>Быстрая загрузка</li><li>Удобная навигация</li><li>Оптимизация контента</li></ul>',
                'image' => 'human2.jpeg',
                'category' => 'analytics',
                'meta_title' => 'Мобильная оптимизация 2024: тренды и лучшие практики',
                'meta_description' => 'Актуальные тренды и лучшие практики мобильной оптимизации сайтов в 2024 году.',
                'is_published' => false,
                'sort_order' => 5,
                'user_id' => $user->id,
                'published_at' => null,
            ],
        ];

        foreach ($blogs as $blogData) {
            Blog::create($blogData);
        }
    }
}
