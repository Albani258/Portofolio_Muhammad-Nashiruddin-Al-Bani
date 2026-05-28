<?php
include("config.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location:list-transaksi.php');
}

//ambil id dari query string
$id = $_GET['id'];
// buat query untuk ambil data dari database
$sql = "SELECT * FROM tabel_pemesanan_tiket WHERE id_tiket='$id'";
$query = mysqli_query($db,$sql);



// jika data yang di-edit tidak ditemukan
if (!$query) {
    die("terjadi kesalahan teknis...");
}

$test = mysqli_num_rows($query);

if(!$test) die("data tidak ditemukan...");

$getData = mysqli_fetch_assoc($query);

?>



<!DOCTYPE html>
<html>
<head>
    <title>Formulir Edit Pemesanan| PT GOING</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
    <header>
        <h3>Formulir Edit Pemesanan</h3>
    </header>

    <form action="proses-edit-transaksi.php" method="POST">
        <fieldset>
        <input type="hidden" name="id" value="<?php echo $getData['id'] ?>" />

        <p>
            <label for="idtiket">id tiket: </label>
            <input type="text" name="idtiket" placeholder="idtiket" value="<?php echo $getData['id_tiket'] ?>" />
        </p>
        <p>
            <label for="idjadwal">id jadwal: </label>
            <input type="text" name="idjadwal" placeholder="idjadwal" value="<?php echo $getData['id_jadwal'] ?>" />
        </p>
        <p>
            <label for="idpenumpang">id penumpang: </label>
            <input type="text" name="idpenumpang" placeholder="idpenumpang" value="<?php echo $getData['id_penumpang'] ?>" />
        </p>
        <p>
            <label for="tglpesan">tgl pesan: </label>
            <input type="text" name="tglpesan" placeholder="tglpesan" value="<?php echo $getData['tgl_pesan'] ?>" />
        </p>
        <p>
            <label for="qty">qty: </label>
            <input type="text" name="qty" placeholder="qty" value="<?php echo $getData['qty'] ?>" />
        </p>
        <p>
            <label for="hargatiketakhir">harga tiket akhir: </label>
            <input type="text" name="hargatiketakhir" placeholder="hargatiketakhir" required="required" value="<?php echo $getData['harga_tiket_akhir'] ?>" readonly/>
        </p>
        <p>
            <label for="status">status: </label>
            <input type="text" name="status" placeholder="status" value="<?php echo $getData['status'] ?>" />
        </p>
        <p>
            <input type="submit" value="Simpan" name="simpan" />
        </p>

        </fieldset>


    </form>
    </body>
</html>