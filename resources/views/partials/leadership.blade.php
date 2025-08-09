<section class="bg-gray-100 py-12 md:py-24 relative overflow-hidden">
  <!-- Градиент сверху -->
  <div class="absolute -top-32 left-0 right-0 h-32 bg-gradient-to-b from-white to-transparent z-10"></div>

  <div class="relative px-4 sm:px-6 max-w-4xl mx-auto">
    <!-- Заголовок и подзаголовок -->
    <div class="text-center mb-6 md:mb-12">
      <h2 class="text-2xl md:text-4xl lg:text-[3rem] font-bold text-gray-900 mb-3 md:mb-6 leading-tight">
        {{ __('home.leadership.title') }}
      </h2>

      <p
        class="text-base md:text-xl lg:text-[1.875rem] leading-relaxed md:leading-normal lg:leading-[2.25rem] text-gray-800 mx-auto max-w-2xl">
        {{ __('home.leadership.subtitle') }}
      </p>
    </div>

    <!-- Цитата в карточке -->
    <div
      class="bg-white rounded-lg md:rounded-xl lg:rounded-2xl shadow-md md:shadow-lg lg:shadow-xl p-5 md:p-8 lg:p-12 border border-gray-100 relative z-10 hover:shadow-xl transition-all duration-300 mx-auto max-w-3xl">
      <!-- Декоративные элементы (только для десктопа) -->
      <div class="hidden md:block absolute -top-6 -left-6 w-16 h-16">
        <svg viewBox="0 0 64 64" fill="#800F12" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
          <path
            d="M27.194,12l0,8.025c-2.537,0.14 -4.458,0.603 -5.761,1.39c-1.304,0.787 -2.22,2.063 -2.749,3.829c-0.528,1.766 -0.793,4.292 -0.793,7.579l9.303,0l0,19.145l-19.081,0l0,-18.201c0,-7.518 1.612,-13.025 4.836,-16.522c3.225,-3.497 7.973,-5.245 14.245,-5.245Zm28.806,0l0,8.025c-2.537,0.14 -4.457,0.586 -5.761,1.338c-1.304,0.751 -2.247,2.028 -2.828,3.829c-0.581,1.8 -0.872,4.344 -0.872,7.631l9.461,0l0,19.145l-19.186,0l0,-18.201c0,-7.518 1.603,-13.025 4.809,-16.522c3.207,-3.497 7.999,-5.245 14.377,-5.245Z">
          </path>
        </svg>
      </div>

      <div class="hidden md:block absolute -bottom-6 -right-6 w-16 h-16">
        <svg viewBox="0 0 64 64" fill="#800F12" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
          <path
            d="M36.806,51.968l0,-8.026c2.537,-0.14 4.458,-0.604 5.761,-1.391c1.304,-0.786 2.22,-2.063 2.749,-3.829c0.528,-1.766 0.793,-4.293 0.793,-7.581l-9.303,0l0,-19.147l19.081,0l0,18.203c0,7.519 -1.612,13.028 -4.836,16.525c-3.225,3.497 -7.973,5.246 -14.245,5.246Zm-28.806,0l0,-8.026c2.537,-0.14 4.457,-0.586 5.761,-1.338c1.304,-0.752 2.247,-2.029 2.828,-3.83c0.581,-1.801 0.872,-4.345 0.872,-7.633l-9.461,0l0,-19.147l19.186,0l0,18.203c0,7.519 -1.603,13.028 -4.809,16.525c-3.207,3.497 -7.999,5.246 -14.377,5.246Z">
          </path>
        </svg>
      </div>

      <!-- Текст цитаты -->
      <p
        class="text-base md:text-xl lg:text-2xl leading-relaxed md:leading-snug lg:leading-[2.25rem] text-gray-900 font-medium mb-4 md:mb-6 lg:mb-8">
        {{ __('home.leadership.quote') }}
      </p>

      <!-- Автор -->
      <div class="flex flex-col items-center gap-4 md:gap-6 lg:gap-8">
        <img src="{{ asset('images/director.webp') }}" alt="Damir Karimov"
          class="w-20 h-20 md:w-32 md:h-32 lg:w-[200px] lg:h-[200px] rounded-full object-cover border-2 md:border-4 border-white shadow-sm md:shadow-lg" />

        <div class="text-center">
          <p class="font-medium md:font-semibold text-gray-900 text-base md:text-lg lg:text-xl">
            {{ __('home.leadership.author') }}
          </p>
          <p class="text-sm md:text-base text-gray-500">
            {{ __('home.leadership.position') }}
          </p>
        </div>
      </div>
    </div>
  </div>
</section>