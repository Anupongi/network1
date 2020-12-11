<?php
    include("../connection.php");
    $id = $_POST['id'];
    $password = $_POST['password'];
    

    $update="UPDATE `users` SET `password`='$password' WHERE `id`='$id'";
    $query = mysqli_query($con,$update);
    if($query = 1){
    echo ("<script type='text/javascript'>
                window.alert('Succesfully Updated');
                window.location.href='edit_profile.php';
            </script>");
    }else{
        echo ("<script type='text/javascript'>
                window.alert('Wrong Updated');
                window.location.href='edit_profile.php';
            </script>");
    }

?>