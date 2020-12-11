<?php
if (!isset($_SESSION)) {
  session_start();
}
?>
<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <title>User page</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap_dist/css/bootstrap.min.css" crossorigin="anonymous">
  <script src="../bootstrap_dist/jquery.js" integrity="" crossorigin="anonymous"></script>
  <script src="../bootstrap_dist/js/bootstrap.min.js" integrity="" crossorigin="anonymous"></script>
  <link href="../bootstrap_dist/fontawesome/css/all.css" rel="stylesheet">
  <style>
    @font-face {
      font-family: 'myFirstFont';
      src: url('../Prompt/Prompt-Regular.ttf');
    }

    body {
      font-family: 'myFirstFont';
    }
  </style>
</head>

<body>
  <?php

  include("../connection.php");
  $id = $_SESSION['UserID'];
  $request_f = "SELECT * FROM `firend` WHERE `status`='1' AND `id_user` = '$id'";
  $query = mysqli_query($con, $request_f);
  $row = mysqli_num_rows($query);
  ?>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="./user_page.php">Navbar</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <form class="form-inline my-2 my-lg-0" action="search.php" method="get">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                  <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-user-plus"></i>


                    <?php if ($row != 0) {  ?>
                      <span class="badge badge-warning navbar-badge"><?php echo $row ?></span>
                    <?php  } ?>


                  </a>
                  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">
                      <i class="fas fa-users mr-2"></i>
                      <?php echo $row ?> friend requests
                    </span>
                    <div class="dropdown-divider"></div>
                    <a href="friend.php" class="dropdown-item">
                      เพื่อนทั้งหมด
                    </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-users-cog"></i>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="./edit_profile.php">แก้ไขข้อมูลส่วนตัว</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../logout.php">ออกจากระบบ</a>
                  </div>
                </li>
              </ul>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
</body>

</html>