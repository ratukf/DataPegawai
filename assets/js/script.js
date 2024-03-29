// -------------------------------------------------- //
// Homepage
// -------------------------------------------------- //

// Variabel global
var activePage;
var email;
var password;

// Fungsi untuk menampilkan login user atau admin
function showLoginContainer(userType) {
  document.getElementById("home").style.display = "none";
  if (userType === "user") {
    document.getElementById("containerLoginUser").style.display = "block";
    activePage = "loginUser";
  } else if (userType === "admin") {
    document.getElementById("containerLoginAdmin").style.display = "block";
    activePage = "loginAdmin";
  }
  console.log("active page: ", activePage);
}

// Fungsi untuk mengalihkan laman setelah login
function login(userType) {
  if (userType == "user") {
    email = document.getElementById("emailUser").value;
    password = document.getElementById("passwordUser").value;
    if (email && password) {
      document.getElementById("containerLoginUser").style.display = "none";
      window.location.href = "../pages/lamanUser.html";
    } else {
      console.log("Kolom email dan password harus diisi");
    }
  } else {
    email = document.getElementById("emailAdmin").value;
    password = document.getElementById("passwordAdmin").value;
    if (email && password) {
      document.getElementById("containerLoginAdmin").style.display = "none";
      window.location.href = "../pages/lamanAdmin.html";
    } else {
      console.log("Kolom email dan password harus diisi");
    }
  }
}

// Fungsi untuk menyembunyikan elemen pada laman user
function showLamanUser(div) {
  var divs = [
    "homeLamanUser",
    "profilLamanUser",
    "dataPegawaiLamanUser",
    "akunLamanUser",
  ];

  divs.forEach(function (elementID) {
    document.getElementById(elementID).style.transition = "opacity 0.2s ease";
    document.getElementById(elementID).style.opacity = "0";
  });

  setTimeout(function () {
    divs.forEach(function (elementID) {
      document.getElementById(elementID).style.display = "none";
    });

    if (div == "home") {
      document.getElementById("homeLamanUser").style.display = "block";
      document.getElementById("homeLamanUser").classList.add("d-flex");
    } else if (div == "profil") {
      document.getElementById("profilLamanUser").style.display = "block";
      document.getElementById("homeLamanUser").classList.remove("d-flex");
    } else if (div == "dataPegawai") {
      document.getElementById("dataPegawaiLamanUser").style.display = "block";
      document.getElementById("homeLamanUser").classList.remove("d-flex");
    } else if (div == "akun") {
      document.getElementById("akunLamanUser").style.display = "block";
      document.getElementById("homeLamanUser").classList.remove("d-flex");
    }

    setTimeout(function () {
      divs.forEach(function (elementID) {
        document.getElementById(elementID).style.opacity = "1";
      });
    }, 50);
  }, 200);

  const links = document.getElementsByClassName("link-menu");

  for (var i = 0; i < links.length; i++) {
    if (links[i] !== div) {
      links[i].classList.add("underline-none");
    } else {
      continue;
    }
  }
  
  if (div == 'home') {
    document.getElementById("homeLink").classList.remove("underline-none");
  } else if (div == 'profil') {
    document.getElementById("profilLink").classList.remove("underline-none");
  } else if (div == 'dataPegawai') {
    document.getElementById("dataPegawaiLink").classList.remove("underline-none");
  } else if (div == 'akun') {
    document.getElementById("akunLink").classList.remove("underline-none");
  }
}

// Fungsi untuk menyembunyikan elemen pada laman admin
function showLamanAdmin(div) {
  var divs = [
    "dataPegawaiLamanAdmin",
    "editLamanAdmin",
    "tambahLamanAdmin"
  ];

  divs.forEach(function (elementID) {
    document.getElementById(elementID).style.transition = "opacity 0.2s ease";
    document.getElementById(elementID).style.opacity = "0";
  });

  setTimeout(function () {
    divs.forEach(function (elementID) {
      document.getElementById(elementID).style.display = "none";
    });

    if (div == "data") {
      document.getElementById("dataPegawaiLamanAdmin").style.display = "block";
    } else if (div == "edit") {
      document.getElementById("editLamanAdmin").style.display = "block";
    } else if (div == "tambah") {
      document.getElementById("tambahLamanAdmin").style.display = "block";
    } 

    setTimeout(function () {
      divs.forEach(function (elementID) {
        document.getElementById(elementID).style.opacity = "1";
      });
    }, 50);
  }, 200);

  const links = document.getElementsByClassName("link-menu");

  for (var i = 0; i < links.length; i++) {
    if (links[i] !== div) {
      links[i].classList.add("underline-none");
    } else {
      continue;
    }
  }
  
  if (div == 'data') {
    document.getElementById("dataLink").classList.remove("underline-none");
  } else if (div == 'edit') {
    document.getElementById("editLink").classList.remove("underline-none");
  } else if (div == 'tambah') {
    document.getElementById("tambahLink").classList.remove("underline-none");
  }
}
