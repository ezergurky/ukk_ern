<?php
    include 'koneksi.php';

    session_start();

    $message = "";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $repassword = $_POST["repassword"];

        $query = "SELECT * FROM users WHERE Email='$email'";
        $result = mysqli_query($koneksi, $query);

            if($password == $repassword)
            {
                $passwordhash = password_hash($password, PASSWORD_DEFAULT);
                $koneksi->query("INSERT INTO users (Email, Password) VALUES ('$email', '$passwordhash')");
                $_SESSION["email"] = $_POST["email"];
                header("Location: userpage.php");
                exit();
            } else {
                $message = "Sesuaikan Password Terlebih Dahulu!";
            }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .login-container {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="login-container text-center">
        <h2 class="mb-4">Register</h2>
        <div class="mt-4">
            <?php if($message): ?>
                <p class="alert alert-danger"><?= $message ?></p>
            <?php endif; ?>
        </div>
        
        <form method="POST">
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="mb-3">
            <input type="password" name="repassword" class="form-control" placeholder="Re-Password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Daftar</button>
        </form>
        <p class="mt-3">Sudah punya akun? <a href="login.php">Login</a></p>
    </div>
</body>
</html>
