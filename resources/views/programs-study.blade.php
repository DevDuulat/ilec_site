@extends('layouts.app')

@section('content')
<div class="relative bg-[#202124] text-white overflow-hidden">
  <div class="max-w-7xl mx-auto px-6 py-16 md:py-24">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
      {{-- Текстовая колонка --}}
      <div class="relative z-10">
        <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
          Рабочие программы в Германии
        </h1>
        <p class="text-lg md:text-xl text-gray-300 mb-8 max-w-lg">
          Подберите подходящую рабочую программу в Германии по профессии, зарплате и условиям.
          Мы предлагаем легальные варианты трудоустройства для специалистов разного уровня.
        </p>

        <div class="flex flex-col sm:flex-row gap-4">
          <a href="#programs" class="btn-primary">
            Найти программу
          </a>
          <button class="btn-outline">
            Бесплатная консультация
          </button>
        </div>

        <div class="mt-10 flex items-center space-x-6 text-gray-300">
          <div class="flex items-center gap-2">
            {{--
            <x-icon-check class="w-8 h-8 text-[#800F12]" /> --}}
            {{-- <span>{{ $programs->total() }}+ рабочих программ</span> --}}
          </div>
          <div class="flex items-center gap-2">
            {{--
            <x-icon-check class="w-8 h-8 text-[#800F12]" /> --}}
            <span>Зарплата от 12,82€/час</span>
          </div>
        </div>
      </div>

      {{-- Колонка с изображением --}}
      <div class="relative">
        <div class="absolute inset-0 bg-gradient-to-r from-[#800F12] to-transparent opacity-30 rounded-2xl -rotate-6">
        </div>
        <div
          class="relative overflow-hidden rounded-2xl transform rotate-1 hover:rotate-0 transition-transform duration-500">
          <img src="{{ asset('images/ilec-photo-13.jpg') }}" alt="Фото офиса или обучения"
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
          <h3 class="text-xl font-bold mb-6 text-[#800F12]">Фильтр рабочих программ</h3>

          <form method="GET" action="" class="space-y-6">

            {{-- Тип программы --}}
            <div class="mb-6">
              <label for="type" class="block text-sm font-semibold text-gray-700 mb-2">
                Тип программы
              </label>
              <select name="type" id="type"
                class="block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm bg-white">
                <option value="">Все программы</option>
                <option value="ausbildung" {{ request('type')=='ausbildung' ? 'selected' : '' }}>
                  Профессиональное обучение (Ausbildung)
                </option>
                <option value="specialist" {{ request('type')=='specialist' ? 'selected' : '' }}>
                  Для дипломированных специалистов
                </option>
                <option value="short" {{ request('type')=='short' ? 'selected' : '' }}>
                  Краткосрочная занятость
                </option>
                <option value="internship" {{ request('type')=='internship' ? 'selected' : '' }}>
                  Стажировка (Praktikum)
                </option>
              </select>
            </div>


            {{-- Профессия/Сфера --}}
            <fieldset class="mb-6">
              <legend class="text-sm font-semibold text-gray-700 mb-3">
                Профессия / Сфера
              </legend>

              @php
              $professions = [
              'technical' => 'Технические специальности',
              'medical' => 'Медицина и уход',
              'it' => 'IT и технологии',
              'hospitality' => 'Гостиничный бизнес'
              ];
              $selectedProfessions = (array) request('professions', []);
              @endphp

              <div class="space-y-3">
                @foreach($professions as $key => $label)
                <label class="flex items-center space-x-3">
                  <input type="checkbox" name="professions[]" value="{{ $key }}"
                    class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" {{ in_array($key,
                    $selectedProfessions) ? 'checked' : '' }}>
                  <span class="text-sm text-gray-800">{{ $label }}</span>
                </label>
                @endforeach
              </div>
            </fieldset>


            {{-- Зарплата в час --}}
            @php
            $salary = request('salary', 12);
            @endphp

            <div class="mb-6">
              <label for="salary" class="block text-sm font-semibold text-gray-700 mb-2">
                Зарплата в месяц
              </label>

              <div class="flex items-center gap-4">
                <input type="range" id="salary" name="salary" min="10" max="30" step="1" value="{{ $salary }}"
                  class="w-full accent-[#800F12] cursor-pointer"
                  oninput="document.getElementById('salary-value').textContent = this.value + ' €'">
                <div id="salary-value" class="text-sm text-gray-800 font-medium w-12 text-right">
                  {{ $salary }} €
                </div>
              </div>

              <div class="flex justify-between text-sm text-gray-500 mt-2 px-1">
                <span>10 €</span>
                <span>20 €</span>
                <span>30 €</span>
              </div>
            </div>

            {{-- Уровень немецкого --}}
            <fieldset class="mb-6">
              <legend class="text-sm font-semibold text-gray-700 mb-3">
                Уровень немецкого
              </legend>

              @php
              $levels = [
              'a1-a2' => 'A1–A2 (Начальный)',
              'b1-b2' => 'B1–B2 (Средний)',
              'c1-c2' => 'C1–C2 (Продвинутый)'
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
                Применить
              </button>

              <a href="{{ url()->current() }}"
                class="flex-1 inline-flex items-center justify-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-xl text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-gray-400 transition text-center">
                Сбросить
              </a>
            </div>


          </form>
        </div>
      </aside>

      {{-- Список программ --}}
      <main class="lg:col-span-8">
        @if($programs->isEmpty())
        <div class="bg-white rounded-2xl p-10 text-center text-gray-500 shadow">
          <p class="text-lg">Программы не найдены.</p>
          <p class="text-sm mt-2">Попробуйте изменить параметры фильтрации.</p>
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
              📍 {{ $displayLocation }}
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-6 text-sm">
              <div>
                <span class="text-gray-500">Тип программы</span>
                <div class="font-medium text-gray-800 mt-1">
                  @switch($program->type)
                  @case('ausbildung') Профессиональное обучение @break
                  @case('specialist') Для специалистов @break
                  @case('short') Краткосрочная @break
                  @case('internship') Стажировка @break
                  @default {{ $program->type }}
                  @endswitch
                </div>
              </div>

              <div>
                <span class="text-gray-500">Продолжительность</span>
                <div class="font-medium text-gray-800 mt-1">{{ $program->duration }} месяцев</div>
              </div>

              <div>
                <span class="text-gray-500">Зарплата</span>
                <div class="font-medium text-gray-800 mt-1">
                  {{ $program->salary_min }}€ – {{ $program->salary_max }}€/мес
                </div>
              </div>

              <div>
                <span class="text-gray-500">Язык</span>
                <div class="font-medium text-gray-800 mt-1">
                  @switch($program->language_level)
                  @case('a1-a2') A1–A2 (Начальный) @break
                  @case('b1-b2') B1–B2 (Средний) @break
                  @case('c1-c2') C1–C2 (Продвинутый) @break
                  @default {{ $program->language_level }}
                  @endswitch
                </div>
              </div>

              <div>
                <span class="text-gray-500">Возраст</span>
                <div class="font-medium text-gray-800 mt-1">{{ $program->min_age }}–{{ $program->max_age }} лет</div>
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
              <a href="#" class="bg-[#800F12] text-white text-sm px-4 py-2 rounded-lg hover:bg-[#a3151a] transition">
                Подробнее о программе
              </a>
              <button
                class="border border-gray-300 text-sm text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-50 transition">
                Бесплатная консультация
              </button>
              <a href="#" class="text-sm text-[#800F12] hover:underline ml-auto flex items-center gap-1">
                📄 Требования
              </a>
            </footer>
          </article>
          @endforeach
        </div>

        {{-- Пагинация --}}
        <div class="mt-10 flex justify-center">
          {{-- {{ $programs->links() }} --}}
          <p class="text-sm text-gray-500">Пагинация здесь</p>
        </div>
        @endif
      </main>

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