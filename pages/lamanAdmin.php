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

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Laman Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="../assets/css/style.css" />
  <script src="../assets/js/script.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Script konfirmasi delete data pegawai  -->
  <script>
    $(document).ready(function () {
      $('.deleteBtn').click(function () {
        var tr = $(this).closest('tr');
        var id = tr.find('.id').text(); // Ambil ID dari baris

        if (confirm('Apakah anda yakin akan menghapus ini?')) {
          $.ajax({
            url: '../src/crud/deleteData.php',
            type: 'POST',
            data: { id: id },
            success: function (response) {
              // Jika berhasil, hapus baris dari tabel
              if (response == 'success') {
                tr.fadeOut(500, function () {
                  $(this).remove();
                });
              } else {
                alert('Gagal menghapus data.');
              }
            }
          });
        }
      });
    });
  </script>
</head>

<body class="lamanAdmin">
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
  <div class="mainContent row w-100 m-0">
    <!-- Sidebar -->
    <div class="sidebar col-md-3 mx-0 shadow-lg">
      <div class="menuSidebar p-4">
        <div class="row py-3">
          <a href="javascript:showLamanAdmin('data')" id="dataLink" class="link-menu">
            <h4 id="homeMenu">Data pegawai</h4>
          </a>
        </div>
        <div class="row py-3">
          <a href="javascript:showLamanAdmin('edit')" id="editLink" class="link-menu underline-none">
            <h4 id="profilMenu">Edit data pegawai</h4>
          </a>
        </div>
        <div class="row py-3">
          <a href="javascript:showLamanAdmin('tambah')" id="tambahLink" class="link-menu underline-none">
            <h4 id="dataPegawaiMenu">Tambah data pegawai</h4>
          </a>
        </div>
      </div>
    </div>

    <!-- Body -->
    <div class="body col-md-9 px-5 mt-5 mb-5">
      <!-- Data pegawai laman admin -->
      <div class="row dataPegawaiLamanAdmin mb-5" id="dataPegawaiLamanAdmin">
        <h2 class="mb-5">Data pegawai</h2>
        <div class="card p-3 shadow border-0">
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Posisi</th>
                  <th scope="col">Email</th>
                  <th scope="col">No. WA</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $dataPegawai = 'SELECT id, nama, posisi, email, no_wa FROM pegawai';

                $result = mysqli_query($conn, $dataPegawai);

                if (!$result) {
                  die("Gagal mengambil data pegawai: " . mysqli_error($conn));
                }

                while ($row = mysqli_fetch_assoc($result)) {
                  echo '
                                  <tr>
                                    <td>' . $row['id'] . '</td>
                                    <td>' . $row['nama'] . '</td>
                                    <td>' . $row['posisi'] . '</td>
                                    <td>' . $row['email'] . '</td>
                                    <td>' . $row['no_wa'] . '</td>
                                  </tr>
                                  ';
                }
                ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Edit data pegawai laman admin -->
      <div class="row editLamanAdmin mb-5 underline-none" id="editLamanAdmin">
        <h2 class="mb-5">Edit data pegawai</h2>
        <div class="card p-3 shadow border-0">
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Aksi</th>
                  <th scope="col">ID</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Posisi</th>
                  <th scope="col">Email</th>
                  <th scope="col">No. WA</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $dataPegawai = 'SELECT id, nama, posisi, email, no_wa FROM pegawai';

                $result = mysqli_query($conn, $dataPegawai);

                if (!$result) {
                  die("Gagal mengambil data pegawai: " . mysqli_error($conn));
                }

                while ($row = mysqli_fetch_assoc($result)) {
                  echo '
                  <tr>
                  <td>
                  <a href="lamanAdminEdit.php?id=' . $row['id'] . '"><button type="button" class="btn btn-primary mb-2 editBtn">Edit</button></a>
                    <button type="button" class="btn btn-danger mb-2 deleteBtn")">Hapus</button>
                  </td>
                  <td class="id">' . $row['id'] . '</td>
                  <td class="nama">' . $row['nama'] . '</td>
                  <td class="posisi">' . $row['posisi'] . '</td>
                  <td class="email">' . $row['email'] . '</td>
                  <td class="no_wa">' . $row['no_wa'] . '</td>
                </tr>';
                }
                mysqli_close($conn);
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Tambah data pegawai laman admin -->
      <div class="row tambahLamanAdmin mb-5 underline-none" id="tambahLamanAdmin">
        <h2 class="mb-5">Tambah data pegawai</h2>
        <div class="card p-5 shadow border-0">
          <div class="card-body">
            <form method="post" action="../src/crud/createData.php" id="tambahPegawai">
              <div class="mb-4">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan nama pegawai" />
              </div>
              <div class="mb-4">
                <label for="posisi" class="form-label">Posisi</label>
                <input type="text" name="posisi" id="posisi" class="form-control"
                  placeholder="Masukan posisi pegawai" />
              </div>
              <div class="mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Masukan email pegawai" />
              </div>
              <div class="mb-4">
                <label for="no" class="form-label">No. WA</label>
                <input type="text" name="no" id="no" class="form-control" placeholder="Masukan no. WA pegawai" />
              </div>
              <div class="d-flex justify-content-center">
                <button type="submit" class="btn buttonTambah">
                  Tambah data pegawai
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>