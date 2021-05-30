

<?php
echo 'Heloo';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    echo "POST METHOD  ";
    include 'db_connect.php';
    echo var_dump($_POST);
    $customer_email = $_POST['email'];
    $customer_password = $_POST['password'];
    $sql ="select * from customer where cust_email = '$customer_email' ";
    $result = mysqli_query($conn,$sql);
    $numRows = mysqli_num_rows($result);
    if ($numRows == 1){
        $row = mysqli_fetch_assoc($result);
        if(strcmp($customer_password,$row['cust_password']) == 0){
           session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['cust_id'] = $row['cust_id'];
            $_SESSION['cust_name'] = $row['cust_name'];
           $_SESSION['customer_email'] = $row['cust_email'];
           header("Location: /pickaclick/showpage.php");
        }else{
            header("Location: /pickaclick/login.php?err=invalid");
        }
    }
    else{
        header("Location: /pickaclick/login.php?err=invalid");
    }

}

?>
