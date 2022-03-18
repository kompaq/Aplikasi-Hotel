<?php
if(isset($_GET['tambah'])){
    if(isset($_POST['simpan'])){
        $id_type_kamar      = $_POST['id_type_kamar'];
        $nomor_kamar        = $_POST['nomor_kamar'];
        $harga_kamar        = $_POST['harga_kamar'];
        $status             = "Kosong";
        $simpan=mysqli_query($conn,"INSERT INTO tbl_kamar VALUES('','$id_type_kamar','$nomor_kamar','$harga_kamar','$status')");
        if($simpan){
            ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Selamat!</strong> Data Berhasil Ditambah.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <script>setTimeout('location.replace("?page=data_kamar")',3000);</script>
                <?php 
        }else{
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf!</strong> Data Gagal Ditambah.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
        }
    }
?>
<div class="card">
    <div class="card-body">
        <h5>Formulir Tambah Data Kamar</h5>
        <hr>
        <form method="post" name="simpan" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Type Kamar</label>
                <select name="id_type_kamar" class="form-select" id="validationCustom01" required>
                    <option value="">Pilih Type Kamar</option>
                    <?php 
                    $kamar=mysqli_query($conn,"SELECT * FROM tbl_type_kamar");
                    while($data_kamar=mysqli_fetch_array($kamar)){
                        ?>
                    <option value="<?php echo $data_kamar['0'];?>"><?php echo $data_kamar['1'];?></option>
                        <?php
                    }
                    ?>
                </select>
                <div class="invalid-feedback">
                Wajib Diisi
                </div>
            </div>
            <div class="col-md-2">
                <label for="validationCustom02" class="form-label">Nomor Kamar</label>
                <input type="number" class="form-control" name="nomor_kamar" id="validationCustom02" placeholder="Nomor" required>
                <div class="invalid-feedback">
                Wajib Diisi
                </div>
            </div>           
            <div class="col-md-4">
                <label for="validationCustom03" class="form-label">Harga Kamar</label>
                <input type="number" class="form-control" name="harga_kamar" id="validationCustom03" placeholder="Harga Kamar" required>
                <div class="invalid-feedback">
                Wajib Diisi
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary btn-sm" type="submit" name="simpan"><i class="bi bi-save"></i> Simpan</button>
                <a href="?page=data_kamar" class="btn btn-danger btn-sm"><i class="bi bi-backspace"></i> Kembali</a>
            </div>
        </form>
    </div>
</div>
<?php
}elseif(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $cari=mysqli_query($conn,"SELECT * FROM tbl_kamar WHERE id_kamar='$id'");
    $data=mysqli_fetch_array($cari);

    if(isset($_POST['simpan'])){
        $id_type_kamar      = $_POST['id_type_kamar'];
        $nomor_kamar        = $_POST['nomor_kamar'];
        $harga_kamar        = $_POST['harga_kamar'];
        $status             = $_POST['status'];
        $simpan=mysqli_query($conn,"UPDATE tbl_kamar SET id_type_kamar='$id_type_kamar',nomor_kamar='$nomor_kamar',harga_kamar='$harga_kamar',status='$status' WHERE id_kamar='$id'");
        if($simpan){
            ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Selamat!</strong> Data Berhasil Diubah.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <script>setTimeout('location.replace("?page=data_kamar")',3000);</script>
                <?php 
        }else{
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf!</strong> Data Gagal Diubah.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
        }
    }
?>
<div class="card">
    <div class="card-body">
        <h5>Formulir Edit Data Kamar</h5>
        <hr>
        <form method="post" name="simpan" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Type Kamar</label>
                <select name="id_type_kamar" class="form-select" id="validationCustom01" required>                    
                    <?php 
                    $cari=mysqli_query($conn,"SELECT * FROM tbl_type_kamar WHERE id_type_kamar='$data[1]'");
                    $datanya=mysqli_fetch_array($cari);
                    ?>
                    <option value="<?php echo $datanya['0'];?>"><?php echo $datanya['1'];?></option>
                    <?php
                    $kamar=mysqli_query($conn,"SELECT * FROM tbl_type_kamar WHERE NOT id_type_kamar='$data[1]'");
                    while($data_kamar=mysqli_fetch_array($kamar)){
                        ?>
                    <option value="<?php echo $data_kamar['0'];?>"><?php echo $data_kamar['1'];?></option>
                        <?php
                    }
                    ?>
                </select>
                <div class="invalid-feedback">
                Wajib Diisi
                </div>
            </div>
            <div class="col-md-2">
                <label for="validationCustom02" class="form-label">Nomor Kamar</label>
                <input type="number" value="<?php echo $data['2'];?>" class="form-control" name="nomor_kamar" id="validationCustom02" placeholder="Nomor" required>
                <div class="invalid-feedback">
                Wajib Diisi
                </div>
            </div>           
            <div class="col-md-4">
                <label for="validationCustom03" class="form-label">Harga Kamar</label>
                <input type="number" value="<?php echo $data['3'];?>" class="form-control" name="harga_kamar" id="validationCustom03" placeholder="Harga Kamar" required>
                <div class="invalid-feedback">
                Wajib Diisi
                </div>
            </div>
            <div class="col-md-2">
                <label for="validationCustom04" class="form-label">Status Kamar</label>
                <select name="status" class="form-select" id="validationCustom04" required>
                    <option value="<?php echo $data['4'];?>"><?php echo $data['4'];?></option>
                    <option>Kosong</option>
                    <option>Terisi</option>
                </select><div class="invalid-feedback">
                Wajib Diisi
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary btn-sm" type="submit" name="simpan"><i class="bi bi-save"></i> Simpan</button>
                <a href="?page=data_kamar" class="btn btn-danger btn-sm"><i class="bi bi-backspace"></i> Kembali</a>
            </div>
        </form>
    </div>
</div>
<?php
}elseif(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $delete=mysqli_query($conn,"DELETE FROM tbl_kamar WHERE id_kamar='$id'");
    if($delete){
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> Data Berhasil Dihapus.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <script>setTimeout('location.replace("?page=data_kamar")',3000);</script>
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
<h5>Data Kamar</h5>
<hr>
<a href="?page=data_kamar&tambah" class="btn btn-sm btn-primary"><i class="bi bi-plus-square"></i> Tambah Data </a>
<hr>
<table class="table table-hover">
    <thead>
        <th></th>
        <th>Type Kamar</th>
        <th>Nomor Kamar</th>
        <th>Harga Kamar</th>
        <th>Status</th>
    </thead>
    <tbody>
        <?php
        $sql=mysqli_query($conn,"SELECT * FROM tbl_kamar");
        while($rows=mysqli_fetch_array($sql)){
            ?>
        <tr>
            <td>
                <a href="?page=data_kamar&edit=<?php echo $rows[0]; ?>" class="btn btn-sm btn-success"><i class="bi bi-pencil-square"></i></a>
                <a href="?page=data_kamar&delete=<?php echo $rows[0]; ?>" onclick="return confirm('Apakah Anda Yakin...?');" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
            </td>
            <td>
                <?php 
                $cari=mysqli_query($conn,"SELECT * FROM tbl_type_kamar WHERE id_type_kamar='$rows[1]'");
                $row=mysqli_fetch_array($cari);
                ECHO $row['nama_type'];
                ?>
            </td>
            <td><?php echo $rows[2];?></td>
            <td><?php echo $rows[3];?></td>
            <td><?php echo $rows[4];?></td>
        </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<?php
}
?>