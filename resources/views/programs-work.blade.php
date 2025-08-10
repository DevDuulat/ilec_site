@extends('layouts.app')

@section('content')
<div class="relative bg-[#202124] text-white overflow-hidden">
  <div class="max-w-7xl mx-auto px-6 py-16 md:py-24">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
      {{-- Текстовая колонка --}}
      <div class="relative z-10">
        <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
          {{ __('programs.title') }}
        </h1>
        <p class="text-lg md:text-xl text-gray-300 mb-8 max-w-lg">
          {{ __('programs.subtitle') }}
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center sm:justify-start mt-6">
          <a href="#programs" class="btn-primary px-6 py-3 bg-[#800F12] text-white font-semibold rounded-md shadow-md
            hover:bg-[#9B1B1E] transition-colors duration-300 text-center" role="button">
            {{ __('programs.find_program') }}
          </a>
        </div>


        <div class="mt-10 flex flex-col sm:flex-row items-center sm:space-x-12 space-y-4 sm:space-y-0 text-gray-300">
          <div class="flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#fff]" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
            <span class="text-lg font-semibold">
              {{ __('programs.program_count', ['count' => $programs->count()]) }}
            </span>
          </div>

          <div class="flex items-center gap-3">
            <svg class="w-8 h-8 text-[#fff]" fill="#ffffff" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"
              stroke="#ffffff">

              <path
                d="M406.083 788.495c0-5.657-4.583-10.24-10.24-10.24h-81.92a10.238 10.238 0 00-10.24 10.24v119.47h102.4v-119.47zm-143.36 160.43v-160.43c0-28.278 22.922-51.2 51.2-51.2h81.92c28.278 0 51.2 22.922 51.2 51.2v160.43h-184.32z">
              </path>
              <path
                d="M549.443 706.575c0-5.657-4.583-10.24-10.24-10.24h-81.92a10.238 10.238 0 00-10.24 10.24v201.39h102.4v-201.39zm-143.36 242.35v-242.35c0-28.278 22.922-51.2 51.2-51.2h81.92c28.278 0 51.2 22.922 51.2 51.2v242.35h-184.32z">
              </path>
              <path
                d="M692.803 624.655c0-5.657-4.583-10.24-10.24-10.24h-81.92a10.238 10.238 0 00-10.24 10.24v283.31h102.4v-283.31zm-143.36 324.27v-324.27c0-28.278 22.922-51.2 51.2-51.2h81.92c28.278 0 51.2 22.922 51.2 51.2v324.27h-184.32zm-92.985-663.189l-80.404-158.218c-3.461-6.812 1.489-14.878 9.134-14.878h251.628c7.645 0 12.59 8.061 9.127 14.873l-80.397 158.224c-5.124 10.084-1.103 22.412 8.981 27.536s22.412 1.103 27.536-8.981l80.394-158.218c17.319-34.058-7.427-74.394-45.64-74.394H385.189c-38.208 0-62.956 40.328-45.651 74.392l80.406 158.221c5.124 10.083 17.453 14.104 27.536 8.979s14.104-17.453 8.979-27.536z">
              </path>
              <path
                d="M725.04 909.844c101.8 0 184.32-82.52 184.32-184.32v-43.151c0-197.073-161.327-358.4-358.4-358.4h-79.923c-197.073 0-358.4 161.327-358.4 358.4v43.151c0 101.797 82.526 184.32 184.32 184.32H725.04zm0 40.96H296.957c-124.415 0-225.28-100.862-225.28-225.28v-43.151c0-219.695 179.665-399.36 399.36-399.36h79.923c219.695 0 399.36 179.665 399.36 399.36v43.151c0 124.422-100.858 225.28-225.28 225.28z">
              </path>
            </svg>
            <span class="text-lg font-semibold text-white">
              {{ __('programs.salary_from', ['amount' => '12,82']) }}
            </span>
          </div>

        </div>

      </div>

      {{-- Колонка с изображением --}}
      <div class="relative">
        <div class="absolute inset-0 bg-gradient-to-r from-[#800F12] to-transparent opacity-30 rounded-2xl -rotate-6">
        </div>
        <div
          class="relative overflow-hidden rounded-2xl transform rotate-1 hover:rotate-0 transition-transform duration-500">
          <img src="{{ asset('images/ilec-photo-3.jpg') }}" alt="Фото офиса или обучения"
            class="w-full h-auto object-cover rounded-2xl">
        </div>
      </div>
    </div>
  </div>
</div>

<section id="programs" class="bg-gray-100 py-16 md:py-24">
  <div class="max-w-7xl mx-auto px-6">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
      {{-- Фильтры --}}
      <aside class="lg:col-span-4 sticky top-6">
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
          <h3 class="text-xl font-bold mb-6 text-[#800F12]"> {{ __('programs.filter_title') }}</h3>

          <form method="GET" action="" class="space-y-6">

            {{-- Тип программы --}}
            <div class="mb-6">
              <label for="type" class="block text-sm font-semibold text-gray-700 mb-2">

              </label>
              <select name="type" id="type"
                class="block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm bg-white">
                <option value=""> {{ __('programs.all_programs') }}</option>
                <option value="ausbildung" {{ request('type')=='ausbildung' ? 'selected' : '' }}>
                  {{ __('programs.ausbildung') }}
                </option>
                <option value="specialist" {{ request('type')=='specialist' ? 'selected' : '' }}>
                  {{ __('programs.specialist') }}
                </option>
                <option value="short" {{ request('type')=='short' ? 'selected' : '' }}>
                  {{ __('programs.short') }}
                </option>
                <option value="internship" {{ request('type')=='internship' ? 'selected' : '' }}>
                  {{ __('programs.internship') }}
                </option>
              </select>
            </div>

            @php
            $min = $minSalary ?? 10;
            $max = $maxSalary ?? 30;
            $salaryValue = $salary ?? $min;
            @endphp

            <div class="mb-6">
              <label for="salary" class="block text-sm font-semibold text-gray-700 mb-2">
                {{ __('programs.salary_per_month') }}
              </label>

              <div class="flex items-center gap-4">
                <input type="range" id="salary" name="salary" min="{{ $min }}" max="{{ $max }}" step="1"
                  value="{{ $salaryValue }}" class="w-full accent-[#800F12] cursor-pointer"
                  oninput="document.getElementById('salary-value').textContent = this.value + ' €'">
                <div id="salary-value" class="text-sm text-gray-800 font-medium w-12 text-right">
                  {{ $salaryValue }} €
                </div>
              </div>

              <div class="flex justify-between text-sm text-gray-500 mt-2 px-1">
                <span>{{ $min }} €</span>
                <span>{{ (int)(($min + $max) / 2) }} €</span>
                <span>{{ $max }} €</span>
              </div>
            </div>


            {{-- Уровень немецкого --}}
            <fieldset class="mb-6">
              <legend class="text-sm font-semibold text-gray-700 mb-3">
                {{ __('programs.german_level') }}
              </legend>

              @php
              $levels = [
              'a1-a2' => 'A1–A2 ',
              'b1-b2' => 'B1–B2 ',
              'c1-c2' => 'C1–C2 '
              ];
              $selectedLevels = (array) request('language_level', []);
              @endphp

              <div class="space-y-3">
                @foreach($levels as $key => $label)
                <label class="flex items-center space-x-3">
                  <input type="checkbox" name="language_level[]" value="{{ $key }}"
                    class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" {{ in_array($key,
                    $selectedLevels) ? 'checked' : '' }}>
                  <span class="text-sm text-gray-800">{{ $label }}</span>
                </label>
                @endforeach
              </div>
            </fieldset>


            <div class="flex gap-3 mt-6">
              <button type="submit"
                class="flex-1 inline-flex items-center justify-center px-4 py-2 bg-[#800F12] text-white text-sm font-medium rounded-xl shadow hover:bg-[#6d0d10] focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-[#800F12] transition">
                {{ __('programs.apply') }}

              </button>

              <a href="{{ url()->current() }}"
                class="flex-1 inline-flex items-center justify-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-xl text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-gray-400 transition text-center">
                {{ __('programs.reset') }}
              </a>
            </div>


          </form>
        </div>
      </aside>

      {{-- Список программ --}}
      <main class="lg:col-span-8">
        @if($programs->isEmpty())
        <div class="bg-white rounded-2xl p-10 text-center text-gray-500 shadow">
          <p class="text-lg"> {{ __('programs.no_programs') }}
          </p>
          <p class="text-sm mt-2">{{ __('programs.change_filter') }}</p>
        </div>
        @else
        <div class="grid grid-cols-1 gap-6">
          @foreach($programs as $program)
          <article
            class="bg-white border border-gray-200 rounded-2xl p-6 md:p-8 shadow-sm hover:shadow-lg transition-shadow duration-300 group">
            <header class="mb-4">
              @php
              $title = json_decode($program->title, true);
              $locale = app()->getLocale();
              $defaultTitle = is_array($title) ? ($title['ru'] ?? 'Название программы') : $program->title;
              @endphp
              <h2
                class="text-xl md:text-2xl font-semibold text-gray-900 group-hover:text-[#800F12] transition-colors duration-200">
                {{ is_array($title) ? ($title[$locale] ?? $defaultTitle) : $defaultTitle }}
              </h2>
            </header>

            <p class="text-gray-500 mb-4 flex items-center gap-2 text-sm">
              @php
              $location = json_decode($program->location, true);
              $displayLocation = $location[$locale] ?? $location['ru'] ?? $location['en'] ?? 'Germany';
              @endphp
              <svg class="w-6 h-6" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M3.37892 10.2236L8 16L12.6211 10.2236C13.5137 9.10788 14 7.72154 14 6.29266V6C14 2.68629 11.3137 0 8 0C4.68629 0 2 2.68629 2 6V6.29266C2 7.72154 2.4863 9.10788 3.37892 10.2236ZM8 8C9.10457 8 10 7.10457 10 6C10 4.89543 9.10457 4 8 4C6.89543 4 6 4.89543 6 6C6 7.10457 6.89543 8 8 8Z"
                  fill="#000000">
                </path>

              </svg> {{ $displayLocation }}
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-6 text-sm">
              <div>
                <span class="text-gray-500"> {{ __('programs.type') }}</span>
                <div class="font-medium text-gray-800 mt-1">

                  @switch($program->type->value)
                  @case('work')
                  {{ __('programs.program_types.work') }}
                  @break
                  @case('study')
                  {{ __('programs.program_types.study') }}
                  @break
                  @default
                  {{ $program->type->value }}
                  @endswitch
                </div>
              </div>

              <div>
                <span class="text-gray-500">{{ __('programs.duration') }}</span>
                <div class="font-medium text-gray-800 mt-1">{{ $program->duration }} {{ __('programs.month') }}</div>
              </div>

              <div>
                <span class="text-gray-500">{{ __('programs.type') }}</span>
                <div class="font-medium text-gray-800 mt-1">
                  {{ $program->salary_min }}€ – {{ $program->salary_max }}€/мес
                </div>
              </div>

              <div>
                <span class="text-gray-500">{{ __('programs.language') }}</span>
                <div class="font-medium text-gray-800 mt-1">
                  @switch($program->language_level)
                  @case('a1-a2') A1–A2 @break
                  @case('b1-b2') B1–B2 @break
                  @case('c1-c2') C1–C2 @break
                  @default {{ $program->language_level }}
                  @endswitch
                </div>
              </div>

              <div>
                <span class="text-gray-500">{{ __('programs.age') }}</span>
                <div class="font-medium text-gray-800 mt-1">{{ $program->min_age }}–{{ $program->max_age }} {{
                  __('programs.yo') }}</div>
              </div>
            </div>

            <div class="mb-4 text-gray-700 text-sm leading-relaxed">
              @php
              $description = json_decode($program->description, true);
              $displayDescription = is_array($description) ? ($description[$locale] ?? $description['ru'] ?? 'Описание
              программы недоступно') : $program->description;
              @endphp
              {{ Str::limit($displayDescription, 300) }}
            </div>

            <footer class="flex flex-wrap items-center gap-3 pt-4 border-t border-gray-100 mt-6">

              <a href="{{ route('programs.show', $program) }}"
                class="bg-[#800F12] text-white text-sm px-4 py-2 rounded-lg hover:bg-[#a3151a] transition">
                {{ __('programs.details') }}
              </a>

              <button onclick="document.getElementById('consultation-form').classList.remove('hidden')"
                class="border border-gray-300 text-sm text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-50 transition">
                {{ __('programs.free_consultation') }}
              </button>

            </footer>
          </article>
          @endforeach
        </div>

        {{-- Пагинация --}}
        <div class="mt-10 flex justify-center">
          {{-- {{ $programs->links() }} --}}

        </div>
        @endif
      </main>

    </div>
  </div>

  <!-- Модальное окно с формой -->
  <div id="consultation-form" class="fixed inset-0 bg-black bg-opacity-50  flex items-center justify-center hidden">
    <div class="bg-white top-10 p-6 rounded-lg max-w-md w-full relative">
      <button onclick="document.getElementById('consultation-form').classList.add('hidden')"
        class="absolute top-2 right-2 text-gray-600 hover:text-gray-900">&times;</button>

      <h3 class="text-lg font-semibold mb-4"> {{ __('programs.consultation_title') }}</h3>

      <form action="{{ route('request-forms.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="text" name="name" placeholder="{{ __('programs.name') }}" required
          class="w-full p-2 border border-gray-300 rounded" value="{{ old('name') }}">
        <input type="email" name="email" placeholder="{{ __('programs.email') }}" required
          class="w-full p-2 border border-gray-300 rounded" value="{{ old('email') }}">
        <input type="tel" name="phone" placeholder="{{ __('programs.phone') }}"
          class="w-full p-2 border border-gray-300 rounded" value="{{ old('phone') }}">
        <textarea name="message" placeholder="{{ __('programs.message') }}"
          class="w-full p-2 border border-gray-300 rounded" rows="3">{{ old('message') }}</textarea>

        <button type="submit" class="w-full bg-[#800F12] text-white py-2 rounded hover:bg-[#a3151a] transition">
          {{ __('programs.send') }}
        </button>
      </form>
    </div>
  </div>
</section>

@endsection

{{-- Дополнительно: добавь в твой `app.css` или tailwind.config.js стили для кнопок --}}

<style>
  .btn-primary {
    @apply bg-[#800F12] hover: bg-[#5C0B0D] text-white rounded-lg font-medium transition-colors duration-300 transform hover:scale-105 px-8 py-3 text-lg;
  }

  .btn-outline {
    @apply border-2 border-white hover: bg-white hover:text-[#202124] rounded-lg font-medium transition-colors duration-300 px-8 py-3 text-lg;
  }

  .btn-reset {
    @apply border border-gray-300 text-gray-700 py-2 rounded-lg hover: bg-gray-50 transition-colors inline-block;
  }

  .form-select {
    @apply w-full p-2 border border-gray-300 rounded-lg focus: ring-[#800F12] focus:border-[#800F12];
  }

  .checkbox {
    @apply w-5 h-5 rounded border-gray-300 text-[#800F12] focus: ring-[#800F12];
  }
</style>