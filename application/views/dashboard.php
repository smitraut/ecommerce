<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        .user-card {
            transition: transform 0.3s;
        }
        .user-card:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>

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
                            <h5 class="card-title"><?php echo $user['first_name']; ?></h5>
                            <p class="card-text">Email: <?php echo $user['email']; ?></p>
                            <!-- Add more fields as needed -->
                        </div>
                        <div class="card-footer">
                            <div class="btn-group">
                                <a href="<?php echo base_url('dashboard/editUser/' . $user['id']); ?>" class="btn btn-primary">Edit</a>
                                <a href="<?php echo base_url('dashboard/deleteUser/' . $user['id']); ?>" class="btn btn-danger">Delete</a>
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

<?php $this->load->view('../components/footer'); ?>


</body>
</html>
