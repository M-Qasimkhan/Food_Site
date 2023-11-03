<?php

session_start();


include 'conn.php';

$username = $_POST['username'];
$cnic = $_POST['cnic'];
$email = $_POST['email'];
$password = $_POST['password'];

$q = "select * from `data` where username = '$username' || email = '$email' || cnic = '$cnic' ";

$result = mysqli_query($con, $q);
$num = mysqli_num_rows($result);
if($num==1){
    echo "duplicate data";

}else{
    $in = "INSERT INTO `data`(`username`, `email`, `cnic`, `password`) VALUES ('$username','$email','$cnic','$password')";

    mysqli_query($con, $in);
    header('location:dashboard.php');

}

?>