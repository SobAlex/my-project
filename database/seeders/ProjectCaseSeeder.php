<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectCaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Создаем 8 реалистичных кейсов как в оригинальном контроллере
        $cases = [
            [
                'case_id' => 'seo-case-1',
                'title' => 'Интернет-магазин электроники',
                'client' => 'TechStore',
                'industry' => 'electronics',
                'period' => '6 месяцев',
                'image' => 'human.jpeg',
                'description' => 'Комплексное SEO продвижение интернет-магазина электроники с увеличением органического трафика в 4 раза и ростом продаж на 280%.',
                'result_1' => 'Рост органического трафика на 400%',
                'result_2' => 'Увеличение продаж на 280%',
                'result_3' => 'Вывод в ТОП-10 по 150+ ключевым запросам',
                'result_4' => 'Улучшение конверсии с 1.2% до 3.8%',
                'before_after' => [
                    'traffic' => ['before' => '2,500', 'after' => '12,000'],
                    'keywords' => ['before' => '25', 'after' => '150'],
                    'conversion' => ['before' => '1.2%', 'after' => '3.8%'],
                    'revenue' => ['before' => '₽450K', 'after' => '₽1.7M']
                ],
                'service_key' => 'seo-promotion',
                'is_published' => true,
                'sort_order' => 1,
                'user_id' => 1,
            ],
            [
                'case_id' => 'seo-case-2',
                'title' => 'Завод металлоконструкций',
                'client' => 'МеталлПром',
                'industry' => 'production',
                'period' => '8 месяцев',
                'image' => 'human2.jpeg',
                'description' => 'SEO продвижение производственного предприятия по изготовлению металлоконструкций с увеличением B2B заказов и расширением географии поставок.',
                'result_1' => 'Рост B2B трафика на 320%',
                'result_2' => 'Увеличение заказов на 180%',
                'result_3' => 'ТОП-3 по промышленным запросам',
                'result_4' => 'Расширение географии поставок на 150%',
                'before_after' => [
                    'traffic' => ['before' => '1,200', 'after' => '5,040'],
                    'keywords' => ['before' => '18', 'after' => '95'],
                    'orders' => ['before' => '85', 'after' => '238'],
                    'inquiries' => ['before' => '120', 'after' => '340']
                ],
                'service_key' => 'seo-promotion',
                'is_published' => true,
                'sort_order' => 2,
                'user_id' => 1,
            ],
            [
                'case_id' => 'seo-case-3',
                'title' => 'Интернет-магазин одежды',
                'client' => 'FashionStore',
                'industry' => 'clothing',
                'period' => '10 месяцев',
                'image' => 'human.webp',
                'description' => 'SEO продвижение интернет-магазина модной одежды с увеличением онлайн-продаж и расширением ассортиментной линейки.',
                'result_1' => 'Рост органического трафика на 450%',
                'result_2' => 'Увеличение онлайн-продаж на 300%',
                'result_3' => 'ТОП-5 по 200+ модным запросам',
                'result_4' => 'Снижение стоимости привлечения на 40%',
                'before_after' => [
                    'traffic' => ['before' => '800', 'after' => '4,400'],
                    'keywords' => ['before' => '12', 'after' => '200'],
                    'sales' => ['before' => '15', 'after' => '60'],
                    'cost_per_sale' => ['before' => '₽2,500', 'after' => '₽1,500']
                ],
                'service_key' => 'seo-promotion',
                'is_published' => true,
                'sort_order' => 3,
                'user_id' => 1,
            ],
            [
                'case_id' => 'seo-case-4',
                'title' => 'Производство пищевого оборудования',
                'client' => 'ПищеПром',
                'industry' => 'production',
                'period' => '12 месяцев',
                'image' => 'human.jpeg',
                'description' => 'SEO продвижение производителя промышленного пищевого оборудования с фокусом на B2B сегмент и экспортные поставки.',
                'result_1' => 'Рост B2B трафика на 380%',
                'result_2' => 'Увеличение промышленных заказов на 250%',
                'result_3' => 'ТОП-10 по 180+ промышленным запросам',
                'result_4' => 'Рост среднего заказа на 35%',
                'before_after' => [
                    'traffic' => ['before' => '1,800', 'after' => '8,640'],
                    'keywords' => ['before' => '28', 'after' => '180'],
                    'orders' => ['before' => '25', 'after' => '88'],
                    'avg_order' => ['before' => '₽180K', 'after' => '₽243K']
                ],
                'service_key' => 'seo-promotion',
                'is_published' => true,
                'sort_order' => 4,
                'user_id' => 1,
            ],
            [
                'case_id' => 'seo-case-5',
                'title' => 'Автосервис',
                'client' => 'АвтоМастер',
                'industry' => 'electronics',
                'period' => '7 месяцев',
                'image' => 'human2.jpeg',
                'description' => 'SEO продвижение сети автосервисов с фокусом на геозависимые запросы и мобильную оптимизацию.',
                'result_1' => 'Рост мобильного трафика на 420%',
                'result_2' => 'Увеличение звонков на 190%',
                'result_3' => 'ТОП-3 по геозависимым запросам',
                'result_4' => 'Рост повторных обращений на 85%',
                'before_after' => [
                    'mobile_traffic' => ['before' => '1,500', 'after' => '7,800'],
                    'keywords' => ['before' => '22', 'after' => '125'],
                    'calls' => ['before' => '180', 'after' => '522'],
                    'repeat_clients' => ['before' => '35%', 'after' => '65%']
                ],
                'service_key' => 'seo-promotion',
                'is_published' => true,
                'sort_order' => 5,
                'user_id' => 1,
            ],
            [
                'case_id' => 'seo-case-6',
                'title' => 'Мебельная фабрика',
                'client' => 'МебельПром',
                'industry' => 'furniture',
                'period' => '9 месяцев',
                'image' => 'human.webp',
                'description' => 'SEO продвижение мебельной фабрики с акцентом на каталог продукции и региональное продвижение мебельных салонов.',
                'result_1' => 'Рост каталожного трафика на 500%',
                'result_2' => 'Увеличение заказов мебели на 220%',
                'result_3' => 'ТОП-5 по 300+ мебельным запросам',
                'result_4' => 'Рост конверсии каталога на 180%',
                'before_after' => [
                    'traffic' => ['before' => '2,200', 'after' => '13,200'],
                    'keywords' => ['before' => '35', 'after' => '300'],
                    'orders' => ['before' => '45', 'after' => '144'],
                    'catalog_conversion' => ['before' => '2.15%', 'after' => '6.18%']
                ],
                'service_key' => 'seo-promotion',
                'is_published' => true,
                'sort_order' => 6,
                'user_id' => 1,
            ],
            [
                'case_id' => 'seo-case-7',
                'title' => 'Бренд спортивной одежды',
                'client' => 'SportWear',
                'industry' => 'clothing',
                'period' => '6 месяцев',
                'image' => 'human.jpeg',
                'description' => 'SEO продвижение бренда спортивной одежды с фокусом на молодежную аудиторию и сезонные коллекции.',
                'result_1' => 'Рост брендового трафика на 350%',
                'result_2' => 'Увеличение онлайн-продаж на 280%',
                'result_3' => 'ТОП-1 по спортивным запросам',
                'result_4' => 'Рост среднего чека на 25%',
                'before_after' => [
                    'brand_traffic' => ['before' => '900', 'after' => '4,050'],
                    'product_views' => ['before' => '1,200', 'after' => '8,500'],
                    'sales' => ['before' => '120', 'after' => '456'],
                    'avg_check' => ['before' => '₽1,800', 'after' => '₽2,250']
                ],
                'service_key' => 'seo-promotion',
                'is_published' => true,
                'sort_order' => 7,
                'user_id' => 1,
            ],
            [
                'case_id' => 'seo-case-8',
                'title' => 'IT-компания',
                'client' => 'TechSolutions',
                'industry' => 'electronics',
                'period' => '11 месяцев',
                'image' => 'human2.jpeg',
                'description' => 'Техническое SEO продвижение IT-компании в B2B сегменте с созданием экспертного контента и работой с длинным хвостом.',
                'result_1' => 'Рост B2B трафика на 480%',
                'result_2' => 'Увеличение крупных заказов на 320%',
                'result_3' => 'ТОП-10 по 250+ техническим запросам',
                'result_4' => 'Рост стоимости среднего проекта на 60%',
                'before_after' => [
                    'b2b_traffic' => ['before' => '1,100', 'after' => '6,380'],
                    'keywords' => ['before' => '20', 'after' => '250'],
                    'large_orders' => ['before' => '8', 'after' => '34'],
                    'avg_project' => ['before' => '₽250K', 'after' => '₽400K']
                ],
                'service_key' => 'seo-promotion',
                'is_published' => true,
                'sort_order' => 8,
                'user_id' => 1,
            ]
        ];

        foreach ($cases as $caseData) {
            \App\Models\ProjectCase::create($caseData);
        }
    }
}
