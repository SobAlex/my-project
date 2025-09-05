<!-- Модальное окно: Заказать звонок -->
<div x-data="{ callbackOpen: false }" @open-callback.window="callbackOpen = true" @keydown.escape.window="callbackOpen = false">
    <div x-show="callbackOpen" x-transition.opacity class="fixed inset-0 z-50 flex items-center justify-center"
        style="display: none;">
        <!-- Фон -->
        <div class="absolute inset-0 bg-black/50" aria-hidden="true" @click="callbackOpen = false"></div>

        <!-- Диалог -->
        <div class="relative bg-white w-full max-w-md mx-4 rounded shadow-lg p-6" role="dialog" aria-modal="true"
            aria-labelledby="callback_title">
            <div class="flex items-start justify-between mb-4">
                <h3 id="callback_title" class="text-xl font-semibold">Заказать звонок</h3>
                <button class="text-gray-500 hover:text-gray-700" aria-label="Закрыть" @click="callbackOpen = false">
                    <span class="material-icons">close</span>
                </button>
            </div>

            <form action="{{ route('contact.hero') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="name_callback" class="block mb-1">Имя</label>
                    <input type="text" id="name_callback" name="name" required placeholder="Ваше имя"
                        class="w-full px-3 py-2" aria-required="true" aria-label="Имя" />
                </div>

                <div>
                    <label for="phone_callback" class="block mb-1">Телефон</label>
                    <input type="tel" id="phone_callback" name="phone" required pattern="\+?\d{7,15}"
                        placeholder="+7XXXXXXXXXX" class="w-full px-3 py-2" aria-required="true" aria-label="Телефон" />
                </div>

                <div class="flex items-center justify-end gap-3 pt-2">
                    <button type="button" class="btn" @click="callbackOpen = false">Отмена</button>
                    <button type="submit" class="btn">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Модальное окно: Заказ услуги -->
<div id="serviceOrderModal" class="fixed inset-0 z-50 flex items-start sm:items-center justify-center overflow-y-auto"
    style="display: none;">
    <!-- Фон -->
    <div class="absolute inset-0 bg-black/50" aria-hidden="true" onclick="closeServiceOrderModal()"></div>

    <!-- Диалог -->
    <div class="relative bg-white w-full max-w-lg mx-4 my-4 sm:my-8 rounded shadow-lg p-4 sm:p-6" role="dialog"
        aria-modal="true" aria-labelledby="service_order_title">
        <!-- Заголовок с кнопкой закрытия - всегда видимый -->
        <div class="flex items-start justify-between mb-4 sticky top-0 bg-white pb-2 border-b border-gray-200">
            <h3 id="service_order_title" class="text-lg sm:text-xl font-semibold pr-2">Заказ услуги</h3>
            <button class="text-gray-500 hover:text-gray-700 flex-shrink-0 p-1" aria-label="Закрыть"
                onclick="closeServiceOrderModal()">
                <span class="material-icons text-2xl">close</span>
            </button>
        </div>

        <!-- Прокручиваемая область формы -->
        <div class="max-h-[calc(100vh-200px)] overflow-y-auto">
            <form id="serviceOrderForm" action="{{ route('service.order') }}" method="POST" class="space-y-4"
                enctype="multipart/form-data">
                @csrf

                <!-- Скрытое поле с названием услуги -->
                <input type="hidden" name="service_name" id="service_name_input" required>

                <div>
                    <label for="service_display" class="block mb-1 text-sm font-medium">Услуга</label>
                    <input type="text" id="service_display" readonly
                        class="w-full px-3 py-2 bg-gray-100 text-gray-600 rounded border" />
                </div>

                <div>
                    <label for="name_service" class="block mb-1 text-sm font-medium">Имя *</label>
                    <input type="text" id="name_service" name="name" required placeholder="Ваше имя"
                        class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        aria-required="true" aria-label="Имя" />
                </div>

                <div>
                    <label for="email_service" class="block mb-1 text-sm font-medium">Email *</label>
                    <input type="email" id="email_service" name="email" required placeholder="your@email.com"
                        class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        aria-required="true" aria-label="Email" />
                </div>

                <div>
                    <label for="phone_service" class="block mb-1 text-sm font-medium">Телефон *</label>
                    <input type="tel" id="phone_service" name="phone" required pattern="\+?\d{7,15}"
                        placeholder="+7XXXXXXXXXX"
                        class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        aria-required="true" aria-label="Телефон" />
                </div>

                <div>
                    <label for="message_service" class="block mb-1 text-sm font-medium">Сообщение</label>
                    <textarea id="message_service" name="message" rows="3" placeholder="Опишите ваши требования или вопросы..."
                        class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        aria-label="Сообщение"></textarea>
                </div>

                <div>
                    <label for="attachment_service" class="block mb-1 text-sm font-medium">Прикрепить файл</label>
                    <input type="file" id="attachment_service" name="attachment"
                        accept=".pdf,.doc,.docx,.txt,.jpg,.jpeg,.png,.gif"
                        class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        aria-label="Прикрепить файл" />
                    <p class="text-xs text-gray-500 mt-1">Поддерживаются: PDF, DOC, DOCX, TXT, JPG, JPEG, PNG, GIF (до
                        10 МБ)</p>
                </div>
            </form>
        </div>

        <!-- Кнопки - всегда видимые внизу -->
        <div class="flex items-center justify-end gap-3 pt-4 mt-4 border-t border-gray-200 bg-white sticky bottom-0">
            <button type="button" class="btn-secondary px-4 py-2 text-sm"
                onclick="closeServiceOrderModal()">Отмена</button>
            <button type="submit" form="serviceOrderForm" class="btn px-4 py-2 text-sm">Заказать услугу</button>
        </div>
    </div>
</div>
