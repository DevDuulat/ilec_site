<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ILEC</title>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-MLQ3X9VV');
    </script>
    <!-- End Google Tag Manager -->
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
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MLQ3X9VV" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
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
