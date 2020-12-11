<?php
include("../connection.php");
include("./header.php");
if (!$_SESSION["UserID"]){  //check session

    Header("Location: ../form_login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

}else{?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .image {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style> 
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="font-weight-bold">แก้ไขข้อมูลส่วนตัว</h1>
                <?php 
                    $id = $_SESSION["UserID"];
                    $sql="SELECT * FROM `users` WHERE `id`= '$id'";
                    $result = mysqli_query($con,$sql);
                    $row = $result -> fetch_array(MYSQLI_NUM);
                ?>
                <div class="container_img">
                    
                    <img class="image text-center" src="../pic/<?php echo $row[4]?>" style="border-radius: 50%;" width=150 height=150>
                    <div class="row pt-3">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <form action="upload.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $row[0]?>">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="upload">
                                        <label class="custom-file-label">เปลี่ยนรูป</label>
                                    </div>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit" name="save">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </div>
                
                <form class="pt-3" method="post" action="edit_db.php">
                    <h5>ข้อมูลทั่วไป</h5>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="username">Username</label>
                        <input type="hidden" class="form-control" name="id" value="<?php echo $row[0] ?>" >
                        <input type="text" class="form-control" name="username" value="<?php echo $row[1] ?>" >
                        </div>
                        <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $row[2] ?>">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">แก้ไขข้อมูลส่วนตัว</button>
                </form>
                
                <form class="pt-5" method="post" action="edit_p_db.php">
                    <h5>เปลี่ยนรหัสผ่าน</h5>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="password">รหัสผ่านเดิม</label>
                        <input type="hidden" class="form-control" name="id" value="<?php echo $row[0] ?>" >
                        <input type="text" class="form-control" id="password" value="<?php echo $row[3] ?>" disabled>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="password">รหัสผ่านใหม่</label>
                        <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">เปลี่ยนรหัสผ่าน</button>
                </form>
                    
            </div>
        </div>
    </div>
    <script type="application/javascript">
        $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });
    </script>
</body>
</html>
<?php }?>