<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login2.php");
    exit;
}
require 'new.php';

$siswa = query ("SELECT * FROM siswa");

if ( isset($_POST["cari"])) {
    $siswa = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>conek db</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }
        body{
            background-color: greenyellow;
        }
        .wad{
            background-color: rgb(202, 202, 202, .8);
            padding: 30px;
            border-radius: 20px;
        }
        h1{
            text-align: center;
        }
        form{
            display: flex;
            justify-content: center;            
        }
        input {
            height: 25px;
            border: none;
            border-radius: 5px;
            margin: 3px;
        }
        button{
            height: 27px;
            border: none;
            border-radius: 5px;
            margin: 3px;
        }
        .tambah{
            margin: 20px;
            position: relative;
            text-align: center;
        }
        a{
            background-color: #fff;
            color: black;
            padding: 3px;
            text-decoration: none;
        }
        a:hover{color: rgb(207, 207, 207);}
        table{
            text-align: center;
            color: rgb(0, 0, 0);
            font-family: sans-serif;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
        }
        table th {background-color: greenyellow;}

    </style>
</head>
<body>
    <div class="wad">
        <div class="tambah"></div><a href="logout.php">Logout</a>
    <h1>daftar siswa</h1>
    <br>
    <form action="" method="post">
        <input type="text" name="keyword" size="34" autofocus placeholder="cari..." autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="cari">cari</button>
    </form>
    <div class="tambah"><a href="tambah.php">tambah siswa</a></div> 
    <div id="wadah">
    <table border="1" cellpadding="10" cellspacing="0" >
    <tr>
        <th>NO.</th>
        <th>Aksi</th>
        <th>Nama</th>
        <th>Jurusan</th>
    </tr>

    <?php $a = 1; ?>
    <?php foreach( $siswa as $row ) : ?>
    <tr>
        <td><?= $a ?> </td>
        <td>
            <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |
            <a href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('mau di hapus..?')">Hapus</a>
        </td>
        <td><?= $row["nama"] ?></td>
        <td><?= $row["jurusan"] ?></td>
    </tr>
    <?php $a++; ?>
    <?php endforeach; ?>
    </table>
    </div>
</div>

<script src="js/jquery-.3.6.1.min.js"> </script>
<script src="js/script.js"></script>
</body>
</html>