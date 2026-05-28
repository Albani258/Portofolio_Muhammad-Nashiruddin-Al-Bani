<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){

    // ambil data dari formulir
    $IDPenumpang = $_POST["idpenumpang"];
    $NamaPenumpang = $_POST["namapenumpang"];
    $NomorTelepon = $_POST["notelepon"];
    $Email = $_POST["email"];
    

    // buat query
    $sql = "INSERT INTO tabel_penumpang (id_penumpang, nama_penumpang, no_telepon, email_penumpang) VALUE ('$IDPenumpang', '$NamaPenumpang', '$NomorTelepon', '$Email')";
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