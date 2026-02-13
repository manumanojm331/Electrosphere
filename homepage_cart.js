document.querySelectorAll('.product-top-section').forEach(section => {
    section.addEventListener('click', function(e) {
        // Only navigate if not clicking on a button inside
        if (!e.target.closest('.btn')) {
            window.location.href = this.getAttribute('data-href') || this.querySelector('a').href;
        }
    });
});
document.addEventListener('DOMContentLoaded', function() {
    // Remove items
    document.querySelectorAll('.remove-item').forEach(btn => {
        btn.addEventListener('click', function() {
            if (confirm('Are you sure you want to remove this item?')) {
                const itemId = this.dataset.id;
                fetch('remove_item.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `item_id=${itemId}`
                }).then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        location.reload();
                    } else {
                        alert('Error removing item: ' + data.message);
                    }
                }).catch(error => {
                    console.error('Error:', error);
                });
            }
        });
    });
});
document.addEventListener('DOMContentLoaded', function() {
    // Generate or retrieve session ID
    let sessionId = localStorage.getItem('cart_session_id');
    if (!sessionId) {
        sessionId = 'session_' + Math.random().toString(36).substr(2, 9);
        localStorage.setItem('cart_session_id', sessionId);
    }

    // Add to Cart with AJAX
document.querySelectorAll('.add-to-cart').forEach(btn => {
    btn.addEventListener('click', function(e) {
        e.stopPropagation();
        e.preventDefault();
        
        // Your existing cart code remains the same...
        const product = {
            product_id: this.dataset.id,
            product_name: this.dataset.name,
            price: this.dataset.price,
            image: this.dataset.image
        };

            fetch('add_to_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams(product)
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    // Show alert
                    const alert = document.createElement('div');
                    alert.className = 'alert-popup';
                    alert.innerHTML = `
                        <ion-icon name="cart" style="margin-right: 8px;"></ion-icon>
                        ${product.product_name} added to cart!
                    `;
                    document.body.appendChild(alert);
                    setTimeout(() => alert.remove(), 3000);

                    // Force refresh cart data
                    updateCartCount();
                    updateCartDropdown();
                } else {
                    console.error('Error adding to cart:', data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });

    // Function to update cart count
    function updateCartCount() {
        fetch('get_cart_count.php')
            .then(response => response.json())
            .then(data => {
                document.querySelectorAll('.cart-count').forEach(el => {
                    el.textContent = data.count;
                });
            });
    }
    function updateCheckoutLinks(total) {
    document.querySelectorAll('.btn-checkout').forEach(link => {
        link.setAttribute('data-amount', total);
    });
}   

    // Function to update dropdown
    function updateCartDropdown() {
    fetch('get_cart_items.php')
        .then(response => response.json())
        .then(items => {
            const container = document.querySelector('.cart-dropdown-items');
            const totalElement = document.querySelector('.cart-total-amount');
            container.innerHTML = '';
            let total = 0;

            items.forEach(item => {
                total += item.price * item.quantity;
                container.innerHTML += `
                    <div class="cart-dropdown-item">
                        <img src="${item.image}" alt="${item.product_name}" style="width: 50px; height: 50px; object-fit: contain;">
                        <div class="cart-dropdown-item-info">
                            <div class="cart-dropdown-item-title">${item.product_name}</div>
                            <div class="cart-dropdown-item-price">₹${item.price} x ${item.quantity}</div>
                        </div>
                    </div>
                `;
            });
            
            totalElement.textContent = total.toFixed(2);
            
            // Update checkout links with current total
            updateCheckoutLinks(total.toFixed(2));
        });
}

// Add click handler for checkout button
document.querySelectorAll('.btn-checkout').forEach(btn => {
    btn.addEventListener('click', function(e) {
        const amount = this.getAttribute('data-amount');
        this.href = `payment.php?source=dropdown&amount=${amount}`;
    });
});
    // Initial cart count update
    updateCartCount();
});
function addToCart(productId) {
    fetch('add_to_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `product_id=${productId}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            const alert = document.createElement('div');
            alert.className = 'alert-popup';
            alert.innerHTML = `
                <ion-icon name="cart" style="margin-right: 8px;"></ion-icon>
                Item added to cart!
            `;
            document.body.appendChild(alert);
            setTimeout(() => alert.remove(), 3000);

            // Force refresh cart data
            updateCartCount();
        } else {
            console.error('Error adding to cart:', data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

