<!-- Форма заявки - компактная -->
<section class="bg-[#202124] py-12">
  <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
    <!-- Белая карточка формы -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
      <div class="p-6 sm:p-8">
        <div class="flex flex-col md:flex-row gap-8">
          <!-- Текстовая часть -->
          <div class="md:w-1/2">
            <h2 class="text-2xl font-bold text-gray-900 mb-3">
              Нужна консультация?
            </h2>
            <p class="text-gray-600 mb-4">
              Оставьте заявку и наш специалист свяжется с вами в течение 24
              часов
            </p>
            <div class="flex items-center text-sm text-gray-500 mb-2">
              <svg class="w-4 h-4 mr-2 text-[#800F12]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
              Бесплатная консультация
            </div>
            <div class="flex items-center text-sm text-gray-500">
              <svg class="w-4 h-4 mr-2 text-[#800F12]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
              Помощь в подборе вуза
            </div>
          </div>

          <!-- Форма -->
          <div class="md:w-1/2">
            <form method="POST" action="{{ route('request-forms.store') }}" class="space-y-4">
              @csrf

              <div>
                <input type="text" name="name" placeholder="Ваше имя*" required
                  class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#800F12] focus:border-[#800F12] text-sm" />
              </div>

              <div>
                <input type="email" name="email" placeholder="Email*" required
                  class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#800F12] focus:border-[#800F12] text-sm" />
              </div>

              <div class="flex">
                <div class="relative w-1/3 mr-2">
                  <select name="phone_code"
                    class="appearance-none w-full px-3 py-2.5 pr-8 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#800F12] text-sm bg-white">
                    <option value="+7">🇷🇺 +7</option>
                    <option value="+1">🇺🇸 +1</option>
                    <option value="+44">🇬🇧 +44</option>
                  </select>
                  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                    <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                  </div>
                </div>
                <input type="tel" name="phone_number" placeholder="(999) 123-45-67" required
                  class="flex-1 px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#800F12] text-sm"
                  x-data="{}" x-mask="(999) 999-99-99" />
              </div>

              <button type="submit"
                class="w-full bg-[#800F12] hover:bg-[#5C0B0D] text-white py-2.5 px-4 rounded-lg font-medium text-sm transition duration-300">
                Отправить заявку
              </button>

              <p class="text-xs text-gray-500 text-center">
                Нажимая кнопку, вы соглашаетесь с
                <a href="#" class="text-[#800F12] hover:underline">политикой конфиденциальности</a>
              </p>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>