<div id="applicationModal" class="fixed inset-0 z-50 {{ session('show_modal') ? '' : 'hidden' }} overflow-y-auto">
  <!-- Размытый фон -->
  <div class="fixed inset-0 bg-gray-900/75 backdrop-blur-sm" aria-hidden="true"></div>

  <!-- Основной контейнер (центрирован) -->
  <div class="flex min-h-screen items-center justify-center p-4">
    <!-- Контент модального окна -->
    <div class="relative w-full max-w-lg transform rounded-lg bg-[#202124] text-left shadow-xl transition-all">
      <!-- Крестик для закрытия -->
      <button type="button" onclick="document.getElementById('applicationModal').classList.add('hidden')"
        class="absolute right-3 top-3 rounded-md p-1 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none">
        <span class="sr-only">Close</span>
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>

      <div class="bg-[#202124] px-6 pt-8 pb-6 sm:p-8">
        <div class="text-center">
          <h3 class="text-xl font-medium leading-6 text-white">
            {{ __('messages.apply_modal.title') }}
          </h3>

          <div class="mt-6">
            <form method="POST" action="{{ route('request-forms.store') }}" class="mx-auto max-w-xs">
              @csrf

              @if(session('success'))
              <div class="mb-4 rounded-md bg-green-100 p-4 text-green-700">
                {{ session('success') ?: __('messages.apply_modal.success') }}
              </div>
              @endif

              <div class="mb-4">
                <label for="name" class="mb-1 block text-left text-sm font-medium text-gray-300">
                  {{ __('messages.apply_modal.name') }}
                </label>
                <input type="text" id="name" name="name" required
                  class="block w-full rounded-md border border-gray-600 bg-[#2b2d30] px-3 py-2 text-white shadow-sm focus:border-[#800F12] focus:ring-[#800F12]"
                  value="{{ old('name') }}">
              </div>

              <div class="mb-4">
                <label for="phone" class="mb-1 block text-left text-sm font-medium text-gray-300">
                  {{ __('messages.apply_modal.phone') }}
                </label>
                <input type="tel" id="phone" name="phone"
                  class="block w-full rounded-md border border-gray-600 bg-[#2b2d30] px-3 py-2 text-white shadow-sm focus:border-[#800F12] focus:ring-[#800F12]"
                  value="{{ old('phone') }}">
              </div>

              <div class="mb-4">
                <label for="email" class="mb-1 block text-left text-sm font-medium text-gray-300">
                  {{ __('messages.apply_modal.email') }}
                </label>
                <input type="email" id="email" name="email" required
                  class="block w-full rounded-md border border-gray-600 bg-[#2b2d30] px-3 py-2 text-white shadow-sm focus:border-[#800F12] focus:ring-[#800F12]"
                  value="{{ old('email') }}">
              </div>

              <div class="mb-6">
                <label for="message" class="mb-1 block text-left text-sm font-medium text-gray-300">
                  {{ __('messages.apply_modal.message') }}
                </label>
                <textarea id="message" name="message" rows="3"
                  class="block w-full rounded-md border border-gray-600 bg-[#2b2d30] px-3 py-2 text-white shadow-sm focus:border-[#800F12] focus:ring-[#800F12]">{{ old('message') }}</textarea>
              </div>

              <div class="flex justify-center space-x-4">
                <button type="submit"
                  class="rounded-md bg-[#800F12] px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-[#5C0B0D] focus:outline-none focus:ring-2 focus:ring-[#800F12] focus:ring-offset-2">
                  {{ __('messages.apply_modal.submit') }}
                </button>
                <button type="button" onclick="document.getElementById('applicationModal').classList.add('hidden')"
                  class="rounded-md border border-gray-600 bg-[#2b2d30] px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-[#3C3F44] focus:outline-none focus:ring-2 focus:ring-[#800F12] focus:ring-offset-2">
                  {{ __('messages.apply_modal.cancel') }}
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>