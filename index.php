<?php
    include("./connection.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./bootstrap_dist/css/bootstrap.min.css">
    <script src="./bootstrap_dist/jquery.js"></script>
    <script src="./bootstrap_dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./bootstrap_dist/fontawesome/css/all.css">
    <style>
        @font-face {
        font-family: 'myFirstFont';
        src: url('./Prompt/Prompt-Regular.ttf');
        }
        body{
        font-family: 'myFirstFont';
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#">
                        <img src="./pic/1533782801_7464-org.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
                        Bootstrap
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                            <a href="./form_login.php"><i class="fas fa-sign-in-alt"></i></a>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 pt-3">
                <?php
                    $post="SELECT*FROM post ORDER BY id DESC";
                    $query=mysqli_query($con,$post);
                    while($post=mysqli_fetch_array($query)){
                    $profile="SELECT * FROM `users` WHERE id='$post[3]'";
                    $query1 = mysqli_query($con,$profile);
                    $user = mysqli_fetch_array($query1);
                ?>
                <div class="card m-4">
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-1">
                        <img src="./pic/<?php echo $user[4]?>" alt="" class="rounded-circle" style="width:50px;height:50px">
                    </div>
                    <div class="col-md-10">
                        <div class="row"><b><?php echo $user[1]?></b></div>
                        <div class="row"><p><?php echo $post[4]?></p></div>
                        
                    </div>
                    </div>
                    <h2 style="text-align:center;">
                    <?php
                        echo $post[1];
                    ?>
                    </h2>
                    <br>
                    <?php if($post[2] !=''){ ?>
                    <img src="./pic/<?php echo $post[2];?>" style="width:100%">
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
                        <h5 class="modal-title" id="exampleModalLabel">ความคิดเห็นทั้งหมด</h5>
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
                                <img src="./pic/<?php echo $user[4]?>" alt="" class="rounded-circle" style="width:50px;height:50px">
                                </div>
                                <div class="col-8" md="8">
                                <div class="row"><b><?php echo $user[1]?></b></div>
                                <div class="row"><p><?php echo $post[4]?></p></div>
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
                <?php }  ?>
                
                
            </div>
        </div>
    </div>
</body>
</html>