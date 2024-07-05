<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Dashboard</title>
    <style>

.card-text {
    display: flex;
    align-items: center;
    margin-bottom: 0.5rem;
}

.card-text i {
    color: #007bff; 
}      

      .user-card {
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    transition: box-shadow 0.3s ease;
}

.user-card:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.user-card .card-body {
    padding: 1.25rem;
}

.user-card .card-title {
    margin-bottom: 0.5rem;
}

.user-card .card-text {
    color: #666;
    margin: 0;
}

.user-card .card-footer {
    background-color: #f8f9fa;
    border-top: 1px solid #e0e0e0;
    padding: 1rem;
}

.user-card .btn-group {
    display: flex;
    justify-content: space-between;
}

.user-card .btn {
    padding: 0.375rem 0.75rem;
    font-size: 0.9rem;
}

.user-card .btn-edit {
    background-color: #007bff;
    color: white;
    border: none;
}

.user-card .btn-edit:hover {
    background-color: #0056b3;
}

.user-card .btn-delete {
    background-color: #dc3545;
    color: white;
    border: none;
}

.user-card .btn-delete:hover {
    background-color: #c82333;
}

.no-users {
    width: 100%;
    text-align: center;
    color: #666;
    padding: 2rem;
    background-color: #f8f9fa;
    border-radius: 8px;
}
        
    </style>
</head>
<body>

<?php $this->load->view('../components/navbar'); ?>

<!-- Main Content -->
<div class="container mt-5">
    <h1 class="mb-4"> Management</h1>

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
                <div class="card h-100 user-card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $user['first_name'] . ' ' . $user['last_name']; ?></h5>
                        <p class="card-text">
                            <i class="bi bi-envelope-fill me-2"></i>
                            <?php echo $user['email']; ?>
                        </p>
                        <p class="card-text">
                            <i class="bi bi-telephone-fill me-2"></i>
                            <?php echo $user['phone_number']; ?>
                        </p>    
                        <!-- Add more fields as needed -->
                    </div>
                    <div class="card-footer">
                        <div class="btn-group">
                            <a href="<?php echo base_url('dashboard/editUser/' . $user['id']); ?>" class="btn btn-edit">Edit</a>
                            <a href="<?php echo base_url('dashboard/deleteUser/' . $user['id']); ?>" class="btn btn-delete">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p class="no-users">No users found.</p>
    <?php endif; ?>
</div>

</div>

<?php $this->load->view('../components/footer'); ?>


</body>
</html>
