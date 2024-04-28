<?php
session_start();
include 'koneksi.php';
include 'csrf.php';

$id=$_POST['id'];
$query="SELECT * from anggota where id=? order by id desc";
$sql= $db1->prepare($query);
$sql->bind_param('i', $id);
$sql->execute();
$res1=$sql->get_result();
while($row = $res1->fetch_assoc()){
    $h['id']=$row["id"];
    $h['name']=$row["name"];
    $h['jenis_kelamin']=$row["jenis_kelamin"];
    $h['alamat']=$row["alamat"];
    $h['no_telp']=$row["no_telp"];
}
echo json_encode($h);

$db1->close();