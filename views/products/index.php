<?php require_once './config/config.php' ?>
<?php include('./config/database.php'); ?>
<?php include('includes/common_functions.php'); ?>
<?php include('includes/header.php'); ?>
<script>
    document.title = "Shefa - Ecommerce | Products";
</script>

<?php include('includes/navbar.php'); ?>
<!-- Breadcrumb -->
<div class="breadcrumb-section">
    <div class="main-container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Products</li>
            </ol>
        </nav>
    </div>

</div>

<!-- Main Content -->
<div class="main-container">
    <div class="content-wrapper">
        <!-- Filters Sidebar -->
        <aside class="filters-sidebar">
            <!-- Categories -->
            <div class="filter-section">
                <h3 class="filter-title">Categories</h3>
                <?php get_categories(); ?>
            </div>

            <!-- Color -->
            <div class="filter-section">
                <h3 class="filter-title">Color</h3>
                <div class="color-filters">
                    <div class="color-option active" style="background: #87CEEB;" data-color="blue"></div>
                    <div class="color-option" style="background: #90EE90;" data-color="green"></div>
                    <div class="color-option" style="background: #FFD700;" data-color="yellow"></div>
                    <div class="color-option" style="background: #4169E1;" data-color="blue"></div>
                </div>
            </div>

            <!-- Size -->
            <div class="filter-section">
                <h3 class="filter-title">Size</h3>
                <div class="size-filters">
                    <div class="size-option" data-size="s">S</div>
                    <div class="size-option active" data-size="m">M</div>
                    <div class="size-option" data-size="l">L</div>
                    <div class="size-option" data-size="xl">XL</div>
                    <div class="size-option" data-size="xxl">XXL</div>
                </div>
            </div>

            <!-- Price Range -->
            <div class="filter-section">
                <h3 class="filter-title">Price</h3>
                <div class="price-range">
                    <input type="range" class="range-slider" min="0" max="100" value="50">
                    <div class="d-flex price-inputs">
                        <input type="text" class="price-input w-25" value="$5.00" readonly>
                        <input type="text" class="price-input w-25" value="$37.00" readonly>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Products Section -->
        <div class="products-section">


            <!-- Results Header -->
            <!-- <div class="results-header">
                <div class="results-count">Showing 1-9 of 36 Results</div>
                <div class="sort-dropdown">
                    <label>SORT BY:</label>
                    <select>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Newest</option>
                        <option>Best Selling</option>
                    </select>
                </div>
            </div> -->
          <!-- views/products/index.php -->
<div class="results-header">
    <div class="results-count">
        <?php 
        $total = getProductCount();
        $showing = min(ITEMS_PER_PAGE, $total);
        echo "Showing 1-$showing of $total Results";
        if (isset($_GET['category'])) {
            echo " in " . ucfirst(htmlspecialchars($_GET['category']));
        }
        ?>
    </div>
    
    <form method="GET" action="<?php echo url('products'); ?>" class="sort-form">
        <?php if (isset($_GET['category'])): ?>
            <input type="hidden" name="category" value="<?php echo htmlspecialchars($_GET['category']); ?>">
        <?php endif; ?>
        
        <div class="sort-dropdown">
            <label>SORT BY:</label>
            <select name="sort" onchange="this.form.submit()">
                
                <option value="price_asc" <?php echo (isset($_GET['sort']) && $_GET['sort'] === 'price_asc') ? 'selected' : ''; ?>>
                    Price: Low to High
                </option>
                <option value="price_desc" <?php echo (isset($_GET['sort']) && $_GET['sort'] === 'price_desc') ? 'selected' : ''; ?>>
                    Price: High to Low
                </option>
                <option value="newest" <?php echo (isset($_GET['sort']) && $_GET['sort'] === 'newest') ? 'selected' : ''; ?>>
                    Newest
                </option>
                <option value="name_asc" <?php echo (isset($_GET['sort']) && $_GET['sort'] === 'name_asc') ? 'selected' : ''; ?>>
                    Name: A-Z
                </option>
                <option value="name_desc" <?php echo (isset($_GET['sort']) && $_GET['sort'] === 'name_desc') ? 'selected' : ''; ?>>
                    Name: Z-A
                </option>
            </select>
        </div>
    </form>
</div>

            <!-- Products Grid -->
            <div class="products-grid">
                <?php getProducts(); ?>
            </div>

            <!-- Pagination -->
            <div class="pagination-section">
                <!-- <ul class="pagination">
                        <li>
                            <button disabled>
                                <i class="fas fa-chevron-left"></i>
                            </button>
                        </li>
                        <li><button class="active">1</button></li>
                        <li><button>2</button></li>
                        <li class="dots">...</li>
                        <li><button>23</button></li>
                        <li><button>24</button></li>
                        <li>
                            <button>
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </li>
                    </ul> -->
                <div aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                    <!-- Pagination -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Color filter toggle
    document.querySelectorAll('.color-option').forEach(option => {
        option.addEventListener('click', function() {
            document.querySelectorAll('.color-option').forEach(o => o.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Size filter toggle
    document.querySelectorAll('.size-option').forEach(option => {
        option.addEventListener('click', function() {
            this.classList.toggle('active');
        });
    });

    // Remove filter tag
    document.querySelectorAll('.filter-tag i').forEach(icon => {
        icon.addEventListener('click', function(e) {
            e.preventDefault();
            this.parentElement.remove();
        });
    });

    // Pagination
    document.querySelectorAll('.pagination button:not(:disabled)').forEach(button => {
        button.addEventListener('click', function() {
            if (!this.querySelector('i')) {
                document.querySelectorAll('.pagination button').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            }
        });
    });
</script>
<?php include('includes/footer.php'); ?>



<script src="./assets/bootstrap-5.3.8-dist/js/bootstrap.min.js"></script>


</body>

</html>