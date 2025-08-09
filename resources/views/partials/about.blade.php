<section class="bg-gray-100 py-16 md:py-24 px-6">
  <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-12 gap-8 items-stretch">
    <div class="md:col-span-4 flex">
      <div
        class="bg-white rounded-2xl p-8 shadow-md border border-gray-200 flex flex-col justify-between w-full h-full">
        <div>
          <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __('home.about.about_title') }}</h2>
          <p class="text-gray-700 text-base mb-6 leading-relaxed">
            {{ __('home.about.about_text1') }}
          </p>
          <p class="text-gray-700 text-base mb-6 leading-relaxed">
            {{ __('home.about.about_text2') }}
          </p>
        </div>
        <a href="{{ route('about') }}"
          class="mt-4 w-full inline-flex items-center justify-center gap-2 px-6 py-3 bg-gray-900 text-white rounded-xl font-medium hover:bg-gray-800 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
          </svg>
          {{ __('home.about.learn_more') }}
        </a>
      </div>
    </div>

    <div class="md:col-span-8">
      <div class="h-full w-full">
        <img src="{{ asset('images/ilec-photo-1.jpg') }}" alt="{{ __('home.about.about_title') }}"
          class="w-full h-full object-cover rounded-2xl shadow-sm border border-gray-200" />
      </div>
    </div>
  </div>
</section>