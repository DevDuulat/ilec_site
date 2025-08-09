@if($universities && count($universities) > 0)
<section class="bg-gray-100">
  <div class="max-w-7xl mx-auto px-6 sm:px-6 lg:px-8 py-12">
    <div class="py-16">
      <div class="text-left">
        <h2 class="text-3xl md:text-4xl font-semibold text-gray-900 mb-4">
          {{ __('messages.universities_title') }}
        </h2>
        <p class="text-lg text-gray-600">
          {{ __('messages.universities_description') }}
        </p>
      </div>
    </div>

    <div class="relative">
      <!-- Стрелка влево -->
      <button id="prevBtn"
        class="absolute left-0 top-1/2 -translate-y-1/2 z-30 bg-white rounded-full shadow p-2 hover:bg-gray-200">
        <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
          stroke-linecap="round" stroke-linejoin="round">
          <path d="M15 18l-6-6 6-6" />
        </svg>
      </button>

      <!-- Стрелка вправо -->
      <button id="nextBtn"
        class="absolute right-0 top-1/2 -translate-y-1/2 z-30 bg-white rounded-full shadow p-2 hover:bg-gray-200">
        <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
          stroke-linecap="round" stroke-linejoin="round">
          <path d="M9 18l6-6-6-6" />
        </svg>
      </button>

      <!-- Карусель -->
      <div id="carouselWrapper" class="overflow-hidden">
        <div id="carousel" class="flex gap-6 transition-transform duration-500 will-change-transform">
          @foreach ($universities as $university)
          <div
            class="min-w-[320px] md:min-w-[360px] h-[440px] flex-shrink-0 relative rounded-2xl overflow-hidden shadow-md bg-white">

            <img src="{{ asset('storage/' . $university->image) }}"
              alt="{{ $university->getTranslation('name', $locale) }}"
              class="absolute inset-0 w-full h-full object-cover z-0" />

            <div class="absolute backdrop-blur-sm bg-black/50 bottom-0 p-6 text-white z-20 h-[140px] w-full">
              <div class="flex justify-between items-start mb-2">
                <h3 class="text-lg font-semibold">{{ $university->getTranslation('name', $locale) }}</h3>
                <span class="bg-gray-700 text-xs font-medium px-3 py-1 rounded-full">
                  {{ $university->getTranslation('country', $locale) }}
                </span>
              </div>
              <p class="text-sm">{{ $university->getTranslation('description', $locale) }}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

@push('scripts')
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const carousel = document.getElementById("carousel");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");

    if (!carousel || !prevBtn || !nextBtn) {
      console.warn("Carousel or navigation buttons not found.");
      return;
    }

    const card = carousel.querySelector("div");
    if (!card) {
      console.warn("No card found in carousel.");
      return;
    }

    const cardWidth = card.offsetWidth + 24; // карточка + gap-6
    let scrollX = 0;

    prevBtn.addEventListener("click", () => {
      scrollX -= cardWidth;
      if (scrollX < 0) scrollX = 0;
      carousel.style.transform = `translateX(-${scrollX}px)`;
    });

    nextBtn.addEventListener("click", () => {
      scrollX += cardWidth;
      const maxScroll = carousel.scrollWidth - carousel.offsetWidth;
      if (scrollX > maxScroll) scrollX = maxScroll;
      carousel.style.transform = `translateX(-${scrollX}px)`;
    });
  });
</script>
@endpush
@endif