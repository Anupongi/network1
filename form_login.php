<?php session_start(); ?>
<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Form Login</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="../bootstrap_dist/css/bootstrap.min.css" crossorigin="anonymous">
  <link href="./bootstrap_dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      align-items: center;
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #f5f5f5;
    }

    .form-signin {
      width: 100%;
      max-width: 330px;
      padding: 15px;
      margin: auto;
    }

    .form-signin .checkbox {
      font-weight: 400;
    }

    .form-signin .form-control {
      position: relative;
      box-sizing: border-box;
      height: auto;
      padding: 10px;
      font-size: 16px;
    }
  </style>
</head>

<body  class="text-center">

  <form class="form-signin" name="frmlogin" method="post" action="login.php">
    <img class="mb-4" src="./pic/1533782801_7464-org.png" alt="" width="84" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="text" id="inputEmail" name="Username" class="form-control" placeholder="Email address">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" name="Password" class="form-control mb-3" placeholder="Password" required="">
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  </form>


  <script src="./bootstrap_dist/jquery.js"></script>
  <script src="./bootstrap_dist/js/bootstrap.min.js"></script>


  <script src="./lib/jquery/dist/jquery.min.js"></script>
  <script src="./lib/bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>
</body>

</html>