<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') | ILEC</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/alpinejs" defer></script>
  <script src="https://unpkg.com/@alpinejs/mask" defer></script>
  <script>
    document.addEventListener('alpine:init', () => {
      Alpine.plugin(window.AlpineMask)
    })
  </script>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<style>
  /* Стилизация ползунка для всех браузеров */
  .custom-scroll {
    scrollbar-width: thin;
    scrollbar-color: #800F12 #2b2d30;
    /* цвет ползунка и фона */
  }

  /* Chrome, Edge, Safari */
  .custom-scroll::-webkit-scrollbar {
    width: 8px;
  }

  .custom-scroll::-webkit-scrollbar-track {
    background: #2b2d30;
    border-radius: 4px;
  }

  .custom-scroll::-webkit-scrollbar-thumb {
    background-color: #800F12;
    border-radius: 4px;
  }

  .custom-scroll::-webkit-scrollbar-thumb:hover {
    background-color: #a01318;
  }
</style>

<body class="font-sans bg-white">

  <x-header />

  @yield('content')
  @stack('modals')

  <x-footer />
  @include('components.application-modal')
  @stack('scripts')
  <script src="{{ asset('js/mobile-menu.js') }}"></script>
  <script src="{{ asset('js/accordion.js') }}"></script>
  <script>
    document.querySelectorAll('[data-toggle="modal"]').forEach(button => {
    button.addEventListener('click', () => {
      const modal = document.getElementById('applicationModal');
      modal.classList.remove('hidden');
    });
  });
  </script>
  <script>
    function phoneInput() {
  return {
    countries: [],
    selectedCode: '',
    phoneNumber: '',

    async init() {
      try {
        // Загружаем список стран
        const resCountries = await fetch('/countries.json');
        if (!resCountries.ok) throw new Error('Не удалось загрузить countries.json');
        this.countries = (await resCountries.json()).map(c => ({
          ...c,
          flag: this.getFlagEmoji(c.code)
        }));

        // Определяем страну по IP через ip-api.com
        const resGeo = await fetch('http://ip-api.com/json/');
        if (!resGeo.ok) throw new Error('Не удалось определить страну по IP');
        const geo = await resGeo.json();

        const country = this.countries.find(c => c.code === geo.countryCode);
        if (country) {
          this.selectedCode = country.dial_code;
        }

      } catch (e) {
        console.warn('Ошибка загрузки стран или определения IP:', e.message);
      }
    },

    getFlagEmoji(countryCode) {
      return countryCode
        .toUpperCase()
        .replace(/./g, char => String.fromCodePoint(127397 + char.charCodeAt()));
    },

    onlyDigits() {
      this.phoneNumber = this.phoneNumber.replace(/\D/g, '');
    },

    fullPhone() {
      return this.selectedCode + this.phoneNumber;
    }
  }
}
  </script>
</body>

</html>