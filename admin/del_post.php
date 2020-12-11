<?php
    include("../connection.php");
    $id_user = $_GET['id_user'];
    $post_id= $_GET['id'];
    $del="DELETE FROM `post` WHERE id='$post_id'";
    mysqli_query($con,$del);
    header("location: ../../system/admin/profile_user.php?id=$id_user");
?>