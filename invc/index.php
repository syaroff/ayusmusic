<?php 

    session_start();
    include "../db/konek.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/main.style.css">
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
                <a href="../nimda/login.php" class="btn btn-primary btn-md">Sign In</a>
            </div>
        </div>
    </nav>
    <div class="container container-fluid my-5" style="min-height: 80vh;">
        <div class="row">
            <div class="col-12 my-5">
                <div class="card">
                    <div class="card-body">
                    <div class="container-fluid">
                        <label for="search" class="fw-bold mb-2 px-1">Cari Transaksimu Disini</label>
                        <div class="col-12 d-flex">
                            <input type="text" id="search" class="form-control w-100" placeholder="Nama Pemesan,Judul Konser,ID Invoice,">
                            <button id="btn-search" class="btn btn-primary mx-2"><i class="las la-search"></i></button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-12 my-5">
                <div class="card">
                    <div class="card-body">
                        <h3 class="fw-bold pt-3 px-4 mb-3">List Data Transaksi</h3>
                        <div class="container-fluid">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pemesan</th>
                                            <th>Judul Konser</th>
                                            <th>Jumlah Tiket</th>
                                            <th>No Wa</th>
                                            <th>Harga Satuan</th>
                                            <th>Total Harga</th>
                                            <th>Status Order</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php include "../db/searchAntrian.php"; ?>
                                        <?php 
                                            if(isset($_GET['i'])) {
                                                $selOrder = mysqli_query($konek,"SELECT * FROM vwTransaksi WHERE id_order = $_GET[i]");
                                                $no = 1;
                                                while($row = mysqli_fetch_assoc($selOrder)) {
                                        ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $row['nama_pemesan'] ?></td>
                                                        <td><?= $row['judul_konser']  ?></td>
                                                        <td><?= $row['jumlah_tiket']  ?></td>
                                                        <td><?= $row['no_wa'] ?></td>
                                                        <td><?= $row['harga'] ?></td>
                                                        <td><?= $row['hatot'] ?></td>
                                                        <td>
                                                                <?php 
                                                                        if(!$row['status_order']) {
                                                                ?>
                                                                            <span class="badge bg-danger">Belum Lunas</span>
                                                                <?php

                                                                        }
                                                                        else if($row['status_order'] == 1)  {
                                                                ?>
                                                                            <span class="badge bg-success">Lunas</span>
                                                                <?php
                                                                        }
                                                                ?>
                                                        </td>
                                                        <td>
                                                            <a href="print.php?i=<?=$row['id_order']?>" class="btn btn-primary"><i class="las la-print"></i></a>
                                                            <a href="https://wa.me/6213412445122?text=<?=$pesan?>" class="btn btn-success mt-1 mt-md-0"><i class="lab la-whatsapp"></i></a>
                                                        </td>
                                                    </tr>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <script src="asssets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script>
        $('#btn-search').click(function (e) { 
            e.preventDefault();
            let query = $('#search').val();
            window.location.href = "?q=" + query;
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