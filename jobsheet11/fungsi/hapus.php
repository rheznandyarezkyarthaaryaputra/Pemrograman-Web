<?php
session_start();
if(!empty($_SESSION['username'])){
    require '../config/koneksi.php';
    require '../fungsi/pesan_kilat.php';
    require '../fungsi/anti_injection.php';
    if(!empty($_GET['jabatan'])){
        $id=antiinjection($koneksi, $_GET['id']);
        $queryGetUserId = "SELECT user_id FROM anggota WHERE jabatan_id = '$id'";
        $resultGetUserId = mysqli_query($koneksi, $queryGetUserId);
        
        if ($resultGetUserId) {
            $userIds = array();
            while ($row = mysqli_fetch_assoc($resultGetUserId)) {
                $userIds[] = $row['user_id'];
            }
            $queryAnggota = "DELETE FROM anggota WHERE jabatan_id = '$id'";
            if (mysqli_query($koneksi, $queryAnggota)) {
                foreach ($userIds as $userId) {
                    $queryUser = "DELETE FROM user WHERE id = '$userId'";
                    mysqli_query($koneksi, $queryUser);
                }
                $queryJabatan = "DELETE FROM jabatan WHERE id = '$id'";
                if (mysqli_query($koneksi, $queryJabatan)) {
                    pesan('success', "Jabatan Telah Terhapus.");
                } else {
                    pesan('danger', "Jabatan Tidak Terhapus Karena: " . mysqli_error($koneksi));
                }
            } else {
                pesan('danger', "Anggota Tidak Terhapus Karena: " . mysqli_error($koneksi));
            }
        } else {
            pesan('danger', "Gagal mengambil user_id: " . mysqli_error($koneksi));
        }
        header("Location: ../index.php?page=jabatan");
    } elseif(!empty($_GET['anggota'])){
        $id=antiinjection($koneksi, $_GET['id']);
        $query="DELETE from anggota where user_id= '$id'";
        if(mysqli_query($koneksi, $query)){
            $query2="DELETE from user where id= '$id'";
            if(mysqli_query($koneksi, $query2)){
                pesan('success', "Anggota Telah Terhapus");
            }else{
                pesan('warning', "Data Login Terhapus Tetapi Data Anggota Tidak Terhapus Karena: ". mysqli_error($koneksi));
            }
        }else{
            pesan('danger', "Anggota Tidak Terhapus Karena: ".mysqli_error($koneksi));
        }
        header("Location: ../index.php?page=anggota");
    }
}