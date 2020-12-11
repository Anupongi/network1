<?php
    include("../connection.php");
    $id = $_GET['id']; 
    $id_user = $_GET['id_user'];
    $id_friend = $_GET['id_friend'];

    // $addfriend = "UPDATE `firend` SET `status` = '1' ,`id_friend` = '$id_friend' WHERE `id_user`= '$id_user'";
    // $addfriend1 = "UPDATE `firend` SET `status` = '1' ,`id_friend` = '$id_user' WHERE `id_user`= '$id_friend'";


    $addfriend = "INSERT INTO `firend`(`id_user`, `id_friend`, `status`) VALUES ('$id_user','$id_friend','4')";
    $addfriend1 = "INSERT INTO `firend`(`id_user`, `id_friend`, `status`) VALUES ('$id_friend','$id_user','1')";
    $query = mysqli_query($con,$addfriend);
    $query1 = mysqli_query($con,$addfriend1);
    header("location: friend.php");
