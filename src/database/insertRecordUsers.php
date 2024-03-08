<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "datapegawai";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$insertRecordUsers = "INSERT INTO users (nama, email, katasandi, no_wa) VALUES ('user', 'user@gmail.com', '123', '081234567890')";

if (mysqli_query($conn, $insertRecordUsers)) {
    echo "Record data users berhasil dimasukan\n";
} else {
    echo "Record data users gagal dimasukan: " . mysqli_error($conn) . "\n";
}

mysqli_close($conn);

?>