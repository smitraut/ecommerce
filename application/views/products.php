<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopEase - Our Products</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .page-title {
            text-align: center;
            margin-bottom: 40px;
            color: #6366F1;
            font-size: 2.5rem;
            font-weight: 700;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
        }
        .product-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
        }
        .product-image {
            height: 250px;
            width: 100%;
            object-fit: cover;
        }
        .product-info {
            padding: 20px;
        }
        .product-name {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: #333;
        }
        .product-description {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 15px;
        }
        .product-price {
            font-size: 1.1rem;
            font-weight: 600;
            color: #6366F1;
            margin-bottom: 15px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #6366F1;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn:hover {
            background-color: #4F46E5;
            color: white !important;
        }
        .btn-wishlist {
            background-color: transparent;
            color: #6366F1;
            border: 1px solid #6366F1;
            margin-left: 10px;
        }
        .btn-wishlist:hover {
            background-color: #6366F1;
            color: #fff;
        }
        .no-products {
            text-align: center;
            font-size: 1.2rem;
            color: #666;
            margin-top: 50px;
        }
        .filters {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .search-bar {
            flex-grow: 1;
            margin-right: 20px;
        }
        .search-bar input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }
        .sort-dropdown select {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            background-color: #fff;
        }
    </style>
</head>
<body>

<?php $this->load->view('../components/navbar'); ?>

<div class="container my-5">
    <h1 class="page-title">Discover Our Amazing Products</h1>
    
    <div class="filters">
        <div class="search-bar">
            <input type="text" placeholder="Search products...">
        </div>
        <div class="sort-dropdown">
            <select>
                <option value="">Sort by</option>
                <option value="price-asc">Price: Low to High</option>
                <option value="price-desc">Price: High to Low</option>
                <option value="name-asc">Name: A to Z</option>
                <option value="name-desc">Name: Z to A</option>
            </select>
        </div>
    </div>
    
    <?php if (!empty($products)) : ?>
        <div class="product-grid">
            <?php foreach ($products as $product) : ?>
                <div class="product-card">
                    <img src="<?php echo base_url('application/assets/images/' . $product['product_image']); ?>" class="product-image" alt="<?php echo $product['product_name']; ?>">
                    <div class="product-info">
                        <h2 class="product-name"><?php echo $product['product_name']; ?></h2>
                        <p class="product-description"><?php echo substr($product['product_description'], 0, 100) . '...'; ?></p>
                        <p class="product-price">₹<?php echo number_format($product['product_price'], 2); ?></p>
                        <a href="#" class="btn">Add to Cart</a>
                        <a href="#" class="btn btn-wishlist"><i class="far fa-heart"></i></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <p class="no-products">No products found. Check back soon for new arrivals!</p>
    <?php endif; ?>
</div>

<?php $this->load->view('../components/footer'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>