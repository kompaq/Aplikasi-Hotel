<?php 
include "../config/database.php";
session_start();
$akun=$_SESSION['username'];
if($_SESSION['username']){
    $cari_akun=mysqli_query($conn,"SELECT * FROM tbl_reception where username='$akun'");
    $data_akun=mysqli_fetch_array($cari_akun);
?>
    <!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../assets/bootstrap/dist/css/bootstrap.min.css">

        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="../assets/icons-1.8.1/font/bootstrap-icons.css">
        <title>Hallo, <?php echo $data_akun['nama_reception'];?></title>
    </head>
    <body>
        <nav class="navbar navbar-light bg-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">Hallo, <?php echo $data_akun['nama_reception'];?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Navigasi Menu</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?page=home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=type_kamar">Type Kamar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=data_kamar">Data Kamar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    </ul>
                </div>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row" style="margin-top:60px">
                <div class="col-lg-3 mt-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Informasi Cek-In</h5>
                            <p class="card-text"></p>
                            <a href="#" class="btn btn-primary">Tombol</a>
                        </div>
                    </div>                
                </div>
                <div class="col-lg-9 mt-2 mb-2">
                <?php 
                    error_reporting("page");
                    $page=htmlentities($_GET["page"]);
                    $halaman="$page.php";
                    if(!file_exists($halaman)){
                    require"home.php";
                    }else{
                    include"$halaman";
                    }
                ?>
                </div>
            </div>
        </div>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="../assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
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
<?php 
}else{
    session_start();
    session_destroy();
    header('location:../login.php');
}
?>