<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    @media (max-width: 991.98px) {
        .offcanvas-end {
            width: 50% !important;
        }
    }
    .navbar-toggler {
        border: none;
    }
    .navbar-toggler:focus {
        box-shadow: none;
    }
    .navbar {
        padding: 50px;

    }
    .offcanvas {
        background-color: #1a1a1a;
    }
    .offcanvas-header {
        padding: 1.5rem;
        border-bottom: 1px solid #2a2a2a;
    }
    .offcanvas-title {
        color: #4F46E5;
        font-weight: bold;
    }
    .btn-close {
        filter: invert(1) grayscale(100%) brightness(200%);
    }
    .offcanvas-body {
        padding: 1rem 0;
    }
    .offcanvas .nav-link {
        padding: 0.75rem 1.5rem;
        color: #ffffff;
        transition: background-color 0.3s ease;
    }
    .offcanvas .nav-link:hover {
        background-color: #2a2a2a;
    }
    .offcanvas .nav-link i {
        width: 20px;
        margin-right: 10px;
    }

    .cart-count {
    background-color: #4F46E5;
    color: white;
    border-radius: 50%;
    padding: 0.2em 0.5em;
    font-size: 0.8em;
    position: relative;
    top: -10px;
    left: -5px;
}
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#" style="color: #4F46E5;">ShopEase</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Desktop Navigation -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('/'); ?>" style="color: #FFFFFF;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('Products'); ?>" style="color: #FFFFFF;">Products</a>
                </li>
                <?php if ($this->session->userdata('logged_in')) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('AddProduct'); ?>" style="color: #FFFFFF;">Add Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('dashboard'); ?>" style="color: #FFFFFF;">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('Orders'); ?>" style="color: #FFFFFF;">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('Logout/logout'); ?>" style="color: #FFFFFF;">Logout</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('Cart'); ?>">
                            <i class="fas fa-shopping-cart"></i>                        
                    </a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('Login'); ?>" style="color: #FFFFFF;">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('Register'); ?>" style="color: #FFFFFF;">Register</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        
        <!-- Mobile Navigation -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">ShopEase</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('/'); ?>">
                    <i class="fas fa-home"></i> Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Products'); ?>">
                    <i class="fas fa-shopping-bag"></i> Products
                </a>
            </li>
            <?php if ($this->session->userdata('logged_in')) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('AddProduct'); ?>">
                        <i class="fas fa-plus-circle"></i> Add Product
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('dashboard'); ?>">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('Orders'); ?>">
                    <i class="fa-solid fa-basket-shopping"></i> Orders
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('Logout/logout'); ?>">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('Cart'); ?>">
                        <i class="fas fa-shopping-cart"></i> Cart
                    </a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('Login'); ?>">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('Register'); ?>">
                        <i class="fas fa-user-plus"></i> Register
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>