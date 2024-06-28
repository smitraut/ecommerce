<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        /* Custom styles specific to the home page */
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        .hero-section {
            background-color: blue;
            color: white;
            padding: 100px 0;
            text-align: center;
        }
        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: bold;
        }
        .hero-section p {
            font-size: 1.2rem;
        }
        .feature-section {
            padding: 50px 0;
            text-align: center;
        }
        .feature-section h2 {
            font-size: 2.5rem;
            margin-bottom: 30px;
        }
        .feature-section .feature-item {
            margin-bottom: 30px;
        }
        .feature-section .feature-item h3 {
            font-size: 1.8rem;
            margin-bottom: 10px;
        }
        .feature-section .feature-item p {
            font-size: 1.1rem;
        }
    </style>
</head>
<body>

<?php $this->load->view('../components/navbar'); ?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>Welcome to Our Ecommerce Platform</h1>
                <p>Explore a wide range of products and manage your business effortlessly.</p>
            </div>
        </div>
    </div>
</section>

<!-- Feature Section -->
<section class="feature-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Key Features</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="feature-item">
                    <h3>Product Management</h3>
                    <p>Easily add, edit, and manage products with our intuitive interface.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-item">
                    <h3>Dashboard Insights</h3>
                    <p>Track sales, inventory, and customer behavior from a centralized dashboard.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-item">
                    <h3>User Management</h3>
                    <p>Efficiently manage user accounts and permissions to streamline operations.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- New Feature Section -->
<section class="feature-section bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto text-center">
                <h2>Additional Features</h2>
                <p class="lead">Explore more features that make our platform stand out.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="feature-item">
                    <h3>Order Management</h3>
                    <p>Effortlessly process and fulfill orders with real-time updates.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-item">
                    <h3>Marketing Tools</h3>
                    <p>Utilize built-in marketing tools to boost sales and engagement.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-item">
                    <h3>Analytics</h3>
                    <p>Gain actionable insights with detailed analytics and reports.</p>
                </div>
            </div>
        </div>
    </div>
</section>




<?php $this->load->view('../components/footer'); ?>


</body>
</html>
