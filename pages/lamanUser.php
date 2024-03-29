<?php
session_start();

if (!isset($_SESSION['loggedinUser']) || $_SESSION['loggedinUser'] !== true) {
  header("Location: ../index.php");
  exit;
}

$emailUser = $_SESSION['emailUser'];
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "datapegawai";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}

$akunUser = "SELECT nama, email, no_wa, id FROM users WHERE email = '$emailUser'";

$result = mysqli_query($conn, $akunUser);

if (!$result) {
  die('Gagal mengambil data akun: ' . mysqli_error($conn));
}

$dataUser = mysqli_fetch_array(($result));
$namaUser = $dataUser['nama'];
$noUser = $dataUser['no_wa'];
$idUser = $dataUser['id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Laman User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="../assets/css/style.css" />
</head>

<body class="lamanUser">
  <!-- Navbar -->
  <nav class="navbar shadow-lg">
    <div class="container">
      <div class="row w-100">
        <div class="col-md-3">
          <h4 class="m-0 py-2">PT. MAJU BERSAMA</h4>
        </div>
        <div class="col-md-6">
          <h4 class="m-0 py-2">Laman User</h4>
        </div>
        <div class="col-md-3 d-flex justify-content-end align-items-center">
          <form action="logoutUser.php" method="post">
            <button type="submit" name="logout" class="btn btn-primary">Logout</button>
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
          <a href="javascript:showLamanUser('home')" id="homeLink" class="link-menu">
            <h4 id="homeMenu">Home</h4>
          </a>
        </div>
        <div class="row py-3">
          <a href="javascript:showLamanUser('profil')" id="profilLink" class="link-menu underline-none">
            <h4 id="profilMenu">Profil</h4>
          </a>
        </div>
        <div class="row py-3">
          <a href="javascript:showLamanUser('dataPegawai')" id="dataPegawaiLink" class="link-menu underline-none">
            <h4 id="dataPegawaiMenu">Data pegawai</h4>
          </a>
        </div>
        <div class="row py-3">
          <a href="javascript:showLamanUser('akun')" id="akunLink" class="link-menu underline-none">
            <h4 id="akunMenu">Akun</h4>
          </a>
        </div>
      </div>
    </div>

    <!-- Body -->
    <div class="body col-md-9 p-5">
      <!-- Home laman user -->
      <div class="row homeLamanUser d-flex px-5" id="homeLamanUser">
        <div class="col-md-7">
          <div class="mb-5">
            <h1>PT. MAJU BERSAMA</h1>
            <p>
              PT Maju Bersama adalah sebuah perusahaan yang bergerak di bidang
              teknologi informasi dan penyedia solusi digital. Didirikan pada
              tahun 2010, PT Maju Bersama telah berkembang menjadi salah satu
              pemimpin industri di Indonesia, dengan fokus pada inovasi dan
              pelayanan prima kepada pelanggan. Kami menyediakan berbagai
              layanan, mulai dari pengembangan perangkat lunak, sistem
              informasi manajemen, hingga konsultasi IT untuk membantu klien
              memaksimalkan potensi teknologi dalam operasional bisnis mereka.
            </p>
          </div>
          <div class="mb-5">
            <h1>Visi</h1>
            <p>
              Menjadi perusahaan teknologi informasi terdepan yang mendorong
              transformasi digital di Indonesia dan Asia Tenggara, dengan
              berfokus pada inovasi berkelanjutan dan pelayanan prima.
            </p>
          </div>
          <div class="mb-5">
            <h1>Misi</h1>
            <ol>
              <li>
                Menyediakan solusi teknologi informasi yang inovatif dan
                berkualitas.
              </li>
              <li>
                Membantu klien dalam mengoptimalkan proses bisnis melalui
                pemanfaatan teknologi.
              </li>
              <li>
                Mendorong pertumbuhan ekosistem digital di Indonesia dan Asia
                Tenggara melalui kerjasama strategis dengan berbagai pihak.
              </li>
              <li>
                Membangun sumber daya manusia yang kompeten dan profesional di
                bidang teknologi informasi.
              </li>
            </ol>
          </div>
        </div>
        <div class="col-md-5">
          <img class="img-fluid" src="../assets/imgs/boy-standing.png" alt="boy-standing.png" />
        </div>
      </div>

      <!-- Profil laman user -->
      <div class="row profilLamanUser px-5" id="profilLamanUser">
        <div class="col-md-12">
          <img src="../assets/imgs/company.jpg" alt="company" class="img img-fluid mb-3" />
          <div class="row">
            <div class="col-md-8">
              <h1>Sejarah</h1>
              <p>
                PT Maju Bersama didirikan pada tahun 2010, berawal dari visi
                lima pengusaha muda yang ingin menyediakan solusi teknologi
                informasi yang inovatif dan berkelanjutan di Indonesia. Dengan
                latar belakang yang kuat di bidang teknologi dan bisnis,
                mereka memulai operasi di sebuah ruang kerja kecil di Jakarta.
                Fokus pada pengembangan software dan aplikasi mobile,
                perusahaan ini cepat mendapatkan pengakuan karena komitmennya
                terhadap kualitas dan inovasi.
              </p>
              <h1>Pencapaian dan Milestone</h1>
              <ul>
                <li>
                  <span class="bold">2012: </span>Merilis aplikasi mobile
                  pertama yang mendapat penghargaan sebagai "Inovasi Terbaik"
                  pada konferensi Teknologi Asia Tenggara.
                </li>
                <li>
                  <span class="bold">2014: </span>Memperluas layanan ke solusi
                  cloud dan big data, menjadikan PT Maju Bersama sebagai
                  pionir di bidangnya.
                </li>
                <li>
                  <span class="bold">2016: </span>Mendapatkan sertifikasi ISO
                  9001 untuk manajemen kualitas dan ISO 27001 untuk manajemen
                  keamanan informasi.
                </li>
                <li>
                  <span class="bold">2018: </span>Membuka kantor cabang
                  pertama di Singapura sebagai bagian dari ekspansi ke pasar
                  Asia Tenggara.
                </li>
                <li>
                  <span class="bold">2020: </span>Berhasil mengembangkan
                  platform AI yang digunakan oleh lebih dari 100 perusahaan di
                  Indonesia untuk meningkatkan efisiensi operasional.
                </li>
                <li>
                  <span class="bold">2022: </span>Merayakan 12 tahun
                  keberhasilan dengan meluncurkan inisiatif CSR "Teknologi
                  untuk Pendidikan" yang mendukung digitalisasi
                  sekolah-sekolah di daerah terpencil.
                </li>
              </ul>
              <h1>Tim Kepemimpinan</h1>
              <ul>
                <li>
                  <span class="bold">Rahmat Hidayat, </span>CEO dan
                  Co-founder: Dengan latar belakang di bidang teknik komputer,
                  Rahmat adalah otak di balik strategi inovasi produk.
                  Pengalamannya yang luas di Silicon Valley membentuk visi
                  globalnya untuk PT Maju Bersama.
                </li>
                <li>
                  <span class="bold">Linda Kusuma, </span>CTO: Ahli di cloud
                  computing dan big data, Linda telah memimpin tim pengembang
                  untuk menciptakan solusi yang memenangkan berbagai
                  penghargaan.
                </li>
                <li>
                  <span class="bold">Andi Setiawan, </span>CFO: Andi memiliki
                  lebih dari 15 tahun pengalaman di perbankan dan keuangan.
                  Dia bertanggung jawab atas strategi keuangan dan investasi
                  perusahaan.
                </li>
                <li>
                  <span class="bold">Maria Anggraini, </span>CMO: Dengan bakat
                  alami di pemasaran digital dan branding, Maria telah
                  mengubah cara PT Maju Bersama berkomunikasi dengan pasar,
                  memperluas jangkauan perusahaan secara signifikan.
                </li>
                <li>
                  <span class="bold">Bayu Ariesto, </span>COO: Mengawasi
                  operasional harian, Bayu adalah kunci dalam menjaga
                  efisiensi dan kepuasan pelanggan pada level tertinggi.
                </li>
              </ul>
              <p>
                Dengan tim kepemimpinan yang kuat dan dedikasi terhadap
                inovasi, PT Maju Bersama terus berupaya menjadi pemimpin dalam
                teknologi informasi dan solusi digital, tidak hanya di
                Indonesia tetapi juga di kancah internasional.
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- Data pegawai laman user -->
      <div class="row dataPegawaiLamanUser" id="dataPegawaiLamanUser">
        <h2 class="mb-3">Data pegawai</h2>
        <div class="card shadow">
          <div class="card-body p-2">
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
                  die ("Gagal mengambil data pegawai: " . mysqli_error($conn));
                }

                while ($row = mysqli_fetch_assoc($result)) {
                  echo'
                  <tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['nama'].'</td>
                    <td>'.$row['posisi'].'</td>
                    <td>'.$row['email'].'</td>
                    <td>'.$row['no_wa'].'</td>
                  </tr>
                  ';
                }
                
                mysqli_close($conn);
                ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Akun laman user -->
      <div class="row akunLamanUser px-5" id="akunLamanUser">
        <h2 class="mb-3">Akun</h2>
        <div class="card shadow">
          <div class="card-body p-4">
            <h4>Nama user: <span class="mb-3 namaUser" id="namaUser">
                <?php echo $namaUser ?>
              </span></h4>
            <div class="border mb-3"></div>
            <p>Email: <span class="emailUser" id="emailUser">
                <?php echo $emailUser ?>
              </span></p>
            <p>No. WA: <span class="noUser" id="noUser">
                <?php echo $noUser ?>
              </span></p>
            <p>ID: <span class="idUser" id="idUser">
                <?php echo $idUser ?>
              </span></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="../assets/js/script.js"></script>

</html>