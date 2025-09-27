#!/bin/bash

# Скрипт для запуска обработчика очереди Laravel
# Использование: ./start-queue.sh

echo "🚀 Запуск обработчика очереди Laravel..."
echo "📧 Письма будут отправляться автоматически"
echo "🔄 Для остановки нажмите Ctrl+C"
echo "----------------------------------------"

# Переход в директорию проекта
cd "$(dirname "$0")"

# Запуск обработчика очереди с автоматическим перезапуском
while true; do
    echo "$(date): Запуск queue worker..."
    php artisan queue:work --verbose --tries=3 --timeout=120 --sleep=3 --max-jobs=100

    echo "$(date): Queue worker остановлен. Перезапуск через 5 секунд..."
    sleep 5
done
