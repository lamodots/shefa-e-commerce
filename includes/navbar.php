<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top px-4">

  <div class="container-fluid">
    <a class="navbar-brand logo-link" href="/home">Shefa</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/products">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/my-account">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/register">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/logout">Logout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link cart-link d-inline-block" href="#">
            <i class="fa-solid fa-cart-shopping"></i>
            <sup>2</sup>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total: &#8358;</a>
        </li>


      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search products" aria-label="Search" style="min-width: 200px;" />
        <button class="btn btn-custom" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </form>
    </div>
  </div>
</nav> -->

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top px-4">
  <div class="container-fluid">
    <a class="navbar-brand logo-link" href="/">Shefa</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/products">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/my-account">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/register">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/logout">Logout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link cart-link d-inline-block position-relative" href="#" onclick="openCartDrawer(); return false;">
            <i class="fa-solid fa-cart-shopping"></i>
            <span class="cart-badge">2</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total: &#8358;<span id="navbarTotal">97.00</span></a>
        </li>
      </ul>
      <form class="d-flex" role="search" action="catalog" method="GET">
        <input name="search-term" value="<?php echo isset($_GET['search-term']) ? htmlspecialchars($_GET['search-term']) : ''; ?>" class="form-control me-2" type="search" placeholder="Search products" aria-label="Search" style="min-width: 200px;" />
        <button class="btn btn-custom" type="submit" name="search_product_btn">
          <i class="fas fa-search"></i>
        </button>
      </form>
    </div>
  </div>
</nav>

<!-- Cart Drawer Overlay -->
<div class="cart-overlay" id="cartOverlay" onclick="closeCartDrawer()"></div>

<!-- Cart Drawer -->
<div class="cart-drawer" id="cartDrawer">
  <div class="cart-drawer-header">
    <h5 class="mb-0">Shopping Cart</h5>
    <button class="btn-close-drawer" onclick="closeCartDrawer()">
      <i class="fas fa-times"></i>
    </button>
  </div>

  <div class="cart-drawer-body">
    <!-- Cart Item 1 -->
    <div class="cart-item">
      <button class="btn-remove-item" onclick="removeCartItem(1)">
        <i class="fas fa-times"></i>
      </button>
      <div class="cart-item-image">
        <img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=100" alt="Raw Black T-Shirt Lineup">
      </div>
      <div class="cart-item-details">
        <h6 class="cart-item-title">Raw Black T-Shirt Lineup</h6>
        <div class="cart-item-meta">
          <span class="cart-item-color">
            <span class="color-dot" style="background: #333;"></span> M
          </span>
          <span class="cart-item-size">M</span>
        </div>
        <div class="cart-item-footer">
          <div class="cart-item-quantity">
            <button onclick="decreaseQty(1)">-</button>
            <input type="number" value="1" min="1" id="qty-1" readonly>
            <button onclick="increaseQty(1)">+</button>
          </div>
          <div class="cart-item-price">$75.00</div>
        </div>
      </div>
    </div>

    <!-- Cart Item 2 -->
    <div class="cart-item">
      <button class="btn-remove-item" onclick="removeCartItem(2)">
        <i class="fas fa-times"></i>
      </button>
      <div class="cart-item-image">
        <img src="https://images.unsplash.com/photo-1622445275576-721325763afe?w=100" alt="Essential Neutrals">
      </div>
      <div class="cart-item-details">
        <h6 class="cart-item-title">Essential Neutrals</h6>
        <div class="cart-item-meta">
          <span class="cart-item-color">
            <span class="color-dot" style="background: #f5f5f5; border: 1px solid #ddd;"></span>
          </span>
          <span class="cart-item-size">S</span>
        </div>
        <div class="cart-item-footer">
          <div class="cart-item-quantity">
            <button onclick="decreaseQty(2)">-</button>
            <input type="number" value="1" min="1" id="qty-2" readonly>
            <button onclick="increaseQty(2)">+</button>
          </div>
          <div class="cart-item-price">$22.00</div>
        </div>
      </div>
    </div>

    <!-- Empty Cart State (Hidden when items exist) -->
    <div class="empty-cart" style="display: none;">
      <i class="fas fa-shopping-cart"></i>
      <p>Your cart is empty</p>
      <a href="/shefa-e-commerce/products" class="btn btn-dark">Start Shopping</a>
    </div>
  </div>

  <div class="cart-drawer-footer">
    <div class="cart-total">
      <span>Total</span>
      <span class="cart-total-amount">$97.00</span>
    </div>
    <button class="btn-view-cart" onclick="window.location.href='/shefa-e-commerce/cart'">View Cart</button>
    <button class="btn-checkout" onclick="window.location.href='/shefa-e-commerce/checkout'">Checkout</button>
  </div>
</div>
<script>

  // Open Cart Drawer
function openCartDrawer() {
  document.getElementById('cartDrawer').classList.add('active');
  document.getElementById('cartOverlay').classList.add('active');
  document.body.style.overflow = 'hidden'; // Prevent background scrolling
}

// Close Cart Drawer
function closeCartDrawer() {
  document.getElementById('cartDrawer').classList.remove('active');
  document.getElementById('cartOverlay').classList.remove('active');
  document.body.style.overflow = ''; // Restore scrolling
}

// Close on Escape key
document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') {
    closeCartDrawer();
  }
});

// Increase Quantity
function increaseQty(id) {
  const input = document.getElementById('qty-' + id);
  input.value = parseInt(input.value) + 1;
  updateCartTotal();
}

// Decrease Quantity
function decreaseQty(id) {
  const input = document.getElementById('qty-' + id);
  if (parseInt(input.value) > 1) {
    input.value = parseInt(input.value) - 1;
    updateCartTotal();
  }
}

// Remove Cart Item
function removeCartItem(id) {
  if (confirm('Remove this item from cart?')) {
    // Remove the item from DOM
    const items = document.querySelectorAll('.cart-item');
    items[id - 1].remove();
    
    // Update cart count
    const badge = document.querySelector('.cart-badge');
    const currentCount = parseInt(badge.textContent);
    badge.textContent = currentCount - 1;
    
    // Check if cart is empty
    if (currentCount - 1 === 0) {
      document.querySelector('.cart-drawer-body').innerHTML = `
        <div class="empty-cart">
          <i class="fas fa-shopping-cart"></i>
          <p>Your cart is empty</p>
          <a href="/shefa-e-commerce/products" class="btn btn-dark">Start Shopping</a>
        </div>
      `;
      document.querySelector('.cart-drawer-footer').style.display = 'none';
    }
    
    updateCartTotal();
  }
}

// Update Cart Total
function updateCartTotal() {
  let total = 0;
  const items = document.querySelectorAll('.cart-item');
  
  items.forEach(item => {
    const price = parseFloat(item.querySelector('.cart-item-price').textContent.replace('$', ''));
    const qty = parseInt(item.querySelector('input[type="number"]').value);
    total += price * qty;
  });
  
  document.querySelector('.cart-total-amount').textContent = '$' + total.toFixed(2);
  document.getElementById('navbarTotal').textContent = total.toFixed(2);
}
</script>