<?php
include 'db_connect.php';
session_start();
$id = $_SESSION["cust_id"];
$phone = $_POST["cust_phone"];
$address = $_POST["cust_address"];


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $sqlUpdate = "update customer SET cust_phone = '$phone', cust_address = '$address' WHERE cust_id = '$id'";
    $result = mysqli_query($conn, $sqlUpdate);
    if($result){
        header("Location: /pickaclick/showpage.php");
    }
    else{
        echo mysqli_error($conn);
    }
}
?>