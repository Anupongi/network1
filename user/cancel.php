<?php
    include("../connection.php");
    $id = $_GET['id']; 
    $id_user = $_GET['id_user'];
    $id_friend = $_GET['id_friend'];

    // $addfriend = "UPDATE `firend` SET `id_user`='$id_user',`id_friend`='$id_friend',`status`='0' WHERE id='$id'";
    $addfriend = "DELETE FROM `firend` WHERE `id_user`= '$id_user' AND `id_friend`= '$id_friend'";
    $addfriend1 = "DELETE FROM `firend` WHERE `id_user`= '$id_friend' AND `id_friend`= '$id_user'";
    mysqli_query($con,$addfriend);
    mysqli_query($con,$addfriend1);
    header("location: friend.php");
?>