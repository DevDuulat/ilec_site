<section class="bg-gray-100 py-16">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
      <!-- Левая колонка (4/12) -->
      <div class="md:col-span-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-4">
          {{ __('messages.faq_title') }}
        </h2>
        <p class="text-gray-600 mb-8">
          {{ __('messages.faq_description') }}
        </p>

        <div class="border-t border-gray-200 pt-6">
          <h3 class="text-lg font-medium text-gray-900 mb-4">
            {{ __('messages.faq_other') }}
          </h3>
          <a href="{{ route('contacts') }}"
            class="mt-4 w-full inline-flex items-center justify-center gap-2 px-6 py-3 bg-gray-900 text-white rounded-xl font-medium hover:bg-gray-800 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
            </svg>
            {{ __('messages.faq_more') }}
          </a>
        </div>
      </div>

      <!-- Правая колонка с аккордеоном (8/12) -->



      <div class="md:col-span-8">
        <div class="space-y-4">
          @foreach($faqs as $faq)
          <details
            class="group bg-white rounded-2xl shadow-sm hover:shadow-md transition-all border border-gray-100 overflow-hidden">
            <summary class="flex items-center justify-between p-6 cursor-pointer list-none">
              <h3 class="text-lg font-medium text-gray-900">
                {{ $faq->getTranslation('question', $locale) }}
              </h3>
              <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-200 group-open:rotate-180"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </summary>
            <div class="px-6 pb-6">
              <p class="text-gray-600">
                {{ $faq->getTranslation('answer', $locale) }}
              </p>
            </div>
          </details>
          @endforeach
        </div>
      </div>

    </div>
  </div>

</section>