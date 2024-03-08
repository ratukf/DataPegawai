<?php
session_start();

$_SESSION['emailUser'] = $emailUser;
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "datapegawai";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Menyimpan input ke dalam variabel
$emailUser = $_POST['emailUser'];
$passwordUser = $_POST['passwordUser'];

// Mencegah SQL injection
$emailUser = mysqli_real_escape_string($conn, $emailUser);
$passwordUser = mysqli_real_escape_string($conn, $passwordUser);

// Query untuk mengambil kolom email dan katasandi yang cocok
$loginUser = "SELECT * FROM users WHERE email = '$emailUser' AND katasandi = '$passwordUser'";

// Menjalankan query
$result = mysqli_query($conn, $loginUser);

// Cek kecocokan hasil
if (mysqli_num_rows($result) > 0 ) {
    // Jika ada, simpan info ke session
    $_SESSION['loggedinUser'] = true;
    $_SESSION['emailUser'] = $emailUser;
    // Mengarahkan ke laman user
    header("Location: pages/lamanUser.php");
} else {
    // Jika tidak ada, tampilkan pesan error
    echo "<script>alert('Login gagal: Email atau password tidak valid.'); window.location='index.php?loginUser=failed'</script>";
}

mysqli_close($conn);

?>