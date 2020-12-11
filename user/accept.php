<?php
    include("../connection.php");
    $id = $_GET['id']; 
    $id_user = $_GET['id_user'];
    $id_friend = $_GET['id_friend'];

    $addfriend = "UPDATE `firend` SET `status` = '2' WHERE `id_user`= '$id_user' AND `id_friend`= '$id_friend'";
    $addfriend1 = "UPDATE `firend` SET `status` = '2' WHERE `id_user`= '$id_friend' AND `id_friend`= '$id_user'";
    // echo $addfriend;
    // echo $addfriend1;
    mysqli_query($con,$addfriend);
    mysqli_query($con,$addfriend1);
    header("location: friend.php");
?>