<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){

    // ambil data dari formulir
    $idadmin = $_POST["idadmin"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $namaadmin = $_POST["namaadmin"];
    

    // buat query
    $sql = "INSERT INTO tabel_admin (id_admin, username, `password`, nama_admin) VALUE ('$idadmin', '$username', '$password','$namaadmin')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: index.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>