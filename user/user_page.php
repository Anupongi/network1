<?php 
session_start();
include("header.php");
include("../connection.php");
if (!$_SESSION["UserID"]){

  Header("Location: form_login.php");

}else{?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>User page</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <div class="container pt-3">
    <div class="row">
      <div class="col-12" md="3"></div>
      <div class="col-12" md="6">
        <div class="card" style="width: 100%;">
          <div class="card-body">
            <form action="./add_post.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">คุณคิดอะไรอยู่</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
              </div>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="upload">
                  <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                </div>
              </div>
              <div class="input-group pt-2">
                <button type="submit" class="btn btn-secondary btn-block">โพสต์</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-12" md="3"></div>
    </div>
    <div class="row">
      <div class="col-12 pt-3">
          <?php 
            $id=$_SESSION['UserID'];
            $friend="SELECT id_friend FROM `firend` WHERE id_user='$id' AND status='2'";
            $friend_q = mysqli_query($con,$friend);
            $numrow = mysqli_num_rows($friend_q);
            $id_friend = "user_id =". $id;
            $i = 0;
            while($friend_a = mysqli_fetch_array($friend_q)){
              $i +=1;
              if($numrow >= $i){
                $id_friend.=" OR ";
              }
              $id_friend .= "user_id = ". $friend_a[0] ;
            }
            $post="SELECT*FROM post WHERE $id_friend ORDER BY id DESC";
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
                <img src="../pic/<?php echo $user[4]?>" alt="" class="rounded-circle" style="width:50px;height:50px">
              </div>
              <div class="col-md-10">
                <div class="row"><b><?php echo $user[1]?></b></div>
                <div class="row"><p><?php echo $post[4]?></p></div>
                
              </div>
              <div class="col-md-1">
              <?php if($post[4] == $_SESSION['UserID']){?>
                <a href="./del_post.php?id=<?php echo $post[0]?>">
                  <i class="fas fa-trash-alt"></i>
                </a>
              <?php }else{?>
              <?php }?>
              </div>
            </div>
            <h2 style="text-align:center;">
              <?php
                echo $post[1];
              ?>
            </h2>
            <br>
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
                  <h5 class="modal-title" id="exampleModalLabel">ความคิดเห็นของคุณ</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="add_comment.php" method="post">
                    <div class="row">
                        <input type="hidden" name="post_id" value="<?php echo $post[0]?>">
                        <div class="col-9" md="9"><input type="text" class="form-control" name="comment"></div>
                        <div class="col-3" md="3"><button type="submit" class="btn btn-primary">comment</button></div>
                    </div>
                  </form>
                  <hr>
                  <?php 
                    $comment="SELECT * FROM `comment` WHERE id_post='$post[0]'";
                    $query2=mysqli_query($con,$comment);
                    while($row2=mysqli_fetch_array($query2)){
                      $profile1="SELECT * FROM `users` WHERE id='$row2[2]'";
                      $query3 = mysqli_query($con,$profile1);
                      $user1 = mysqli_fetch_array($query3);
                  ?>
                  <div class="card m-3">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-2" md="2">
                          <img src="../pic/<?php echo $user1[4]?>" alt="" class="rounded-circle" style="width:50px;height:50px">
                        </div>
                        <div class="col-8" md="8">
                          <div class="row"><b><?php echo $user1[1]?></b></div>
                          <div class="row"><p><?php echo $post[4]?></p></div>
                        </div>
                        <div class="col-1" md="1">
                          <?php if($row2[2] == $_SESSION["UserID"]) {?>
                            <a href="./del_comment.php?id=<?php echo $row2[0]?>">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                          <?php }else{?>
                          <?php }?>
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
  <script type="application/javascript">
    $('input[type="file"]').change(function(e){
      var fileName = e.target.files[0].name;
      $('.custom-file-label').html(fileName);
    });
  </script>
</body>
</html>
<?php }?>