@php
$languages = [
'ru' => __('Русский (RU)'),
'en' => __('English (EN)'),
'de' => __('Deutsch (DE)')
];
$currentLocale = app()->getLocale();
@endphp

<header class="sticky top-0 z-50 shadow-sm">
  <!-- Первый уровень с новым фоном #800F12 -->
  <div class="bg-[#800F12] text-white">
    <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <!-- Логотип -->
        <div class="flex items-center">
          <a href="{{ route('home') }}" class="text-2xl font-bold text-white">
            <span class="text-white">ILEC</span>
          </a>

          <span class="ml-2 rounded bg-[#5C0B0D] px-2 py-1 text-xs text-white md:inline-block">{{ __('messages.since')
            }}
            2019</span>
        </div>

        <!-- Основная навигация - скрыта на мобилках -->
        <nav class="hidden items-center space-x-8 md:flex">
          <a href="{{ route('about') }}" class="nav-link text-gray-200 hover:text-white">{{ __('messages.about') }}</a>
          <a href="{{ route('services') }}" class="nav-link text-gray-200 hover:text-white">{{ __('messages.services')
            }}</a>
          <a href="{{ route('contacts') }}" class="nav-link text-gray-200 hover:text-white">{{ __('messages.contacts')
            }}</a>

          @php
          $languages = [
          'en' => ['label' => 'English', 'flag' => 'flags/gb-eng.svg'],
          'ru' => ['label' => 'Русский', 'flag' => 'flags/ru.svg'],
          'de' => ['label' => 'Deutsch', 'flag' => 'flags/de.svg']
          ];
          $currentLang = $languages[$currentLocale];
          @endphp

          <div class="dropdown relative">
            <button class="flex items-center space-x-2 text-gray-200 hover:text-white">
              <img src="{{ asset('images/' . $currentLang['flag']) }}" alt="{{ $currentLang['label'] }} flag"
                class="w-5 h-5">
              <span>{{ strtoupper($currentLocale) }}</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>

            <div
              class="dropdown-menu absolute right-0 mt-2 w-40 origin-top-right rounded-md bg-white py-1 shadow-lg z-50">
              <div class="language-switcher">
                @foreach($languages as $lang => $data)
                <a href="{{ route('lang.switch', $lang) }}"
                  class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ App::getLocale() === $lang ? 'font-semibold bg-gray-50' : '' }}">
                  <img src="{{ asset('images/' . $data['flag']) }}" alt="{{ $data['label'] }} flag"
                    class="w-5 h-5 mr-2">
                  {{ $data['label'] }}
                </a>
                @endforeach
              </div>
            </div>
          </div>

          <!-- Кнопка заявки - контрастная -->
          <button data-toggle="modal"
            class="rounded-lg bg-white px-5 py-2 font-medium text-[#800F12] hover:bg-gray-100">
            {{ __('messages.apply') }}
          </button>
        </nav>

        <!-- Мобильное меню - кнопка -->
        <div class="flex items-center md:hidden">
          <!-- Язык на мобилке -->
          <div class="dropdown relative mr-3">
            <button class="flex items-center space-x-1 text-gray-200 hover:text-white">
              <span>{{ strtoupper($currentLocale) }}</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div
              class="dropdown-menu absolute right-0 mt-2 w-32 origin-top-right rounded-md bg-white py-1 shadow-lg z-50">
              @foreach(['en' => 'English', 'ru' => 'Русский', 'de' => 'Deutsch'] as $lang => $label)
              <a href="{{ route('lang.switch', $lang) }}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ App::getLocale() === $lang ? 'font-semibold bg-gray-50' : '' }}">
                {{ $label }}
              </a>
              @endforeach
            </div>
          </div>

          <!-- Кнопка меню -->
          <button id="mobile-menu-button" class="rounded p-2 text-gray-200 hover:bg-[#5C0B0D]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
      </div>

      <!-- Мобильное меню - контент -->
      <div id="mobile-menu" class="hidden pb-4 md:hidden">
        <div class="flex flex-col space-y-4">
          <!-- Первый уровень ссылок -->
          <a href="{{ route('about') }}" class="text-gray-200 hover:text-white">{{ __('messages.about') }}</a>
          <a href="{{ route('services') }}" class="text-gray-200 hover:text-white">{{ __('messages.services') }}</a>
          <a href="{{ route('contacts') }}" class="text-gray-200 hover:text-white">{{ __('messages.contacts') }}</a>

          <!-- Добавляем второй уровень сюда -->
          <a href="{{ route('home') }}" class="text-gray-200 hover:text-white">{{ __('messages.home') }}</a>
          <a href="{{ route('courses') }}" class="text-gray-200 hover:text-white">{{ __('messages.courses') }}</a>
          <a href="{{ route('programs.work') }}" class="text-gray-200 hover:text-white">{{ __('messages.germany_jobs')
            }}</a>
          <a href="{{ route('programs.study') }}" class="text-gray-200 hover:text-white">{{ __('messages.germany_study')
            }}</a>
          <a href="{{ route('reviews') }}" class="text-gray-200 hover:text-white">{{ __('messages.reviews') }}</a>
          <a href="{{ route('visa.support') }}" class="text-gray-200 hover:text-white">{{ __('messages.visa_support')
            }}</a>

          <button data-toggle="modal"
            class="w-full rounded-lg bg-white px-5 py-2 font-medium text-[#800F12] hover:bg-gray-100 hidden md:block">
            {{ __('messages.apply') }}
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Второй уровень со светлым фоном - скрыт на мобилках -->
  <div class="bg-white shadow-sm hidden md:block">
    <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
      <nav class="flex space-x-8 overflow-x-auto py-3 scrollbar-hide">
        <a href="{{ route('home') }}" class="whitespace-nowrap px-1 font-medium text-gray-800 hover:text-[#800F12]">
          {{ __('messages.home') }}
        </a>
        <a href="{{ route('courses') }}" class="whitespace-nowrap px-1 font-medium text-gray-800 hover:text-[#800F12]">
          {{ __('messages.courses') }}
        </a>
        <a href="{{ route('programs.work') }}"
          class="whitespace-nowrap px-1 font-medium text-gray-800 hover:text-[#800F12]">
          {{ __('messages.germany_jobs') }}
        </a>
        <a href="{{ route('programs.study') }}"
          class="whitespace-nowrap px-1 font-medium text-gray-800 hover:text-[#800F12]">
          {{ __('messages.germany_study') }}
        </a>
        <a href="{{ route('reviews') }}" class="whitespace-nowrap px-1 font-medium text-gray-800 hover:text-[#800F12]">
          {{ __('messages.reviews') }}
        </a>
        <a href="{{ route('visa.support') }}"
          class="whitespace-nowrap px-1 font-medium text-gray-800 hover:text-[#800F12]">
          {{ __('messages.visa_support') }}
        </a>
      </nav>
    </div>
  </div>
</header>