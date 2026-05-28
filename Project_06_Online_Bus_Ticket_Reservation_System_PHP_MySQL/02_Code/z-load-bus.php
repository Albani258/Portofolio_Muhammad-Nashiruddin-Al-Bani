<?php
include 'config.php';
$idbus = $_POST['idbus'];
$query = mysqli_query($db, "SELECT nama_bus FROM  tabel_bus WHERE id_bus='$idbus'");
$namabus = mysqli_fetch_array($query);

while($namabus[0]) {
   echo '<input value="'.$namabus[0].'">'.$namabus[0].'</input>'
}
?>