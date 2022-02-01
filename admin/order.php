<?php 
   session_start();
   if(empty($_SESSION['username'])) {
       header("Location: ../");
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
    <title>Laporan Transaksi | A Y U S M U S I C</title>
</head>
<body>
   <div class="container-fluid">
      <div class="row flex-nowrap">
         <?php include "../components/sidebar.php" ?>
         <div class="col px-0 w-100">
         <?php include "../components/navatas.php" ?>
                <div class="col-12 px-3 py-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="fw-bold pt-3 px-4 mb-3">Laporan Transaksi</h4>
                            <div class="col-12 px-4 d-flex">
                                <input type="text" name="search" id="search" class="form-control" placeholder="Nama Pemesan , Judul Konser , No Wa , Id Pesanan">
                                <button id="btn-search" class="btn btn-primary btn-ungu mx-2"><i class="las la-search"></i></button>
                            </div>
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
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <script src="asssets/js/bootstrap.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
   <script src="../assets/js/bootstrap.min.js"></script>
   <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
            $('#btn-search').click(function (e) { 
                e.preventDefault();
                let query = $('#search').val();
                window.location.href = "?q=" + query;
            });
        });
   </script>
</body>
</html>