<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Image Upload System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Image Upload System</h4>
                </div>
                <div class="card-body">
                    <!-- Nav Tabs -->
                    <ul class="nav nav-tabs mb-3" id="authTabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#loginTab">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#registerTab">Register</a>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="loginTab">
                            <form action="login.php" method="post">
                                <div class="mb-3">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <button class="btn btn-primary w-100">Login</button>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="registerTab">
                            <form action="register.php" method="post">
                                <div class="mb-3">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <button class="btn btn-success w-100">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
