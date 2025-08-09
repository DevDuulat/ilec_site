@extends('layouts.app')

@section('content')

<section class="bg-gray-100 py-16">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <h2 class="text-3xl font-bold text-gray-900 mb-8">
      {{ __('messages.services_page.all_services') }}
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($services as $service)
      <div
        class="rounded-xl bg-white p-6 md:p-8 md:rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300 border border-gray-100">
        <h3 class="text-xl font-semibold mb-4">
          {{ $service->getTranslation('title', app()->getLocale()) }}
        </h3>
        <p class="text-gray-600 mb-6">
          {{ $service->getTranslation('description', app()->getLocale()) }}
        </p>
        <div class="mb-6">
          <p class="text-gray-500 text-sm">{{ __('messages.services_page.price') }}:</p>
          <div class="flex items-end">
            <span class="text-2xl font-bold text-gray-900">от {{ number_format($service->monthly_price, 0, ',', ' ')
              }}</span>
            <span class="text-gray-500 ml-1">{{ __('messages.services_page.per_month') }}</span>
          </div>
          <p class="text-gray-500 text-sm mt-1">
            {{ __('messages.services_page.or') }} {{ number_format($service->full_price, 0, ',', ' ') }} {{
            __('messages.services_page.full_price') }}
          </p>
        </div>
        <div class="flex space-x-3">
          <button
            class="bg-[#800F12] hover:bg-[#5C0B0D] text-white px-4 py-2 rounded-lg font-medium text-sm flex-1 transition duration-300">
            {{ __('messages.services_page.apply_btn') }}
          </button>
          <button
            class="border border-[#800F12] text-[#800F12] hover:bg-gray-50 px-4 py-2 rounded-lg font-medium text-sm flex-1 transition duration-300">
            {{ __('messages.services_page.details_btn') }}
          </button>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection