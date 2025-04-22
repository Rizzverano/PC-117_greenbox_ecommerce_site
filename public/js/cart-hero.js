document.addEventListener('DOMContentLoaded', function() {
const slider = document.querySelector('.home-slider');
const slides = document.querySelectorAll('.slider-item');
const dotsContainer = document.querySelector('.slider-dots');
let currentIndex = 0;

// Create dots
slides.forEach((_, index) => {
const dot = document.createElement('div');
dot.classList.add('slider-dot');
if (index === 0) dot.classList.add('active');
dot.addEventListener('click', () => {
goToSlide(index);
});
dotsContainer.appendChild(dot);
});

const dots = document.querySelectorAll('.slider-dot');

function goToSlide(index) {
currentIndex = index;
updateSlider();
}

function nextSlide() {
currentIndex = (currentIndex + 1) % slides.length;
updateSlider();
}

function updateSlider() {
slider.style.transform = `translateX(-${currentIndex * 100}%)`;

// Update dots
dots.forEach((dot, index) => {
dot.classList.toggle('active', index === currentIndex);
});
}

// Auto-advance slides every 5 seconds
let slideInterval = setInterval(nextSlide, 5000);

// Pause on hover
slider.addEventListener('mouseenter', () => {
clearInterval(slideInterval);
});

slider.addEventListener('mouseleave', () => {
slideInterval = setInterval(nextSlide, 3000);
});

// Initialize slider as a horizontal scroller
slider.style.display = 'flex';
slider.style.transition = 'transform 0.5s ease';
slides.forEach(slide => {
slide.style.flex = '0 0 100%';
});
});
