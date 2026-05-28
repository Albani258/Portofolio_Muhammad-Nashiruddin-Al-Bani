<?php

include("config.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $idtiket = $_POST['idtiket'];
    $idjadwal = $_POST["idjadwal"];
    $idpenumpang = $_POST["idpenumpang"];
    $tglpesan = $_POST["tglpesan"];
    $qty= $_POST['qty'];
    $hargatiketakhir= $_POST['hargatiketakhir'];
    $status= $_POST['status'];
    // buat query update
    $sql = "UPDATE tabel_pemesanan_tiket SET id_tiket='$idtiket', id_jadwal='$idjadwal', id_penumpang='$idpenumpang', tgl_pesan='$tglpesan',qty='$qty',harga_tiket_akhir='$hargatiketakhir',`status`='$status' WHERE id_tiket='$idtiket'";
    $query = mysqli_query($db, $sql);
    
    // apakah query update berhasil?
    if( $query != null && $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: list-transaksi.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }

} else {
    die("Akses dilarang...");
}
?>