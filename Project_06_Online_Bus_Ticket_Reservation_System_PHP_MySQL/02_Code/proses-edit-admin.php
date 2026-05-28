<?php

include("config.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $idadmin = $_POST['idadmin'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $namaadmin = $_POST['namaadmin'];

    // buat query update
    $sql = "UPDATE tabel_admin SET id_admin='$idadmin', username='$username', `password`='$password',nama_admin='$namaadmin' WHERE id_admin='$idadmin'";
    echo "SQL".$sql;
    $query = mysqli_query($db, $sql);
    
    // apakah query update berhasil?
    if( $query != null && $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: list-admin.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }
    $test=mysqli_num_rows($query);
    print_r($test);
    if(!$test) die("data tidak ditemukan");
} else {
    die("Akses dilarang...");
}
?>