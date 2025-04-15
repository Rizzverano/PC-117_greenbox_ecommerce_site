document.addEventListener('DOMContentLoaded', function() {
    const slider = document.getElementById('slider');
    const slides = document.querySelectorAll('.slide');
    const sliderDots = document.getElementById('sliderDots');

    let currentIndex = 0;
    const slideCount = slides.length;
    const slideIntervalDuration = 2000; // 2 seconds

    // Create dots
    for (let i = 0; i < slideCount; i++) {
        const dot = document.createElement('span');
        dot.classList.add('dot');
        if (i === 0) dot.classList.add('active');
        dot.addEventListener('click', () => goToSlide(i));
        sliderDots.appendChild(dot);
    }

    const dots = document.querySelectorAll('.dot');

    // Update slider position
    function updateSlider() {
        slider.style.transform = `translateX(-${currentIndex * 100}%)`;

        // Update dots
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentIndex);
        });
    }

    // Next slide
    function nextSlide() {
        currentIndex = (currentIndex + 1) % slideCount;
        updateSlider();
        resetInterval();
    }

    // Go to specific slide
    function goToSlide(index) {
        currentIndex = index;
        updateSlider();
        resetInterval();
    }

    // Auto slide function
    let slideInterval;
    function startInterval() {
        slideInterval = setInterval(nextSlide, slideIntervalDuration);
    }

    // Reset interval timer
    function resetInterval() {
        clearInterval(slideInterval);
        startInterval();
    }

    // Initialize auto-sliding
    startInterval();

    // Pause on hover
    const sliderContainer = document.querySelector('.slider-container');
    sliderContainer.addEventListener('mouseenter', () => {
        clearInterval(slideInterval);
    });

    sliderContainer.addEventListener('mouseleave', () => {
        startInterval();
    });
});
