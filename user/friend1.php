<?php
include("header.php");
include("../connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพื่อนทั้งหมด</title>
</head>

<body>
    <div class="container pt-3">
        <div class="row">
            <div class="col-12" md="12">
                <h4 class="font-weight-bold">คำขอเป็นเพื่อน</h4>
                <div class="card">
                    <div class="card-body">
                        <?php
                        $request = "SELECT * FROM `firend` WHERE `id_user`='$_SESSION[UserID]' AND `status`='1'";
                        $request_q = mysqli_query($con, $request);
                        while ($row = mysqli_fetch_array($request_q)) {
                            $request1 = "SELECT * FROM `users` WHERE `id`='$row[id_friend]' AND `level`='M'";
                            $request_q1 = mysqli_query($con, $request1);
                            $row2 = mysqli_fetch_array($request_q1);
                        ?>
                            <div class="card float-left m-4" style="width:200px">
                                <img src="../pic/<?php echo $row2[4] ?>" class="card-img-top" alt="..." style="width:200px;height:200px">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row2[1] ?></h5>
                                    <a href="./accept.php?id_user=<?php echo $_SESSION['UserID'] ?>&id_friend=<?php echo $row['id_friend'] ?>&id=<?php echo $row['id'] ?>" class="btn btn-primary">ยืนยัน</a>
                                    <a href="./cancel.php?id_user=<?php echo $_SESSION['UserID'] ?>&id_friend=<?php echo $row['id_friend'] ?>&id=<?php echo $row['id'] ?>" class="btn btn-secondary ">ลบ</a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <br>
                <h4 class="font-weight-bold">รับเป็นเพื่อนแล้ว</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $request = "SELECT * FROM `firend` WHERE `id_user`='$_SESSION[UserID]' AND `status`='2'";
                                $request_q = mysqli_query($con, $request);
                                while ($row = mysqli_fetch_array($request_q)) {
                                    $request1 = "SELECT * FROM `users` WHERE `id`='$row[id_friend]' AND `level`='M'";
                                    $request_q1 = mysqli_query($con, $request1);
                                    $row2 = mysqli_fetch_array($request_q1);
                                ?>
                                    <div class="card float-left m-4" style="width:200px">
                                        <img src="../pic/<?php echo $row2[4] ?>" class="card-img-top" alt="..." style="width:200px;height:200px">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $row2[1] ?></h5>
                                            <button type="button" class="btn btn-secondary">เพื่อน</button>
                                            <a href="./cancel.php?id_user=<?php echo $_SESSION['UserID'] ?>&id_friend=<?php echo $row['id_friend'] ?>&id=<?php echo $row['id'] ?>" class="btn btn-secondary ">ลบ</a>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <h4 class="font-weight-bold">ยังไม่ได้เป็นเพื่อน</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                // $all_user = "SELECT * FROM `users` WHERE `level`='M' AND `status`='1'";
                                // // echo $all_user;
                                // $query = mysqli_query($con, $all_user);
                                // while ($row = mysqli_fetch_array($query)) {
                                //     // print_r($row);
                                //     $not_friend = "SELECT * FROM `firend` WHERE `id_user`='$_SESSION[UserID]' AND `status`='0'";
                                //     // echo $not_friend;
                                    
                                //     $query2 = mysqli_query($con, $not_friend);
                                //     $row3 =mysqli_fetch_array($query2);
                                //     $num = mysqli_num_rows($query2);
                                //     print_r($row3);
                                //     // echo $num;
                                //     // if ($num == 1) {
                                //     //     break;
                                //     // }
                                //     if ($_SESSION["UserID"] == $row[0]) {
                                //         continue;
                                //     }
                                //     // if($row3[3] =='0'){
                                //     //     continue;    
                                //     // }
                                    
                                    
                                    
                                    $request="SELECT * FROM `firend` WHERE `id_user`='$_SESSION[UserID]' AND `status`='0'";
                                    $request_q=mysqli_query($con,$request);
                                    $numrow = mysqli_num_rows($request_q);
                                    if($numrow != 0){
                                    while($row=mysqli_fetch_array($request_q)){
                                        $request1="SELECT * FROM `users` WHERE `id`='$row[id_friend]' AND `level`='M'";
                                        $request_q1=mysqli_query($con,$request1);
                                        $row2=mysqli_fetch_array($request_q1);
                                ?>
                                    <div class="card float-left m-4" style="width:200px">
                                        <img src="../pic/<?php echo $row2[4] ?>" class="card-img-top" alt="..." style="width:200px;height:200px">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $row2[1] ?></h5>
                                            <a href="./add_friend.php?id_user=<?php echo $_SESSION['UserID'] ?>&id_friend=<?php echo $row[0] ?>&id=<?php echo $row3[0] ?>" class="btn btn-primary">เพิ่มเป็นเพื่อน</a>
                                        </div>
                                    </div>
                                <?php
                                    }}
                                // }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>