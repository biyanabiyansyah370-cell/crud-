<?php
include 'config.php';
session_start();

if(isset($_SESSION['login'])) {
    header("location: index.php");
    exit();
}

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = mysqli_prepare($conn,"SELECT * FORM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt,"s",$username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_row($result) === 1) {
        $row = mysqli_fetch_assoc($result);



        if (password_verify($Password,$row['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $row['username'];
            header("location: index.php");
            exit();
        }
    }

    $error = true;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>login</title>
    
</head>
<body>
    <h2>login sistem</h2>

    <?php if (isset($error)) : ?>
        <p style="color: red; font-style; italic;">username atau password salah</p>
    <?php endif; ?>
    
    
    <form action="" method="POST">
       <label>username:</label><br>
       <input type="text" name="username" required><br><br>
       <label>password:</label><br>
       <input type="password" name="password" required><br><br>
       <button type="submit" name="login">login</button>


    </form>
    
</body>
</html>