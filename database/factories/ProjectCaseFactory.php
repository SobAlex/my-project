<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectCase>
 */
class ProjectCaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(4);
        $industry = $this->faker->randomElement(['electronics', 'production', 'clothing', 'furniture']);

        // Генерируем результаты на основе отрасли
        $results = $this->generateResultsByIndustry($industry);
        $beforeAfter = $this->generateBeforeAfterByIndustry($industry);

        return [
            'case_id' => 'seo-case-' . $this->faker->unique()->numberBetween(1, 1000),
            'title' => $title,
            'client' => $this->faker->company(),
            'industry' => $industry,
            'period' => $this->faker->randomElement(['6 месяцев', '8 месяцев', '10 месяцев', '12 месяцев', '7 месяцев', '9 месяцев', '11 месяцев']),
            'image' => $this->faker->randomElement(['human.jpeg', 'human2.jpeg', 'human.webp']),
            'description' => $this->faker->paragraphs(3, true),
            'results' => $results,
            'before_after' => $beforeAfter,
            'service_key' => 'seo-promotion',
            'is_published' => $this->faker->boolean(90),
            'sort_order' => $this->faker->numberBetween(0, 100),
            'user_id' => \App\Models\User::factory(),
        ];
    }

    /**
     * Generate results based on industry
     */
    private function generateResultsByIndustry($industry)
    {
        $resultsByIndustry = [
            'electronics' => [
                'Рост органического трафика на 400%',
                'Увеличение продаж на 280%',
                'Вывод в ТОП-10 по 150+ ключевым запросам',
                'Улучшение конверсии с 1.2% до 3.8%'
            ],
            'production' => [
                'Рост B2B трафика на 320%',
                'Увеличение заказов на 180%',
                'ТОП-3 по промышленным запросам',
                'Расширение географии поставок на 150%'
            ],
            'clothing' => [
                'Рост органического трафика на 450%',
                'Увеличение онлайн-продаж на 300%',
                'ТОП-5 по 200+ модным запросам',
                'Снижение стоимости привлечения на 40%'
            ],
            'furniture' => [
                'Рост каталожного трафика на 500%',
                'Увеличение заказов мебели на 220%',
                'ТОП-5 по 300+ мебельным запросам',
                'Рост конверсии каталога на 180%'
            ]
        ];

        return $resultsByIndustry[$industry] ?? $resultsByIndustry['electronics'];
    }

    /**
     * Generate before/after metrics based on industry
     */
    private function generateBeforeAfterByIndustry($industry)
    {
        $metricsByIndustry = [
            'electronics' => [
                'traffic' => ['before' => '2,500', 'after' => '12,000'],
                'keywords' => ['before' => '25', 'after' => '150'],
                'conversion' => ['before' => '1.2%', 'after' => '3.8%'],
                'revenue' => ['before' => '₽450K', 'after' => '₽1.7M']
            ],
            'production' => [
                'traffic' => ['before' => '1,200', 'after' => '5,040'],
                'keywords' => ['before' => '18', 'after' => '95'],
                'orders' => ['before' => '85', 'after' => '238'],
                'inquiries' => ['before' => '120', 'after' => '340']
            ],
            'clothing' => [
                'traffic' => ['before' => '800', 'after' => '4,400'],
                'keywords' => ['before' => '12', 'after' => '200'],
                'sales' => ['before' => '15', 'after' => '60'],
                'cost_per_sale' => ['before' => '₽2,500', 'after' => '₽1,500']
            ],
            'furniture' => [
                'traffic' => ['before' => '2,200', 'after' => '13,200'],
                'keywords' => ['before' => '35', 'after' => '300'],
                'orders' => ['before' => '45', 'after' => '144'],
                'catalog_conversion' => ['before' => '2.15%', 'after' => '6.18%']
            ]
        ];

        return $metricsByIndustry[$industry] ?? $metricsByIndustry['electronics'];
    }

    /**
     * Indicate that the case is published.
     */
    public function published(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_published' => true,
        ]);
    }

    /**
     * Indicate that the case is draft.
     */
    public function draft(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_published' => false,
        ]);
    }
}
