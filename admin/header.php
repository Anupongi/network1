<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Admin page</title>
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
body{
  font-family: 'myFirstFont';
}
</style>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-12">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
          </ul>
          <form class="form-inline my-2 my-lg-0">
          <ul class="navbar-nav mr-auto">
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-users-cog"></i>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./edit_profile.php">แก้ไขข้อมูลส่วนตัว</a>
                <a class="dropdown-item" href="./approve.php">ข้อมูลผู้ใช้งานระบบ</a>
                <a class="dropdown-item" href="./user.php">รายงานข้อมูลผู้ใช้</a>
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