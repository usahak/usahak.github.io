<?php 

require 'new.php';

if (isset($_POST["login"])){

if (login($_POST) > 0 ) {
    echo "<script>
          alert('username ditambah');
          </script>";
} else {
    echo mysqli_error($db);
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>login</title>
    <style>
        * {
            margin: 20px;
            text-align: center;
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
        h1{
            border-radius: 20px 20px 0 0;
            margin: 0;
            height: 70px;
            background-color: rgb(196, 248, 6);
            color:rgb(0, 0, 0);
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 50px;
        }
        label{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 23px;
            color: rgb(0, 0, 0);
        }
        input{
            border: none;
            height: 33px;
            width: 300px;
            background-color:  rgb(28, 204, 81);
            border-bottom: 1px solid rgb(51, 51, 51);
            font-size: 15px;
        }
        
        button{
            background-color: rgb(196, 248, 6);
            border: none;
            height: 50px;
            width: 400px;
            border-radius: 10px;
            font-size: 25px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        button:hover{
            background-color: greenyellow;
        }
        .login{
            margin: 10px;
            text-decoration: none;
            background-color: rgb (200, 200, 200);
            border-radius: 10px;
        }
     </style>
</head>
<body>
    
    <div class="wadah">
        <h1>daftar</h1>
    <form action="" method="post">
        <label for="username"></label>
        <input type="text" placeholder="username" name="username" id="username" required autocomplete="off">
        <br>
        <label for="pasword"> </label>
        <input type="password" placeholder="password" name="pasword" id="pasword" required>
        <br>
        <label for="konfirmasi"> </label>
        <input type="password" placeholder="konfirmasi password" name="konfirmasi" id="konfirmasi" required>
        <br>
        <button type="submit" name="login">daftar</button>
    </form>
    <div class="login">
        jika berhasil di tambahkan. silahkan
        <br>
        <a href="login2.php">login</a>
    </div>
    </div>
</body>
</html>