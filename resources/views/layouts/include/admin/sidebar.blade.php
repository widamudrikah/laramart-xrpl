<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <!-- dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <!-- sales -->
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="mdi mdi-sale menu-icon"></i>
                <span class="menu-title">Sales</span>
            </a>
        </li>

        <!-- category -->
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#category" aria-expanded="false" aria-controls="category">
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="category">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('category-create') }}">Add Category</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('category') }}">View Category</a></li>
                </ul>
            </div>
        </li>

        <!-- Product -->
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#product" aria-expanded="false" aria-controls="product">
                <i class="mdi mdi-plus-box menu-icon"></i>
                <span class="menu-title">Product</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="product">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">Add Product</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('products-index') }}">View Product</a></li>
                </ul>
            </div>
        </li>

        <!-- Brands -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('brands') }}">
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                <span class="menu-title">Brands</span>
            </a>
        </li>

        <!-- User -->
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#users" aria-expanded="false" aria-controls="users">
                <i class="mdi mdi-account-multiple-outline menu-icon"></i>
                <span class="menu-title">users</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="users">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">Admin</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">User</a></li>
                </ul>
            </div>
        </li>

        <!-- Home Slider -->
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="mdi mdi-home-variant menu-icon"></i>
                <span class="menu-title">Home Slider</span>
            </a>
        </li>

        <!-- Site Settings -->
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="mdi mdi-settings menu-icon"></i>
                <span class="menu-title">Settings</span>
            </a>
        </li>
        
    </ul>
</nav>