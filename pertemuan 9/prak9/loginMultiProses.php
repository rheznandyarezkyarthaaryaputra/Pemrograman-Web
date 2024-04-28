<?php
include "koneksi.php";

$username=$_POST['username'];
$password=md5($_POST['password']);

$query = "SELECT * From user where username='$username' and password='$password'";
$result=mysqli_query($koneksi, $query);
$row=mysqli_fetch_assoc($result);

if($row['level']==1){
    echo "Anda berhasil login. silahkan menuju <a href='homeAdmin.html'>Halaman HOME</a>"; 
    
}else if($row['level']==2){
    echo "Anda berhasil login. silahkan menuju <a href='homeGuest.html'>Halaman HOME</a>";
}else{
    echo "Anda gagal login. silahkan <a href='loginForm.html'>Login kembali</a>";
    echo mysqli_error($koneksi);
}