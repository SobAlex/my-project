{{-- FAQ section --}}
@if(isset($servicesFaqs) && $servicesFaqs && $servicesFaqs->count() > 0)
<section class="section-bg">
    <h2 class="section-title">Часто задаваемые вопросы</h2>
    <p class="text-center text-gray-600 mb-8 max-w-3xl mx-auto">
        Ответы на популярные вопросы о наших услугах.
        Не нашли ответ? Свяжитесь с нами для консультации.!
    </p>

    <div class="max-w-4xl mx-auto space-y-4">
        @foreach($servicesFaqs as $faq)
            <div class="element-bg rounded-md">
                <button class="faq-toggle w-full text-left p-6 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 flex justify-between items-center"
                        data-target="faq-answer-{{ $faq->id }}"
                        aria-expanded="false"
                        aria-controls="faq-answer-{{ $faq->id }}">
                    <span class="text-lg font-semibold text-gray-800 pr-4">{{ $faq->question }}</span>
                    <span class="faq-icon flex-shrink-0 text-cyan-500 transform transition-transform duration-200">
                        <i class="material-icons">expand_more</i>
                    </span>
                </button>
                <div id="faq-answer-{{ $faq->id }}" class="faq-answer hidden px-6 pb-6">
                    <div class="text-gray-600 leading-relaxed">
                        {!! nl2br(e($faq->answer)) !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@elseif(isset($homepageFaqs) && $homepageFaqs && $homepageFaqs->count() > 0)
<section class="section-bg">
    <h2 class="section-title">Часто задаваемые вопросы</h2>
    <p class="text-center text-gray-600 mb-8 max-w-3xl mx-auto">
        Ответы на популярные вопросы о SEO-продвижении и наших услугах.
        Не нашли ответ на свой вопрос? Свяжитесь с нами!
    </p>

    <div class="max-w-4xl mx-auto space-y-4">
        @foreach($homepageFaqs as $faq)
            <div class="element-bg rounded-md">
                <button class="faq-toggle w-full text-left p-6 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 flex justify-between items-center"
                        data-target="faq-answer-{{ $faq->id }}"
                        aria-expanded="false"
                        aria-controls="faq-answer-{{ $faq->id }}">
                    <span class="text-lg font-semibold text-gray-800 pr-4">{{ $faq->question }}</span>
                    <span class="faq-icon flex-shrink-0 text-cyan-500 transform transition-transform duration-200">
                        <i class="material-icons">expand_more</i>
                    </span>
                </button>
                <div id="faq-answer-{{ $faq->id }}" class="faq-answer hidden px-6 pb-6">
                    <div class="text-gray-600 leading-relaxed">
                        {!! nl2br(e($faq->answer)) !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endif
{{-- End FAQ --}}
