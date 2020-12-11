<?php
    include("../connection.php");
    $post_id= $_GET['id'];
    $del="DELETE FROM `post` WHERE id='$post_id'";
    mysqli_query($con,$del);
    header("location:user_page.php");
?>