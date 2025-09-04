<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject ?? 'Сообщение с сайта' }}</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Arial, sans-serif;
            color: #111827;
        }

        .wrap {
            max-width: 640px;
            margin: 0 auto;
            padding: 16px;
        }

        .box {
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 16px;
        }

        .muted {
            color: #6b7280;
        }

        .label {
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="wrap">
        <h2>{{ $subject ?? 'Сообщение с сайта' }}</h2>
        <div class="box">
            <p><span class="label">Имя:</span> {{ $name ?? '-' }}</p>
            <p><span class="label">Email:</span> {{ $email ?? '-' }}</p>
            <p><span class="label">Телефон:</span> {{ $phone ?? '-' }}</p>
            @if (!empty($messageBody))
                <hr>
                <p class="label">Сообщение:</p>
                <p class="muted">{{ $messageBody }}</p>
            @endif
        </div>
    </div>
</body>

</html>
