<?php
require_once 'Crud.php';

$crud = new Crud();

// Handle form submission for creating a new entry
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate input data
    $jabatan = isset($_POST['jabatan']) ? htmlspecialchars($_POST['jabatan']) : '';
    $keterangan = isset($_POST['keterangan']) ? htmlspecialchars($_POST['keterangan']) : '';

    // Insert the data into the database
    if (!empty($jabatan) && !empty($keterangan)) {
        $crud->create($jabatan, $keterangan);
    }
}

// Handle deletion of an entry
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    // Sanitize and validate the ID parameter
    $id = intval($_GET['id']);

    // Delete the entry from the database
    $crud->delete($id);
}

// Retrieve all entries from the database
$tampil = $crud->read();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Jabatan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#tambahModal">Tambah</button>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Jabatan</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (!empty($tampil)) {
            foreach ($tampil as $show) {
                echo "<tr>";
                echo "<td>" . (isset($show['id']) ? $show['id'] : '') . "</td>";
                echo "<td>" . (isset($show['jabatan']) ? $show['jabatan'] : '') . "</td>";
                echo "<td>" . (isset($show['keterangan']) ? $show['keterangan'] : '') . "</td>";
                echo "<td>";
                echo "<a href='edit.php?id=" . (isset($show['id']) ? $show['id'] : '') . "' class='btn btn-primary btn-sm'>Edit</a>";
                echo "<a href='index.php?action=delete&id=" . (isset($show['id']) ? $show['id'] : '') . "' class='btn btn-danger btn-sm'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No data found</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jabatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="jabatan">Jabatan:</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan:</label>
                        <textarea name="keterangan" class="form-control" id="keterangan" cols="30"
                                  rows="10" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
