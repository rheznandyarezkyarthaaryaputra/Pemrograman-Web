// ... jQuery sebelumnya ...

if (nama === "") {
    $("#nama-error").text("Nama harus diisi.");
    valid = false;
} else {
    $("#nama-error").text("");
}

// Kode baru untuk validasi password
var password = $("#password").val();
if (password.length < 8) {
    $("#password-error").text("Password harus minimal 8 karakter.");
    valid = false;
} else {
    $("#password-error").text("");
}

// ... jQuery setelahnya ...
