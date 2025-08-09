@extends('layouts.app')

@section('content')
<div class="relative bg-[#202124] text-white overflow-hidden">
   <div class="max-w-7xl mx-auto px-6 py-16 md:py-24">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
         <!-- Текстовая колонка -->
         <div class="relative z-10">
            <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
               Рабочие программы в Германии
            </h1>
            <p class="text-lg md:text-xl text-gray-300 mb-8 max-w-lg">
               Подберите подходящую рабочую программу в Германии по профессии, зарплате и условиям.
               Мы предлагаем легальные варианты трудоустройства для специалистов разного уровня.
            </p>

            <div class="flex flex-col sm:flex-row gap-4">
               <a href="#programs"
                  class="bg-[#800F12] hover:bg-[#5C0B0D] text-white px-8 py-3 rounded-lg text-lg font-medium transition-colors duration-300 transform hover:scale-105">
                  Найти программу
               </a>
               <button
                  class="border-2 border-white hover:bg-white hover:text-[#202124] px-8 py-3 rounded-lg text-lg font-medium transition-colors duration-300">
                  Бесплатная консультация
               </button>
            </div>

            <div class="mt-10 flex items-center space-x-6">
               <div class="flex items-center">
                  <svg class="w-8 h-8 text-[#800F12]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                  </svg>
                  <span class="ml-2">{{ $programs->total() }}+ рабочих программ</span>
               </div>
               <div class="flex items-center">
                  <svg class="w-8 h-8 text-[#800F12]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                  </svg>
                  <span class="ml-2">Зарплата от 12,82€/час</span>
               </div>
            </div>
         </div>

         <!-- Колонка с изображением с маской -->
         <div class="relative">
            <div
               class="absolute inset-0 bg-gradient-to-r from-[#800F12] to-transparent opacity-30 rounded-2xl -rotate-6">
            </div>
            <div
               class="relative overflow-hidden rounded-2xl transform rotate-1 hover:rotate-0 transition-transform duration-500">
               <img src="{{ asset('images/ilec-photo-3.jpg') }}" alt="Фото офиса или обучения"
                  class="w-full h-auto object-cover">
            </div>
         </div>

      </div>
   </div>
</div>

<section id="programs" class="bg-gray-100 py-16 md:py-24">
   <div class="max-w-7xl mx-auto px-6">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
         <!-- Фильтры -->
         <div class="lg:col-span-4">
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 sticky top-6">
               <h3 class="text-xl font-bold mb-6 text-[#800F12]">Фильтр рабочих программ</h3>

               <form method="GET" action="{{ route('programs.index') }}">
                  <!-- Фильтр по типу программы -->
                  <div class="mb-6">
                     <h4 class="font-medium mb-3">Тип программы</h4>
                     <select name="type"
                        class="w-full p-2 border border-gray-300 rounded-lg focus:ring-[#800F12] focus:border-[#800F12]">
                        <option value="">Все программы</option>
                        <option value="ausbildung" {{ request('type')=='ausbildung' ? 'selected' : '' }}>
                           Профессиональное
                           обучение (Ausbildung)</option>
                        <option value="specialist" {{ request('type')=='specialist' ? 'selected' : '' }}>Для
                           дипломированных
                           специалистов</option>
                        <option value="short" {{ request('type')=='short' ? 'selected' : '' }}>Краткосрочная занятость
                        </option>
                        <option value="internship" {{ request('type')=='internship' ? 'selected' : '' }}>Стажировка
                           (Praktikum)
                        </option>
                     </select>
                  </div>

                  <!-- Фильтр по профессии -->
                  <div class="mb-6">
                     <h4 class="font-medium mb-3">Профессия/Сфера</h4>
                     <div class="space-y-3">
                        <label class="flex items-center space-x-3">
                           <input type="checkbox" name="professions[]" value="technical"
                              class="w-5 h-5 rounded border-gray-300 text-[#800F12] focus:ring-[#800F12]" {{
                              in_array('technical', (array)request('professions', [])) ? 'checked' : '' }}>
                           <span class="text-gray-700">Технические специальности</span>
                        </label>
                        <label class="flex items-center space-x-3">
                           <input type="checkbox" name="professions[]" value="medical"
                              class="w-5 h-5 rounded border-gray-300 text-[#800F12] focus:ring-[#800F12]" {{
                              in_array('medical', (array)request('professions', [])) ? 'checked' : '' }}>
                           <span class="text-gray-700">Медицина и уход</span>
                        </label>
                        <label class="flex items-center space-x-3">
                           <input type="checkbox" name="professions[]" value="it"
                              class="w-5 h-5 rounded border-gray-300 text-[#800F12] focus:ring-[#800F12]" {{
                              in_array('it', (array)request('professions', [])) ? 'checked' : '' }}>
                           <span class="text-gray-700">IT и технологии</span>
                        </label>
                        <label class="flex items-center space-x-3">
                           <input type="checkbox" name="professions[]" value="hospitality"
                              class="w-5 h-5 rounded border-gray-300 text-[#800F12] focus:ring-[#800F12]" {{
                              in_array('hospitality', (array)request('professions', [])) ? 'checked' : '' }}>
                           <span class="text-gray-700">Гостиничный бизнес</span>
                        </label>
                     </div>
                  </div>

                  <!-- Фильтр по зарплате -->
                  <div class="mb-6">
                     <h4 class="font-medium mb-3">Зарплата в час</h4>
                     <div class="px-2">
                        <input type="range" name="salary" min="10" max="30" step="1" value="{{ request('salary', 12) }}"
                           class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-[#800F12]">
                        <div class="flex justify-between text-sm text-gray-600 mt-2">
                           <span>10 €</span>
                           <span>20 €</span>
                           <span>30 €</span>
                        </div>
                     </div>
                  </div>

                  <!-- Фильтр по языку -->
                  <div class="mb-6">
                     <h4 class="font-medium mb-3">Уровень немецкого</h4>
                     <div class="space-y-3">
                        <label class="flex items-center space-x-3">
                           <input type="checkbox" name="language_level[]" value="a1-a2"
                              class="w-5 h-5 rounded border-gray-300 text-[#800F12] focus:ring-[#800F12]" {{
                              in_array('a1-a2', (array)request('language_level', [])) ? 'checked' : '' }}>
                           <span class="text-gray-700">A1-A2 (Начальный)</span>
                        </label>
                        <label class="flex items-center space-x-3">
                           <input type="checkbox" name="language_level[]" value="b1-b2"
                              class="w-5 h-5 rounded border-gray-300 text-[#800F12] focus:ring-[#800F12]" {{
                              in_array('b1-b2', (array)request('language_level', [])) ? 'checked' : '' }}>
                           <span class="text-gray-700">B1-B2 (Средний)</span>
                        </label>
                        <label class="flex items-center space-x-3">
                           <input type="checkbox" name="language_level[]" value="c1-c2"
                              class="w-5 h-5 rounded border-gray-300 text-[#800F12] focus:ring-[#800F12]" {{
                              in_array('c1-c2', (array)request('language_level', [])) ? 'checked' : '' }}>
                           <span class="text-gray-700">C1-C2 (Продвинутый)</span>
                        </label>
                     </div>
                  </div>

                  <div class="flex space-x-3">
                     <button type="submit"
                        class="flex-1 bg-[#800F12] hover:bg-[#5C0B0D] text-white py-2 rounded-lg transition-colors">
                        Применить
                     </button>
                     <a href="{{ route('programs.index') }}"
                        class="flex-1 border border-gray-300 text-gray-700 py-2 rounded-lg hover:bg-gray-50 transition-colors text-center">
                        Сбросить
                     </a>
                  </div>
               </form>
            </div>
         </div>

         <!-- Список программ -->
         <div class="lg:col-span-8">
            @if($programs->isEmpty())
            <div class="bg-white rounded-xl p-8 text-center">
               <p class="text-lg text-gray-600">Программы не найдены. Попробуйте изменить параметры поиска.</p>
            </div>
            @else
            <div class="grid grid-cols-1 gap-6">
               @foreach($programs as $program)
               <div
                  class="rounded-xl bg-white p-6 md:p-8 shadow-sm hover:shadow-md transition-shadow duration-300 border border-gray-100">
                  <div class="flex flex-col md:flex-row md:items-start gap-6">
                     <!-- Логотип -->


                     <!-- Детали программы -->
                     <div class="flex-grow">
                        <h3 class="text-2xl font-bold mb-2">
                           @php
                           $title = json_decode($program->title, true);
                           $currentLocale = app()->getLocale();
                           $defaultTitle = is_array($title) ? ($title['ru'] ?? 'Название программы') : $program->title;
                           @endphp
                           {{ is_array($title) ? ($title[$currentLocale] ?? $defaultTitle) : $defaultTitle }}
                        </h3>
                        <p class="text-gray-600 mb-4 flex items-center">
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                              stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                           </svg>
                           {{
                           ($location = json_decode($program->location, true))
                           ? (
                           $location[app()->getLocale()] ??
                           $location['ru'] ??
                           $location['en'] ??
                           reset($location) ??
                           'Germany'
                           )
                           : ($program->location ?: 'Germany')
                           }}
                        </p>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                           <div>
                              <p class="text-sm text-gray-500">Тип программы</p>
                              <p class="font-medium">
                                 @switch($program->type)
                                 @case('ausbildung') Профессиональное обучение @break
                                 @case('specialist') Для специалистов @break
                                 @case('short') Краткосрочная @break
                                 @case('internship') Стажировка @break
                                 @default {{ $program->type }}
                                 @endswitch
                              </p>
                           </div>
                           <div>
                              <p class="text-sm text-gray-500">Продолжительность</p>
                              <p class="font-medium">{{ $program->duration }} месяцев</p>
                           </div>
                           <div>
                              <p class="text-sm text-gray-500">Зарплата</p>
                              <p class="font-medium">{{ $program->salary_min }}€ - {{ $program->salary_max }}€/мес</p>
                           </div>
                           <div>
                              <p class="text-sm text-gray-500">Язык</p>
                              <p class="font-medium">
                                 @switch($program->language_level)
                                 @case('a1-a2') A1-A2 (Начальный) @break
                                 @case('b1-b2') B1-B2 (Средний) @break
                                 @case('c1-c2') C1-C2 (Продвинутый) @break
                                 @default {{ $program->language_level }}
                                 @endswitch
                              </p>
                           </div>
                           <div>
                              <p class="text-sm text-gray-500">Возраст</p>
                              <p class="font-medium">{{ $program->min_age }}-{{ $program->max_age }} лет</p>
                           </div>
                        </div>

                        <div class="mb-4">
                           <p class="text-gray-700">
                              @php
                              $description = json_decode($program->description, true);
                              $currentLocale = app()->getLocale();

                              // First try current locale, then Russian, then raw value, then default message
                              $displayDescription = is_array($description)
                              ? ($description[$currentLocale] ?? $description['ru'] ?? null)
                              : $program->description;
                              @endphp

                              {{ $displayDescription ?? 'Описание программы недоступно' }}
                           </p>
                        </div>

                        <div class="flex flex-wrap gap-3">
                           <a href="" class="px-4 py-2 bg-[#800F12] hover:bg-[#5C0B0D] text-white rounded-lg">
                              Подробнее о программе
                           </a>
                           <button
                              class="px-4 py-2 border border-[#800F12] text-[#800F12] hover:bg-[#800F12]/10 rounded-lg">
                              Бесплатная консультация
                           </button>
                           <a href="}" class="flex items-center text-[#800F12] hover:underline ml-auto">
                              Требования
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                              </svg>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>

            <!-- Пагинация -->
            <div class="mt-8">
               {{ $programs->links() }}
            </div>
            @endif
         </div>
      </div>
   </div>
</section>
@endsection