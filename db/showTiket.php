<?php
    if(isset($_GET['tiket']) == 'all') {
        $selectLatest = mysqli_query($konek,"SELECT * FROM tiket INNER JOIN wilayah ON tiket.id_wilayah = wilayah.id_wilayah ORDER BY id_tiket ASC");
        while($rwTiket = mysqli_fetch_assoc($selectLatest)) {
        $tanggal = date("l,d M Y", strtotime($rwTiket['tanggal']));

?>
        <div class="col-3 mx-auto my-3" style="width: 25rem;">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h3 class="fw-bold"><?= $rwTiket['judul_konser'] ?></h4>
                        <div class="ribbon ribbon-top-right"><span>Rp. <?=$rwTiket['harga']?></span></div>
                    </div>
                    <p class="lh-base">Presented by <strong><?=$rwTiket['nama_band']?></strong><br><?=$tanggal?> <br> <?=$rwTiket['tempat']?><br> <span class="badge bg-primary"><?=$rwTiket['jumlah']?> Tiket Tersisa</span></p>
                    <div class="d-flex justify-content-between mt-5">
                        <h4><?=$rwTiket['wilayah']?></h4>
                        <button onclick="tumbas('<?=$rwTiket['id_tiket']?>','<?=$rwTiket['harga']?>')" class="btn btn-primary">Beli Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
<?php
        }
    }
    else if(isset($_GET['s'])) {
        $selectLatest = mysqli_query($konek,"SELECT * FROM tiket INNER JOIN wilayah ON tiket.id_wilayah = wilayah.id_wilayah WHERE judul_konser LIKE '%$_GET[s]%' OR nama_band LIKE '%$_GET[s]%' ORDER BY id_tiket ASC");
        while($rwTiket = mysqli_fetch_assoc($selectLatest)) {
        $tanggal = date("l,d M Y", strtotime($rwTiket['tanggal']));
        
?>
        <div class="col-3 mx-auto my-3" style="width: 25rem;">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h3 class="fw-bold"><?= $rwTiket['judul_konser'] ?></h4>
                        <div class="ribbon ribbon-top-right"><span>Rp. <?=$rwTiket['harga']?></span></div>
                    </div>
                    <p class="lh-base">Presented by <strong><?=$rwTiket['nama_band']?></strong><br><?=$tanggal?> <br> <?=$rwTiket['tempat']?><br> <span class="badge bg-primary"><?=$rwTiket['jumlah']?> Tiket Tersisa</span></p>
                    <div class="d-flex justify-content-between mt-5">
                        <h4><?=$rwTiket['wilayah']?></h4>
                        <button onclick="tumbas('<?=$rwTiket['id_tiket']?>','<?=$rwTiket['harga']?>')" class="btn btn-primary">Beli Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
<?php
        }
    }
    else if($_GET['f'] != "wilayah") {
        $selectLatest = mysqli_query($konek,"SELECT * FROM tiket INNER JOIN wilayah ON tiket.id_wilayah = wilayah.id_wilayah ORDER BY $_GET[f] $_GET[o]");
        while($rwTiket = mysqli_fetch_assoc($selectLatest)) {
        $tanggal = date("l,d M Y", strtotime($rwTiket['tanggal']));
?>  
        <div class="col-3 mx-auto my-3" style="width: 25rem;">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h3 class="fw-bold"><?= $rwTiket['judul_konser'] ?></h4>
                        <div class="ribbon ribbon-top-right"><span>Rp. <?=$rwTiket['harga']?></span></div>
                    </div>
                    <p class="lh-base">Presented by <strong><?=$rwTiket['nama_band']?></strong><br><?=$tanggal?> <br> <?=$rwTiket['tempat']?><br> <span class="badge bg-primary"><?=$rwTiket['jumlah']?> Tiket Tersisa</span></p>
                    <div class="d-flex justify-content-between mt-5">
                        <h4><?=$rwTiket['wilayah']?></h4>
                        <button onclick="tumbas('<?=$rwTiket['id_tiket']?>','<?=$rwTiket['harga']?>')" class="btn btn-primary">Beli Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
<?php
        }
    }
    else if ($_GET['f'] == "wilayah") {
        $selectLatest = mysqli_query($konek,"SELECT * FROM tiket INNER JOIN wilayah ON tiket.id_wilayah = wilayah.id_wilayah WHERE wilayah.id_wilayah=$_GET[o]");
        while($rwTiket = mysqli_fetch_assoc($selectLatest)) {
        $tanggal = date("l,d M Y", strtotime($rwTiket['tanggal']));
?>
        <div class="col-3 mx-auto my-3" style="width: 25rem;">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h3 class="fw-bold"><?= $rwTiket['judul_konser'] ?></h4>
                        <div class="ribbon ribbon-top-right"><span>Rp. <?=$rwTiket['harga']?></span></div>
                    </div>
                    <p class="lh-base">Presented by <strong><?=$rwTiket['nama_band']?></strong><br><?=$tanggal?> <br> <?=$rwTiket['tempat']?><br> <span class="badge bg-primary"><?=$rwTiket['jumlah']?> Tiket Tersisa</span></p>
                    <div class="d-flex justify-content-between mt-5">
                        <h4><?=$rwTiket['wilayah']?></h4>
                        <button onclick="tumbas('<?=$rwTiket['id_tiket']?>','<?=$rwTiket['harga']?>')" class="btn btn-primary">Beli Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
<?php
        }
    }
?>