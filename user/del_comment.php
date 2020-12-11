<?php
    include("../connection.php");
    $id = $_GET['id'];
    $del="DELETE FROM `comment` WHERE id='$id'";
    mysqli_query($con,$del);
    header("location:user_page.php");
?>