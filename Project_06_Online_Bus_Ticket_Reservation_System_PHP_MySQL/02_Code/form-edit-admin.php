<?php
include("config.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location:list-admin.php');
}

//ambil id dari query string
$id = $_GET['id'];
// buat query untuk ambil data dari database
$sql = "SELECT * FROM tabel_admin WHERE id_admin='$id'";
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
    <title>Formulir Edit Admin | PT GOING</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
    <header>
        <h3>Formulir Edit Admin</h3>
    </header>

    <form action="proses-edit-admin.php" method="POST">
        <fieldset>
        <input type="hidden" name="id" value="<?php echo $getData['id'] ?>" />

        <p>
            <label for="idadmin">id admin: </label>
            <input type="text" name="idadmin" placeholder="id admin" value="<?php echo $getData['id_admin'] ?>" />
        </p>
        <p>
            <label for="username">username: </label>
            <input type="username" id="username" name="username" placeholder="username" value="<?php echo $getData['username'] ?>" />
        </p>
        <p>
            <label for="password">password: </label>
            <input type="password" id="password" name="password" placeholder="password" value="<?php echo $getData['password'] ?>" />
        </p>
        <p>
            <label for="namaadmin">nama admin: </label>
            <input type="text" name="namaadmin" placeholder="nama admin" value="<?php echo $getData['nama_admin'] ?>" />
        </p>
        <p>
            <input type="submit" value="Simpan" name="simpan" />
        </p>

        </fieldset>


    </form>
    </body>
</html>