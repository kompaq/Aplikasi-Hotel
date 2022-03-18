<?php
if(isset($_POST['registrasi'])){
    $nik            = $_POST['nik'];
    $nama_tamu      = $_POST['nama_tamu'];
    $alamat_tamu    = $_POST['alamat_tamu'];
    $nomor_telepon  = $_POST['nomor_telepon'];
    $username       = $_POST['username'];
    $password       = md5($_POST['password']);
    $level          = "Tamu";
    $simpan = mysqli_query($conn,"INSERT INTO tbl_tamu VALUES('','$nik','$nama_tamu','$alamat_tamu','$nomor_telepon','$username','$password','$level')");
    if($simpan){
        ?>
        <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Berhasil!</h4>
        <p>Anda Telah Berhasil Melakukan Registrasi Pada Sistem Kami.</p>
        <hr>
        <p class="mb-0">Silahkan Tekan Tombol <a href="login.php" class="btn btn-sm btn-outline-primary"><i class="bi bi-box-arrow-in-right"></i> Login</a> Untuk Melakukan Pemesanan Kamar</p>
        </div>    
    <?php 
    }else{
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Maaf!</strong> Proses Registrasi Anda Gagal.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    }
}
?>
<div class="card">
    <div class="card-body">
        <h3>Formulir Registrasi</h3>
        <hr>
        <form class="row g-3 needs-validation " novalidate method="post" name="registrasi">
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">NIK</label>
                <input type="number" class="form-control" name="nik" id="validationCustom01" placeholder="Masukkan NIK" required>
                <div class="invalid-feedback">
                NIK Wajib Diisi
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama_tamu" id="validationCustom02" placeholder="Masukkan Nama" required>
                <div class="invalid-feedback">
                Nama Wajib Diisi
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat_tamu" id="validationCustom03" placeholder="Masukkan Alamat" required>
                <div class="invalid-feedback">
                Alamat Wajib Diisi
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Nomor Telp/Hp</label>
                <input type="number" class="form-control" name="nomor_telepon" id="validationCustom04" placeholder="Masukkan No. Telepon" required>
                <div class="invalid-feedback">
                Nomor Telepon Wajib Diisi
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Nama Pengguna</label>
                <input type="text" class="form-control" name="username" id="validationCustom05" placeholder="Masukkan Nama Pengguna" required>
                <div class="invalid-feedback">
                Nama Pengguna Wajib Diisi Tanpa Spasi
                </div>
                <div class="valid-feedback">
                Diisi Tanpa Spasi
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Kata Sandi</label>
                <input type="text" class="form-control" name="password" id="validationCustom06" placeholder="Masukkan Kata Sandi" required>
                <div class="invalid-feedback">
                Kata Sandi Wajib Diisi
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit" name="registrasi"><i class="bi bi-save"></i> Simpan</button>
            </div>
        </form>
    </div>
</div>