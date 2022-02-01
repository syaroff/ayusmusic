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
    <title>List Tiket | A Y U S M U S I C</title>
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
                            <h4 class="fw-bold pt-2 px-4 text-center text-md-start">Tambah Tiket Baru</h2>
                            <form method="post">
                                <div class="container-fluid my-4">
                                    <div class="row">
                                        <div class="co-12 col-lg-4 mb-4">
                                            <label for="judul" class="fw-bold mb-2">Judul Konser</label>
                                            <input type="hidden" name="id_tiket" id="id_tiket">
                                            <input type="text" name="judul" id="judul" class="form-control" minlength="3" required>
                                        </div>
                                        <div class="co-12 col-lg-4 mb-4">
                                            <label for="band" class="fw-bold mb-2">Nama Band</label>
                                            <input type="text" name="band" id="band" class="form-control" minlength="3" required>
                                        </div>
                                        <div class="co-12 col-lg-4 mb-4">
                                            <label for="tanggal" class="fw-bold mb-2">Tanggal</label>
                                            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                                        </div>
                                        <div class="co-12 col-lg-4 mb-4">
                                            <label for="jumlah" class="fw-bold mb-2">Jumlah</label>
                                            <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                                        </div>
                                        <div class="co-12 col-lg-4 mb-4">
                                            <label for="harga" class="fw-bold mb-2">Harga</label>
                                            <input type="number" name="harga" id="harga" class="form-control" required>
                                        </div>
                                        <div class="co-12 col-lg-4 mb-4">
                                            <label for="wilayah" class="fw-bold mb-2">Wilayah</label>
                                            <select name="wilayah" id="wilayah" class="form-control">
                                                <?php
                                                    $wil = mysqli_query($konek,"SELECT * FROM wilayah");
                                                    while($wilayah = mysqli_fetch_assoc($wil)) {
                                                ?>
                                                        <option value="<?=$wilayah['id_wilayah']?>"><?=$wilayah['wilayah']?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="co-12 mb-4">
                                            <label for="tempat" class="fw-bold mb-2">Tempat Konser</label>
                                            <textarea name="tempat" id="tempat" cols="30" rows="3" class="form-control"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <input type="submit" value="Ubah" name="ubah" id="ubah" class="btn btn-info text-white">
                                            <input type="submit" value="Simpan" name="simpan" id="simpan" class="btn btn-primary btn-ungu">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 px-3 py-4">
                    <div class="card">
                        <div class="card-body pt-3">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead class="text-white" style="background-color: var(--ungu);">
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Judul Konser</th>
                                            <th>Nama Band</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Wilayah</th>
                                            <th>Tempat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $selTik = mysqli_query($konek,"SELECT * FROM tiket INNER JOIN wilayah ON tiket.id_wilayah = wilayah.id_wilayah ORDER BY id_tiket ASC");
                                            $no = 1;
                                            while($rowTik=mysqli_fetch_assoc($selTik)) {
                                        ?>
                                                <tr>
                                                    <td><?=$no++;?></td>
                                                    <td><?=$rowTik['tanggal']?></td>
                                                    <td><?=$rowTik['judul_konser']?></td>
                                                    <td><?=$rowTik['nama_band']?></td>
                                                    <td><?=$rowTik['jumlah']?></td>
                                                    <td><?=$rowTik['harga']?></td>
                                                    <td><?=$rowTik['wilayah']?></td>
                                                    <td><?=$rowTik['tempat']?></td>
                                                    <td>
                                                        <button onclick="edit('<?=$rowTik['id_tiket']?>','<?=$rowTik['id_wilayah']?>','<?=$rowTik['judul_konser']?>','<?=$rowTik['nama_band']?>','<?=$rowTik['tanggal']?>','<?=$rowTik['jumlah']?>','<?=$rowTik['harga']?>','<?=$rowTik['tempat']?>')" class="btn btn-primary btn-ungu"><i class="las la-pen"></i></button>
                                                        <a href="tiket.php?t=<?=$rowTik['id_tiket']?>" class="btn btn-info text-white mt-1"><i class="las la-trash"></i></a>
                                                    </td>
                                                </tr>
                                        <?php
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
   <?php 
        // Insert ke tabel wilayah
        if(isset($_POST['simpan'])) {
            $insertWil = mysqli_query($konek,"INSERT INTO tiket (judul_konser,nama_band,tanggal,jumlah,harga,id_wilayah,tempat) VALUES ('$_POST[judul]','$_POST[band]','$_POST[tanggal]','$_POST[jumlah]','$_POST[harga]','$_POST[wilayah]','$_POST[tempat]',)");
            echo "<script>window.location.href= 'tiket.php'</script>";
        }
        else if(isset($_POST['ubah'])) {
            $ubahWil = mysqli_query($konek,"UPDATE tiket SET judul_konser='$_POST[judul]',nama_band='$_POST[band]',tanggal='$_POST[tanggal]',jumlah='$_POST[jumlah]',harga='$_POST[harga]',id_wilayah='$_POST[wilayah]',tempat='$_POST[tempat]' WHERE id_tiket='$_POST[id_tiket]'");
            echo "<script>window.location.href= 'tiket.php'</script>";
        }
        else if(isset($_GET['t'])) {
            $delWil = mysqli_query($konek,"DELETE FROM tiket WHERE id_tiket='$_GET[t]'");
            echo "<script>window.location.href= 'tiket.php'</script>";
        }
   ?>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <script src="asssets/js/bootstrap.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
   <script src="../assets/js/bootstrap.min.js"></script>
   <script>
       const edit = (idTik,idWil,judul,band,tanggal,jumlah,harga,tempat) => {
            $('#judul').val(judul);
            $('#band').val(band);
            $('#tanggal').val(tanggal);
            $('#jumlah').val(jumlah);
            $('#harga').val(harga);
            $('#tempat').val(tempat);
            $('#wilayah').val(idWil);
            $('#id_tiket').val(idTik);
       }
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
   </script>
</body>
</html>