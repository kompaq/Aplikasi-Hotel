<?php 
include "config/database.php"; // memanggil file koneksi database dari folder config/database.php
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="assets/icons-1.8.1/font/bootstrap-icons.css">
    <title>Welcome Guest</title>
  </head>
  <body>

    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Nama Hotel</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="?page=home">Beranda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Kamar Hotel</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Booking / CekIn</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="mt-2">
      <?php 
        //error_reporting("page");
        $page=htmlentities($_GET["page"]);
        $halaman="$page.php";
        if(!file_exists($halaman)){
          require"home.php";
        }else{
          include"$halaman";
        }
      ?>
      </div>
      <div class="mt-2 mb-2 footer">
        <p>Nama Hotel &copy; 2022 | Created By Nama Siswa</p>
      </div>
    </div>
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.prototype.slice.call(forms)
        .forEach(function (form) {
          form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }

            form.classList.add('was-validated')
          }, false)
        })
    })()
    </script>
  </body>
</html>