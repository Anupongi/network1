<?php
include("../connection.php");
if($_POST){
    if(isset($_FILES['upload'])){
        $id = $_POST['id'];
        $name_file =  $_FILES['upload']['name'];
        $tmp_name =  $_FILES['upload']['tmp_name'];
        $locate_img ="../pic/";
        move_uploaded_file($tmp_name,$locate_img.$name_file);
       
        $sql="UPDATE `users` SET `img`='$name_file' WHERE `id`='$id'";
        mysqli_query($con,$sql);
        echo $name_file;
        header("location:edit_profile.php");
    }
}
?>