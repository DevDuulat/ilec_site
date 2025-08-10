<section class="bg-gray-100">
  <div class="max-w-7xl mx-auto px-6 sm:px-6 lg:px-8 py-12">
    <h2 class="text-2xl md:text-3xl font-bold mb-12">
      {{ __('why_choose_us.title') }}
    </h2>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
      <div class="lg:col-span-2 space-y-6">
        @foreach(__('why_choose_us.items') as $index => $item)
        <div class="border-b border-gray-300 pb-6 accordion-item {{ $index === 2 ? 'active' : '' }}">
          <h3
            class="text-lg md:text-xl font-medium {{ $index === 2 ? 'text-gray-900 font-semibold' : 'text-gray-600 hover:text-gray-900' }} cursor-pointer transition-colors duration-200 accordion-header">
            {{ $item['title'] }}
          </h3>
          <div
            class="mt-3 text-gray-600 overflow-hidden transition-all duration-300 accordion-content {{ $index === 2 ? '' : 'hidden' }}">
            <p class="leading-normal text-base">{{ $item['content'] }}</p>
          </div>
        </div>
        @endforeach
      </div>

      <div class="hidden lg:block h-full">
        <div class="sticky top-24 h-[32rem] rounded-2xl overflow-hidden shadow-lg bg-gray-100">
          <img src="{{ asset('images/ilec-photo-2.jpg') }}" alt="{{ __('why_choose_us.images_alt.mentors') }}"
            class="w-full h-full object-cover rounded-2xl hidden accordion-image" />
          <img src="{{ asset('images/ilec-photo-5.jpg') }}" alt="{{ __('why_choose_us.images_alt.globe') }}"
            class="w-full h-full object-cover rounded-2xl hidden accordion-image" />
          <img src="{{ asset('images/ilec-photo-4.jpg') }}" alt="{{ __('why_choose_us.images_alt.cambridge') }}"
            class="w-full h-full object-cover rounded-2xl accordion-image" />
          <img src="{{ asset('images/ilec-photo-14.jpg') }}" alt="{{ __('why_choose_us.images_alt.consultation') }}"
            class="w-full h-full object-cover rounded-2xl hidden accordion-image" />
          <img src="{{ asset('images/ilec-photo-15.jpg') }}" alt="{{ __('why_choose_us.images_alt.team') }}"
            class="w-full h-full object-cover rounded-2xl hidden accordion-image" />
          <img src="{{ asset('images/ilec-photo-16.jpg') }}" alt="{{ __('why_choose_us.images_alt.financing') }}"
            class="w-full h-full object-cover rounded-2xl hidden accordion-image" />
        </div>
      </div>
    </div>
  </div>
</section>