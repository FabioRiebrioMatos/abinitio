// Menu Hamburguer
const menuToggle = document.getElementById('menu-toggle');
const dropdownMenu = document.getElementById('dropdown-menu');

menuToggle.addEventListener('click', () => {
    dropdownMenu.classList.toggle('active');
});

// Carrossel de imagens
let currentIndex = 0;
const images = document.querySelectorAll('.carousel img');
const totalImages = images.length;

function showImage(index) {
    const offset = index * 100; // Cada imagem ocupa 100% da largura
    document.querySelector('.carousel-images').style.transform = `translateX(-${offset}%)`;
}

document.querySelector('.carousel-btn.next').addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % totalImages;
    showImage(currentIndex);
});

document.querySelector('.carousel-btn.prev').addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + totalImages) % totalImages;
    showImage(currentIndex);
});

// Exibir a primeira imagem ao carregar
showImage(currentIndex);

// Mudar a imagem a cada 6 segundos
setInterval(() => {
    currentIndex = (currentIndex + 1) % totalImages;
    showImage(currentIndex);
}, 6000); // Altere para 6000 para 6 segundos
