<?php
include("config.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location:list-jadwal.php');
}

//ambil id dari query string
$id = $_GET['id'];
// buat query untuk ambil data dari database
$sql = "SELECT * FROM tabel_jadwal WHERE id_jadwal='$id'";
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
    <title>Formulir Edit Bus| PT GOING</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
    <header>
        <h3>Formulir Edit Bus</h3>
    </header>

    <form action="proses-edit-jadwal.php" method="POST">
        <fieldset>
        <input type="hidden" name="id" value="<?php echo $getData['id'] ?>" />

        <p>
            <label for="idjadwal">id jadwal: </label>
            <input type="text" name="idjadwal" placeholder="idjadwal" value="<?php echo $getData['id_jadwal'] ?>" />
        </p>
        <p>
            <label for="idbus">id bus: </label>
            <input type="text" name="idbus" placeholder="idbus" value="<?php echo $getData['id_bus'] ?>" />
        </p>
        <p>
            <label for="kotakeberangkatan">kota keberangkatan: </label>
            <input type="text" name="kotakeberangkatan" placeholder="kotakeberangkatan" value="<?php echo $getData['kota_keberangkatan'] ?>" />
        </p>
        <p>
            <label for="tglberangkat">tgl berangkat: </label>
            <input type="text" name="tglberangkat" placeholder="tglberangkat" value="<?php echo $getData['tgl_berangkat'] ?>" />
        </p>
        <p>
            <label for="waktuberangkat">waktu berangkat: </label>
            <input type="text" name="waktuberangkat" placeholder="waktuberangkat" value="<?php echo $getData['waktu_berangkat'] ?>" />
        </p>
        <p>
            <label for="kotatujuan">kota tujuan: </label>
            <input type="text" name="kotatujuan" placeholder="kotatujuan" value="<?php echo $getData['kota_tujuan'] ?>" />
        </p>
        <p>
            <label for="tgltiba">tgl tiba: </label>
            <input type="text" name="tgltiba" placeholder="tgltiba" value="<?php echo $getData['tgl_tiba'] ?>" />
        </p>
        <p>
            <label for="waktutiba">waktu tiba: </label>
            <input type="text" name="waktutiba" placeholder="waktutiba" value="<?php echo $getData['waktu_tiba'] ?>" />
        </p>
        <p>
            <label for="hargatiket">harga tiket: </label>
            <input type="text" name="hargatiket" placeholder="hargatiket" value="<?php echo $getData['harga_tiket'] ?>" />
        </p>
        <p>
            <input type="submit" value="Simpan" name="simpan" />
        </p>

        </fieldset>


    </form>
    </body>
</html>