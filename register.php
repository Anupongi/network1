<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script rel="stylesheet" src="./bootstrap_dist/js/bootstrap.min.js"></script>
    <script rel="stylesheet" src="./bootstrap_dist//jquery.js"></script>
    <link rel="stylesheet" href="./bootstrap_dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4"></div>
            <div class="col-4">
                <div class="header" style="position :absolute ;top:100px;">
                    <h2>REGISTER</h2>
                </div>
                <form action="conn_register.php" method="post" style="position :absolute ;top:150px;">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password_1">Password</label>
                        <input type="password" name="password_1" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password_2">Confirm Password</label>
                        <input type="password" name="password_2" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="Login_user" class="btn btn-outline-dark">Register</button>
                    </div>
                    <p> Already a member?<a href="login.php">Sign in</a></p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>