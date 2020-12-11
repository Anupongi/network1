<?php
    include("header.php");
    include("../connection.php");
    $keyword = $_GET['search'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?php
                            $sql="SELECT * FROM users WHERE username LIKE '%$keyword%' AND level='M' AND status='1';";
                            $query = mysqli_query($con,$sql);
                            while($row=mysqli_fetch_array($query)){
                                $request1="SELECT * FROM `firend` WHERE `id_friend`='$row[0]' AND `status`='0'";
                                $request_q1=mysqli_query($con,$request1);
                                $row2=mysqli_fetch_array($request_q1);
                                $row2_len=mysqli_num_rows($request_q1);
                                if($row2_len==0){
                                    break;
                                }
                                if ($_SESSION["UserID"] == $row[0]) {
                                    continue;
                                }
                        ?>
                        <div class="card float-left m-4" style="width:200px;">
                            <img src="../pic/<?php echo $row[4]?>" class="card-img-top" style="width:200px;height:200px">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row[1]?></h5>
                                <a href="./add_friend.php?id_user=<?php echo $_SESSION['UserID']?>&id_friend=<?php echo $row[0]?>&id=<?php echo $row['id']?>" class="btn btn-primary">เพิ่มเป็นเพือน</a>
                            </div>
                        </div>
                        <?php 
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>