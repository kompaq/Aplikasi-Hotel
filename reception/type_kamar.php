<?php
if(isset($_GET['tambah'])){
    if(isset($_POST['simpan'])){
        $nama_type      = $_POST['nama_type'];
        $deskripsi      = $_POST['deskripsi'];
        $jumlah_kamar   = $_POST['jumlah_kamar'];
        
        $file_upload    = $_FILES['gambar']['name'];        //nama file yang diupload
        $tmp            = $_FILES['gambar']['tmp_name'];    //nama sumber file yang diupload
        $path           = "../images/".$file_upload;        //nama folder penyimpanan file yang diupload
        if(move_uploaded_file($tmp, $path)){
            $simpan=mysqli_query($conn,"INSERT INTO tbl_type_kamar VALUES('','$nama_type','$file_upload','$deskripsi','$jumlah_kamar')");
            if($simpan){
                ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Selamat!</strong> Data Berhasil Ditambah.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <script>setTimeout('location.replace("?page=type_kamar")',3000);</script>
                <?php 
            }else{
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf!</strong> Data Gagal Ditambah.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
            }
        }else{
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Gambar Gagal Diupload
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
        }
    }
?>
<div class="card">
    <div class="card-body">
        <h5>Formulir Tambah Data Type Kamar</h5>
        <hr>
        <form method="post" name="simpan" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Type Kamar</label>
                <input type="text" class="form-control" name="nama_type" id="validationCustom01" placeholder="Masukkan Type Kamar" required>
                <div class="invalid-feedback">
                Wajib Diisi
                </div>
            </div>
            <div class="col-md-8">
                <label for="validationCustom02" class="form-label">Deskripsi Kamar</label>
                <input type="text" class="form-control" name="deskripsi" id="validationCustom02" placeholder="Masukkan Deskripsi" required>
                <div class="invalid-feedback">
                Wajib Diisi
                </div>
            </div>
            <div class="col-md-10">
                <label for="validationCustom04" class="form-label">Gambar Room</label>
                <input type="file" class="form-control" name="gambar" id="validationCustom04" required>
                <div class="invalid-feedback">
                Wajib Diisi
                </div>
            </div>            
            <div class="col-md-2">
                <label for="validationCustom03" class="form-label">Jumlah Kamar</label>
                <input type="number" class="form-control" name="jumlah_kamar" id="validationCustom03" placeholder="Jumlah Kamar" required>
                <div class="invalid-feedback">
                Wajib Diisi
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary btn-sm" type="submit" name="simpan"><i class="bi bi-save"></i> Simpan</button>
                <a href="?page=type_kamar" class="btn btn-danger btn-sm"><i class="bi bi-backspace"></i> Kembali</a>
            </div>
        </form>
    </div>
</div>
<?php
}elseif(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $cari=mysqli_query($conn,"SELECT * FROM tbl_type_kamar WHERE id_type_kamar='$id'");
    $data=mysqli_fetch_array($cari);

    if(isset($_POST['update'])){
        $nama_type      = $_POST['nama_type'];
        $deskripsi      = $_POST['deskripsi'];
        $jumlah_kamar   = $_POST['jumlah_kamar'];
        
        $file_upload    = $_FILES['gambar']['name'];        //nama file yang diupload
        $tmp            = $_FILES['gambar']['tmp_name'];    //nama sumber file yang diupload
        $path           = "../images/".$file_upload;        //nama folder penyimpanan file yang diupload
        if($tmp=="" OR $path==""){
            $simpan=mysqli_query($conn,"UPDATE tbl_type_kamar SET nama_type='$nama_type',deskripsi='$deskripsi',jumlah_kamar='$jumlah_kamar' WHERE id_type_kamar='$id'");
            if($simpan){
                ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Selamat!</strong> Data Berhasil Diubah.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <script>setTimeout('location.replace("?page=type_kamar")',3000);</script>
                <?php 
            }else{
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf!</strong> Data Gagal Diubah.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
            }
        }elseif(move_uploaded_file($tmp, $path)){
            if(is_file("../images/".$data['gambar'])) unlink("../images/".$data['gambar']);
            $simpan=mysqli_query($conn,"UPDATE tbl_type_kamar SET nama_type='$nama_type',gambar='$file_upload',deskripsi='$deskripsi',jumlah_kamar='$jumlah_kamar' WHERE id_type_kamar='$id'");
            if($simpan){
                ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Selamat!</strong> Data Berhasil Ditambah.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <script>setTimeout('location.replace("?page=type_kamar")',3000);</script>
                <?php 
            }else{
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf!</strong> Data Gagal Ditambah.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
            }
        }else{
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Gambar Gagal Diupload
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
        }
    }
    ?>
<div class="card">
    <div class="card-body">
        <h5>Formulir Edit Data Type Kamar</h5>
        <hr>
        <form method="post" name="update" enctype="multipart/form-data" class="row g-3 needs-validation">
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Type Kamar</label>
                <input type="text" value="<?php echo $data['nama_type'];?>" class="form-control" name="nama_type" id="validationCustom01" placeholder="Masukkan Type Kamar" required>
                <div class="invalid-feedback">
                Wajib Diisi
                </div>
            </div>
            <div class="col-md-8">
                <label for="validationCustom02" class="form-label">Deskripsi Kamar</label>
                <input type="text" value="<?php echo $data['deskripsi'];?>" class="form-control" name="deskripsi" id="validationCustom02" placeholder="Masukkan Deskripsi" required>
                <div class="invalid-feedback">
                Wajib Diisi
                </div>
            </div>
            <div class="col-md-10">
                <label class="form-label">Gambar Room</label>
                <input type="file" class="form-control" name="gambar">
            </div>            
            <div class="col-md-2">
                <label for="validationCustom03" class="form-label">Jumlah Kamar</label>
                <input type="number" value="<?php echo $data['jumlah_kamar'];?>" class="form-control" name="jumlah_kamar" id="validationCustom03" placeholder="Jumlah Kamar" required>
                <div class="invalid-feedback">
                Wajib Diisi
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary btn-sm" type="submit" name="update"><i class="bi bi-save"></i> Simpan</button>
                <a href="?page=type_kamar" class="btn btn-danger btn-sm"><i class="bi bi-backspace"></i> Kembali</a>
            </div>
        </form>
    </div>
</div>
<?php
}elseif(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $cari=mysqli_query($conn,"SELECT * FROM tbl_type_kamar WHERE id_type_kamar='$id'");
    $data=mysqli_fetch_array($cari);
    if(is_file("../images/".$data['gambar'])) unlink("../images/".$data['gambar']);
    $delete=mysqli_query($conn,"DELETE FROM tbl_type_kamar WHERE id_type_kamar='$id'");
    if($delete){
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> Data Berhasil Dihapus.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <script>setTimeout('location.replace("?page=type_kamar")',3000);</script>
        <?php
    }else{
        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong> Data Gagal Dihapus.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
    }
}else{ // jika tidak ada proses apapun
?>
<h5>Data Type Kamar</h5>
<hr>
<a href="?page=type_kamar&tambah" class="btn btn-sm btn-primary"><i class="bi bi-plus-square"></i> Tambah Data </a>
<hr>
<table class="table table-hover">
    <thead>
        <th></th>
        <th>Type Kamar</th>
        <th>Deskripsi</th>
        <th>Jumlah Kamar</th>
    </thead>
    <tbody>
        <?php
        $sql=mysqli_query($conn,"SELECT * FROM tbl_type_kamar");
        while($rows=mysqli_fetch_array($sql)){
            ?>
        <tr>
            <td>
                <a href="?page=type_kamar&edit=<?php echo $rows[0]; ?>" class="btn btn-sm btn-success"><i class="bi bi-pencil-square"></i></a>
                <a href="?page=type_kamar&delete=<?php echo $rows[0]; ?>" onclick="return confirm('Apakah Anda Yakin...?');" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                <a href="http://" data-bs-toggle="modal" data-bs-target="#ID<?php echo $rows[0]; ?>" class="btn btn-sm btn-info"><i class="bi bi-card-image"></i></a>
            </td>
            <td><?php echo $rows[1];?></td>
            <td><?php echo substr($rows[3],0,30),'...';?></td>
            <td><?php echo $rows[4];?></td>
            <!-- Modal -->
            <div class="modal fade" id="ID<?php echo $rows[0]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $rows[1];?></h5>
                </div>
                <div class="modal-body">
                    <img src="../images/<?php echo $rows[2]; ?>" alt="Room" style="width:100%;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
                </div>
                </div>
            </div>
            </div>
        </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<?php
}
?>