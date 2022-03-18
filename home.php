<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">            
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="5000">
            <img src="images/hotel.webp" class="d-block w-100 image-carausel" alt="Hotel">
          </div>
              <?php 
              $cari_type_kamar=mysqli_query($conn,"SELECT * FROM tbl_type_kamar"); // menampilkan semua data tabel type kamar
              while($data=mysqli_fetch_array($cari_type_kamar)){ // menampung data dalam bentuk array untuk mempermudah menampilkan gambar kamar
              ?>
          <div class="carousel-item" data-bs-interval="5000">
            <img src="images/<?php echo $data[2];?>" class="d-block w-100 image-carausel" alt="<?php echo $data[1];?>">
          </div>
              <?php 
              }
              ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

<hr>
<div class="row row-cols-1 row-cols-md-5 g-4">
<?php 
    $cari=mysqli_query($conn,"SELECT * FROM tbl_type_kamar"); // menampilkan semua data tabel type kamar
    while($data=mysqli_fetch_array($cari)){ // menampung data dalam bentuk array untuk mempermudah menampilkan gambar dan nama kamar dan deskripsi kamar
?>
    <div class="col">
        <div class="card h-100">
            <img src="images/<?php echo $data['gambar'];?>" class="card-img-top" alt="<?php echo $data['gambar'];?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo $data['nama_type'];?></h5>
                <p class="card-text"><?php echo $data['deskripsi'];?></p>
            </div>
            <div class="card-footer">
                <a href="http://" class="btn btn-outline-info btn-sm"><i class="bi bi-info-square"></i> Detail</a>
            </div>
        </div>
    </div>
<?php 
    }
?>
</div>