<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') | ILEC</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="/js/alpine.min.js" defer></script>
  <script src="/js/alpine-mask.min.js" defer></script>
  <script>
    document.addEventListener('alpine:init', () => {
      if (window.AlpineMask) {
        Alpine.plugin(window.AlpineMask);
      }
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
  <script src="{{ asset('js/phone-input.js') }}"></script>
  <script>
    document.querySelectorAll('[data-toggle="modal"]').forEach(button => {
    button.addEventListener('click', () => {
      const modal = document.getElementById('applicationModal');
      modal.classList.remove('hidden');
    });
  });
  </script>
</body>

</html>