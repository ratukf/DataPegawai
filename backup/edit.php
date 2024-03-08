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

// Mengambil id pegawai dari query string
$idPegawai = isset($_GET['id']) ? $_GET['id'] : null;

// Mempersiapkan query untuk mengambil data pegawai
$sql = "SELECT id, nama, posisi, email, no_wa FROM pegawai WHERE id = ?";

$stmt = $conn->prepare($sql);

if(!$stmt){
    echo "Error preparing statement: " . mysqli_error($conn);
    exit;
}

$stmt->bind_param("i", $idPegawai);
$stmt->execute();

$result = $stmt->get_result();
$pegawai = $result->fetch_assoc();

if ($result->num_rows == 0) {
    echo "Tidak ada pegawai dengan ID tersebut.";
} else {
    echo "Pegawai dengan ID tersebut ada.";
}

// Cek apakah ada data pegawai yang ditemukan
if ($pegawai === null) {
    // Jika tidak ada data, tampilkan pesan atau atur $pegawai ke array default
    $pegawai = ['id' => '', 'nama' => '', 'posisi' => '', 'email' => '', 'no_wa' => ''];
    $pesanError = "Tidak ada data pegawai yang ditemukan dengan ID tersebut.";

    // Anda juga bisa melakukan redirect atau menampilkan pesan error
} else {
    $pesanPemberitahuan = "Data pegawai dengan ID tersebut ditemukan";

}

$stmt->close();
$conn->close();
?>
