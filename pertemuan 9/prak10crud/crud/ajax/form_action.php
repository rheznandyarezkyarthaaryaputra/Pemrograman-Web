<?php
session_start();
include 'koneksi.php';
include 'csrf.php';


$id= stripslashes(strip_tags(htmlspecialchars($_POST['id'], ENT_QUOTES)));
$nama= stripslashes(strip_tags(htmlspecialchars($_POST['name'], ENT_QUOTES)));
$jenis_kelamin= stripslashes(strip_tags(htmlspecialchars($_POST['jenis_kelamin'], ENT_QUOTES)));
$alamat= stripslashes(strip_tags(htmlspecialchars($_POST['alamat'], ENT_QUOTES)));
$no_telp= stripslashes(strip_tags(htmlspecialchars($_POST['no_telp'], ENT_QUOTES)));

// soal no 6.3
if($id==""){
    // soal no 6.1 6.2
    $query="INSERT into anggota (name, jenis_kelamin, alamat, no_telp) values (?,?,?,?)";
    $sql = $db1-> prepare($query);
    $sql->bind_param("ssss", $nama, $jenis_kelamin, $alamat, $no_telp);
    $sql->execute();
// soal no 6.3
} else{
    $query="UPDATE anggota set name=?, jenis_kelamin=?, alamat=?, no_telp=? where id=?";
    $sql = $db1-> prepare($query);
    $sql->bind_param("ssss", $nama, $jenis_kelamin, $alamat, $no_telp, $id);
    $sql->execute();
}
// soal no 6.1 6.2
echo json_encode(['success'=>'Sukses']);

$db1->close();