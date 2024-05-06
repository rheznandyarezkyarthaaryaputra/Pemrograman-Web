<div class="container-fluid">
    <div class="row">
        <?php

require 'admin/template/menu.php';

$koneksi = mysqli_connect("localhost", "root","","prakwebdb"); // Adjust according to your database credentials

if (!isset($_GET['id']) || empty($_GET['id'])) {
    $_SESSION['error'] = 'Error: Missing or invalid ID.';
    header("Location: index.php?page=jabatan"); // Redirect to the Jabatan list page
    exit;
}

$id = $_GET['id'];
$query = "SELECT * FROM jabatan WHERE id = ?";

if ($stmt = mysqli_prepare($koneksi, $query)) {
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Continue with form
    } else {
        $_SESSION['error'] = 'Error: No record found with the given ID.';
        header("Location: index.php?page=jabatan");
        exit;
    }
    mysqli_stmt_close($stmt);
} else {
    $_SESSION['error'] = 'Error: Failed to prepare the SQL statement.';
    header("Location: index.php?page=jabatan");
    exit;
}
?>

<div class="container-fluid">
    <div class="row">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-3 mb-3 border-bottom">
                <h1 class="h2">Edit Jabatan</h1>
            </div>
            <?php if(isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>
            <div class="card col-md-6">
                <div class="card-header">
                    Formulir Edit Jabatan
                </div>
                <div class="card-body">
                    <form action="fungsi/edit.php?jabatan=edit" method="POST">
                        <input type="hidden" value="<?php echo htmlspecialchars($row['id']); ?>" name="id">
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo htmlspecialchars($row['jabatan']); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan"><?php echo htmlspecialchars($row['keterangan']); ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Ubah</button>
                        <a href="index.php?page=jabatan" class="btn btn-secondary"><i class="fa fa-times" aria-hidden="true"></i> Batal</a>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>
