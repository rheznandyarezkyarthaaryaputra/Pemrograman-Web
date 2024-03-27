<?php
// Check if the form's submit button is clicked and 'input' is set
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['input'])) {
    // Retrieve the input from the form and sanitize it
    $input = $_POST['input'];
    $sanitized_input = htmlentities($input, ENT_QUOTES, 'UTF-8');
    
    // Use the sanitized input (e.g., store it in a database, display it on a webpage, etc.)
    // For example, here we just echo it
    echo $sanitized_input;
} else {
    // Handle the case where the input is not set (e.g., display an error, redirect, etc.)
    echo 'Input is not set.';
}

// Rest of your PHP script...

// Memeriksa apakah input adalah email yang valid
$email = $_POST['email'];
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
// Lanjutkan dengan pengolahan email yang aman
} else {
// Tangani input yang tidak valid
}
?>