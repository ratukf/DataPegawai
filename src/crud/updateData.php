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

$idPegawai = $_SESSION['idPegawai'];
$namaPegawai = $_POST['nama'];
$posisiPegawai = $_POST['posisi'];
$emailPegawai = $_POST['email'];
$no_waPegawai = $_POST['no_wa'];

$updateData = "UPDATE pegawai SET nama = '$namaPegawai', posisi = '$posisiPegawai', email = '$emailPegawai', no_wa = '$no_waPegawai' WHERE id = '$idPegawai'";

$result = mysqli_query($conn, $updateData);

if (!$result) {
    die("Data pegawai gagal diupdate: " . mysqli_error($conn));
} else {
    echo "<script>alert('Data pegawai berhasil diupdate.'); window.location='../../pages/lamanAdmin.php'</script>";
}

mysqli_close($conn);
?>