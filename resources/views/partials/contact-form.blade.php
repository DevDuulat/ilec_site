<section id="contact-form" class="bg-gray-100 py-16">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
      <!-- Левая колонка - Контакты -->
      <div>
        <!-- Верхний текст -->
        <p class="text-sm font-semibold text-[#800F12] mb-3">
          {{ __('messages.contact.contact_us') }}
        </p>
        <h2 class="text-4xl font-extrabold text-gray-900 mb-6">
          {{ __('messages.contact.ready_to_help') }}
        </h2>
        <p class="text-gray-700 mb-10 leading-relaxed">
          {{ __('messages.contact.expert_team') }}
        </p>

        <!-- Контактные данные в 2 колонки -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 mb-10">
          <div>
            <h3 class="font-semibold text-gray-900 mb-3">{{ __('messages.contact.phones') }}</h3>
            <p class="text-gray-700 mb-2">+996700906095</p>
          </div>
          <div>
            <h3 class="font-semibold text-gray-900 mb-3">{{ __('messages.contact.email') }}</h3>
            <p class="text-gray-700 mb-2">Ilec.official.kg@gmail.com</p>
          </div>
          <div>
            <h3 class="font-semibold text-gray-900 mb-3">{{ __('messages.contact.address') }}</h3>
            <p class="text-gray-700">{{ __('messages.contact.address_1') }}</p>
            <p class="text-gray-700">{{ __('messages.contact.address_2') }}</p>
          </div>
          <div>
            <h3 class="font-semibold text-gray-900 mb-3">{{ __('messages.contact.working_hours') }}</h3>
            <p class="text-gray-700">{{ __('messages.contact.weekdays') }}</p>
            <p class="text-gray-700">{{ __('messages.contact.saturday') }}</p>
          </div>
        </div>

        <!-- Социальные сети -->
        <div>
          <h3 class="font-semibold text-gray-900 mb-5">{{ __('messages.contact.social_media') }}</h3>
          <div class="flex space-x-6">
            <!-- Instagram -->
            <a href="https://www.instagram.com/ilec.bishkek/" target="_blank" rel="noopener"
              class="text-gray-900 hover:text-[#800F12] transition-colors duration-300" aria-label="Instagram">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor">
                <path
                  d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
              </svg>
            </a>

            <!-- WhatsApp -->
            <a href="http://wa.me/996700906095" target="_blank" rel="noopener"
              class="text-gray-900 hover:text-[#800F12] transition-colors duration-300" aria-label="WhatsApp">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor">
                <path
                  d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
              </svg>
            </a>
          </div>
        </div>
      </div>

      <!-- Правая колонка - Форма -->
      <div
        class="rounded-2xl bg-white p-8 md:p-10 shadow-md hover:shadow-lg transition-shadow duration-300 border border-gray-100">
        <h3 class="text-2xl font-bold text-gray-900 mb-6">
          {{ __('messages.contact.leave_request') }}
        </h3>
        <form method="POST" action="{{ route('request-forms.store') }}" class="space-y-5">
          @csrf

          @if(session('success'))
          <div class="bg-green-50 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
            {{ session('success') ?: __('messages.contact.request_success') }}
          </div>
          @endif

          @if($errors->any())
          <div class="bg-red-50 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
            <ul class="list-disc pl-5">
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <input type="text" name="name" placeholder="{{ __('messages.contact.form.name') }}*"
            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#800F12] focus:border-[#800F12] transition"
            required value="{{ old('name') }}" />

          <input type="email" name="email" placeholder="{{ __('messages.contact.form.email') }}*"
            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#800F12] focus:border-[#800F12] transition"
            required value="{{ old('email') }}" />

         <div x-data="phoneInput()" x-init="init()" class="flex">

                  <div class="relative w-1/3 mr-2">
                    <select x-model="selectedCode" name="phone_code"
                      class="appearance-none w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#800F12] bg-white transition">
                      <template x-for="country in countries" :key="country.code">
                        <option :value="country.dial_code" x-text="`${country.flag} ${country.dial_code}`"></option>
                      </template>
                    </select>
                   
                  </div>

                  <input type="tel" id="phone" name="phone" required x-model="phoneNumber" @input="onlyDigits"
                    class="flex-1 px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#800F12] focus:border-[#800F12] transition"
                    x-mask="(999) 999-99-99" />
                  <input type="hidden" name="phone_number" :value="fullPhone()">

                </div>

          <textarea name="message" placeholder="{{ __('messages.contact.form.message') }}" rows="4"
            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#800F12] focus:border-[#800F12] transition">{{ old('message') }}</textarea>

          <button type="submit"
            class="w-full bg-[#800F12] hover:bg-[#5C0B0D] text-white py-3 px-4 rounded-xl font-semibold transition transform hover:scale-[1.02] duration-300">
            {{ __('messages.contact.form.submit') }}
          </button>

          <p class="text-xs text-gray-500 text-center">
            {{ __('messages.contact.privacy_text') }}
            <a href="#" class="text-[#800F12] hover:underline">{{ __('messages.contact.privacy_policy') }}</a>
          </p>
        </form>
      </div>
    </div>
  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const header = document.querySelector('header');
    const offset = header ? header.offsetHeight : 0;

    document.querySelectorAll('.scroll-to').forEach(link => {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        const targetID = this.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetID);
        if (!targetElement) return;

        window.scrollTo({
          top: targetElement.offsetTop - offset,
          behavior: 'smooth'
        });
      });
    });
  });
</script>