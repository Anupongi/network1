<?php 
    include("../connection.php");
    
    $id = $_GET['id'];
    $del_user = "DELETE FROM `users` WHERE `id`='$id'";
    $query = mysqli_query($con,$del_user);
    if($query == 1){
        echo "<script>";
        echo "alert(\" Delete Successfully\");"; 
        echo "window.location.href='user.php';";
        echo "</script>";
    }else{
        echo "<script>";
        echo "alert(\" Delete Not Successfully\");"; 
        echo "window.history.back()";
        echo "</script>";  
    }

?>