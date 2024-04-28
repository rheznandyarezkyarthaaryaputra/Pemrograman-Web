<?php
include "koneksi.php";

$username = $_POST['username'];
$password=md5($_POST['password']);  

$sql = "SELECT * From user where username='$username' and password='$password'";
$result=mysqli_query($connect, $sql);
$cek=mysqli_num_rows($result);

if($cek > 0){
    session_start();
    $_SESSION['username']= $username;
    $_SESSION['status'] = 'login';

    echo "Anda berhasil login. silahkan menuju<a href='homeSession.php'> Halaman HOME </a>"; 
}else{
    echo "Anda gagal login. silahkan <a href='sessionLoginForm.html'>Halaman Login</a>";
    echo mysqli_error($connect);
}