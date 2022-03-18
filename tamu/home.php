<div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Kamar Yang Tersedia
        </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                                
            </div>
        </div>
    </div>
<?php 
    $type_kamar=mysqli_query($conn,"SELECT * FROM tbl_type_kamar");
    while ($data_kamar=mysqli_fetch_array($type_kamar)){
?>
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading<?php echo $data_kamar[0];?>">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $data_kamar[0];?>" aria-expanded="false" aria-controls="collapse<?php echo $data_kamar[0];?>">
            <?php echo $data_kamar['nama_type'] ?>
        </button>
        </h2>
        <div id="collapse<?php echo $data_kamar[0];?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $data_kamar[0];?>" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <?php 
                $kamar=mysqli_query($conn,"SELECT * FROM tbl_kamar WHERE id_type_kamar='$data_kamar[0]'");
                while($rooms=mysqli_fetch_array($kamar)){
                    if($rooms[4]=="Kosong"){
                        ?>
                        <a href="#" class="btn btn-success btn-sm">
                            <i class="bi bi-person-check"></i><br>
                            <?php echo $rooms[2];?>
                        </a>
                        <?php
                    }else{
                        ?>
                        <a href="#" class="btn btn-sm btn-danger disabled">
                        <i class="bi bi-person-bounding-box"></i><br>
                        <?php echo $rooms[2];?>
                    </a>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
<?php 
}
?>
</div>