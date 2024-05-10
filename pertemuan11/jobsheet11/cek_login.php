<?php
if(session_status()===PHP_SESSION_NONE){
    session_start();
}
include "config/koneksi.php";
    include "fungsi/pesan_kilat.php";
    include "fungsi/anti_injection.php";

    $username= antiinjection($koneksi, $_POST['username']);
    $password= antiinjection($koneksi, $_POST['password']);
   // var_dump($username);
   // var_dump($password);
   // die();

    $query= "SELECT username, level, salt, password as hashed_password from user where username = '$username'";
    $result=mysqli_query($koneksi, $query);
    $row=mysqli_fetch_assoc($result);
    mysqli_close($koneksi);
    // var_dump($row);
     //die();
    $salt=$row['salt'];
    //var_dump($salt);
    // die();
    $hashed_password = $row['hashed_password'];

    if($salt !== null&& $hashed_password!==null){
        $combined_password= $salt . $password;

        if(password_verify($combined_password, $hashed_password)){
            $_SESSION['username'] = $row['username'];
            $_SESSION['level'] = $row['level'];
            var_dump($_SESSION);
            //die();
            header("Location: index.php");
        } else{
            pesan('danger', "Login gagal. Password Anda Salah");
           // header("Location: login.php");
            //header('admin/template/home.php');
        }


    } else{
        pesan('warning', "Username tidak ditemukan.");
        header("Location: login.php");
        //header('admin/template/home.php');
    }