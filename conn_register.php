<?php
    session_start();
    include('./connection.php');
    if(isset($_POST['username'])){
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password_1=$_POST['password_1'];
        $password_2=$_POST['password_2']; 

        $sql="SELECT * FROM `users` WHERE `username`='$username' AND email='$email'";
        $query= mysqli_query($con,$sql);
        if(mysqli_num_rows($query) == 1){
            echo '1';
            $result = mysqli_fetch_array($query);
            if($result['username'] === $username and $result['email']=$email){
                echo "<script>";
                echo "alert(\" user or  email already exists\");"; 
                echo "window.history.back()";
                echo "</script>";
            }else{
                $password=$password_1;
                $sql1="INSERT INTO users (username,email,password,level,status) VALUES ('$username','$email','$password_1','b',0)";
                mysqli_query($con,$sql1);
                header('location: form_login.php');
                
            }
        }
    }else{
        echo '2';
        header('location:register.php');
    }
    // if(isset($_POST['username'])){
        

    //     $username=$_POST['username'];
    //     $email=$_POST['email'];
    //     $password_1=$_POST['password_1'];
    //     $password_2=$_POST['password_2'];

    //     $mysql_check_query="SELECT * FROM users WHERE username='$username'";
    //     echo $mysql_check_query;
    //     $query = mysqli_query($con,$mysql_check_query);
    //     if($query == 0){
    //         $result=mysqli_fetch_array($con, $query);
    //         echo 'y1';
    //         if($result['username'] === $username){
    //             echo 'y';
    //             echo '<script type="text/javascript">';
    //             echo ' alert("Username is required")';  //not showing an alert box.
    //             echo '</script>';
    //         }
    //     }
        
        
    //     // if($result == 1){
    //     //     echo 'y';
    //         // $result=mysqli_fetch_array($con, $query);
    //         // if($result['username'] === $username){
    //         //     echo '<script type="text/javascript">';
    //         //     echo ' alert("Username is required")';  //not showing an alert box.
    //         //     echo '</script>';
    //         // }
    //         // if($result['email'] === $email){
    //         //     echo '<script type="text/javascript">';
    //         //     echo ' alert("Email is required")';  //not showing an alert box.
    //         //     echo '</script>';
    //         // }
     
        
    //     // $password=$password_1;
    //     // $sql="INSERT INTO users (username,email,password,level,status) VALUES ('$username','$email','$password_1','b',0)";
    //     // mysqli_query($con,$sql);

    //     // header('location: login.php');
    // }   else{
    //     header('location:register.php');
    // }
?>