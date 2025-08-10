@extends('layouts.app')

@section('content')
<div class="relative bg-[#202124] text-white overflow-hidden">
  <div class="max-w-7xl mx-auto px-6 py-16 md:py-24">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

      <!-- Колонка с изображением с маской -->
      <div class="relative">
        <div class="absolute inset-0 bg-gradient-to-r from-[#800F12] to-transparent opacity-30 rounded-2xl -rotate-6">
        </div>
        <div
          class="relative overflow-hidden rounded-2xl transform rotate-1 hover:rotate-0 transition-transform duration-500">
          <div>
            <img src="{{ asset('images/ilec-photo-8.jpg') }}" alt="{{ __('visasupport.title_main') }}"
              class="w-full h-full object-cover" />
          </div>
        </div>

        <div class="absolute -bottom-6 -left-6 w-32 h-32 rounded-full bg-[#800F12] opacity-20 blur-xl"></div>
        <div class="absolute -top-6 -right-6 w-24 h-24 rounded-full bg-[#800F12] opacity-20 blur-xl"></div>
      </div>
      <!-- Текстовая колонка -->
      <div class="relative z-10">
        <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
          {{ __('visasupport.title_main') }}
        </h1>
        <p class="text-lg md:text-xl text-gray-300 mb-8 max-w-lg">
          {{ __('visasupport.desc_main') }}
        </p>

        <div class="flex flex-col sm:flex-row gap-4">

          <a href="{{ route('contacts') }}"
            class="border-2 border-white hover:bg-white hover:text-[#202124] px-8 py-3 rounded-lg text-lg font-medium transition-colors duration-300">
            {{ __('visasupport.btn_consult') }}
          </a>

        </div>

        <div class="mt-10 flex flex-wrap gap-6">
          <div class="flex items-center">
            <svg class="w-8 h-8 text-[#800F12]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <span class="ml-2">{{ __('visasupport.stat_1') }}</span>
          </div>
          <div class="flex items-center">
            <svg class="w-8 h-8 text-[#800F12]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <span class="ml-2">{{ __('visasupport.stat_2') }}</span>
          </div>
          <div class="flex items-center">
            <svg class="w-8 h-8 text-[#800F12]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <span class="ml-2">{{ __('visasupport.stat_3') }}</span>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="absolute top-0 left-0 w-full h-full overflow-hidden">
    <div class="absolute top-1/4 -right-20 w-64 h-64 rounded-full bg-[#800F12] opacity-10 blur-3xl"></div>
    <div class="absolute bottom-0 -left-40 w-80 h-80 rounded-full bg-[#800F12] opacity-10 blur-3xl"></div>
  </div>
</div>

<section class="bg-gray-100 py-16 md:py-24 px-6">
  <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-12 gap-12 items-center">


    <div class="md:col-span-7">
      <div class="bg-white rounded-2xl p-8 md:p-10 shadow-md border border-gray-200 space-y-6">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight">
          {{ __('visasupport.section2_title') }}
        </h2>

        <p class="text-gray-700 text-base leading-relaxed">
          {{ __('visasupport.section2_p1') }}
        </p>

        <p class="text-gray-700 text-base leading-relaxed">
          {{ __('visasupport.section2_p2') }}
        </p>

        <div>
          <a href="{{ route('contacts') }}"
            class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gray-900 text-white rounded-xl font-medium hover:bg-gray-800 transition">
            {{ __('visasupport.section2_btn') }}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
            </svg>
          </a>
        </div>
      </div>
    </div>
    <div class="md:col-span-5">
      <div class="w-full max-h-[680px] overflow-hidden rounded-2xl border border-gray-200 shadow-md">
        <img src="{{ asset('images/ilec-photo-9.jpg') }}" alt="{{ __('visasupport.section2_title') }}"
          class="w-full h-full object-cover" style="object-position: center 20%;" />
      </div>
    </div>

  </div>
</section>

<section class="py-16 md:py-24 px-6 bg-[#202124] text-white">
  <div class="max-w-7xl mx-auto">
    <div class="text-center mb-16">
      <h2 class="text-3xl md:text-4xl font-bold mb-4">{{ __('visasupport.certificates_title') }}</h2>
      <p class="text-lg text-gray-300 max-w-3xl mx-auto">
        {{ __('visasupport.certificates_desc') }}
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">
      <div
        class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500 bg-white flex items-center justify-center h-72 sm:h-80 md:h-[22rem]">
        <div
          class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10 flex items-end p-6">
          <div class="translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
            <h3 class="text-xl font-bold text-white">{{ __('visasupport.cert_1_title') }}</h3>
            <p class="text-gray-300 mt-1">{{ __('visasupport.cert_1_desc') }}</p>
          </div>
        </div>
        <img src="{{ asset('images/certificate-1.webp') }}" alt="{{ __('visasupport.cert_1_title') }}"
          class="h-full max-h-full w-auto object-contain transition-transform duration-700 group-hover:scale-105">
      </div>

      <div
        class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500 bg-white flex items-center justify-center h-72 sm:h-80 md:h-[22rem]">
        <div
          class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10 flex items-end p-6">
          <div class="translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
            <h3 class="text-xl font-bold text-white">{{ __('visasupport.cert_2_title') }}</h3>
            <p class="text-gray-300 mt-1">{{ __('visasupport.cert_2_desc') }}</p>
          </div>
        </div>
        <img src="{{ asset('images/certificate-2.webp') }}" alt="{{ __('visasupport.cert_2_title') }}"
          class="h-full max-h-full w-auto object-contain transition-transform duration-700 group-hover:scale-105">
      </div>
    </div>

    <div class="relative">
      <div class="absolute -top-20 -left-20 w-40 h-40 rounded-full bg-[#800F12] opacity-10 blur-xl"></div>
      <div class="absolute -bottom-10 -right-10 w-32 h-32 rounded-full bg-[#800F12] opacity-10 blur-xl"></div>
    </div>
  </div>
</section>
@endsection