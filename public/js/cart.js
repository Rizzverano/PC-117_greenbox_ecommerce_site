document.addEventListener('DOMContentLoaded', function() {
    // Tab switching functionality
    const tabs = document.querySelectorAll('.category-filter a');
    const sections = document.querySelectorAll('.section-container');

    tabs.forEach(tab => {
        tab.addEventListener('click', function(e) {
            e.preventDefault();

            // Remove active class from all tabs and sections
            tabs.forEach(t => t.classList.remove('active'));
            sections.forEach(s => s.classList.remove('active'));

            // Add active class to clicked tab and corresponding section
            this.classList.add('active');
            const targetId = this.getAttribute('data-target');
            document.getElementById(targetId).classList.add('active');
        });
    });

    // Only initialize cart functionality if we're on the cart section
    const cartSection = document.getElementById('cart-section');
    if (cartSection && cartSection.classList.contains('active')) {
        initializeCartFunctionality();
    }

    // Reinitialize when tabs are switched
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            if (targetId === 'cart-section') {
                initializeCartFunctionality();
            }
        });
    });

    function initializeCartFunctionality() {
        // Quantity adjustment functionality
        document.querySelectorAll('.quantity-left-minus').forEach(button => {
            button.addEventListener('click', function() {
                const input = this.parentNode.querySelector('input');
                if (input) {
                    let value = parseInt(input.value);
                    if (value > parseInt(input.min)) {
                        input.value = value - 1;
                        updateCartTotals();
                    }
                }
            });
        });

        document.querySelectorAll('.quantity-right-plus').forEach(button => {
            button.addEventListener('click', function() {
                const input = this.parentNode.querySelector('input');
                if (input) {
                    let value = parseInt(input.value);
                    if (value < parseInt(input.max)) {
                        input.value = value + 1;
                        updateCartTotals();
                    }
                }
            });
        });

        // Function to update cart totals
        function updateCartTotals() {
            let subtotal = 0;
            const rows = document.querySelectorAll('#cart-section tbody tr');

            rows.forEach(row => {
                const priceElement = row.querySelector('.price');
                const quantityInput = row.querySelector('.quantity input');
                const totalElement = row.querySelector('.total');

                if (priceElement && quantityInput && totalElement) {
                    const price = parseFloat(priceElement.textContent.replace('$', '')) || 0;
                    const quantity = parseInt(quantityInput.value) || 0;
                    const total = price * quantity;

                    totalElement.textContent = `$${total.toFixed(2)}`;
                    subtotal += total;
                }
            });

            const discount = 15; // Fixed discount for this example
            const total = subtotal - discount;

            const subtotalElement = document.querySelector('.cart-subtotal');
            const grandTotalElement = document.querySelector('.cart-grand-total');

            if (subtotalElement) subtotalElement.textContent = `$${subtotal.toFixed(2)}`;
            if (grandTotalElement) grandTotalElement.textContent = `$${total.toFixed(2)}`;
        }

        // Initialize cart totals
        updateCartTotals();
    }
});
