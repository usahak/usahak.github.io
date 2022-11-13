<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login2.php");
    exit;
}

require 'new.php';
// $con = mysqli_connect("localhost", "root", "", "phpdasar");

if (isset($_POST["submit"])) {
    
    if (tambah($_POST) > 0 ){
          echo "
          <script>
             alert('berhasil ditambahkan');
             document.location.href = 'db.php';
          </script>     
          ";
    } else {
        echo "
          <script>
             alert('gagal ditambahkan');
             document.location.href = 'db.php';
          </script>     
          ";
    }
    

 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
<h1>tambah siswa</h1>    
<a href="db.php">kembali</a>
<form action="" method="post">
    <ul>
        <li>
            <label for="nama">nama : </label>
            <input type="text" name="nama" id="nama" required>
        </li>
        <li>
            <label for="jurusan">jurusan : </label>
            <input type="text" name="jurusan" id="jurusan" required>
        </li>
        <li><button type="submit" name="submit">tambahkan</button></li>
    </ul>
</form>
</body>
</html>