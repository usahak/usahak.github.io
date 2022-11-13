<?php
require '../new.php';
$keyword = $_GET["keyword"];

$query = "SELECT * FROM siswa WHERE
             nama LIKE '%$keyword%' OR
             jurusan LIKE '%$keyword%' ";

$siswa = query($query);

?>
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

