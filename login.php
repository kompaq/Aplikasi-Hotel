<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hotel SMK</title>
    <link rel="stylesheet" href="assets/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="assets/icons-1.8.1/font/bootstrap-icons.css">
    <!-- W3CSS -->
  </head>
  <body>
      <div class="modal-dialog modal-sm" style="margin-top: 10%;">
        <div class="modal-content" style="border:none;">
          <div class="modal-body text-center">
            <img src="images/logo.png" alt="Logo" class="logo">
            <form name="login" action="" method="post">
              <div class="input-group">
                <span class="input-group-text" id="basic-addon1">
                  <i class="bi bi-person-lines-fill"></i>
                </span>
                <input type="text" name="username" class="form-control" placeholder="Username">
              </div>
              <div class="mt-3"></div>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon1">
                  <i class="bi bi-key"></i>
                </span>
                <input type="password" name="password" class="form-control" placeholder="Password">
              </div>
              <div class="mt-3">
                <button type="submit" name="login" class="btn btn-outline-info" style="width:100%;">
                  <i class="bi bi-box-arrow-in-right"></i>
                  Login
                </button>
              </div>
            </form>
            <?php 
              session_start(); // membuat session untuk menampung informasi yang login dari post form login
              include"config/database.php"; // koneksikan kedalam database
              if(isset($_POST['login'])){
                  $username=$_POST['username'];  //variable username yang diambil dari post/inputan form login
                  $password=md5($_POST['password']);  //variable password yang diambil dari post/inputan form login
                  $_SESSION['username']=$_REQUEST['username']; //menampung session username sebagai request yang akan dikirim kehalaman selanjutnya
                  $sql="SELECT level FROM tbl_reception WHERE username='$username' AND password='$password' UNION ALL SELECT level FROM tbl_tamu WHERE username='$username' AND password='$password' ORDER BY level"; // memcari data dari dalam tabel reception dan tabel tamu dengan level yang berbeda
                  $query=mysqli_query($conn,$sql); // query untuk mengeksekusi variable $sql 
                  $cek_login=mysqli_num_rows($query); // mencari data didalam database
                  $data_login=mysqli_fetch_array($query); // buat array untuk menampilkan data
                  if($cek_login){ // jika loginnya benar
                      if($data_login['level']=="Reception"){ //jika yang login levelnya reception makan masuk halaman reception/folder reception
                        header('location:reception/');
                      }elseif($data_login['level']=="Tamu"){ //jika yang login levelnya tamu maka masuk kehalaman tamu/folder tamu
                        header('location:tamu/');
                      }else{ //jika yang login levelnya tidak ditemukan maka kembalikan ke login
                        header('location:login.php');
                      }
                  }else{ // jika loginnya salah
                      ?>
                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        <strong>Maaf!</strong> Login Anda Gagal.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      <?php
                  }
              }
            ?>
            <div class="divider d-flex align-items-center my-4">
              <p class="text-center fw-bold mx-3 mb-0">Or</p>
            </div>
              <a href="index.php?page=registrasi" class="btn btn-outline-success">
                <i class="bi bi-person-plus"></i>
                Registrasi
              </a>
              <a href="index.php" class="btn btn-outline-secondary">
                <i class="bi bi-house-door"></i>
                Lihat Website
              </a>
          </div>
        </div>
      </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        -->
  </body>
</html>