import './bootstrap';


document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.getElementById('menu-toggle');
    const menu = document.getElementById('menu');
    const bottomNav = document.getElementById('bottom-nav');

    if (toggleBtn) {
        toggleBtn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
            bottomNav.classList.toggle('hidden');
        });
    }
});