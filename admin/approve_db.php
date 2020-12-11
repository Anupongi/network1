<?php
    include("../connection.php");
    $status = $_GET['status'];
    $id= $_GET['id'];
    if($status == 1){
        $sql="UPDATE `users` SET `status`='1' WHERE `id`=$id";
        mysqli_query($con,$sql);
        echo ("<script type='text/javascript'>
                window.alert('Succesfully Updated');
                window.location.href='approve.php';
            </script>");
        // header("location:approve.php");
    }else{
        $sql1="UPDATE `users` SET `status`='0' WHERE `id`=$id";
        mysqli_query($con,$sql1);
        echo ("<script type='text/javascript'>
                window.alert('Succesfully Updated');
                window.location.href='approve.php';
            </script>");
        // header("location:approve.php");
    }
    
?>