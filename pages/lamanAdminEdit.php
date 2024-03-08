<?php
session_start();

if (!isset($_SESSION['loggedinAdmin']) || $_SESSION['loggedinAdmin'] !== true) {
    header("Location: ../index.php");
    exit;
}

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "datapegawai";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$idPegawai = isset($_GET['id']) ? $_GET['id'] : '';
$_SESSION['idPegawai'] = $idPegawai;

$sql = "SELECT nama, posisi, email, no_wa FROM pegawai WHERE id = $idPegawai";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Data pegawai dengan id " . $idPegawai . " gagal ditemukan: " . mysqli_error($conn));
}

$row = mysqli_fetch_array($result);

$namaPegawai = $row['nama'];
$posisiPegawai = $row['posisi'];
$emailPegawai = $row['email'];
$no_waPegawai = $row['no_wa'];

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit data pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <script src="../assets/js/script.js"></script>
</head>

<body class="lamanAdminEdit">
    <!-- Navbar -->
    <nav class="navbar shadow-lg">
        <div class="container">
            <div class="row w-100">
                <div class="col-md-3">
                    <h4 class="m-0 py-2">PT. MAJU BERSAMA</h4>
                </div>
                <div class="col-md-6">
                    <h4 class="m-0 py-2">Laman Admin</h4>
                </div>
                <div class="col-md-3 d-flex justify-content-end align-items-center">
                    <form action="logoutAdmin.php" method="post">
                        <button type="submit" name="logout" class="btn btn-primary">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <div class="mainContent row w-100 m-0 d-flex justify-content-center">
        <!-- Body -->
        <div class="body col-md-6 px-5 mt-5 mb-5">
            <!-- Edit data pegawai -->
            <div class="row editPegawaiLamanAdmin mb-5" id="dataPegawaiLamanAdmin">
                <h2 class="mb-5">Edit data pegawai</h2>
                <div class="card p-3 shadow border-0">
                    <div class="card-body">
                        <form action="../src/crud/updateData.php" method="POST">
                            <h4 class="mb-3">ID pegawai: <span id="idPegawai">
                                    <?php echo "$idPegawai" ?>
                                </span></h4>
                            <div class="form-group mb-3">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="<?php echo "$namaPegawai" ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="posisi">Posisi</label>
                                <input type="text" class="form-control" id="posisi" name="posisi"
                                    value="<?php echo "$posisiPegawai" ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="<?php echo "$emailPegawai" ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="no_wa">No. WA</label>
                                <input type="text" class="form-control" id="no_wa" name="no_wa"
                                    value="<?php echo "$no_waPegawai" ?>" required>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary mb-3 updateButton">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <a href="lamanAdmin.php"> <button type="button" class="btn btn-primary mb-3">
                            Kembali
                        </button></a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>