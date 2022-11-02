<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Register</title>
</head>
<body>
    <div class = "header">
        <h1>Market of Cards</h1>
    </div>

    <div class = "navbar">
        <div class="form">
            <form action="" method="post">
                <label for="nama">Nama</label><br>
                <input type="text" name="nama" class="input" placeholder="Masukkan nama"><br>

                <label for="email">Email</label><br>
                <input type="email" name="email" class="input" placeholder="Masukkan email"><br>

                <label for="username">Username</label><br>
                <input type="text" name="username" class="input" placeholder="Masukkan username"><br>

                <label for="password">Password</label><br>
                <input type="password" name="password" class="input" placeholder="Password"><br>

                <label for="konfirmasi">Konfirmasi Password</label><br>
                <input type="password" name="konfirmasi" class="input" placeholder="Konfirmasi password"><br>

                <input type="submit" name="regis" class="submit" value="Registrasi"><br><br>
            </form>
            <p>Sudah punya akun?
                <a href="login.php">Login</a>
            </p>
        </div>




        </div>
    </div>
            
    <div class = "footer">
        <p>Copyright &copy; 2022</p>
    </div>
</body>
</html>

<?php

    require "config.php";

    if(isset($_POST['regis'])){
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $username = $_POST['username']; 
        
        $password = $_POST['password'];
        $konfirmasi = $_POST['konfirmasi']; 
        
        $user = $db->query("SELECT * FROM akun WHERE username == $username");

        $num_user = mysqli_num_rows($user);

        if($num_user > 0){
            echo "
                <script>
                    alert('Username telah Digunakan, silahkan cari username lain');
                </script>
            ";
        } else {
            if($password == $konfirmasi){
                $password = password_hash($password, PASSWORD_DEFAULT);
                
                $query = "INSERT INTO akun (nama, email, username, psw)
                            VALUES('$nama','$email','$username','$password')";
                $result = $db->query($query);

                if ($result){
                    echo "<script>
                    alert('Registrasi Berhasil');
                    document.location.href = 'index.php';
                    </script>";
                } else{
                    echo "<script>
                    alert('Registrasi Gagal'); 
                    </script>";
                }


            } else {
                echo "<script>
                alert('Konfirmasi Password incorrect');
                </script>";
            }
        }
    }
?>