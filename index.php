<?php

    include "db/konek.php";
    if(!isset($_GET['tiket']) AND !isset($_GET['s']) AND !isset($_GET['f'])) {
        header("Location: ?tiket=all");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.style.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>AYUSMUSIC - HOME OF MUSIC</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow" style="background: #fff;">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#"><i class="las la-music fw-bold"></i>  A Y U S M U S I C</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse px-3" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          
        </ul>
            <a href="nimda/login.php" class="btn btn-primary btn-md">Sign In</a>
        </div>
    </div>
    </nav>
    <div id="jumbotron-header" class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="row align-items-center justify=content-center w-100" style="min-height: 100vh;">
                <div class="col-12 text-center">
                    <h2 class="display-6 fw-bold text-white" style="letter-spacing: .3em;">AYUSMUSIC</h2>
                    <p class="text-white text-center">Mari Jelajahi & Explore Musik Bersama - sama</p>
                    <hr style="color: white;">
                </div>
            </div>
        </div>
    </div>
    <div class="container container-fluid my-5">
        <div class="row">
            <div class="col-12 my-5">
                <h2 class="fw-bold text-center text-lg-start">Tiket Terbaru</h2>
                <div class="col-12 mt-5">
                    <div class="row">
                        <?php
                            $selectLatest = mysqli_query($konek,"SELECT * FROM tiket INNER JOIN wilayah ON tiket.id_wilayah = wilayah.id_wilayah ORDER BY id_tiket DESC LIMIT 3");
                            while($rwTiket = mysqli_fetch_assoc($selectLatest)) {
                                $tanggal = date("l,d M Y", strtotime($rwTiket['tanggal']));
                        ?>
                                <div class="col-3 mx-auto my-3" style="width: 35rem;">
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
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-12 my-5">
                <h2 class="fw-bold text-center text-lg-start">Semua Tiket</h2>
                <div class="col-12 mt-5">
                    <div class="row">
                        <div class="col-12 col-md-6 mb-4">
                            <a href="invc/" class="btn btn-primary w-100">CEK STATUS PESANAN</a>
                        </div>
                        <div class="col-12 col-md-6 mb-4">
                            <a href="tiket/" class="btn btn-primary w-100">AMBIL TIKET</a>
                        </div>
                        <div class="col-12 col-md-6 d-flex mb-4 mb-md-0">
                            <input type="search" name="search" id="search" class="form-control" placeholder="Search here" style="margin-right: 5px;">
                            <button id="btn-search" class="btn btn-primary"><i class="las la-search"></i></button>
                        </div>
                        <div class="col-12 col-md-6 d-flex">
                            <select name="kategori" id="kategori" class="form-control">
                                <option value="harga">Harga</option>
                                <option value="jumlah">Jumlah</option>
                                <option value="wilayah">Wilayah</option>
                            </select>
                            <select name="opsi" id="opsi" class="form-control" style="margin-left: 5px;">
                                <option value="DESC">Harga Tertinggi</option>
                                <option value="ASC">Harga Terendah</option>
                            </select>
                            <button id="btn-filter" class="btn btn-primary" style="margin-left: 5px;"><i class="las la-filter"></i></button>
                            <button id="btn-reset" class="btn btn-primary" style="margin-left: 5px;">Reset</button>
                        </div>
                    </div>
                    <div class="row mt-5">
                            <?php include "db/showTiket.php" ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tumbas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Beli Tiket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="container-fluid">
                        <div class="row">
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="pemesan" class="fw-bold mb-3">Nama Pemesan</label>
                            <input type="hidden" name="id_tiket" id="id_tiket">
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="no_wa" class="fw-bold mb-3">No Whatsapp</label>
                            <input type="text" name="wa" id="wa" class="form-control" required>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="jumlah" class="fw-bold mb-3">Jumlah Tiket</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="harga" class="fw-bold mb-3">Harga Satuan</label>
                            <input type="number" name="harga" id="harga" class="form-control" readonly>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="total" class="fw-bold mb-3">Total Harga</label>
                            <input type="number" name="total" id="total" class="form-control" readonly>
                        </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" name="pesan" value="Pesan Tiket" class="btn btn-primary">
                </form>
            </div>
            </div>
        </div>
    </div>
    <?php

        if(isset($_POST['pesan'])) {
            $tumbas = mysqli_query($konek,"INSERT INTO `order` (id_tiket,nama_pemesan,no_wa,harga,jumlah_tiket,status_order) VALUES ('$_POST[id_tiket]','$_POST[nama]','$_POST[wa]','$_POST[total]','$_POST[jumlah]',0)");
            
            $selIDorder = mysqli_query($konek,"SELECT * FROM `order` ORDER BY id_order DESC LIMIT 1");$rowIdOrder = mysqli_fetch_assoc($selIDorder);$id_order = $rowIdOrder['id_order'];
            
            $tanggal = date("Y-m-d");
            $hasilan = mysqli_query($konek,"INSERT INTO hasil (id_order,tanggal,jumlah_total) VALUES ('$id_order','$tanggal',0)");
            if($tumbas) {
                echo "<script>window.location.href= 'invc/?i=' + $id_order</script>";
            }
        }
    
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <script src="asssets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script>

        // *Beli tiket
        const tumbas = (idTik,harga) => {
            var myModal = new bootstrap.Modal(document.getElementById('tumbas'), {
                keyboard: false
            })
            myModal.show()
            $('#id_tiket').val(idTik);
            $('#harga').val(harga);
        }
        $('#jumlah').change(function (e) { 
            e.preventDefault();
            let total = $('#harga').val() * $(this).val();
            $('#total').val(total);
        });
        // * Button Pencarian
        $('#btn-search').click(function (e) { 
            e.preventDefault();
            const query_search = $('#search').val();
            window.location.href = '?s=' + query_search;
        });
        // *Reset Button Filter
        $('#btn-reset').click(function (e) { 
            e.preventDefault();
            window.location.href = "?tiket=all";
        });
        //  *Ubah Kategori Seletor
        $('#kategori').change(function (e) { 
            e.preventDefault();
            const filter_val = $('#kategori').val();
            let content_opsi = '';
            if(filter_val == "harga") {
                content_opsi = `
                                <option value="DESC">Harga Tertinggi</option>
                                <option value="ASC">Harga Terendah</option>
                `;
            }
            else if ( filter_val == "jumlah" ) {
                content_opsi = `
                                <option value="DESC">Terbanyak</option>
                                <option value="ASC">Akan Habis</option>
                `;
            }
            else if ( filter_val == 'wilayah') {
                $.ajax({
                    type: "GET",
                    url: "db/wilayah.php",
                    dataType: "JSON",
                    success: function (response) {
                        data = [...response]
                        data.forEach(el => {
                            content_opsi += `

                                <option value="${el.id_wilayah}">${el.wilayah}</option>

                            `;
                            
                        });                        
                        $('#opsi').append(content_opsi);
                    }
                   
                });
                
            }
            
            $('#opsi').html('');
            $('#opsi').append(content_opsi);
        });
        $('#btn-filter').click(function (e) { 
            e.preventDefault();
            let kategori = $('#kategori').val();
            let opsi = $('#opsi').val();
            window.location.href = "?f=" + kategori + "&o=" + opsi;
            
        });
    </script>
</body>
<footer class="mt-5">
    <div class="container container-fluid mt-5">
        <div class="col-12">
            <div class="row">
                <hr>
                <p class="text-muted text-center text-md-start">Copyright &copy; 2022 | <i class="las la-music"></i> A Y U S M U S I C </p>
            </div>
        </div>
    </div>
</footer>
</html>