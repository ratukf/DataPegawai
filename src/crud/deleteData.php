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

// Mendapatkan ID dari AJAX
$id = $_POST['id'];

// SQL untuk menghapus pegawai
$sql = "DELETE FROM pegawai WHERE id = $id";

// Eksekusi query
if (mysqli_query($conn, $sql)) {
    echo 'success';
} else {
    echo 'error: ' . mysqli_error($conn);
}

// Tutup koneksi
mysqli_close($conn);
?>
