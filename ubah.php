<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login2.php");
    exit;
}

require 'new.php';

$id = $_GET["id"];
$sw = query("SELECT * FROM siswa WHERE id =$id")[0];



if (isset($_POST["submit"])) {
    
    if (ubah($_POST) > 0 ){
          echo "
          <script>
             alert('berhasil diubah');
             document.location.href = 'db.php';
          </script>     
          ";
    } else {
        echo "
          <script>
             alert('gagal diubah');
             document.location.href = 'db.php';
          </script>     
          ";
    }
    

 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>ubah</title>
</head>
<body>
<h1>tambah siswa</h1>    
<a href="db.php">kembali</a>
<form action="" method="post">
    <input type="hidden" name="id" value="<?= $sw["id"]; ?>"> 
    <ul>
        <li>
            <label for="nama">nama : </label>
            <input type="text" name="nama" id="nama" required value="<?= $sw["nama"];?>">
        </li>
        <li>
            <label for="jurusan">jurusan : </label>
            <input type="text" name="jurusan" id="jurusan" required value="<?= $sw["jurusan"];?>">
        </li>
        <li><button type="submit" name="submit">ubah</button></li>
    </ul>
</form>
</body>
</html>