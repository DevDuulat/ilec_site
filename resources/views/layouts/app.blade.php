<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') | ILEC</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

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
</body>

</html>