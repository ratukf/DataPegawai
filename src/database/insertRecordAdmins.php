<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "datapegawai";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$insertRecordAdmins = "INSERT INTO admins (nama, email, katasandi) VALUES ('admin', 'admin@gmail.com', '123')";

if (mysqli_query($conn, $insertRecordAdmins)) {
    echo "Record data admins berhasil dimasukan\n";
} else {
    echo "Record data admins gagal dimasukan: " . mysqli_error($conn) . "\n";
}

mysqli_close($conn);

?>