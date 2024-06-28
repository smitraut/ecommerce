<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<?php $this->load->view('../components/navbar'); ?>

<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-10">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-8 col-xl-6">
                                <h1 class="text-center fw-bold mb-5 mx-1 mx-md-4 mt-4">Add Product</h1>
                                <form class="mx-1 mx-md-4" method="post" action="<?= base_url('AddProduct'); ?>" enctype="multipart/form-data">
                                    <div class="form-outline mb-4">
                                        <input type="text" name="product_name" id="product_name" class="form-control" required />
                                        <label class="form-label" for="product_name">Product Name</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="number" name="product_price" id="product_price" class="form-control" step="0.01" required />
                                        <label class="form-label" for="product_price">Price</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <textarea name="product_description" id="product_description" class="form-control" rows="4" required></textarea>
                                        <label class="form-label" for="product_description">Description</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="file" name="product_image" id="product_image" class="form-control" accept="image/*" required />
                                        <label class="form-label" for="product_image">Product Image</label>
                                    </div>

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-primary btn-lg">Add Product</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('../components/footer'); ?>


</body>
</html>
