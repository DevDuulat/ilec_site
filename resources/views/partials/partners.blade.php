<section class="bg-gray-100 py-16">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-xl shadow-sm p-8 md:p-10 border border-gray-200">
      <h2 class="text-3xl font-bold text-gray-900 mb-4 text-left">
        {{ __('messages.partners.title') }}
      </h2>
      <h3 class="text-xl font-medium text-gray-800 mb-8 text-left">
        {{ __('messages.partners.subtitle') }}
      </h3>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-10">
        @foreach($partners as $partner)
        <div class="flex flex-col items-center p-6 hover:bg-gray-50 rounded-lg transition-colors duration-200">
          <div class="w-full h-40 mb-5 flex items-center justify-center">
            <img src="{{ $partner->image ? asset('storage/' . $partner->image) : 'https://placehold.co/300x200' }}"
              alt="{{ $partner->getTranslation('title', $locale) }}" class="max-h-full max-w-full object-contain" />
          </div>
          <h3 class="text-lg font-semibold text-gray-900 text-center">
              {{ $partner->getTranslation('title', $locale) }}
          </h3>
          <p class="text-gray-500 text-sm mt-2">  {{ $partner->getTranslation('country', $locale) }}</p>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>