// mobile-menu.js

// Мобильное меню
document.getElementById('mobile-menu-button').addEventListener('click', function () {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
});

// Закрытие меню при клике вне его
document.addEventListener('click', function (event) {
    const menu = document.getElementById('mobile-menu');
    const button = document.getElementById('mobile-menu-button');

    if (!menu.contains(event.target) && !button.contains(event.target)) {
        menu.classList.add('hidden');
    }
});
