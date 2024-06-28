<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard </title>
</head>



<body>
<style>
        .user-card {
            transition: transform 0.3s;
        }
        .user-card:hover {
            transform: scale(1.05);
        }
    </style>
<?php $this->load->view('../components/navbar'); ?>

<!-- Main Content -->
<div class="container mt-5">
    <h1 class="mb-4">User Management</h1>

    <!-- Flash Messages -->
    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <!-- User List -->
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php if (!empty($users)) : ?>
            <?php foreach ($users as $user) : ?>
                <div class="col">
                    <div class="card h-100 shadow user-card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $user['username']; ?></h5>
                            <p class="card-text">Email: <?php echo $user['email']; ?></p>
                            <p class="card-text">Role: <?php echo $user['role']; ?></p>
                        </div>
                        <div class="card-footer">
                            <div class="btn-group">
                                <a href="<?php echo base_url('dashboard/editUser/' . $user['user_id']); ?>" class="btn btn-primary">Edit</a>
                                <a href="<?php echo base_url('dashboard/deleteUser/' . $user['user_id']); ?>" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No users found.</p>
        <?php endif; ?>
    </div>

</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-zkpK7IhF8B1RMpZv3uVq2mhJfpJhgiCGF08J2E0sFpA3sTiGCjGpvwL3IF+J5R0F" crossorigin="anonymous"></script>

<?php $this->load->view('../components/footer'); ?>

</body>
</html>
