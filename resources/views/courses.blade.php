@extends('layouts.app')

@section('content')
<div class="relative bg-[#202124] text-white overflow-hidden">
  <div class="max-w-7xl mx-auto px-6 py-16 md:py-24">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
      <!-- Текстовая колонка -->
      <div class="relative z-10">
        <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
          {{ __('courses.title_main') }}
        </h1>
        <p class="text-lg md:text-xl text-gray-300 mb-8 max-w-lg">
          {{ __('courses.desc_main') }}
        </p>

        <div class="flex flex-col sm:flex-row gap-4">
          <a href="#courses_block"
            class="bg-[#800F12] hover:bg-[#5C0B0D] text-white px-8 py-3 rounded-lg text-lg font-medium transition-colors duration-300 transform hover:scale-105"
            id="viewCoursesBtn">
            {{ __('courses.btn_view_all') }}
          </a>
        </div>

        <div class="mt-10 flex flex-wrap gap-6">
          <div class="flex items-center">
            <svg class="w-8 h-8 text-[#800F12]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <span class="ml-2">{{ __('courses.stat_1') }}</span>
          </div>
          <div class="flex items-center">
            <svg class="w-8 h-8 text-[#800F12]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <span class="ml-2">{{ __('courses.stat_2') }}</span>
          </div>
          <div class="flex items-center">
            <svg class="w-8 h-8 text-[#800F12]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <span class="ml-2">{{ __('courses.stat_3') }}</span>
          </div>
        </div>
      </div>
      <!-- Колонка с изображением с маской -->
      <div class="relative">
        <div class="absolute inset-0 bg-gradient-to-r from-[#800F12] to-transparent opacity-30 rounded-2xl -rotate-6">
        </div>
        <div
          class="relative overflow-hidden rounded-2xl transform rotate-1 hover:rotate-0 transition-transform duration-500">
          <img src="{{ asset('images/ilec-photo-16.jpg') }}" alt="{{ __('courses.title_main') }}"
            class="w-[500px] h-full object-cover" />
        </div>
        <div class="absolute -bottom-6 -left-6 w-32 h-32 rounded-full bg-[#800F12] opacity-20 blur-xl"></div>
        <div class="absolute -top-6 -right-6 w-24 h-24 rounded-full bg-[#800F12] opacity-20 blur-xl"></div>
      </div>
    </div>
  </div>

  <div class="absolute top-0 left-0 w-full h-full overflow-hidden">
    <div class="absolute top-1/4 -right-20 w-64 h-64 rounded-full bg-[#800F12] opacity-10 blur-3xl"></div>
    <div class="absolute bottom-0 -left-40 w-80 h-80 rounded-full bg-[#800F12] opacity-10 blur-3xl"></div>
  </div>
</div>

<section class="bg-gray-50 py-12">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <!-- Список курсов -->
    <div id="courses_block" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($courses as $course)
      <div
        class="bg-white rounded-xl overflow-hidden border border-gray-100 hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
        <div class="relative">
          <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}"
            class="w-full h-48 object-cover">
          @if($course->is_popular)
          <div class="absolute top-3 right-3 bg-[#800F12] text-white text-xs font-bold px-3 py-1 rounded-full">
            {{ __('messages.popular') }}
          </div>
          @endif
        </div>
        <div class="p-6">
          <div class="flex items-center mb-3">
            <div class="bg-[#800F12]/10 p-2 rounded-lg w-10 h-10 flex items-center justify-center mr-3">
              <span class="text-[#800F12]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                  <path d="M12 14l9-5-9-5-9 5 9 5z" />
                  <path
                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                </svg>
              </span>
            </div>
            <h3 class="text-xl font-bold">{{ $course->title }}</h3>
          </div>

          <p class="text-gray-600 mb-4">{{ $course->description }}</p>

          <div class="flex flex-wrap gap-2 mb-5">
            @foreach(explode(',', $course->tags) as $tag)
            <span class="bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-full">
              {{ trim($tag) }}
            </span>
            @endforeach
          </div>

          <div class="flex justify-between items-center mb-5 text-sm text-gray-500">
            <div class="flex items-center">
              <svg class="w-4 h-4 mr-1 text-[#800F12]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              {{ $course->duration }} {{ __('messages.min') }}
            </div>
            <div class="flex items-center">
              <svg class="w-4 h-4 mr-1 text-[#800F12]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
              {{ __('messages.group_size', ['count' => $course->group_size]) }}
            </div>
          </div>

          <div class="flex justify-between items-center">
            <span class="text-xl font-bold text-[#800F12]">
              {{ number_format($course->price, 0, ',', ' ') }} {{ __('messages.currency_month') }}
            </span>
            <button data-course="{{ $course->title }}" data-course-id="{{ $course->id }}"
              class="open-modal-btn px-4 py-2 bg-[#800F12] hover:bg-[#5C0B0D] text-white rounded-lg text-sm font-medium transition-colors">
              {{ __('messages.enroll') }}
            </button>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Модальное окно -->
<div id="modal" class="fixed inset-0 z-50 bg-black/50 flex items-center justify-center hidden">
  <div id="modalContent" class="bg-white rounded-xl shadow-xl w-full max-w-md p-6 relative">
    <h2 id="modalTitle" class="text-xl font-semibold mb-4">
      {{ __('messages.apply_modal.title') }}
    </h2>

    <form action="{{ route('request-forms.store') }}" method="POST" class="space-y-4">
      @csrf
      <input type="hidden" name="message" id="hiddenMessage" value="">
      <input type="hidden" name="source" id="sourceInput" value="course_page">
      <input type="hidden" name="course_title" id="courseTitleInput" value="">

      <div>
        <label class="block text-sm font-medium">
          {{ __('messages.apply_modal.name') }}
        </label>
        <input type="text" name="name" required
          class="w-full border border-gray-300 rounded px-3 py-2 mt-1 focus:outline-none focus:ring focus:ring-[#800F12]">
      </div>

      <div>
        <label class="block text-sm font-medium">
          {{ __('messages.apply_modal.email') }}
        </label>
        <input type="email" name="email" required
          class="w-full border border-gray-300 rounded px-3 py-2 mt-1 focus:outline-none focus:ring focus:ring-[#800F12]">
      </div>

      <div>
        <label class="block text-sm font-medium">
          {{ __('messages.apply_modal.phone') }}
        </label>
        <input type="text" name="phone"
          class="w-full border border-gray-300 rounded px-3 py-2 mt-1 focus:outline-none focus:ring focus:ring-[#800F12]">
      </div>

      <div class="flex justify-end">
        <button type="submit" class="bg-[#800F12] text-white px-4 py-2 rounded hover:bg-[#5C0B0D] transition-colors">
          {{ __('messages.apply_modal.submit') }}
        </button>
      </div>
    </form>

    <button id="modalCloseBtn" class="absolute top-2 right-3 text-gray-400 hover:text-gray-600 text-xl">
      &times;
    </button>
  </div>
</div>

<script>
  document.getElementById('viewCoursesBtn').addEventListener('click', function(e) {
    e.preventDefault();
    const target = document.getElementById('courses_block');
    
    window.scrollTo({
      top: target.offsetTop - 160,
      behavior: 'smooth'
    });
    
    setTimeout(() => {
      target.style.boxShadow = 'none';
    }, 1500);
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('modal');
    const modalTitle = document.getElementById('modalTitle');
    const hiddenMessage = document.getElementById('hiddenMessage');
    const sourceInput = document.getElementById('sourceInput');
    const courseTitleInput = document.getElementById('courseTitleInput');
    const modalCloseBtn = document.getElementById('modalCloseBtn');

    // Открытие модалки
    document.querySelectorAll('.open-modal-btn').forEach(button => {
      button.addEventListener('click', () => {
        const courseTitle = button.getAttribute('data-course');
        const courseId = button.getAttribute('data-course-id');
        
        modalTitle.textContent = courseTitle;
        hiddenMessage.value = `Запрос на курс: ${courseTitle}`;
        courseTitleInput.value = courseTitle;
        sourceInput.value = `course_page:${courseId}`;
        
        modal.classList.remove('hidden');
      });
    });

    // Закрытие по кнопке
    modalCloseBtn.addEventListener('click', () => {
      modal.classList.add('hidden');
    });

    // Закрытие по клику вне контента модалки
    modal.addEventListener('click', (e) => {
      if (e.target === modal) {
        modal.classList.add('hidden');
      }
    });
  });
</script>
@endsection