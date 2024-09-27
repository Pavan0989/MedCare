<?php
session_start();
include 'dbconnect.php';

if($_GET['patient_id']){
    $pid = $_GET['patient_id'];
    $sql = "DELETE FROM patient where patient_id='$pid' ";
    $result = mysqli_query($conn,$sql);

    if($result){
        $_SESSION['message']='Delete employee successfull';
        header("location:display_pat.php");}
} 
?>