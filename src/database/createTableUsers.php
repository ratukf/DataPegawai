<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "datapegawai";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$createTableUsers = "CREATE TABLE users (
    nama VARCHAR(256) NOT NULL,
    email VARCHAR(256) NOT NULL,
    katasandi VARCHAR(256) NOT NULL,
    no_wa VARCHAR (256) NOT NULL,
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY
)";

if (mysqli_query($conn, $createTableUsers)) {
    echo "Table users berhasil dibuat\n";
} else {
    echo "Table users gagal dibuat: " . mysqli_error($conn) . "\n";
}

mysqli_close($conn);

?>