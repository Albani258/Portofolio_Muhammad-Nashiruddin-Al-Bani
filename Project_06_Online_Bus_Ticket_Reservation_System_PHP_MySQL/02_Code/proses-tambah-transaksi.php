<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?

if(isset($_POST['daftar'])){

    // ambil data dari formulir 
    $IDTiket = $_POST["idtiket"];
    $IDJadwal = $_POST["idjadwal"];
    $IDPenumpang = $_POST["idpenumpang"];
    $JumlahTiket = $_POST["qty"];

    $query = mysqli_query($db, "SELECT tabel_jadwal.harga_tiket, tabel_pemesanan_tiket.id_tiket FROM tabel_jadwal, tabel_pemesanan_tiket WHERE tabel_jadwal.id_jadwal='$IDJadwal'");
    $harga = mysqli_fetch_array($query);

    $HargaTiketAkhir = $harga[0]*$JumlahTiket;
    $Status = $_POST["status"];

    
    

    // buat query
    $sql = "INSERT INTO `tabel_pemesanan_tiket` (`id_tiket`, `id_jadwal`, `id_penumpang`, `tgl_pesan`, `qty`, `harga_tiket_akhir`, `status`) VALUES ('$IDTiket', '$IDJadwal', '$IDPenumpang', current_timestamp(), '$JumlahTiket', '$HargaTiketAkhir','$Status')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query != null && $query ) {
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