# 🎨 Обновление редакторов контента: HTML с живым превью

## ✅ Что изменено:

### **📝 Блоги**
- **Было:** `RichEditor` для полей `excerpt` (краткое описание) и `content` (основной контент статьи)
- **Стало:**
  - `excerpt` - `Textarea` (простое текстовое поле)
  - `content` - `Textarea` для ввода HTML + `Placeholder` для живого превью

### **🛠️ Услуги**
- **Было:** `Textarea` для поля `description` (краткое описание) и `RichEditor` для `content` (контент)
- **Стало:**
  - `description` - `Textarea` (простое текстовое поле)
  - `content` - `Textarea` для ввода HTML + `Placeholder` для живого превью

### **💼 Кейсы**
- **Было:** `RichEditor` для полей `description` (описание проекта) и `content` (дополнительная информация)
- **Стало:**
  - `description` - `Textarea` (простое текстовое поле)
  - `content` - `Textarea` для ввода HTML + `Placeholder` для живого превью

## 🎯 Преимущества:

1. **🔧 Полный контроль над HTML** - можно использовать любые теги и атрибуты
2. **👀 Живой превью** - видно результат сразу при вводе
3. **📱 Компактность** - форма стала менее загруженной
4. **⚡ Производительность** - быстрее загрузка и работа формы
5. **🎨 Гибкость стилизации** - можно добавлять классы и inline стили

## 🛠️ Технические детали:

### **Компоненты формы:**
```php
// HTML поле ввода
Textarea::make('content')
    ->label('Контент (HTML)')
    ->rows(8)
    ->live(onBlur: true)
    ->helperText('Вводите HTML-код. Используйте теги: <p>, <h2>, <h3>, <ul>, <li>, <strong>, <em>, <a>')
    ->columnSpanFull(),

// Живой превью
Placeholder::make('content_preview')
    ->label('Предпросмотр контента')
    ->content(function ($get) {
        $content = $get('content');
        if (!$content) {
            return new HtmlString('<div class="text-gray-500 italic p-4 bg-gray-50 rounded-lg">Введите контент выше для предпросмотра</div>');
        }

        return new HtmlString(
            '<div class="p-4 bg-white border rounded-lg shadow-sm" style="max-height: 300px; overflow-y: auto;">' .
            '<style scoped>/* CSS стили для превью */</style>' .
            '<div class="preview-content">' . $content . '</div>' .
            '</div>'
        );
    })
    ->hidden(fn ($get) => empty($get('content')))
    ->columnSpanFull(),
```

### **Поддерживаемые HTML теги:**
- `<p>` - параграфы
- `<h1>, <h2>, <h3>` - заголовки
- `<ul>, <ol>, <li>` - списки
- `<strong>, <em>` - выделение текста
- `<a href="">` - ссылки
- `<blockquote>` - цитаты
- `<code>, <pre>` - код

### **Стилизация превью:**
- Скроллинг при превышении высоты
- Адаптивные размеры заголовков
- Правильные отступы и цвета
- Стилизация ссылок и списков

## 📍 Измененные файлы:

### **Блоги:**
- `app/Filament/Resources/Blogs/Schemas/BlogForm.php`
  - Добавлен импорт `Placeholder` и `HtmlString`
  - Заменен `RichEditor::make('excerpt')` на `Textarea` (простое текстовое поле)
  - Заменен `RichEditor::make('content')` на `Textarea` + `Placeholder`

### **Услуги:**
- `app/Filament/Resources/Services/Schemas/ServiceForm.php`
  - `Textarea::make('description')` - остался простым текстовым полем
  - `Textarea::make('content')` + `Placeholder` - HTML редактор с живым превью

### **Кейсы:**
- `app/Filament/Resources/ProjectCases/Schemas/ProjectCaseForm.php`
  - Добавлен импорт `HtmlString`
  - Заменен `RichEditor::make('description')` на `Textarea` (простое текстовое поле)
  - Заменен `RichEditor::make('content')` на `Textarea` + `Placeholder`

## 🔄 Совместимость:

- ✅ **Существующий контент** продолжает работать без изменений
- ✅ **Публичные страницы** используют `{!! $content !!}` для корректного вывода HTML
- ✅ **Стилизация** через классы `prose` остается прежней

## 📖 Как использовать:

1. **Зайдите в админку** `/admin/blogs` или `/admin/project-cases`
2. **Создайте или отредактируйте запись**
3. **В поле HTML** введите разметку:
   ```html
   <h2>Заголовок раздела</h2>
   <p>Основной текст с <strong>выделением</strong> и <em>курсивом</em>.</p>
   <ul>
     <li>Первый пункт списка</li>
     <li>Второй пункт списка</li>
   </ul>
   ```
4. **В блоке превью** сразу увидите результат
5. **Сохраните** - контент отобразится на публичной странице

Теперь у вас есть полный контроль над HTML разметкой с удобным интерфейсом! 🚀✨
