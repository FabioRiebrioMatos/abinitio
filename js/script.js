// Menu Hamburguer
const menuToggle = document.getElementById('menu-toggle');
const dropdownMenu = document.getElementById('dropdown-menu');

menuToggle.addEventListener('click', () => {
    dropdownMenu.classList.toggle('active');
});

// Carrossel de imagens
let currentSlide = 0;
function moveSlide(direction) {
    const slides = document.querySelector('.carousel-images');
    const totalSlides = slides.children.length;
    currentSlide = (currentSlide + direction + totalSlides) % totalSlides;
    slides.style.transform = 'translateX(' + (-currentSlide * 100) + '%)';
};