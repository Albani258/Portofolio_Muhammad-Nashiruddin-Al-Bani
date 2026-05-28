<?php

include("config.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $idjadwal = $_POST['idjadwal'];
    $idbus = $_POST["idbus"];
    $kotakeberangkatan = $_POST["kotakeberangkatan"];
    $tglberangkat = $_POST["tglberangkat"];
    $waktuberangkat= $_POST['waktuberangkat'];
    $kotatujuan= $_POST['kotatujuan'];
    $tgltiba= $_POST['tgltiba'];
    $waktutiba= $_POST['waktutiba'];
    $hargatiket = $_POST['hargatiket'];
    // buat query update
    $sql = "UPDATE tabel_jadwal SET id_jadwal='$idjadwal', id_bus='$idbus', kota_keberangkatan='$kotakeberangkatan', tgl_berangkat='$tglberangkat',waktu_berangkat='$waktuberangkat',kota_tujuan='$kotatujuan',tgl_tiba='$tgltiba',waktu_tiba='$waktutiba',harga_tiket='$hargatiket' WHERE id_jadwal='$idjadwal'";
    $query = mysqli_query($db, $sql);
    
    // apakah query update berhasil?
    if( $query != null && $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: list-jadwal.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }

} else {
    die("Akses dilarang...");
}
?>