<?php
    include("../connection.php");
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    

    $update="UPDATE `users` SET `username`='$username',`email`='$email' WHERE `id`='$id'";
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