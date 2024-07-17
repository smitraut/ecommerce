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
            color: #4F46E5;
        }
        .ttprice {
            font-weight: 600;
            color: blue;
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


        .quantity-controls {
        display: flex;
        align-items: center;
    }
    .btn-quantity {
        background-color: #f1f3f5;
        border: none;
        color: #495057;
        font-size: 18px;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background-color 0.3s;
    }
    .btn-quantity:hover {
        background-color: #e9ecef;
    }
    .quantity {
        margin: 0 10px;
        font-size: 16px;
    }
    </style>
</head>
<body>
    <?php $this->load->view('../components/navbar'); ?>

    <div class="cart-container">
        <?php if (!empty($cart)) : ?>
            <div class="product-grid">
                <?php foreach ($cart as $item) : ?>
                    <div class="product-card" data-item-id="<?php echo htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8'); ?>">
                        <div class="product-info">
                            <img src="<?php echo base_url('application/assets/images/' . (isset($item['product_image']) ? htmlspecialchars($item['product_image'], ENT_QUOTES, 'UTF-8') : 'default.jpg')); ?>" class="product-image" alt="<?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?>">
                            <h2 class="name"><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></h2>
                            <div class="details">
                                <span class="price">₹<?php echo number_format($item['price'] * $item['quantity'], 2); ?></span>
                                <div class="quantity-controls">
                                    <button class="btn-quantity" data-change="-1" data-item-id="<?php echo htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8'); ?>">-</button>
                                    <span class="quantity" id="quantity-<?php echo htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8'); ?></span>
                                    <button class="btn-quantity" data-change="1" data-item-id="<?php echo htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8'); ?>">+</button>
                                </div>
                            </div>
                            <div class="user-card-footer">
                                <button class="btn btn-danger delete-item" data-item-id="<?php echo htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8'); ?>">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="cart-summary">
                <h3>Cart Total: <span id="cart-grand-total">0.00</span></h3>
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
                <button id="cancelDelete" class="btn btn-success">Cancel</button>
                <button id="deleteItemLink" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>

    <?php $this->load->view('../components/footer'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const productGrid = document.querySelector('.product-grid');
        const deleteModal = document.getElementById('deleteModal');
        const cancelDeleteBtn = document.getElementById('cancelDelete');
        const deleteItemBtn = document.getElementById('deleteItemLink');
        let itemToDeleteId = null;

        function openDeleteModal(itemId) {
            console.log('Opening delete modal for item:', itemId);
            itemToDeleteId = itemId;
            deleteModal.style.display = "block";
        }

        function closeDeleteModal() {
            console.log('Closing delete modal');
            deleteModal.style.display = "none";
            itemToDeleteId = null;
        }

        function deleteItem(itemId) {
            console.log('Attempting to delete item:', itemId);
            fetch('<?php echo base_url("cart/deleteItem/"); ?>' + itemId, {
                method: 'POST'
            })
            .then(response => response.json())
            .then(data => {
                console.log('Parsed response data:', data);
                if (data.success) {
                    console.log('Item deleted successfully');
                    const itemElement = document.querySelector(`.product-card[data-item-id="${itemId}"]`);
                    if (itemElement) {
                        itemElement.remove();
                        console.log('Item removed from DOM');
                        updateCartTotal();
                    } else {
                        console.log('Item element not found in DOM');
                    }
                    closeDeleteModal();
                } else {
                    console.error('Failed to delete item:', data.message);
                    alert('Failed to delete item. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            });
        }

        function updateQuantity(itemId, change) {
            const quantityElement = document.getElementById('quantity-' + itemId);
            const currentQuantity = parseInt(quantityElement.textContent);
            const newQuantity = currentQuantity + change;
            
            if (newQuantity > 0) {
                fetch('<?php echo base_url("cart/updateQuantity/"); ?>' + itemId + '/' + newQuantity, {
                    method: 'POST'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        quantityElement.textContent = data.newQuantity;
                        updateItemPrice(itemId, data.price, data.newQuantity);
                        updateCartTotal();
                    } else {
                        alert('Failed to update quantity. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again.');
                });
            }
        }

        function updateItemPrice(itemId, price, quantity) {
            const priceElement = document.querySelector(`.product-card[data-item-id="${itemId}"] .price`);
            const newTotal = (price * quantity).toFixed(2);
            const formattedTotal = new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'INR' }).format(newTotal);
            priceElement.textContent = formattedTotal;
        }

        function updateCartTotal() {
            const prices = document.querySelectorAll('.price');
            let grandTotal = 0;
            prices.forEach(price => {
                grandTotal += parseFloat(price.textContent.replace('₹', '').replace(/,/g, ''));
            });
            const formattedTotal = new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'INR' }).format(grandTotal);
            document.getElementById('cart-grand-total').textContent = formattedTotal;
        }

        // Event delegation for quantity buttons and delete buttons
        productGrid.addEventListener('click', function(event) {
            const target = event.target;
            if (target.classList.contains('btn-quantity')) {
                const itemId = target.dataset.itemId;
                const change = parseInt(target.dataset.change);
                updateQuantity(itemId, change);
            } else if (target.closest('.delete-item')) {
                const itemId = target.closest('.delete-item').dataset.itemId;
                openDeleteModal(itemId);
            }
        });

        // Delete modal event listeners
        cancelDeleteBtn.addEventListener('click', closeDeleteModal);
        deleteItemBtn.addEventListener('click', function() {
            if (itemToDeleteId) {
                deleteItem(itemToDeleteId);
            }
        });

        // Close modal when clicking outside
        window.addEventListener('click', function(event) {
            if (event.target == deleteModal) {
                closeDeleteModal();
            }
        });

        // Initial cart total update
        updateCartTotal();
    });
    </script>
</body>
</html>