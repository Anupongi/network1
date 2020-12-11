<?php
    include("../connection.php");
    session_start();
    $id = $_SESSION['UserID'];
    $post_id = $_POST['post_id'];
    $comment = $_POST['comment'];
    date_default_timezone_set("Asia/Bangkok");
    $datetime = date(" d/m/Y h:m:s");
    $sql="INSERT INTO `comment`(`content`, `id_user`, `id_post`, `datetime`) VALUES ('$comment','$id','$post_id','$datetime')";
    $query = mysqli_query($con,$sql);
    if($query == 1){
        echo "<script>";
        echo "alert(\" Comment Successfully\");"; 
        echo "window.location.href='user_page.php';";
        echo "</script>";  
    }else{
        echo "<script>";
        echo "alert(\" Comment Not Successfully\");"; 
        echo "window.history.back()";
        echo "</script>";  
    }
?>