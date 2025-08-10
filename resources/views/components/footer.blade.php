<footer class="bg-[#202124] text-white">
  <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- First column - Logo and contacts -->
      <div class="space-y-4">
        <div class="flex items-center">
          <a href="{{ route('home') }}" class="text-2xl font-bold text-white">
            <span class="text-primary-600">ILEC</span>
          </a>
          <span class="ml-2 rounded bg-[#5C0B0D] px-2 py-1 text-xs text-white md:inline-block">
            {{ __('footer.since') }} 2019
          </span>
        </div>

        <div class="space-y-2 text-gray-300 text-sm">
          <p>{{ __('footer.address_label') }}</p>
          <p>{{ __('footer.address_line1') }}</p>
          <p>{{ __('footer.address_line2') }}</p>
          <p>{{ __('footer.phone') }}: <a href="tel:+996700906095" class="hover:text-white">+996 700 906 095</a></p>
          <p>Email: <a href="mailto:Ilec.official.kg@gmail.com" class="hover:text-white">Ilec.official.kg@gmail.com</a>
          </p>
        </div>

        <div class="flex space-x-4">
          <!-- Instagram -->
          <a href="https://www.instagram.com/ilec.bishkek/" target="_blank" rel="noopener"
            class="text-gray-300 hover:text-white transition-colors duration-300"
            aria-label="{{ __('footer.instagram') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
              <path
                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
            </svg>
          </a>

          <!-- WhatsApp -->
          <a href="http://wa.me/996700906095" target="_blank" rel="noopener"
            class="text-gray-300 hover:text-white transition-colors duration-300"
            aria-label="{{ __('footer.whatsapp') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
              <path
                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
            </svg>
          </a>
        </div>
      </div>

      <!-- Second column - About -->
      <div class="space-y-4">
        <h3 class="text-lg font-medium">{{ __('messages.about') }}</h3>
        <ul class="space-y-2">
          <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-white">{{ __('messages.about') }}</a></li>
          <li><a href="{{ route('reviews') }}" class="text-gray-300 hover:text-white">{{ __('messages.reviews') }}</a>
          </li>
          <li><a href="{{ route('contacts') }}" class="text-gray-300 hover:text-white">{{ __('messages.contacts') }}</a>
          </li>
        </ul>
      </div>

      <!-- Third column - Services -->
      <div class="space-y-4">
        <h3 class="text-lg font-medium">{{ __('messages.services') }}</h3>
        <ul class="space-y-2">
          <li><a href="{{ route('courses') }}" class="text-gray-300 hover:text-white">{{ __('messages.courses') }}</a>
          </li>
          <li><a href="{{ route('programs.work') }}" class="text-gray-300 hover:text-white">{{
              __('messages.germany_jobs') }}</a></li>
          <li><a href="{{ route('programs.study') }}" class="text-gray-300 hover:text-white">{{
              __('messages.germany_study') }}</a></li>
          <li><a href="{{ route('visa.support') }}" class="text-gray-300 hover:text-white">{{
              __('messages.visa_support') }}</a></li>
        </ul>
      </div>
    </div>

    <!-- Footer bottom -->
    <div class="mt-12 border-t border-gray-700 pt-8">
      <div class="flex flex-col md:flex-row justify-between items-center">
        <p class="text-gray-400 text-sm">
          © {{ now()->year }} ILEC. {{ __('footer.all_rights_reserved') }}
        </p>

        <div class="flex space-x-6 mt-4 md:mt-0">
          <a href="#" class="text-gray-400 hover:text-white text-sm">{{ __('footer.privacy_policy') }}</a>
          <a href="#" class="text-gray-400 hover:text-white text-sm">{{ __('footer.terms_of_use') }}</a>
          {{-- <a href="#" class="text-gray-400 hover:text-white text-sm">{{ __('footer.sitemap') }}</a> --}}
        </div>
      </div>
    </div>
  </div>
</footer>