<section class="bg-gray-100 py-16 md:py-24">
  <div class="max-w-7xl mx-auto px-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">

      @foreach([
      ['src' => '/videos/IMG_3644.MOV', 'title' => __('services.ausbildung_title'), 'desc' =>
      __('services.ausbildung_desc')],
      ['src' => '/videos/IMG_3715.MOV', 'title' => __('services.fachkrafte_title'), 'desc' =>
      __('services.fachkrafte_desc')],
      ['src' => '/videos/IMG_3872.MP4', 'title' => __('services.pflege_title'), 'desc' => __('services.pflege_desc')],
      ['src' => '/videos/IMG_7282.MOV', 'title' => __('services.fsj_title'), 'desc' => __('services.fsj_desc')],
      ] as $item)
      <div class="group rounded-2xl bg-white p-6 shadow-sm hover:shadow-md transition-shadow border border-gray-100">
        <div class="w-full aspect-[3/4] bg-gray-200 rounded-lg mb-4 overflow-hidden relative">
          <!-- Видео -->
          <video class="w-full h-full object-cover pointer-events-none transition-opacity duration-300" muted
            playsinline preload="metadata">
            <source src="{{ $item['src'] }}" type="video/mp4">
            {{ __('Ваш браузер не поддерживает видео.') }}
          </video>

          <!-- Затемнение и подсказка -->
          <div
            class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center transition-opacity duration-300 group-hover:opacity-0">
            <span class="text-white text-sm font-medium">{{ __('messages.hover_to_play') }}</span>

          </div>
        </div>

        <h3 class="text-lg font-semibold text-gray-900 mb-3">
          {{ $item['title'] }}
        </h3>
        <p class="text-gray-700 text-sm leading-relaxed">
          {{ $item['desc'] }}
        </p>
      </div>
      @endforeach

    </div>
  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.group').forEach(card => {
      const video = card.querySelector('video');
      const overlay = card.querySelector('.absolute');

      const isTouchDevice = 'ontouchstart' in window || navigator.maxTouchPoints > 0;

      if (isTouchDevice) {
        video.classList.remove('pointer-events-none');
        video.addEventListener('click', () => {
          if (video.paused) {
            video.play();
            overlay?.classList.add('opacity-0');
          } else {
            video.pause();
            overlay?.classList.remove('opacity-0');
          }
        });
      } else {
        card.addEventListener('mouseenter', () => {
          video.currentTime = 0;
          video.play();
        });
        card.addEventListener('mouseleave', () => {
          video.pause();
        });
      }
    });
  });
</script>