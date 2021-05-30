<?php
include 'db_connect.php';
session_start();
$id = $_SESSION["stud_id"];
$phone = $_POST["cust_phone"];
$address = $_POST["cust_address"];


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $sqlUpdate = "update photostudio SET stud_phone = '$phone', stud_address = '$address' WHERE stud_id = '$id'";
    $result = mysqli_query($conn, $sqlUpdate);
    if($result){
        header("Location: /pickaclick/studio_page.php?num=$id");
    }
    else{
        echo mysqli_error($conn);
    }
}
?>