// script.js
console.log("Website Loaded");
// Initialize cart from localStorage
if (localStorage.getItem('cart')) {
    cart = JSON.parse(localStorage.getItem('cart'));
    updateCartCount();
}

// Function to update cart in localStorage
function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

// Modify addToCart to save cart to localStorage after adding an item
function addToCart(productId) {
    cart.push(productId);
    updateCartCount();
    saveCart(); // Save to localStorage
}

function updateCartDisplay() {
    const cartItemsList = document.getElementById('cart-items-list');
    cartItemsList.innerHTML = '';  // Clear current cart display
    let totalPrice = 0;

    cart.forEach(item => {
        const cartItemElement = document.createElement('div');
        cartItemElement.classList.add('d-flex', 'justify-content-between', 'align-items-center', 'mb-3');
        
        cartItemElement.innerHTML = `
            <div class="d-flex align-items-center">
                <img src="${item.image}" alt="${item.name}" style="width: 50px; height: 50px;   border-radius: 50px;  box-shadow: 0 4px 10px rgba(0, 0.1, 0.2, 0.5); margin-right: 10px;">
                <div>
                    <h6>${item.name} (x${item.quantity})</h6>
                    <p>${(item.price * item.quantity).toFixed(2)}</p>
                </div>
            </div>
            <button class="btn btn-danger btn-sm remove-item" data-product-id="${item.id}">Remove</button>
        `;
        cartItemsList.appendChild(cartItemElement);
        totalPrice += item.price * item.quantity;
    });

    document.getElementById('cart-total-price').textContent = totalPrice.toFixed(2);
    updateCartCount();  // Update cart count at the top
}
    function showQuickView(imageSrc) {
    // Set the quick view image source to the clicked item's image
    const quickViewImage = document.getElementById("quickViewImage");
    quickViewImage.src = imageSrc;

    // Display the quick view overlay
    document.getElementById("quickViewOverlay").style.display = "flex";
}

function hideQuickView() {
    // Hide the quick view overlay
    document.getElementById("quickViewOverlay").style.display = "none";
}

function updateCartDisplay() {
    const cartItemsList = document.getElementById('cart-items-list');
    cartItemsList.innerHTML = '';  // Clear current cart display
    let totalPrice = 0;

    cart.forEach(item => {
        const cartItemElement = document.createElement('div');
        cartItemElement.classList.add('d-flex', 'justify-content-between', 'align-items-center', 'mb-3');

        cartItemElement.innerHTML = `
            <div class="d-flex align-items-center">
                <img src="${item.image}" alt="${item.name}" style="width: 50px; height: 50px; border-radius: 50px; margin-right: 10px;">
                <div>
                    <h6>${item.name}</h6>
                    <p>${(item.price * item.quantity).toFixed(2)}</p>
                    <div>
                        <button class="btn btn-outline-secondary btn-sm" onclick="changeQuantity('${item.id}', -1)">-</button>
                        <span>${item.quantity}</span>
                        <button class="btn btn-outline-secondary btn-sm" onclick="changeQuantity('${item.id}', 1)">+</button>
                    </div>
                </div>
            </div>
            <button class="btn btn-danger btn-sm" onclick="removeFromCart('${item.id}')">Remove</button>
        `;
        cartItemsList.appendChild(cartItemElement);
        totalPrice += item.price * item.quantity;
    });

    document.getElementById('cart-total-price').textContent = totalPrice.toFixed(2);
    updateCartCount();
}

// Function to change quantity
function changeQuantity(id, amount) {
    const item = cart.find(item => item.id === id);
    if (item) {
        item.quantity += amount;
        if (item.quantity <= 0) removeFromCart(id);
        else updateCartDisplay();
    }
}
// Quick view functionality with smooth opening
document.querySelectorAll('.quick-view').forEach(button => {
    button.addEventListener('click', event => {
        const productId = event.target.getAttribute('data-product-id');
        const productName = event.target.getAttribute('data-product-name');
        const productPrice = event.target.getAttribute('data-product-price');
        const productImage = event.target.getAttribute('data-product-image');
        const productDescription = event.target.getAttribute('data-product-description');

        document.getElementById('modalProductName').textContent = productName;
        document.getElementById('modalProductPrice').textContent = `${productPrice}`;
        document.getElementById('modalProductDescription').textContent = productDescription;
        document.getElementById('modalProductImage').src = productImage;
        
        // Show the modal
        $('#quickViewModal').modal('show');
    });
});
// Function to display the checkout modal with unique product names and their quantities
document.getElementById('checkout-btn').addEventListener('click', function () {
    const totalPrice = document.getElementById('cart-total-price').textContent;

    // Create a list of unique products with their quantities
    const productList = cart.map(item => `${item.name} (x${item.quantity})`).join(', ');

    // Set the values in the checkout modal
    document.getElementById('totalPriceDisplay').textContent = '' + totalPrice;
    document.getElementById('productNamesDisplay').textContent = productList; // Display unique products with quantities
});
document.getElementById('checkout-btn').addEventListener('click', function () {
    fetch('/path/to/is_logged_in.php')
        .then(response => response.text())
        .then(isLoggedIn => {
            if (isLoggedIn === 'true') {
                // User is logged in, proceed to checkout modal
                const totalPrice = document.getElementById('cart-total-price').textContent;
                document.getElementById('totalPrice').value = totalPrice;
                document.getElementById('checkoutModal').style.display = 'block';
            } else {
                // Redirect to login if not logged in
                window.location.href = 'login.php';
            }
        });
});
// Handle checkout button click
document.getElementById('checkout-btn').addEventListener('click', function () {
    const totalPrice = document.getElementById('cart-total-price').textContent;
    const productNames = cart.map(item => item.name).join(', ');

    // Populate the checkout form with total price and product names
    document.getElementById('totalPrice').value = totalPrice;
    document.getElementById('totalPriceDisplay').textContent = '' + totalPrice;
    document.getElementById('productNames').value = productNames;
    document.getElementById('productNamesDisplay').textContent = productNames; // Display product names in the modal
});