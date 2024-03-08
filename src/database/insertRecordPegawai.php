<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "datapegawai";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$insertRecordPegawai = "INSERT INTO pegawai (nama, posisi, email, no_wa) 
                        VALUES ('Andi Rukmana', 'Fullstack Developer', 'andirukmana@gmail.com', '081000000000'), 
                                ('Bambang', 'Frontend Developer', 'bambang@gmail.com', '081111111111'), 
                                ('Cantika Putri', 'Content Creator', 'cantikaputri@gmail.com', '081222222222'), 
                                ('Dimas Herdiansyah', 'Backend Developer', 'dimasherdiansyah@gmail.com', '081333333333'), 
                                ('Efendy', 'Devops Engineer', 'efendy@gmail.com', '081444444444'), 
                                ('Fitri Oktapia', 'UI Designer', 'fitrioktapia@gmail.com', '081555555555'), 
                                ('Gilang Ramadhan', 'Fullstack Developer', 'gilangramadhan@gmail.com', '081666666666'), 
                                ('Hanifa', 'UX Designer', 'hanifa@gmail.com', '081777777777'), 
                                ('Ilham Saputra', 'Digital Marketer', 'ilhamsaputra@gmail.com', '081888888888'), 
                                ('Jeslyn', 'Project Manager', 'jeslyn@gmail.com', '081999999999')";

if (mysqli_query($conn, $insertRecordPegawai)) {
    echo "Record data pegawai berhasil dimasukan\n";
} else {
    echo "Record data pegawai gagal dimasukan: " . mysqli_error($conn) . "\n";
}

mysqli_close($conn);

?>