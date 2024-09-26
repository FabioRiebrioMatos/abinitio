// Menu Hamburguer
const menuToggle = document.getElementById('menu-toggle');
const dropdownMenu = document.getElementById('dropdown-menu');

menuToggle.addEventListener('click', () => {
    dropdownMenu.classList.toggle('active');
});

// Carrossel de imagens
let currentIndex = 0;
const images = document.querySelectorAll('.carousel-images img');
const totalImages = images.length;

function moveSlide(direction) {
    currentIndex = (currentIndex + direction + totalImages) % totalImages;
    updateCarousel();
}

function updateCarousel() {
    const offset = -currentIndex * 100; // Ajuste para o tamanho da imagem
    document.querySelector('.carousel-images').style.transform = `translateX(${offset}%)`;
}

// Mudar a imagem a cada 3 segundos
setInterval(() => {
    moveSlide(1);
}, 3000);