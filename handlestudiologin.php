

<?php
echo 'Heloo';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    echo "POST METHOD  ";
    include 'db_connect.php';
    echo var_dump($_POST);
    $studio_email = $_POST['email'];
    $studio_password = $_POST['password'];
    $sql ="select * from photostudio where stud_email = '$studio_email' ";
    $result = mysqli_query($conn,$sql);
    $numRows = mysqli_num_rows($result);
    if ($numRows == 1){
        $row = mysqli_fetch_assoc($result);
        if(strcmp($studio_password,$row['stud_password']) == 0){
           session_start();
            $_SESSION['loggedin_studio'] = true;
            $_SESSION['stud_id'] = $row['stud_id'];
            $_SESSION['stud_name'] = $row['stud_name'];
           $_SESSION['stud_email'] = $row['stud_email'];
           $sql = "select stud_id from photostudio where stud_email = '$studio_email' ";
           $result = mysqli_query($conn,$sql);
           $row = mysqli_fetch_assoc($result);
           $id= $row["stud_id"];
           header("Location: /pickaclick/studio_page.php?num=$id");
        }else{
            header("Location: /pickaclick/studio_login.php?err=invalid");
        }
    }
    else{
        header("Location: /pickaclick/studio_login.php?err=invalid");
    }

}

?>
 