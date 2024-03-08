<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Selamat Datang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <script src="assets/js/script.js"></script>
  <!-- Fungsi untuk menyembunyikan laman login saat tombol login diklik -->
  <script>
    window.addEventListener('DOMContentLoaded', (event) => {
      if (new URLSearchParams(window.location.search).get('loginUser') === 'failed') {
        document.getElementById('home').style.display = 'none';
        document.getElementById('containerLoginUser').style.display = 'block';
      } else if (new URLSearchParams(window.location.search).get('loginAdmin') === 'failed') {
        document.getElementById('home').style.display = 'none';
        document.getElementById('containerLoginAdmin').style.display = 'block';
      }
    });
  </script>
</head>

<body class="index">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg d-flex align-items-center h-100 shadow-lg">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h4 class="m-0 py-2">PT. MAJU BERSAMA</h4>
        </div>
      </div>
    </div>
  </nav>

  <!-- Container -->
  <div class="container" id="home">
    <div class="row mt-5 mb-5 d-flex justify-content-center w-100">
      <div class="col-md-6">
        <div class="welcome-greeting text-center">
          <h2 class="pt-5">
            Selamat Datang <br />
            Pegawai PT. MAJU BERSAMA
          </h2>
        </div>
      </div>
    </div>
    <div class="row mb-5 d-flex justify-content-center w-100">
      <div class="col-md-3 d-flex flex-column">
        <button type="button" class="btn btn-primary mb-3" id="loginUser" onclick="showLoginContainer('user')">
          Login user
        </button>
        <button type="button" class="btn btn-primary" id="loginAdmin" onclick="showLoginContainer('admin')">
          Login admin
        </button>
      </div>
    </div>
  </div>

  <!-- Login user -->
  <div class="container mt-5 mb-5" id="containerLoginUser">
    <div class="row d-flex justify-content-center w-100">
      <div class="col-md-6">
        <div class="card p-4 mb-5">
          <div class="card-body">
            <h4 class="card-title text-center">Login user</h4>
            <form method="post" action="loginUser.php" id="formLoginUser">
              <label for="emailUser" class="mb-2">Email</label><br />
              <input type="text" name="emailUser" id="emailUser" placeholder="Masukan email anda" class="form-control"
                required /><br />
              <label for="passwordUser" class="mb-2">Password</label><br />
              <input type="password" name="passwordUser" id="passwordUser" placeholder="Masukkan password anda"
                class="form-control" required /><br />
              <div class="text-center">
                <button type="submit" class="btn btn-primary">
                  Login user
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <a href="index.php"> <button type="button" class="btn btn-primary mb-3">
        Kembali
      </button></a>
  </div>

  <!-- Login admin -->
  <div class="container mt-5 mb-5" id="containerLoginAdmin">
    <div class="row d-flex justify-content-center w-100">
      <div class="col-md-6">
        <div class="card p-4 mb-5">
          <div class="card-body">
            <h4 class="card-title text-center">Login admin</h4>
            <form method="post" action="loginAdmin.php" id="formLoginAdmin">
              <label for="emailAdmin" class="mb-2">Email</label><br />
              <input type="text" name="emailAdmin" id="emailAdmin" placeholder="Masukan email anda" class="form-control"
                required /><br />
              <label for="passwordAdmin" class="mb-2">Password</label><br />
              <input type="password" name="passwordAdmin" id="passwordAdmin" placeholder="Masukkan password anda"
                class="form-control" required /><br />
              <div class="text-center">
                <button type="submit" class="btn btn-primary">
                  Login admin
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <a href="index.php"> <button type="button" class="btn btn-primary mb-3">
        Kembali
      </button></a>
  </div>
</body>

</html>