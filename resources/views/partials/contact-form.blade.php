<section class="bg-gray-100 py-16">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
      <!-- Левая колонка - Контакты -->
      <div>
        <!-- Верхний текст -->
        <p class="text-sm font-medium text-[#800F12] mb-3">
          {{ __('messages.contact.contact_us') }}
        </p>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
          {{ __('messages.contact.ready_to_help') }}
        </h2>
        <p class="text-gray-600 mb-8">
          {{ __('messages.contact.expert_team') }}
        </p>

        <!-- Контактные данные в 2 колонки -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
          <div>
            <h3 class="font-bold text-gray-900 mb-3">{{ __('messages.contact.phones') }}</h3>
            <p class="text-gray-600 mb-2">+996700906095</p>
          </div>
          <div>
            <h3 class="font-bold text-gray-900 mb-3">{{ __('messages.contact.email') }}</h3>
            <p class="text-gray-600 mb-2">Ilec.official.kg@gmail.com</p>
          </div>
          <div>
            <h3 class="font-bold text-gray-900 mb-3">{{ __('messages.contact.address') }}</h3>
            <p class="text-gray-600">{{ __('messages.contact.address_1') }}</p>
            <p class="text-gray-600">{{ __('messages.contact.address_2') }}</p>
          </div>
          <div>
            <h3 class="font-bold text-gray-900 mb-3">{{ __('messages.contact.working_hours') }}</h3>
            <p class="text-gray-600">{{ __('messages.contact.weekdays') }}</p>
            <p class="text-gray-600">{{ __('messages.contact.saturday') }}</p>
          </div>
        </div>

        <!-- Социальные сети -->
        <div>
          <h3 class="font-bold text-gray-900 mb-4">{{ __('messages.contact.social_media') }}</h3>
          <div class="flex space-x-4">
            <a href="#" class="text-gray-600 hover:text-[#800F12]">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <!-- Иконка соцсети -->
              </svg>
            </a>
            <a href="#" class="text-gray-600 hover:text-[#800F12]">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <!-- Иконка соцсети -->
              </svg>
            </a>
            <a href="#" class="text-gray-600 hover:text-[#800F12]">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <!-- Иконка соцсети -->
              </svg>
            </a>
          </div>
        </div>
      </div>

      <!-- Правая колонка - Форма -->
      <div
        class="rounded-xl bg-white p-6 md:p-8 shadow-sm hover:shadow-md transition-shadow duration-300 border border-gray-100">
        <h3 class="text-xl font-bold text-gray-900 mb-6">
          {{ __('messages.contact.leave_request') }}
        </h3>
        <form method="POST" action="{{ route('request-forms.store') }}" class="space-y-4">
          @csrf

          @if(session('success'))
          <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
            {{ session('success') ?: __('messages.contact.request_success') }}
          </div>
          @endif

          @if($errors->any())
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
            <ul>
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <div>
            <input type="text" name="name" placeholder="{{ __('messages.contact.form.name') }}*"
              class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#800F12] focus:border-[#800F12]"
              required value="{{ old('name') }}" />
          </div>
          <div>
            <input type="email" name="email" placeholder="{{ __('messages.contact.form.email') }}*"
              class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#800F12] focus:border-[#800F12]"
              required value="{{ old('email') }}" />
          </div>
          <div>
            <input type="tel" name="phone" placeholder="{{ __('messages.contact.form.phone') }}"
              class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#800F12] focus:border-[#800F12]"
              value="{{ old('phone') }}" />
          </div>
          <div>
            <textarea name="message" placeholder="{{ __('messages.contact.form.message') }}" rows="4"
              class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#800F12] focus:border-[#800F12]">{{ old('message') }}</textarea>
          </div>
          <button type="submit"
            class="w-full bg-[#800F12] hover:bg-[#5C0B0D] text-white py-3 px-4 rounded-lg font-medium transition duration-300">
            {{ __('messages.contact.form.submit') }}
          </button>
          <p class="text-xs text-gray-500">
            {{ __('messages.contact.privacy_text') }}
            <a href="#" class="text-[#800F12] hover:underline">{{ __('messages.contact.privacy_policy') }}</a>
          </p>
        </form>
      </div>
    </div>
  </div>
</section>