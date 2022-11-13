<?php 
session_start();
if (isset( $_SESSION["login"])) {
    header("Location: db.php");
    exit;   
}
require 'new.php';

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($db, "SELECT * FROM user WHERE username = '$username' ");

    if(mysqli_num_rows($result) === 1 ){

        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            //set sesen
            $_SESSION["login"] = true;
            header("location: db.php");
            exit;
        }
    }
    $error = true;

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>login lanjutan</title>
    <style>
        *{
            text-align: center;
            margin: 20px;
        }
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgb(29, 180, 41);
            text-align: center;
        }
        .wadah {
            background-color: rgb(28, 204, 81);
            width: 500px;
            border-radius: 20px;
        }
        input{
            border: none;
            background-color: none;
            width: 300px;
            height: 30px;
            border-bottom:1px solid rgb(15, 15, 15) ;
            font-size: 17px;
        }
        
        button{
            font-size: 20px;
            border: none;
            background-color: greenyellow;
            width: 310px;
            height: 35px;
            border-radius: 10px;
        }
        button:hover {color: rgb(238, 255, 162);}
        .daftar {
            font-size: 20px;
        }
        a {
            margin: 0;
            text-decoration: none;
        }

    </style>
</head>
<body>
    <div class="wadah">
        <h1>Login Ngab</h1>
    <?php if (isset($error)) : ?>
        <p style="color: red; font-style: italic;">mungkin passwordnya salah ngab</p>
    <?php endif; ?>
    <form action="" method="post">
        <label for="username"></label>
        <input type="text" placeholder="username" name="username" id="username" required>
        <label for="password"></label>
        <input type="password" placeholder="password" name="password" id="username" required>
        <button type="submit" name="login">Login</button>
    </form>
    <div class="daftar">klik <a href="daftar.php">daftar</a> jika belum daftar</div>
</div>
</body>
</html>