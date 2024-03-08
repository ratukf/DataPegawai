<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "datapegawai";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$createTableAdmins = "CREATE TABLE admins (
    nama VARCHAR(256) NOT NULL,
    email VARCHAR(256) NOT NULL,
    katasandi VARCHAR(256) NOT NULL,
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY
)";

if (mysqli_query($conn, $createTableAdmins)) {
    echo "Table admins berhasil dibuat\n";
} else {
    echo "Table admins gagal dibuat: " . mysqli_error($conn) . "\n";
}

mysqli_close($conn);

?>