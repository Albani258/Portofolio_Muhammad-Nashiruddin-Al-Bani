<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){

    // ambil data dari formulir
    $IDJadwal = $_POST["idjadwal"];
    $IDbus = $_POST["idbus"];
    $Kotakeberangkatan = $_POST["kotakeberangkatan"];
    $Tanggalkeberangkatan = $_POST["tglkeberangkatan"];
    $Waktukeberangkatan = $_POST["waktukeberangkatan"];
    $KotaTujuan = $_POST["kotatujuan"];
    $TanggalTiba = $_POST["tgltiba"];
    $WaktuTiba = $_POST["waktutiba"];
    $HargaTiket = $_POST["hargatiket"];

    // buat query
    $sql = "INSERT INTO `tabel_jadwal` (`id_jadwal`, `id_bus`, `kota_keberangkatan`, `tgl_berangkat`, `waktu_berangkat`, `kota_tujuan`, `tgl_tiba`, `waktu_tiba`, `harga_tiket`) VALUES 
    ('$IDJadwal', '$IDbus', '$Kotakeberangkatan', '$Tanggalkeberangkatan', '$Waktukeberangkatan', '$KotaTujuan', '$TanggalTiba', '$WaktuTiba', '$HargaTiket')";
    
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query  != null && $query) {
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