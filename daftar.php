<?php
include 'config.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    $cek_user = mysqi_prepare($conn, "SELECT username FROM user WHERE username = ?");
    mysql_stmt_bind_param($cek_user, "s", $username);
    mysql_stmt_execute($cek_user);
    mysql_stmt_store_result($cek_user);

    if (mysqli_stmt_num_rows($cek_user) > 0) {
        echo"<scricpt>alert('username sudah digunakan!');</script>";
    } else {
                $stmt = mysqli_prepare($conn, "INSERT INTO user(username,email,password)VALUE (?,?,?,)");
                mysqli_stmt_bind_param($stmt, "sss", $username,$email,$password_hashed);

                if (mysqli_stmt_execute($stmt)) {
                    echo "<script>alert('registerasi sukses! silahkan login.'); window.location='login.php';</script>";
                
                } else {
                    echo "registrasi gagal: " . mysqli_error($conn);
                    
                }               
    } 
}
?>    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>daftar akun baru</h2>
    <FROM action="" mehtod="POST">
        <label=>username</label>
        <input type="text" name="password" reguired><br><br>
        <label for=>password</label><br>
        <input type="submit" name="password">daftar</button>
        <button type="submit" name="register">daftar</button>

</form>
<p>sudah punya akun? <a href="login.php">login di sini</a></p>    
    
</body>
</html>





     
