<?php
    include("../connection.php");
    $id_user = $_GET['id_user'];
    $id = $_GET['id'];
    $del="DELETE FROM `comment` WHERE id='$id'";
    mysqli_query($con,$del);
    header("location: ../../system/admin/profile_user.php?id=$id_user");
?>