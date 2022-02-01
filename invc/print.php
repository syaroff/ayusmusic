<?php 
    session_start();
    include "../db/konek.php";
    $selectBukti = mysqli_query($konek,"SELECT * FROM vwtransaksi WHERE id_order = '$_GET[i]'");
    $pegawai = "Budi";
    $no_service = "087653210812";
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
    <div class="mx-4 my-4 card col-3">
        <div class="card-body">
            <center>
                <span class="las la-music" style="font-size: 5rem;"></span>
                <h2 class="fw-bold">A Y U S M U S I C</h2>
                <hr>
                <h5>BUKTI TRANSAKSI</h5>
                <hr>
            </center>
           <div class="px-5">
           <?php
                foreach($selectBukti as $row) {
            ?>
                        <pre>Nama Pemesan   = <?= $row['nama_pemesan']?></pre>
                        <pre>Judul Konser   = <?= $row['judul_konser']?></pre>
                        <pre>No Wa   = <?= $row['no_wa']?></pre>
                        <pre>Jumlah Tiket   = <?= $row['jumlah_tiket']?></pre>
                        <pre>Harga Satuan   = <?= $row['harga']?></pre>
                        <pre>Harga Total  = <?= $row['hatot']?></pre>
            <?php
                }
            ?>
           </div>
           <hr>
           <center>
               Customer Service = <b><?=$pegawai?></b>  ( <b><?=$no_service?></b> )
           </center>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <script src="asssets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script>
        window.print();
    </script>
</body>
</html>