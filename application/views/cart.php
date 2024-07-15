<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopEase</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .cart-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }
        @media (min-width: 1200px) {
            .product-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }
        .product-card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }
        .product-info {
            display: flex;
            flex-direction: column;
        }
        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .name {
            font-size: 18px;
            font-weight: 600;
            margin: 0 0 15px 0;
            color: #333;
        }
        .details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        .price, .quantity {
            font-size: 16px;
            color: #555;
        }
        .price {
            font-weight: 600;
            color: #4CAF50;
        }
        .btn-buy-now {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 15px 30px;
            text-align: center;
            text-decoration: none;
            display: block;
            font-size: 18px;
            margin: 20px auto;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
            width: 200px;
        }
        .btn-buy-now:hover {
            background-color: #45a049;
        }
        .no-products {
            text-align: center;
            color: #555;
            font-size: 18px;
            margin-top: 50px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .btn-danger {
            background-color: #ef4444;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-danger:hover {
            background-color: #dc2626;
        }
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            animation: fadeIn 0.3s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .modal-content {
            background-color: #ffffff;
            border-radius: 24px !important;
            width: 90%;
            max-width: 400px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 2rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            animation: slideIn 0.3s ease;
        }
        @keyframes slideIn {
            from { transform: translate(-50%, -60%); opacity: 0; }
            to { transform: translate(-50%, -50%); opacity: 1; }
        }
        .modal-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #333;
            text-align: center;
        }
        .modal-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 1.5rem;
        }
        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
        }
        .btn-cancel {
            background-color: #f1f3f5;
            color: #495057;
        }
        .btn-cancel:hover {
            background-color: #e9ecef;
        }
        .btn-delete {
            background-color: #EF4444;
            color: white;
        }
        .btn-delete:hover {
            background-color: #DC2626;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(239, 68, 68, 0.1);
        }
        @media (max-width: 480px) {
            .modal-content {
                padding: 1.5rem;
            }
            .btn {
                padding: 0.6rem 1.2rem;
            }
        }
    </style>
</head>
<body>
    <?php $this->load->view('../components/navbar'); ?>

    <div class="cart-container">
        <?php if (!empty($cart)) : ?>
            <div class="product-grid">
                <?php foreach ($cart as $item) : ?>
                    <div class="product-card">
                        <div class="product-info">
                            <img src="<?php echo base_url('application/assets/images/' . (isset($item['product_image']) ? $item['product_image'] : 'default.jpg')); ?>" class="product-image" alt="<?php echo $item['name']; ?>">
                            <h2 class="name"><?php echo $item['name']; ?></h2>
                            <div class="details">
                                <span class="price">₹<?php echo number_format($item['price'], 2); ?></span>
                                <span class="quantity">Qty: <?php echo $item['quantity']; ?></span>
                            </div>
                            <div class="user-card-footer">
                                <button class="btn btn-danger" onclick="openDeleteModal(<?php echo $item['id']; ?>)">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </div>
                        </div>
                    </div>
                    
                <?php endforeach; ?>
            </div>
            <button class="btn-buy-now">Buy Now</button>
        <?php else : ?>
            <p class="no-products">No products found in your cart. Continue shopping!</p>
        <?php endif; ?>
    </div>

     <div id="deleteModal" class="modal">
        <div class="modal-content">
            <h2 class="modal-title">Confirm Deletion</h2>
            <p>Are you sure you want to delete this item from your cart? This action cannot be undone.</p>
            <div class="modal-buttons">
                <button onclick="closeDeleteModal()" class="btn btn-success">Cancel</button>
                <a id="deleteItemLink" href="#" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
    

    <?php $this->load->view('../components/footer'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script>
        function openDeleteModal(itemId) {
            var modal = document.getElementById('deleteModal');
            var deleteLink = document.getElementById('deleteItemLink');
            deleteLink.href = "cart/deleteCartItem/" + itemId;
            modal.style.display = "block";
        }

        function closeDeleteModal() {
            var modal = document.getElementById('deleteModal');
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            var modal = document.getElementById('deleteModal');
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

    </script>

</body>
</html>
