<html>
    <!-- <head> 
    https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css
    https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.
    </head> -->
    <body>
        <div class="container-fluid">
            <div class="row">
                <?php
                include "menu.php";
               // include "koneksi.php";
                include "header.php";


                $query_anggota= "SELECT count(id) as jml from anggota";
                var_dump($query_anggota);
                $result_anggota=mysqli_query($koneksi, $query_anggota);
                $row_anggota= mysqli_fetch_assoc($result_anggota);
                var_dump($row_anggota);
                die();
                
                $query_jabatan= "SELECT count(id) as jml from jabatan";
                $result_jabatan=mysqli_query($koneksi, $query_jabatan);
                $row_jabatan= mysqli_fetch_assoc($result_jabatan);
                ?>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Dashboard</h1>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">ANGGOTA</h5>
                                    <p class="card-text">Total anggota sejumlah <?= $row_anggota['jml'] ?> orang.</p>
                                    <a href="index.php?page=anggota" class="btn btn-primary"><i class="fa fa-users" aria-hidden="true"></i> Kelola</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">JABATAN</h5>
                                    <p class="card-text">Total jabatan sejumlah <?= $row_jabatan['jml'] ?>.</p>
                                    <a href="index.php?page=anggota" class="btn btn-primary"><i class="fa fa-puzzle-piece" aria-hidden="true"></i> Kelola</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </body>
    <?php
    include "footer.php";
    ?>
</html>