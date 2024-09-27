<?php
session_start();
include 'dbconnect.php';

if($_GET['emp_id']){
    $eid = $_GET['emp_id'];
    $sql = "DELETE FROM employee where emp_id='$eid' ";
    $result = mysqli_query($conn,$sql);

    if($result){
        $_SESSION['message']='Delete employee successfull';
        header("location:display_emp.php");}
} 
?>