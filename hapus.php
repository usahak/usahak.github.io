<?php 
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login2.php");
    exit;
}

require 'new.php';

  $id = $_GET["id"];
  if (hapus($id) > 0 ){
    echo "
    <script>
       alert('berhasil dihapus');
       document.location.href = 'db.php';
    </script>     
    ";
  } else {
    echo "
    <script>
       alert('berhasil dihapus');
       document.location.href = 'db.php';
    </script>     
    ";
  }
?>