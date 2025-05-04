window.addEventListener('load', function () {
    // Add a delay before hiding the loader
    setTimeout(() => {
        const loader = document.getElementById('loader-screen');
        if (loader) {
            loader.style.opacity = '0';
            loader.style.transition = 'opacity 0.5s ease';
            setTimeout(() => loader.style.display = 'none', 500); // wait for fade-out
        }
    }, 2500); // <-- delay in milliseconds (2500ms = 2.5s)
});
