<?php

session_start();

include 'connection.php';

if(isset($_GET['token'])){
    $token = $_GET['token'];

    $updatequery = "update reg set status='active' where token='$token' ";

    $query = mysqli_query($con, $updatequery);

    if($query){
        if(isset($_SESSION['msg'])){
            $_SESSION['msg'] = "Activation Successfull";
            header('location:login.php');
        }else{
            $_SESSION['msg'] = "You Are Logged Out";
            header('location:login.php');
        }
    }else{
        $_SESSION['msg'] = "Account Not Updated";
        header('location:Signup.php');
    }
}

?>