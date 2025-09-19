<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'Сколько времени занимает SEO продвижение?',
                'answer' => 'Первые результаты обычно видны через 3-6 месяцев, но полное продвижение может занять 6-12 месяцев в зависимости от конкурентности ниши.',
                'sort_order' => 1,
                'is_active' => true
            ],
            [
                'question' => 'Какая стоимость SEO продвижения?',
                'answer' => 'Стоимость зависит от сложности проекта и конкурентности ниши. Мы предлагаем индивидуальный расчет для каждого клиента.',
                'sort_order' => 2,
                'is_active' => true
            ],
            [
                'question' => 'Предоставляете ли вы отчеты о проделанной работе?',
                'answer' => 'Да, мы ежемесячно предоставляем детальные отчеты о всех выполненных работах и достигнутых результатах.',
                'sort_order' => 3,
                'is_active' => true
            ],
            [
                'question' => 'Работаете ли вы с сайтами на разных CMS?',
                'answer' => 'Да, мы работаем с любыми CMS: WordPress, Bitrix, OpenCart, самописными сайтами и другими платформами.',
                'sort_order' => 4,
                'is_active' => true
            ],
            [
                'question' => 'Какие гарантии вы предоставляете?',
                'answer' => 'Мы гарантируем качественное выполнение работ в соответствии с техническим заданием и договором. При необходимости вносим корректировки в работу.',
                'sort_order' => 5,
                'is_active' => true
            ],
            [
                'question' => 'Как часто вы обновляете отчеты?',
                'answer' => 'Отчеты предоставляются ежемесячно, но при необходимости можем делать промежуточные отчеты по запросу клиента.',
                'sort_order' => 6,
                'is_active' => true
            ]
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
