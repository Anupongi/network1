<?php
    session_start();
    include("../connection.php");

    $id = $_SESSION["UserID"];
    $content = $_POST["content"];
    date_default_timezone_set("Asia/Bangkok");
    $datetime = date("d/m/Y H:i:s");
    $name_file =  $_FILES['upload']['name'];
    $tmp_name =  $_FILES['upload']['tmp_name'];
    $locate_img ="../pic/";
    move_uploaded_file($tmp_name,$locate_img.$name_file);

    $sql="INSERT INTO `post`(`content`,`img`,`user_id`, `datetime`) VALUES ('$content','$name_file','$id','$datetime')";
    $query = mysqli_query($con,$sql);
    if($query == 1){
        echo "<script>";
        echo "alert(\" Post Successfully\");"; 
        echo "window.location.href='user_page.php';";
        echo "</script>";
    }else{
        echo "<script>";
        echo "alert(\" Post Not Successfully\");"; 
        echo "window.history.back()";
        echo "</script>";  
    }
    
?>