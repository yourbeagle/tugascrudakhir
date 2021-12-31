<?php
session_start();

include '../connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($mysqli, "select * from user where username='$username' and password='$password'");

$cek = mysqli_num_rows($data);

if($cek > 0)
{
    $_SESSION['username'] = $username;
    $_SESSION['status'] = 'login';
    header("Location: dashboard.php");
}else
{
    header("Location: login.php?pesan=gagal");
}





?>