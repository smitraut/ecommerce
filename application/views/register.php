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
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }
        .register-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(50vh - 50px); 
            padding: 2rem;
        }
        .register-card {
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            text-align: center;
        }
        .register-title {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 2rem;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }
        .form-control::placeholder {
            color: #999;
        }
        .form-control:focus {
            outline: none;
            border-color: #4F46E5;
        }
        .btn-register {
            display: block;
            width: 100%;
            padding: 1rem;
            background-color: #4F46E5;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-register:hover {
            background-color: #4338CA;
        }
        .login-link {
            margin-top: 1.5rem;
            color: #555;
        }
        .login-link a {
            color: #4F46E5;
            text-decoration: none;
            font-weight: 600;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<?php $this->load->view('../components/navbar'); ?>

<div class="register-container">
    <div class="register-card">
        <h1 class="register-title">Create an Account</h1>
        <form action="<?= base_url() ?>Register/registerUsersErp" method="post">
            <div class="form-group">
                <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name" required>
            </div>
            <div class="form-group">
                <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last Name" required>
            </div>
            <div class="form-group">
                <input type="tel" id="phone_number" name="phone_number" class="form-control" placeholder="Phone Number" required>
            </div>
            <div class="form-group">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" required>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn-register">Create Account</button>
        </form>
        <p class="login-link">Already have an account? <a href="<?php echo base_url(); ?>Login">Log in</a></p>
    </div>
</div>

<?php $this->load->view('../components/footer'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>