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
              {{ __('request_form.title') }}
            </h2>
            <p class="text-gray-600 mb-4">
              {{ __('request_form.description') }}
            </p>
            <div class="flex items-center text-sm text-gray-500 mb-2">
              <svg class="w-4 h-4 mr-2 text-[#800F12]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
              {{ __('request_form.features.free_consultation') }}
            </div>
            <div class="flex items-center text-sm text-gray-500">
              <svg class="w-4 h-4 mr-2 text-[#800F12]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
              {{ __('request_form.features.university_help') }}
            </div>
          </div>

          <!-- Форма -->
          <div class="md:w-1/2">
            <form method="POST" action="{{ route('request-forms.store') }}" class="space-y-4">
              @csrf

              <div>
                <input type="text" name="name" placeholder="{{ __('request_form.fields.name') }}" required
                  class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#800F12] focus:border-[#800F12] text-sm" />
              </div>

              <div>
                <input type="email" name="email" placeholder="{{ __('request_form.fields.email') }}" required
                  class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#800F12] focus:border-[#800F12] text-sm" />
              </div>

              <div class="flex" x-data="phoneInputStaticGeo()" x-init="init()">
                <div class="relative w-1/3 mr-2">
                  <select x-model="selectedCode" name="phone_code"
                    class="appearance-none w-full px-3 py-2.5 pr-8 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#800F12] text-sm bg-white">
                    <template x-for="country in countries" :key="country.code">
                      <option :value="country.dial_code" x-text="country.flag + ' ' + country.dial_code"></option>
                    </template>
                  </select>
                  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                    <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                  </div>
                </div>

                <input type="tel" id="phone" name="phone" required x-model="phoneNumber" @input="onlyDigits"
                  placeholder="{{ __('request_form.fields.phone_number') }}"
                  class="flex-1 px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#800F12] text-sm"
                  x-mask="(999) 999-99-99">

                <!-- Это поле отправит полный номер -->
                <input type="hidden" name="phone_number" :value="fullPhone()">
              </div>


              <button type="submit"
                class="w-full bg-[#800F12] hover:bg-[#5C0B0D] text-white py-2.5 px-4 rounded-lg font-medium text-sm transition duration-300">
                {{ __('request_form.button') }}
              </button>

              <p class="text-xs text-gray-500 text-center">
                {{ __('request_form.privacy') }}
                <a href="#" class="text-[#800F12] hover:underline">{{ __('request_form.privacy_link') }}</a>
              </p>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  function phoneInputStaticGeo() {
  return {
    countries: [],
    selectedCode: '',
    phoneNumber: '',

    async init() {
      try {
        // Загружаем список стран
        const resCountries = await fetch('/countries.json');
        if (!resCountries.ok) throw new Error('Не удалось загрузить countries.json');
        this.countries = (await resCountries.json()).map(c => ({
          ...c,
          flag: this.getFlagEmoji(c.code)
        }));

        // Определяем страну по IP через ip-api.com
        const resGeo = await fetch('http://ip-api.com/json/');
        if (!resGeo.ok) throw new Error('Не удалось определить страну по IP');
        const geo = await resGeo.json();

        const country = this.countries.find(c => c.code === geo.countryCode);
        if (country) {
          this.selectedCode = country.dial_code;
        }

      } catch (e) {
        console.warn('Ошибка загрузки стран или определения IP:', e.message);
      }
    },


    getFlagEmoji(countryCode) {
      return countryCode
        .toUpperCase()
        .replace(/./g, char => String.fromCodePoint(127397 + char.charCodeAt()));
    },

    onlyDigits() {
      this.phoneNumber = this.phoneNumber.replace(/\D/g, '');
    },

    fullPhone() {
      return this.selectedCode + this.phoneNumber;
    }
  }
}
</script>