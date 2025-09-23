<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('cases', function (Blueprint $table) {
            // Трафик
            $table->string('traffic_before')->nullable();
            $table->string('traffic_after')->nullable();

            // Ключевые слова
            $table->string('keywords_before')->nullable();
            $table->string('keywords_after')->nullable();

            // Конверсия
            $table->string('conversion_before')->nullable();
            $table->string('conversion_after')->nullable();

            // Выручка
            $table->string('revenue_before')->nullable();
            $table->string('revenue_after')->nullable();

            // Записи
            $table->string('appointments_before')->nullable();
            $table->string('appointments_after')->nullable();

            // Звонки
            $table->string('calls_before')->nullable();
            $table->string('calls_after')->nullable();

            // Лиды
            $table->string('leads_before')->nullable();
            $table->string('leads_after')->nullable();

            // Цена лида
            $table->string('cost_per_lead_before')->nullable();
            $table->string('cost_per_lead_after')->nullable();

            // Мобильный трафик
            $table->string('mobile_traffic_before')->nullable();
            $table->string('mobile_traffic_after')->nullable();

            // Повторные клиенты
            $table->string('repeat_clients_before')->nullable();
            $table->string('repeat_clients_after')->nullable();

            // Записи на курсы
            $table->string('enrollments_before')->nullable();
            $table->string('enrollments_after')->nullable();

            // Время на сайте
            $table->string('time_on_site_before')->nullable();
            $table->string('time_on_site_after')->nullable();

            // Локальный трафик
            $table->string('local_traffic_before')->nullable();
            $table->string('local_traffic_after')->nullable();

            // Просмотры на карте
            $table->string('map_views_before')->nullable();
            $table->string('map_views_after')->nullable();

            // Бронирования
            $table->string('reservations_before')->nullable();
            $table->string('reservations_after')->nullable();

            // Средний чек
            $table->string('avg_check_before')->nullable();
            $table->string('avg_check_after')->nullable();

            // B2B трафик
            $table->string('b2b_traffic_before')->nullable();
            $table->string('b2b_traffic_after')->nullable();

            // Крупные заказы
            $table->string('large_orders_before')->nullable();
            $table->string('large_orders_after')->nullable();

            // Средний проект
            $table->string('avg_project_before')->nullable();
            $table->string('avg_project_after')->nullable();

            // Заказы
            $table->string('orders_before')->nullable();
            $table->string('orders_after')->nullable();

            // Запросы
            $table->string('inquiries_before')->nullable();
            $table->string('inquiries_after')->nullable();

            // Продажи
            $table->string('sales_before')->nullable();
            $table->string('sales_after')->nullable();

            // Цена продажи
            $table->string('cost_per_sale_before')->nullable();
            $table->string('cost_per_sale_after')->nullable();

            // Средний заказ
            $table->string('avg_order_before')->nullable();
            $table->string('avg_order_after')->nullable();

            // Конверсия каталога
            $table->string('catalog_conversion_before')->nullable();
            $table->string('catalog_conversion_after')->nullable();

            // Брендовый трафик
            $table->string('brand_traffic_before')->nullable();
            $table->string('brand_traffic_after')->nullable();

            // Просмотры товаров
            $table->string('product_views_before')->nullable();
            $table->string('product_views_after')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cases', function (Blueprint $table) {
            $table->dropColumn([
                'traffic_before', 'traffic_after',
                'keywords_before', 'keywords_after',
                'conversion_before', 'conversion_after',
                'revenue_before', 'revenue_after',
                'appointments_before', 'appointments_after',
                'calls_before', 'calls_after',
                'leads_before', 'leads_after',
                'cost_per_lead_before', 'cost_per_lead_after',
                'mobile_traffic_before', 'mobile_traffic_after',
                'repeat_clients_before', 'repeat_clients_after',
                'enrollments_before', 'enrollments_after',
                'time_on_site_before', 'time_on_site_after',
                'local_traffic_before', 'local_traffic_after',
                'map_views_before', 'map_views_after',
                'reservations_before', 'reservations_after',
                'avg_check_before', 'avg_check_after',
                'b2b_traffic_before', 'b2b_traffic_after',
                'large_orders_before', 'large_orders_after',
                'avg_project_before', 'avg_project_after',
                'orders_before', 'orders_after',
                'inquiries_before', 'inquiries_after',
                'sales_before', 'sales_after',
                'cost_per_sale_before', 'cost_per_sale_after',
                'avg_order_before', 'avg_order_after',
                'catalog_conversion_before', 'catalog_conversion_after',
                'brand_traffic_before', 'brand_traffic_after',
                'product_views_before', 'product_views_after',
            ]);
        });
    }
};
