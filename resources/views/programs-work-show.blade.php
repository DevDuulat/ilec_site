@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
  <!-- Breadcrumbs -->
  <nav class="mb-8">
    <ol class="flex items-center space-x-2 text-sm">
      <li>
        <a href="{{ route('home') }}" class="text-gray-500 hover:text-[#800F12] transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path
              d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
          </svg>
        </a>
      </li>
      <li class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>

        @if($program->type instanceof \App\Enums\ProgramType)
        @switch($program->type)
        @case(\App\Enums\ProgramType::WORK)
        <a href="{{ route('programs.work') }}" class="ml-2 text-gray-500 hover:text-[#800F12] transition-colors">
          {{ __('programs.program_types.work') }}
        </a>
        @break
        @case(\App\Enums\ProgramType::STUDY)
        <a href="{{ route('programs.study') }}" class="ml-2 text-gray-500 hover:text-[#800F12] transition-colors">
          {{ __('programs.program_types.study') }}
        </a>
        @break
        @endswitch
        @endif
      </li>
      <li class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
        <span class="ml-2 font-medium text-[#800F12]">
          {{ $program->getTranslation('title', app()->getLocale()) }}
        </span>
      </li>
    </ol>
  </nav>

  <!-- Hero Section -->
  <div class="relative rounded-2xl overflow-hidden shadow-lg mb-8">
    @if($program->image)
    <img src="{{ asset('storage/' . $program->image) }}"
      alt="{{ $program->getTranslation('title', app()->getLocale()) }}" class="w-full h-96 object-cover">
    @else
    <div class="bg-gradient-to-br from-gray-100 to-gray-200 w-full h-96 flex items-center justify-center">
      <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
      </svg>
    </div>
    @endif

    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>

    <div class="absolute bottom-0 left-0 right-0 p-8">
      <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-3">
          {{ $program->getTranslation('title', app()->getLocale()) }}
        </h1>

        <div class="flex items-center text-white/90">
          <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
          <span class="text-lg">
            {{ $program->getTranslation('location', app()->getLocale()) }}
          </span>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Grid -->
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Main Content -->
    <div class="lg:col-span-2 space-y-6">
      <!-- Program Description -->
      <div class="bg-white rounded-xl shadow-sm p-6">
        <h2 class="text-2xl font-bold text-[#800F12] mb-4 pb-3 border-b border-gray-100">
          {{ __('programs.description') }}
        </h2>
        <div class="prose max-w-none text-gray-700">
          {{ $program->getTranslation('description', app()->getLocale()) }}
        </div>
      </div>

      <!-- Requirements -->
      <div class="bg-white rounded-xl shadow-sm p-6">
        <h2 class="text-2xl font-bold text-[#800F12] mb-4 pb-3 border-b border-gray-100">
          {{ __('programs.requirements') }}
        </h2>
        <div class="prose max-w-none text-gray-700 mb-6">
          {{ $program->getTranslation('requirements', app()->getLocale()) }}
        </div>

        <div class="space-y-3">
          <div class="flex items-start p-3 bg-gray-50 rounded-lg">
            <svg class="h-6 w-6 text-[#800F12] mr-3 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <div>
              <span class="font-medium">{{ __('programs.german_level') }}:</span>
              <span class="ml-2">
                @switch($program->language_level)
                @case('a1-a2') {{ __('programs.language_levels.a1_a2') }} @break
                @case('b1-b2') {{ __('programs.language_levels.b1_b2') }} @break
                @case('c1-c2') {{ __('programs.language_levels.c1_c2') }} @break
                @default {{ $program->language_level }}
                @endswitch
              </span>
            </div>
          </div>

          <div class="flex items-start p-3 bg-gray-50 rounded-lg">
            <svg class="h-6 w-6 text-[#800F12] mr-3 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <div>
              <span class="font-medium">{{ __('programs.age') }}:</span>
              <span class="ml-2">{{ $program->min_age }}–{{ $program->max_age }} {{ __('programs.years') }}</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Additional Info -->
      @if($program->getTranslation('additional_info', app()->getLocale()))
      <div class="bg-white rounded-xl shadow-sm p-6">
        <h2 class="text-2xl font-bold text-[#800F12] mb-4 pb-3 border-b border-gray-100">
          {{ __('programs.additional_info') }}
        </h2>
        <div class="prose max-w-none text-gray-700">
          {!! nl2br(e($program->getTranslation('additional_info', app()->getLocale()))) !!}
        </div>
      </div>
      @endif
    </div>

    <!-- Sidebar -->
    <div class="space-y-6">
      <!-- Program Details -->
      <div class="bg-white rounded-xl shadow-sm p-6">
        <h2 class="text-2xl font-bold text-[#800F12] mb-5 pb-3 border-b border-gray-100">
          {{ __('programs.program_details') }}
        </h2>

        <div class="space-y-4">
          <div>
            <p class="text-sm text-gray-500 mb-1">{{ __('programs.program_type') }}</p>
            <p class="text-lg font-medium">
              @if($program->type instanceof \App\Enums\ProgramType)
              {{ $program->type->label() }}
              @else
              {{ \App\Enums\ProgramType::tryFrom($program->type)?->label() ?? match($program->type) {
              'work' => __('programs.program_types.work'),
              'ausbildung' => __('programs.program_types.study'),
              'internship' => __('programs.program_types.internship'),
              default => $program->type,
              } }}
              @endif
            </p>
          </div>

          <div>
            <p class="text-sm text-gray-500 mb-1">{{ __('programs.category') }}</p>
            <p class="text-lg font-medium">
              @if($program->category instanceof \App\Enums\ProgramCategory)
              {{ $program->category->label() }}
              @else
              {{ \App\Enums\ProgramCategory::tryFrom($program->category)?->label() ?? match($program->category) {
              'ausbildung' => __('programs.categories.professional_training'),
              'specialist' => __('programs.categories.for_specialists'),
              'short' => __('programs.categories.short_term'),
              'internship' => __('programs.categories.internship'),
              default => $program->category,
              } }}
              @endif
            </p>
          </div>

          <div>
            <p class="text-sm text-gray-500 mb-1">{{ __('programs.salary') }}</p>
            <p class="text-lg font-medium">
              {{ $program->salary_min }}–{{ $program->salary_max }} {{ $program->currency }}/{{ __('programs.per_month')
              }}
            </p>
          </div>

          <div>
            <p class="text-sm text-gray-500 mb-1">{{ __('programs.duration') }}</p>
            <p class="text-lg font-medium">{{ $program->duration }} {{ __('programs.months') }}</p>
          </div>

          <div>
            <p class="text-sm text-gray-500 mb-1">{{ __('programs.location') }}</p>
            <p class="text-lg font-medium">
              {{ $program->getTranslation('location', app()->getLocale()) }}
            </p>
          </div>
        </div>

        <div class="mt-8 space-y-4">
          <button onclick="document.getElementById('consultation-form').classList.remove('hidden')"
            class="w-full bg-[#800F12] hover:bg-[#6a0e11] text-white py-3 px-4 rounded-lg font-medium transition-colors shadow-md">
            {{ __('programs.apply') }}
          </button>

          <a href="{{ route('programs.work') }}"
            class="block text-center text-[#800F12] hover:text-[#a3151a] transition-colors text-sm underline">
            {{ __('programs.back_to_programs') }}
          </a>
        </div>
      </div>

      <!-- Contact Information -->
      <div class="bg-white rounded-xl shadow-sm p-6">
        <h2 class="text-2xl font-bold text-[#800F12] mb-5 pb-3 border-b border-gray-100">
          {{ __('programs.contacts') }}
        </h2>

        <p class="text-gray-700 mb-4">{{ __('programs.program_questions') }}:</p>
        <div class="space-y-3">
          <a href="mailto:ilec.official.kg@gmail.com" class="block hover:bg-gray-100 transition-colors">
            <div class="flex items-center p-3 bg-gray-50 rounded-lg">
              <div class="bg-[#800F12]/10 p-2 rounded-full mr-3">
                <svg class="h-5 w-5 text-[#800F12]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
              </div>
              <span class="text-gray-800 hover:text-[#800F12] transition-colors">ilec.official.kg@gmail.com</span>
            </div>
          </a>

          <a href="tel:+996700906095" class="block hover:bg-gray-100 transition-colors">
            <div class="flex items-center p-3 bg-gray-50 rounded-lg">
              <div class="bg-[#800F12]/10 p-2 rounded-full mr-3">
                <svg class="h-5 w-5 text-[#800F12]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
              </div>
              <span class="text-gray-800 hover:text-[#800F12] transition-colors">+996 700 906 095</span>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Consultation Modal -->
<div id="consultation-form"
  class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 hidden z-50">
  <div class="bg-white rounded-lg max-w-md w-full relative animate-fade-in">
    <button onclick="document.getElementById('consultation-form').classList.add('hidden')"
      class="absolute top-4 right-4 text-gray-600 hover:text-gray-900 text-2xl">&times;</button>

    <div class="p-6">
      <h3 class="text-xl font-semibold mb-4 text-[#800F12]">{{ __('programs.free_consultation') }}</h3>

      <form action="{{ route('request-forms.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
          <input type="text" name="name" placeholder="{{ __('programs.your_name') }}" required
            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-[#800F12] focus:border-[#800F12]"
            value="{{ old('name') }}">
        </div>
        <div>
          <input type="email" name="email" placeholder="Email" required
            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-[#800F12] focus:border-[#800F12]"
            value="{{ old('email') }}">
        </div>
        <div>
          <input type="tel" name="phone" placeholder="{{ __('programs.phone') }}"
            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-[#800F12] focus:border-[#800F12]"
            value="{{ old('phone') }}">
        </div>
        <div>
          <textarea name="message" placeholder="{{ __('programs.comment_optional') }}"
            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-[#800F12] focus:border-[#800F12]"
            rows="3">{{ old('message') }}</textarea>
        </div>

        <button type="submit"
          class="w-full bg-[#800F12] text-white py-3 rounded-lg hover:bg-[#a3151a] transition font-medium">
          {{ __('programs.send') }}
        </button>
      </form>
    </div>
  </div>
</div>

@push('styles')
<style>
  .animate-fade-in {
    animation: fadeIn 0.3s ease-out;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(-10px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>
@endpush

@push('scripts')
<script>
  // Close modal when clicking outside
  document.addEventListener('click', function(event) {
    const modal = document.getElementById('consultation-form');
    if (event.target === modal) {
      modal.classList.add('hidden');
    }
  });

  // Close modal with Escape key
  document.addEventListener('keydown', function(event) {
    const modal = document.getElementById('consultation-form');
    if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
      modal.classList.add('hidden');
    }
  });
</script>
@endpush

@endsection