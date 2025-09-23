<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Получаем все записи с данными before_after
        $cases = DB::table('cases')
            ->whereNotNull('before_after')
            ->where('before_after', '!=', '')
            ->get();

        foreach ($cases as $case) {
            $beforeAfterData = json_decode($case->before_after, true);

            if (!is_array($beforeAfterData)) {
                continue;
            }

            $updateData = [];

            // Маппинг метрик на поля базы данных
            $metricMapping = [
                'traffic' => ['traffic_before', 'traffic_after'],
                'keywords' => ['keywords_before', 'keywords_after'],
                'conversion' => ['conversion_before', 'conversion_after'],
                'revenue' => ['revenue_before', 'revenue_after'],
                'appointments' => ['appointments_before', 'appointments_after'],
                'calls' => ['calls_before', 'calls_after'],
                'leads' => ['leads_before', 'leads_after'],
                'cost_per_lead' => ['cost_per_lead_before', 'cost_per_lead_after'],
                'mobile_traffic' => ['mobile_traffic_before', 'mobile_traffic_after'],
                'repeat_clients' => ['repeat_clients_before', 'repeat_clients_after'],
                'enrollments' => ['enrollments_before', 'enrollments_after'],
                'time_on_site' => ['time_on_site_before', 'time_on_site_after'],
                'local_traffic' => ['local_traffic_before', 'local_traffic_after'],
                'map_views' => ['map_views_before', 'map_views_after'],
                'reservations' => ['reservations_before', 'reservations_after'],
                'avg_check' => ['avg_check_before', 'avg_check_after'],
                'b2b_traffic' => ['b2b_traffic_before', 'b2b_traffic_after'],
                'large_orders' => ['large_orders_before', 'large_orders_after'],
                'avg_project' => ['avg_project_before', 'avg_project_after'],
                'orders' => ['orders_before', 'orders_after'],
                'inquiries' => ['inquiries_before', 'inquiries_after'],
                'sales' => ['sales_before', 'sales_after'],
                'cost_per_sale' => ['cost_per_sale_before', 'cost_per_sale_after'],
                'avg_order' => ['avg_order_before', 'avg_order_after'],
                'catalog_conversion' => ['catalog_conversion_before', 'catalog_conversion_after'],
                'brand_traffic' => ['brand_traffic_before', 'brand_traffic_after'],
                'product_views' => ['product_views_before', 'product_views_after'],
            ];

            foreach ($beforeAfterData as $metric => $values) {
                if (isset($metricMapping[$metric]) && is_array($values)) {
                    $beforeField = $metricMapping[$metric][0];
                    $afterField = $metricMapping[$metric][1];

                    $updateData[$beforeField] = $values['before'] ?? null;
                    $updateData[$afterField] = $values['after'] ?? null;
                }
            }

            if (!empty($updateData)) {
                DB::table('cases')
                    ->where('id', $case->id)
                    ->update($updateData);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // В обратную сторону - собираем данные обратно в JSON
        $cases = DB::table('cases')
            ->where(function($query) {
                $query->whereNotNull('traffic_before')
                    ->orWhereNotNull('traffic_after')
                    ->orWhereNotNull('keywords_before')
                    ->orWhereNotNull('keywords_after');
            })
            ->get();

        foreach ($cases as $case) {
            $beforeAfterData = [];

            $metricMapping = [
                'traffic' => ['traffic_before', 'traffic_after'],
                'keywords' => ['keywords_before', 'keywords_after'],
                'conversion' => ['conversion_before', 'conversion_after'],
                'revenue' => ['revenue_before', 'revenue_after'],
                'appointments' => ['appointments_before', 'appointments_after'],
                'calls' => ['calls_before', 'calls_after'],
                'leads' => ['leads_before', 'leads_after'],
                'cost_per_lead' => ['cost_per_lead_before', 'cost_per_lead_after'],
                'mobile_traffic' => ['mobile_traffic_before', 'mobile_traffic_after'],
                'repeat_clients' => ['repeat_clients_before', 'repeat_clients_after'],
                'enrollments' => ['enrollments_before', 'enrollments_after'],
                'time_on_site' => ['time_on_site_before', 'time_on_site_after'],
                'local_traffic' => ['local_traffic_before', 'local_traffic_after'],
                'map_views' => ['map_views_before', 'map_views_after'],
                'reservations' => ['reservations_before', 'reservations_after'],
                'avg_check' => ['avg_check_before', 'avg_check_after'],
                'b2b_traffic' => ['b2b_traffic_before', 'b2b_traffic_after'],
                'large_orders' => ['large_orders_before', 'large_orders_after'],
                'avg_project' => ['avg_project_before', 'avg_project_after'],
                'orders' => ['orders_before', 'orders_after'],
                'inquiries' => ['inquiries_before', 'inquiries_after'],
                'sales' => ['sales_before', 'sales_after'],
                'cost_per_sale' => ['cost_per_sale_before', 'cost_per_sale_after'],
                'avg_order' => ['avg_order_before', 'avg_order_after'],
                'catalog_conversion' => ['catalog_conversion_before', 'catalog_conversion_after'],
                'brand_traffic' => ['brand_traffic_before', 'brand_traffic_after'],
                'product_views' => ['product_views_before', 'product_views_after'],
            ];

            foreach ($metricMapping as $metric => $fields) {
                $beforeValue = $case->{$fields[0]};
                $afterValue = $case->{$fields[1]};

                if ($beforeValue || $afterValue) {
                    $beforeAfterData[$metric] = [
                        'before' => $beforeValue,
                        'after' => $afterValue,
                    ];
                }
            }

            if (!empty($beforeAfterData)) {
                DB::table('cases')
                    ->where('id', $case->id)
                    ->update(['before_after' => json_encode($beforeAfterData)]);
            }
        }
    }
};
