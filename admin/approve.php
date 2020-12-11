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
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">สถานะผู้ใช้งาน</th>
                    <th scope="col">อนุมัติผู้ใช้/ยกเลิกผู้ใช้</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $count = 0;
                        $sql = "SELECT * FROM `users` WHERE `level`= 'M'";
                        $result = $con->query($sql);
                        while($row = $result->fetch_assoc()): 
                    ?>
                    <tr>
                    <th scope="row"><?php echo $count+1?></th>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <?php if($row['status']== 0){ ?>
                            <b style="color:black;">ใช้งานไม่ได้</b>
                        <?php }else{ ?>
                          <b style="color:green;">กำลังใช้งาน</b>
                        <?php }?>
                    </td>
                    <td>
                        <?php if($row['status']== 0){ ?>
                            <a href="./approve_db.php?status=1&id=<?php echo $row['id']?>" type="button" class="btn btn-success">อนุมัติผู้ใช้</a>
                        <?php }else{ ?>
                            <a href="./approve_db.php?status=0&id=<?php echo $row['id']?>" type="button" class="btn btn-danger">ยกเลิกผู้ใช้</a>
                        <?php }?>
                    </td>
                    </tr>
                    <tr>
                    <?php 
                      $count++;
                    endwhile ?>
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
    

</body>
</html>
<?php }?>