<?php
include("../connection.php");
include("./header.php");
session_start();
if (!$_GET["id"]){  //check session

    Header("Location: ./user.php"); 

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
                <h1 class="font-weight-bold">Profile</h1>
                <?php 
                    $id = $_GET["id"];
                    $sql="SELECT * FROM `users` WHERE `id`= '$id'";
                    $result = mysqli_query($con,$sql);
                    $row = $result -> fetch_array(MYSQLI_NUM);
                ?>
                <div class="container_img">
                    
                    <img class="image text-center" src="../pic/<?php echo $row[4]?>" style="border-radius: 50%;" width=150 height=150>
                </div>
                <br>
                <?php
                    $post="SELECT*FROM post WHERE user_id='$id'";
                    $query=mysqli_query($con,$post);
                    while($post=mysqli_fetch_array($query)){
                        $profile="SELECT * FROM `users` WHERE id='$post[3]'";
                        $query1 = mysqli_query($con,$profile);
                        $user = mysqli_fetch_array($query1);
                ?>
                <div class="card m-4">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-1" md="1">
                            <img src="../pic/<?php echo $user[4]?>" alt="" class="rounded-circle" style="width:50px;height:50px">
                        </div>
                        <div class="col-10" md="10">
                            <div class="row"><b><?php echo $user[1]?></b></div>
                            <div class="row"><p><?php echo $post[4]?></p></div>
                            
                        </div>
                        <div class="col-1" md="1">
                            <a href="./del_post.php?id=<?php echo $post[0]?>&id_user=<?php echo $id?>">
                            <i class="fas fa-trash-alt"></i>
                            </a>
                        </div>
                        </div>
                        <h2 style="text-align:center;">
                        <?php
                            echo $post[1];
                        ?>
                        </h2>
                        <?php if($post[2] !=''){ ?>
                            <img src="../pic/<?php echo $post[2];?>" style="width:100%">
                        <?php }else{?>
                        
                        <?php }?>
                        <br>
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal_<?php echo $post[0]?>">
                        แสดงความคิดเห็น
                    </button>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal_<?php echo $post[0]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">แสดงความคิดเห็นของคุณ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <?php 
                                $comment="SELECT * FROM `comment` WHERE id_post='$post[0]'";
                                $query2=mysqli_query($con,$comment);
                                while($row2=mysqli_fetch_array($query2)){
                                $profile1="SELECT * FROM `users` WHERE id='$post[3]'";
                                $query3 = mysqli_query($con,$profile1);
                                $user1 = mysqli_fetch_array($query3);
                            ?>
                            <div class="card m-3">
                                <div class="card-body">
                                <div class="row">
                                    <div class="col-2" md="2">
                                    <img src="../pic/<?php echo $user[4]?>" alt="" class="rounded-circle" style="width:50px;height:50px">
                                    </div>
                                    <div class="col-8" md="8">
                                    <div class="row"><b><?php echo $user[1]?></b></div>
                                    <div class="row"><p><?php echo $post[4]?></p></div>
                                    </div>
                                    <div class="col-1" md="1">
                                    <a href="./del_comment.php?id=<?php echo $row2[0]?>&id_user=<?php echo $id?>">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                    </div>
                                </div>
                                    <?php echo $row2[1]?>
                                </div>
                            </div>
                            <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    } 
                ?>







                
            </div>
        </div>
    </div>
</body>
</html>
<?php }?>