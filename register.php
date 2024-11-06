<?php
include "koneksi.php";

if(isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']); 
    $nama = $_POST['nama'];
    $level = $_POST['level']; 
    
    $insert = mysqli_query($koneksi, "INSERT INTO user(nama, username, password, level) VALUES('$nama', '$username', '$password', '$level')");

    if($insert) {
        echo '<script>alert("Pendaftaran Berhasil!"); window.location.href="login.php";</script>';
    } else {
        echo '<script>alert("Pendaftaran Gagal!");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Daftar Aplikasi Kasir</title>
    
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-flex align-items-center justify-content-center">
                        <img src="img/bn.png" alt="" class="img-fluid" style="max-width: 70%; height: auto;">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            
                            <!-- Form Register -->
                            <form class="user" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName" name="nama" placeholder="Masukan Nama Lengkap" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="username" placeholder="Masukan Username" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Masukan Password" required>
                                </div>
                                
                                <!-- Dropdown untuk memilih level -->
                                <div class="form-group">
                                    <select class="form-control form-control-user" name="level" required>
                                        <option value="" disabled selected>Pilih Level</option>
                                        <option value="admin">Admin</option>
                                        <option value="petugas">Petugas</option>
                                    </select>
                                </div>
                                
                                <button type="submit" class="btn btn-outline-primary w-100">Daftar</button>
                            </form>

                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>
