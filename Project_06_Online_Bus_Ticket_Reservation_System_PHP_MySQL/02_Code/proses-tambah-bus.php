<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){

    // ambil data dari formulir
    $idbus = $_POST["idbus"];
    $namabus = $_POST["namabus"];
    $tipekelas = $_POST["tipekelas"];
    $totalkursi = $_POST["totalkursi"];
    
    

    // buat query
    $sql = "INSERT INTO tabel_bus (id_bus, nama_bus, tipe_kelas, total_kursi) VALUE ('$idbus', '$namabus', '$tipekelas', '$totalkursi')";
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