document.addEventListener('DOMContentLoaded', function() {
    const sliderContainer = document.querySelector('.slider-container');
    const slides = document.querySelectorAll('.slider-item');
    const indicatorsContainer = document.querySelector('.slider-indicators');

    let currentSlide = 0;
    const slideCount = slides.length;
    let slideInterval;
    const intervalTime = 5000; // 5 seconds

    // Initialize slider
    function initSlider() {
        // Create indicators
        slides.forEach((slide, index) => {
            const indicator = document.createElement('div');
            indicator.classList.add('slider-indicator');
            if (index === 0) indicator.classList.add('active');
            indicator.addEventListener('click', () => goToSlide(index));
            indicatorsContainer.appendChild(indicator);
        });

        // Start auto slide
        startAutoSlide();
    }

    // Go to specific slide
    function goToSlide(index) {
        slides[currentSlide].classList.remove('active');
        document.querySelectorAll('.slider-indicator')[currentSlide].classList.remove('active');

        currentSlide = (index + slideCount) % slideCount;

        slides[currentSlide].classList.add('active');
        document.querySelectorAll('.slider-indicator')[currentSlide].classList.add('active');

        // Reset auto slide timer
        resetAutoSlide();
    }

    // Next slide
    function nextSlide() {
        goToSlide(currentSlide + 1);
    }

    // Start auto slide
    function startAutoSlide() {
        slideInterval = setInterval(nextSlide, intervalTime);
    }

    // Reset auto slide timer
    function resetAutoSlide() {
        clearInterval(slideInterval);
        startAutoSlide();
    }

    // Pause on hover
    sliderContainer.addEventListener('mouseenter', () => {
        clearInterval(slideInterval);
    });

    sliderContainer.addEventListener('mouseleave', startAutoSlide);

    // Touch events for mobile
    let touchStartX = 0;
    let touchEndX = 0;

    sliderContainer.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
        clearInterval(slideInterval);
    }, {passive: true});

    sliderContainer.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
        startAutoSlide();
    }, {passive: true});

    function handleSwipe() {
        const threshold = 50;
        if (touchEndX < touchStartX - threshold) {
            nextSlide();
        }
        if (touchEndX > touchStartX + threshold) {
            goToSlide(currentSlide - 1);
        }
    }

    // Initialize the slider
    initSlider();
});
