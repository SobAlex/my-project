#!/bin/bash

# Скрипт для применения чистых миграций

echo "🔄 Применение чистых миграций..."

# Создаем резервную копию
echo "📦 Создание резервной копии базы данных..."
cp database/database.sqlite database/database_backup_$(date +%Y%m%d_%H%M%S).sqlite

# Создаем резервную копию старых миграций
echo "📁 Создание резервной копии старых миграций..."
mkdir -p database/migrations_backup_$(date +%Y%m%d_%H%M%S)
cp database/migrations/*.php database/migrations_backup_$(date +%Y%m%d_%H%M%S)/

# Удаляем старые миграции (кроме системных)
echo "🗑️ Удаление старых миграций..."
rm -f database/migrations/2025_*.php

# Копируем новые миграции
echo "📋 Копирование новых миграций..."
cp database/migrations_clean/2025_09_28_*.php database/migrations/

# Сбрасываем базу данных и применяем новые миграции
echo "🔄 Сброс базы данных и применение новых миграций..."
php artisan migrate:fresh --seed

echo "✅ Чистые миграции успешно применены!"
echo "📊 База данных пересоздана с чистой структурой"
echo "🌱 Данные пересобраны из seeders"
