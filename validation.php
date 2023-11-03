<?php

session_start();


include 'conn.php';

$username = $_POST['username'];
$password = $_POST['password'];

$q = "select * from `data` where username = '$username' && password = '$password' ";

$result = mysqli_query($con, $q);
$num = mysqli_num_rows($result);
if($num==1){
    
    $_SESSION['username'] = $username;
    header('location:dashboard.php');

}else{

    echo"user not resgistered";

}

?>