document.addEventListener('DOMContentLoaded', function() {
    // Sidebar toggle functionality
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebarContainer = document.getElementById('sidebarContainer');

    if (sidebarToggle && sidebarContainer) {
        sidebarToggle.addEventListener('click', function() {
            sidebarContainer.classList.toggle('show');
        });
    }

    // Sidebar item click functionality
    const sidebarItems = document.querySelectorAll('.sidebar-item');
    const contentAreas = document.querySelectorAll('.content-area');

    sidebarItems.forEach(item => {
        item.addEventListener('click', function() {
            // Remove active class from all sidebar items
            sidebarItems.forEach(si => si.classList.remove('active'));

            // Add active class to clicked item
            this.classList.add('active');

            // Hide all content areas
            contentAreas.forEach(area => area.classList.remove('active'));

            // Show the corresponding content area
            const target = this.getAttribute('data-target');
            document.getElementById(target).classList.add('active');

            // On mobile, close sidebar after selection
            if (window.innerWidth < 992) {
                sidebarContainer.classList.remove('show');
            }
        });
    });

    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function(e) {
        if (window.innerWidth < 992 && !sidebarContainer.contains(e.target) &&
            e.target !== sidebarToggle && !sidebarToggle.contains(e.target)) {
            sidebarContainer.classList.remove('show');
        }
    });

    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 992) {
            sidebarContainer.classList.remove('show');
        }
    });
});
