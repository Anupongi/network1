<?php session_start();
    include("../connection.php");
    include("header.php");
?>
<?php 

if (!$_SESSION["UserID"]){  //check session

	  Header("Location: form.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

}else{?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Admin page</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-12" md="12">
        <h1>ข้อมูลผู้ใช้งานระบบ </h1>
        <div class="table-responsive-xl">
            <table class="table text-center">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">ลำดับ</th>
                    <th scope="col">รูปภาพ</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    
                    <th scope="col">ลบผู้ใช้</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $count = 0;
                        $sql = "SELECT * FROM `users` WHERE `level`= 'M' AND status='1'";
                        $result = $con->query($sql);
                        while($row = mysqli_fetch_array($result)){ 
                    ?>
                    <tr>
                    <th scope="row"><?php echo $count+1?></th>
                    <td><img src="../pic/<?php echo $row[4]?>" style="width:50px;height:50px"></td>
                    <td><a href="profile_user.php?id=<?php echo $row[0]?>"><?php echo $row['username']; ?></a></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><a href="./del_user.php?id=<?php echo $row[0]?>" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                    <tr>
                    <?php 
                      $count++;

                        } ?>
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
    

</body>
</html>
<?php }?>