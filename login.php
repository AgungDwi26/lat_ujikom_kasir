<?php
include "koneksi.php";

if(isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $cek = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");

    if(mysqli_num_rows($cek) > 0) {
        $data = mysqli_fetch_array($cek);
        $_SESSION['user'] = $data;

        if($data['level'] == 'admin') {
            echo '<script>alert("Selamat datang Admin!"); window.location.href="admin_dashboard.php";</script>';
        } elseif($data['level'] == 'petugas') {
            echo '<script>alert("Selamat datang Petugas!"); window.location.href="index.php";</script>';
        } else {
            echo '<script>alert("Level user tidak dikenali!"); window.location.href="login.php";</script>';
        }
    } else {
        echo '<script>alert("Username/password salah!"); window.location.href="login.php";</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Aplikasi Kasir</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-flex align-items-center justify-content-center">
                                <img src="img/bn.png" alt="Login Image" class="img-fluid" style="max-width: 70%; height: auto;">
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="username" placeholder="Masukan Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Masukan Password">
                                        </div>
                                        <button type="submit" class="btn btn-outline-info w-100">Login</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Belum punya akun? Daftar!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>
