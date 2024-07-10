<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border: none;
            border-radius: 75px !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            padding: 3rem;
        }
        .form-control {
            border-radius: 10px;
            padding: 0.75rem 1.25rem;
            margin-bottom: 1.5rem;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 10px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
        .custom-file-input::-webkit-file-upload-button {
            visibility: hidden;
        }
        .custom-file-input::before {
            content: 'Choose Image';
            display: inline-block;
            background: #007bff;
            color: white;
            border-radius: 10px;
            padding: 0.75rem 1.25rem;
            outline: none;
            white-space: nowrap;
            cursor: pointer;
            font-weight: 600;
        }
        .custom-file-input:hover::before {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<?php $this->load->view('../components/navbar'); ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center fw-bold mb-5">Add Product</h1>
                    <form method="post" action="<?= base_url('AddProduct/addProduct'); ?>" enctype="multipart/form-data">
                        <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Product Name" required />

                        <input type="number" name="product_price" id="product_price" class="form-control" step="0.01" placeholder="Price" required />

                        <textarea name="product_description" id="product_description" class="form-control" rows="4" placeholder="Description" required></textarea>

                        <input type="file" name="product_image" id="product_image" class="form-control custom-file-input" accept="image/*" required />

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('../components/footer'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>