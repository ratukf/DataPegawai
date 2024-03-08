<?php
session_start();

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "datapegawai";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Menyimpan input ke dalam variabel
$emailAdmin = $_POST['emailAdmin'];
$passwordAdmin = $_POST['passwordAdmin'];

// Mencegah SQL injection
$emailAdmin = mysqli_real_escape_string($conn, $emailAdmin);
$passwordAdmin = mysqli_real_escape_string($conn, $passwordAdmin);

// Query untuk mengambil kolom email dan katasandi yang cocok
$loginAdmin = "SELECT * FROM admins WHERE email = '$emailAdmin' AND katasandi = '$passwordAdmin'";

// Menjalankan query
$result = mysqli_query($conn, $loginAdmin);

// Cek kecocokan hasil
if (mysqli_num_rows($result) > 0 ) {
    // Jika ada, simpan info ke session
    $_SESSION['loggedinAdmin'] = true;
    $_SESSION['emailAdmin'] = $emailAdmin;
    // Mengarahkan ke laman Admin
    header("Location: pages/lamanAdmin.php");
} else {
    // Jika tidak ada, tampilkan pesan error
    echo "<script>alert('Login gagal: Email atau password tidak valid.'); window.location='index.php?loginAdmin=failed'</script>";
}

mysqli_close($conn);

?>