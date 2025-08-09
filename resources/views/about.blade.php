@extends('layouts.app') {{-- Используем ваш основной layout --}}

@section('title', 'О нас - ILEC')

@section('content')
<x-page-hero title="{{ __('messages.about-us.title') }}" description="{{ __('messages.about-us.description') }}"
  image="images/IMG_0191.webp" imageAlt="{{ __('messages.about-us.image_alt') }}" :stats="[
        ['icon' => 'heroicon-s-check', 'text' => __('messages.about-us.stats.success')],
        ['icon' => 'heroicon-s-clock', 'text' => __('messages.about-us.stats.experience')],
        ['icon' => 'heroicon-s-academic-cap', 'text' => __('messages.about-us.stats.partners')],
    ]" />

<section class="bg-white py-16">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">
      {{ __('messages.timeline_title') }}
    </h2>

    <div class="relative">
      <div class="absolute left-1/2 h-full w-0.5 bg-gray-200 transform -translate-x-1/2 hidden md:block"></div>

      <div class="space-y-12 md:space-y-16">

        @php
        $timeline = [
        [
        'year' => '2019',
        'title' => __('messages.timeline.2019.title'),
        'description' => __('messages.timeline.2019.description'),
        ],
        [
        'year' => '2022',
        'title' => __('messages.timeline.2022.title'),
        'description' => __('messages.timeline.2022.description'),
        ],
        [
        'year' => '2023',
        'title' => __('messages.timeline.2023.title'),
        'description' => __('messages.timeline.2023.description'),
        ],
        [
        'year' => '2024',
        'title' => __('messages.timeline.2024.title'),
        'description' => __('messages.timeline.2024.description'),
        ],
        ];
        @endphp


        @foreach ($timeline as $index => $event)
        <div class="relative flex flex-col md:flex-row items-center">
          @if ($index % 2 === 0)
          <!-- Левая колонка -->
          <div class="md:w-1/2 md:pr-12 mb-6 md:mb-0 md:text-right">
            <div class="bg-gray-50 p-6 rounded-xl shadow-sm border border-gray-200">
              <h3 class="text-xl font-bold text-[#800F12] mb-2">{{ $event['year'] }}</h3>
              <p class="text-gray-600">{{ $event['title'] }}</p>
              <p class="text-gray-500 text-sm mt-2">{{ $event['description'] }}</p>
            </div>
          </div>
          <!-- Иконка -->
          <div
            class="hidden md:flex items-center justify-center w-12 h-12 rounded-full bg-[#800F12] text-white z-10 mx-auto">
            <!-- Иконка -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div class="md:w-1/2 md:pl-12"></div>
          @else
          <div class="md:w-1/2 md:pr-12"></div>
          <div
            class="hidden md:flex items-center justify-center w-12 h-12 rounded-full bg-[#800F12] text-white z-10 mx-auto">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div class="md:w-1/2 md:pl-12">
            <div class="bg-gray-50 p-6 rounded-xl shadow-sm border border-gray-200">
              <h3 class="text-xl font-bold text-[#800F12] mb-2">{{ $event['year'] }}</h3>
              <p class="text-gray-600">{{ $event['title'] }}</p>
              <p class="text-gray-500 text-sm mt-2">{{ $event['description'] }}</p>
            </div>
          </div>
          @endif
        </div>
        @endforeach

      </div>
    </div>
  </div>
</section>
<!-- Команда -->
<section class="bg-gray-100 py-16">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">
      Наша команда
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">


      <!-- Карточка 2: Гульзина Абдыжапар кызы -->
      <div
        class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition-shadow duration-300">
        <div class="flex justify-center mb-4">
          <img src="{{ asset('images/default-avatar.jpg') }}" alt="Гульзина Абдыжапар кызы"
            class="w-48 h-48 rounded-full object-cover border-4 border-[#800F12]" />
        </div>
        <h3 class="text-xl font-bold text-center text-gray-900 mb-1">
          Гульзина Абдыжапар кызы
        </h3>
        <p class="text-[#800F12] text-center mb-4">Директор Ошского филиала</p>
        <p class="text-gray-600 mb-4">
          Соучредитель компании, живёт и работает в Германии. Лично заключает договоры с международными партнёрами,
          обеспечивает рабочие места и сопровождает кандидатов в Германии.
        </p>
        <div class="text-sm text-gray-500">
          <p class="mb-1">✓ Быстрая связь с участниками программ</p>
          <p>✓ Поддержка и сопровождение на месте</p>
        </div>
      </div>
      <!-- Карточка 1: Мунарбек Жакыпов -->
      <div
        class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition-shadow duration-300">
        <div class="flex justify-center mb-4">
          <img src="{{ asset('images/director.webp') }}" alt="Мунарбек Жакыпов"
            class="w-48 h-48 rounded-full object-cover border-4 border-[#800F12]" />
        </div>
        <h3 class="text-xl font-bold text-center text-gray-900 mb-1">
          Мунарбек Жакыпов
        </h3>
        <p class="text-[#800F12] text-center mb-4">Генеральный директор</p>
        <p class="text-gray-600 mb-4">
          Основатель компании ILEC, руководит общей стратегией и развитием компании. Отвечает за координацию работы
          филиалов и стратегическое планирование.
        </p>
      </div>
      <!-- Карточка 3: Анна Иванова (оставим для баланса) -->
      <div
        class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition-shadow duration-300">
        <div class="flex justify-center mb-4">
          <img src="{{ asset('images/ilec-photo-17.webp') }}" alt="Анна Иванова"
            class="w-48 h-48 rounded-full object-cover border-4 border-[#800F12]" />
        </div>
        <h3 class="text-xl font-bold text-center text-gray-900 mb-1">
          Венке Вебер
        </h3>
        <p class="text-[#800F12] text-center mb-4">Преподаватель немецкого языка</p>
        <p class="text-gray-600 mb-4">
          "Два года назад переехала в Кыргызстан. Преподаёт в ILEC, помогает студентам развиваться и уверенно осваивать
          немецкий язык."
        </p>


      </div>
    </div>

    <!-- Кнопка -->

    {{-- <div class="text-center mt-12">
      <button
        class="border border-[#800F12] text-[#800F12] hover:bg-gray-50 px-6 py-3 rounded-lg font-medium transition duration-300">
        Познакомиться со всей командой
      </button>
    </div> --}}
  </div>
</section>

@include('partials.application-form')
<section class="bg-gray-100 py-16">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">
      Почему мы?
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <!-- Карточка 1 -->
      <div
        class="rounded-xl bg-white p-6 md:p-8 md:rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300 border border-gray-100">
        <div class="flex items-start">
          <div class="flex-shrink-0 bg-[#800F12]/10 p-3 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#800F12]" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div class="ml-4">
            <h3 class="text-xl font-bold text-gray-900 mb-2">
              4000+ успешных поступлений
            </h3>
            <p class="text-gray-600">
              Более 4000 студентов доверили нам свое образование за рубежом
              и достигли своих целей
            </p>
          </div>
        </div>
      </div>

      <!-- Карточка 2 -->
      <div
        class="rounded-xl bg-white p-6 md:p-8 md:rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300 border border-gray-100">
        <div class="flex items-start">
          <div class="flex-shrink-0 bg-[#800F12]/10 p-3 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#800F12]" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
            </svg>
          </div>
          <div class="ml-4">
            <h3 class="text-xl font-bold text-gray-900 mb-2">
              Партнерства с 100+ университетами
            </h3>
            <p class="text-gray-600">
              Прямые договоры с ведущими вузами мира, что дает
              дополнительные преимущества нашим клиентам
            </p>
          </div>
        </div>
      </div>

      <!-- Карточка 3 -->
      <div
        class="rounded-xl bg-white p-6 md:p-8 md:rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300 border border-gray-100">
        <div class="flex items-start">
          <div class="flex-shrink-0 bg-[#800F12]/10 p-3 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#800F12]" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
          </div>
          <div class="ml-4">
            <h3 class="text-xl font-bold text-gray-900 mb-2">
              Персональный менеджер
            </h3>
            <p class="text-gray-600">
              Каждый клиент получает персонального менеджера, который
              сопровождает на всех этапах
            </p>
          </div>
        </div>
      </div>

      <!-- Карточка 4 -->
      <div
        class="rounded-xl bg-white p-6 md:p-8 md:rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300 border border-gray-100">
        <div class="flex items-start">
          <div class="flex-shrink-0 bg-[#800F12]/10 p-3 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#800F12]" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div class="ml-4">
            <h3 class="text-xl font-bold text-gray-900 mb-2">
              Гарантия возврата денег
            </h3>
            <p class="text-gray-600">
              Если по нашей вине поступление не состоится, мы вернем вам
              деньги в полном объеме
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Блок с тремя колонками -->
<section class="bg-gray-100 py-16">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Колонка 1 - Наши менторы -->
      <div
        class="bg-white rounded-xl p-8 shadow-sm hover:shadow-md transition-shadow duration-300 border border-gray-200">
        <div class="flex justify-center mb-6">
          <div class="bg-[#800F12]/10 p-4 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-[#800F12]" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
          </div>
        </div>
        <h3 class="text-xl font-bold text-center text-gray-900 mb-4">
          Наши менторы
        </h3>
        <p class="text-gray-600 text-center mb-6">
          Они помогут вам пройти через все трудности поступления за границу,
          оставаясь рядом на каждом этапе
        </p>
        <div class="text-center">
          <a href="#"
            class="inline-block px-6 py-2 bg-[#800F12] hover:bg-[#5C0B0D] text-white rounded-lg font-medium transition duration-300">
            Перейти на страницу
          </a>
        </div>
      </div>

      <!-- Колонка 2 - Вопросы -->
      <div
        class="bg-white rounded-xl p-8 shadow-sm hover:shadow-md transition-shadow duration-300 border border-gray-200">
        <div class="flex justify-center mb-6">
          <div class="bg-[#800F12]/10 p-4 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-[#800F12]" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
        </div>
        <h3 class="text-xl font-bold text-center text-gray-900 mb-4">
          Вопросы
        </h3>
        <p class="text-gray-600 text-center mb-6">
          Вопросы о работе агентства, актуальной ситуации и поступлении за
          границу для более плавного погружения
        </p>
        <div class="text-center">
          <a href="#"
            class="inline-block px-6 py-2 bg-[#800F12] hover:bg-[#5C0B0D] text-white rounded-lg font-medium transition duration-300">
            Перейти на страницу
          </a>
        </div>
      </div>

      <!-- Колонка 3 - Сотрудничество -->
      <div
        class="bg-white rounded-xl p-8 shadow-sm hover:shadow-md transition-shadow duration-300 border border-gray-200">
        <div class="flex justify-center mb-6">
          <div class="bg-[#800F12]/10 p-4 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-[#800F12]" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
            </svg>
          </div>
        </div>
        <h3 class="text-xl font-bold text-center text-gray-900 mb-4">
          Сотрудничество
        </h3>
        <p class="text-gray-600 text-center mb-6">
          Чем мы можем быть полезны учебным заведениям и другим компаниям
          как агентство по образованию за рубежом
        </p>
        <div class="text-center">
          <a href="#"
            class="inline-block px-6 py-2 bg-[#800F12] hover:bg-[#5C0B0D] text-white rounded-lg font-medium transition duration-300">
            Перейти на страницу
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection