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

function back() {
    document.getElementById("home").style.display = "block";
    if (activePage == "loginUser") {
        document.getElementById("containerLoginUser").style.display = "none";
    } else if (activePage == "loginAdmin") {
        document.getElementById("containerLoginAdmin").style.display = "none";
    }
}

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

function showLamanUser(div) {
    var elements = ['homeLamanUser', 'profilLamanUser', 'dataPegawaiLamanUser', 'akunLamanUser'];

    elements.forEach(function(elementID) {
        document.getElementById(elementID).style.transition = 'opacity 0.1s ease';
        document.getElementById(elementID).style.opacity = '0';
    });

    setTimeout(function() {
        elements.forEach(function(elementID) {
            document.getElementById(elementID).style.display = 'none';
        });

        if (div == 'profil') {
            document.getElementById('profilLamanUser').style.display = 'block';
            document.getElementById('profilLink').style.textDecoration = 'underline';
        } else if (div == 'dataPegawai') {
            document.getElementById('dataPegawaiLamanUser').style.display = 'block';
            document.getElementById('dataPegawaiLink').style.textDecoration = 'underline';
        } else if (div == 'akun') {
            document.getElementById('akunLamanUser').style.display = 'block';
            document.getElementById('akunLink').style.textDecoration = 'underline';
        } else {
            document.getElementById('homeLamanUser').style.display = 'block';
            document.getElementById('homeLink').style.textDecoration = 'underline';
        }

        setTimeout(function() {
            elements.forEach(function(elementID) {
                document.getElementById(elementID).style.opacity = '1';
            });
        }, 20);
    }, 100);
}

