<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .product-card {
            transition: transform 0.3s;
        }
        .product-card:hover {
            transform: scale(1.05);
        }
        .product-image {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>

<?php $this->load->view('../components/navbar'); ?>

<div class="container my-5">
    <h1 class="text-center mb-5">Our Products</h1>
    
    <?php if (!empty($products)) : ?>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($products as $product) : ?>
                <div class="col">
                    <div class="card h-100 shadow product-card">
                        <img src="<?php echo base_url('application/assets/images/' . $product['product_image']); ?>" class="card-img-top product-image" alt="<?php echo $product['product_name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
                            <p class="card-text"><?php echo $product['product_description']; ?></p>
                        </div>
                        <div class="card-footer">
                            <p class="text-muted mb-0">Price: ₹<?php echo number_format($product['product_price'], 2); ?></p>
                            <a href="#" class="btn btn-primary mt-2">Add to Cart</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <p class="text-center">No products found.</p>
    <?php endif; ?>
</div>

<?php $this->load->view('../components/footer'); ?>

</body>
</html>
