<?php 
    session_start();
    if(empty($_SESSION['username'])) {
            header("location: login.php");
    }
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
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>Dashboard | A Y U S M U S I C</title>
</head>
<body>
   <div class="container-fluid">
      <div class="row flex-nowrap">
         <?php include "../components/sidebar.php" ?>
         <div class="col px-0 w-100">
         <?php include "../components/navatas.php" ?>
         <div class="col-12 px-3 py-4">
                    <div class="row">
                        <div class="col-12 col-md-3 my-2">
                            <div class="card">
                            <div class="card-body py-3">
                                    <center>
                                        <?php $selOrder = mysqli_query($konek,"SELECT COUNT(*) AS total FROM `order`");$rowOrder=mysqli_fetch_assoc($selOrder); ?>
                                        <h1><?=$rowOrder['total']?></h1>
                                        <p>Jumlah Transaksi</p>
                                    </center>
                            </div>
                            </div>
                        </div> 
                        <div class="col-12 col-md-3 my-2">
                            <div class="card">
                            <div class="card-body py-4">
                                    <center>
                                        <h1><span class="las la-plus-circle"></span></h1>
                                        <a href="order.php" class="text-decoration-none text-dark">Tambah Transaksi</a>
                                    </center>
                            </div>
                            </div>
                        </div> 
                        <div class="col-12 col-md-3 my-2">
                            <div class="card">
                            <div class="card-body py-3">
                                    <center>
                                        <?php 
                                            $selHasil = mysqli_query($konek,"SELECT jumlah_total FROM hasil");
                                            $total = 0;
                                            while($rowHasil = mysqli_fetch_assoc($selHasil)) {
                                                $total += $rowHasil['jumlah_total'];
                                            }
                                        ?>
                                        <h1><?=$total?></h1>
                                        <p>Total Penghasilan</p>
                                    </center>
                            </div>
                            </div>
                        </div> 
                        <div class="col-12 col-md-3 my-2">
                            <div class="card">
                            <div class="card-body py-4">
                                    <center>
                                    <h1><span class="las la-plus-circle"></span></h1>
                                        <a href="order.php" class="text-decoration-none text-dark">Tambah Transaksi</a>
                                    </center>
                            </div>
                            </div>
                        </div>
                        <div class="col-12 px-3 py-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="fw-bold pt-3 px-4 mb-3">Laporan Singkat Hasil Penjualan</h4>
                                    <div class="col-12 my-3 px-4">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-center">
                                                <thead class="text-white" style="background-color: var(--ungu);">
                                                    <tr class="bg-light text-dark">
                                                        <th colspan="2">TOTAL</th>
                                                        <th id="total"></th>
                                                    </tr>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tanggal</th>
                                                        <th>Jumlah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php include "../db/showHasil.php"; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 px-3 py-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="fw-bold pt-3 px-4 mb-3">Laporan Singkat Transaksi</h4>
                                    <div class="container-fluid my-3">
                                        <div class="row">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-center ">
                                                    <thead class="text-white" style="background-color: var(--ungu);">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Pemesan</th>
                                                            <th>Judul Konser</th>
                                                            <th>No Wa</th>
                                                            <th>Jumlah Tiket</th>
                                                            <th>Harga Total</th>
                                                            <th>Status</th>
                                                            <th>Kode Order</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php include "../db/showOrder.php" ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
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
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
            $('#total').text(<?= $total?>);
        });
   </script>
</body>
</html>