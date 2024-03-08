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

$namaPegawai = $_POST['nama'];
$posisiPegawai = $_POST['posisi'];
$emailPegawai = $_POST['email'];
$no_waPegawai = $_POST['no'];

$insertPegawai = "INSERT INTO pegawai (nama, posisi, email, no_wa)
                    VALUES ('$namaPegawai', '$posisiPegawai', '$emailPegawai', '$no_waPegawai')";

$result = mysqli_query($conn, $insertPegawai);

if (!$result) {
    echo "Data pegawai gagal diinput" . mysqli_error($conn);
} else {
    echo "<script>alert('Data pegawai berhasil diinput.'); window.location='../../pages/lamanAdmin.php'</script>";
}

mysqli_close($conn);
?>
