// -------------------------------------------------- //
// Homepage
// -------------------------------------------------- //

// Variabel global
var activePage;

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

function back(activePage) {
    document.getElementById("home").style.display = "block";
    if (activePage == "loginUser") {
        document.getElementById("containerLoginUser").style.display = "none";
    } else {
        document.getElementById("containerLoginAdmin").style.display = "none";
    }
}