<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "datapegawai";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$createTablePegawai = "CREATE TABLE pegawai (
    ID INT (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR (256) NOT NULL,
    posisi VARCHAR (256) NOT NULL,
    email VARCHAR (256) NOT NULL,
    no_wa VARCHAR (256) NOT NULL
)";

if (mysqli_query($conn, $createTablePegawai)) {
    echo "Table pegawai berhasil dibuat\n";
} else {
    echo "Table pegawai gagal dibuat: " . mysqli_error($conn) . "\n";
}

mysqli_close($conn);

?>