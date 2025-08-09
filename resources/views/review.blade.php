@extends('layouts.app')

@section('content')
<section class="bg-gray-100 py-16">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
      <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">
        {{ __('messages.video_reviews.title') }}
      </h2>
      <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">
        {{ __('messages.video_reviews.description') }}
      </p>

    </div>
    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
      @foreach ($reviews as $index => $review)
      <div class="group bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl">
        <div class="relative bg-gray-900" style="padding-bottom: 133.33%">
          <div id="preview{{ $index }}"
            class="absolute inset-0 w-full h-full flex items-center justify-center cursor-pointer bg-black bg-opacity-20"
            onclick="playVideo('video{{ $index }}', 'preview{{ $index }}')">
            <img src="{{ Storage::url($review->preview_image) }}" alt="Превью видео"
              class="absolute inset-0 w-full h-full object-cover opacity-90" />
            <div
              class="w-16 h-16 bg-white bg-opacity-90 rounded-full flex items-center justify-center transform transition-transform group-hover:scale-110 z-10">
              <svg class="w-6 h-6 text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                <path d="M6.3 2.8L17 10 6.3 17.2V2.8z" />
              </svg>
            </div>
          </div>
          <video id="video{{ $index }}" class="absolute inset-0 w-full h-full hidden" controls>
            <source src="{{ Storage::url($review->video_path) }}" type="video/mp4" />
            Ваш браузер не поддерживает HTML5 видео.
          </video>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection
<script>
  function playVideo(videoId, previewId) {
        const video = document.getElementById(videoId);
        const preview = document.getElementById(previewId);
        video.classList.remove("hidden");
        preview.classList.add("hidden");

        video
          .play()
          .catch((e) => console.log("Автовоспроизведение не сработало:", e));

        video.onended = function () {
          video.classList.add("hidden");
          preview.classList.remove("hidden");
        };
      }
</script>