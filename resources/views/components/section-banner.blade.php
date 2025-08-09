@props([
    'title' => '',
    'subtitle' => '',
    'ctaHref' => null,
    'ctaText' => null,
    'image' => '',
    'imageAlt' => '',
])

<section class="relative h-96 md:h-[500px] overflow-hidden">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 h-full">
    <!-- Фоновое изображение -->
    <div class="absolute inset-0">
      <img
        src="{{ asset($image) }}"
        alt="{{ $imageAlt }}"
        class="w-full h-full object-cover"
      />
      <div class="absolute inset-0 bg-black/30"></div>
    </div>

    <!-- Текст поверх изображения -->
    <div class="relative h-full flex items-center">
      <div class="max-w-lg text-white py-12">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">
          {{ $title }}
        </h1>
        <p class="text-xl md:text-2xl opacity-90 mb-8">
          {{ $subtitle }}
        </p>
        @if ($ctaHref && $ctaText)
          <a
            href="{{ $ctaHref }}"
            class="inline-block bg-white text-[#800F12] hover:bg-gray-100 px-8 py-3 rounded-lg font-medium text-lg transition duration-300"
          >
            {{ $ctaText }}
          </a>
        @endif
      </div>
    </div>
  </div>
</section>
