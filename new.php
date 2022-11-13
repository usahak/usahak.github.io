<?php 
//konek ke db
$db = mysqli_connect("localhost", "root", "", "phpdasar" );

function query($query){
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $db;

    $nama = htmlspecialchars ( $data["nama"] );
    $jurusan = htmlspecialchars ( $data["jurusan"] );

    $query = "INSERT INTO siswa VALUES
    ('', '$nama', '$jurusan')";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function hapus ($id) {
    global $db;
    mysqli_query($db, "DELETE FROM siswa WHERE id = $id");
 return mysqli_affected_rows($db);
}

function ubah ($data) {
    global $db;
    $id = $data["id"];
    $nama = htmlspecialchars ( $data["nama"] );
    $jurusan = htmlspecialchars ( $data["jurusan"] );

    $query = "UPDATE siswa SET
            nama = '$nama',
            jurusan = '$jurusan'
            WHERE id = $id
            ";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function cari($keyword) {
    $query = "SELECT * FROM siswa WHERE nama LIKE '%$keyword%' ";
return query($query);
}

function login($data){
    global $db;

    $username = strtolower(stripslashes($data["username"]));
    $pasword = mysqli_real_escape_string($db, $data["pasword"]);
    $konfirmasi = mysqli_real_escape_string($db, $data["konfirmasi"]);
//cek username sudah ada / belum
$result = mysqli_query($db, "SELECT username FROM user WHERE username = '$username' ");

if (mysqli_fetch_assoc($result)) {
    echo "<script>
    alert('username sudah ada');
    </script>";
return false;
}


    if ( $konfirmasi !== $pasword ) {
        echo "<script>
               alert('pasword tidak sama');
              </script>";
        return false;
    }

    //enkripsi pasword bisa menggunakan md5($password)
$password = password_hash($pasword, PASSWORD_DEFAULT);

//insert ke db
mysqli_query($db, "INSERT INTO user VALUES('', '$username', '$password')");
return mysqli_affected_rows($db);
}
?>