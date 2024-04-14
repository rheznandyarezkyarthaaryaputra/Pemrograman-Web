<?php
// submit_ticket.php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movie = $_POST['movie'];
    $tickets = $_POST['tickets'];

    // Simpan data ke session
    $_SESSION['movie'] = $movie;
    $_SESSION['tickets'] = $tickets;

    // Redirect ke halaman konfirmasi atau hasil
    header('Location: confirmation.php');
    exit();
}
?>
