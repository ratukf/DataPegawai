<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "dataPegawai";

# Buat koneksi ke server
$conn = mysqli_connect($servername, $username, $password);

# Error handling
if (!$conn) {
    die("Koneksi gagal:" . mysqli_connect_error());
}

# Membuat query
$createDb = "CREATE DATABASE $dbname";
if (mysqli_query($conn, $createDb)) {
    echo "Database berhasil dibuat\n";
} else {
    echo "Database tidak berhasil dibuat: " . mysqli_error($conn) . "\n";
}

# Menutup koneksi
mysqli_close($conn);

?>