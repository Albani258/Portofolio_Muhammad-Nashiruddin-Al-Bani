<?php

include("config.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $idbus = $_POST["idbus"];
    $tipekelas = $_POST["tipekelas"];
    $totalkursi = $_POST["totalkursi"];
    $namabus = $_POST["namabus"];

    // buat query update
    $sql = "UPDATE tabel_bus SET id_bus='$idbus', tipe_kelas='$tipekelas', total_kursi='$totalkursi', nama_bus='$namabus' WHERE id_bus='$idbus'";
    $query = mysqli_query($db, $sql);
    
    // apakah query update berhasil?
    if( $query!= null && $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: list-bus.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }

} else {
    die("Akses dilarang...");
}
?>