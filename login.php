<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style7.css">
    <title>Login</title>
</head>
<body>
    <div class = "header">
        <h1>Market of Cards</h1>
    </div>


    <div class="navbar">
        <div class="logo">
            <img src="images/logo.png" alt="logo " width="70%">
        </div>
        <div class="form-login">
            <h3>Login</h3>
            <form action="" method="post">
                <input type="text" name="username" placeholder="email atau username" class="input">
                <input type="password" name="password" placeholder="password" class="input">

                <input type="submit" name="login" value="Login" class="submit"><br><br>
            </form>

            <p>Belum punya akun?
                <a href="register.php">Register</a>
            </p>
        </div>
        
    </div>

    
    <div class = "footer">
        <p>Copyright &copy; 2022</p>
    </div>

</body>
</html>

<?php
    session_start();

    require 'config.php';

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password   = $_POST['password'];
        $password = md5($password);

        $query = "SELECT * FROM akun WHERE username = '$username' OR $email = '$username'";
        $result = $db -> query($query);
        $row = mysqli_fetch_array($result);
        $user = $row['nama'];

        if($password == $row['psw']){
            echo "
            <script>
                alert('selmat datang $user');
                document.location.href = 'index.php';
            </script>";

        } else {
            echo " <script>
                alert('username dan pw salah');
            </script> ";
            }
        }