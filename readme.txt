# PROGRAM MANAJEMEN DATA PEGAWAI

Program ini dikembangkan menggunakan bahasa pemrograman HTML, CSS, JavaScript, dan PHP.
Program ini menggunakan preprocessor SASS, framework bootstrap, dan server localhost.

FITUR-FITUR:
- Laman login user dan login admin
- Tampilan data pegawai
- CRUD (create, read, update, delete) data pegawai

INSTALASI:
- Download code zip
- Ekstrak folder 'DataPegawai' ke local server (C:\xampp\htdocs)
- Jalankan Apache dan MySQL pada XAMPP Control Panel
- Buka http://localhost/datapegawai/ pada browser
- Tampilan index.php akan muncul

Setelah tahap instalasi selesai, database dan tabel data belum dibuat, sehingga fitur-fitur belum bekerja.
Lakukan tahap inisiasi data terlebih dulu.

INISIASI DATA:
- Di folder 'DataPegawai', pergi ke folder database (ada di folder src)
- Jalankan 'createDb.php'
- Jalankan 'createTableUsers.php', 'createTableAdmins.php', dan 'createTablePegawai.php'
- Jalankan 'insertRecordUsers.php', 'insertRecordAdmins.php', dan 'insertRecordPegawai.php'
- Database dan tabel berhasil dibuat

LOGIN USER:
- email: user@gmail.com
- password: 123

LOGIN ADMIN:
- email: admin@gmail.com
- password: 123
