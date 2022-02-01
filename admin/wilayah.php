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
    <title>Dashboard | A Y U S M U S I C</title>
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
                            <h4 class="fw-bold pt-2 px-4 text-center text-md-start">Tambah Kategori Wilayah Baru</h2>
                            <form method="post">
                                <div class="container-fluid my-3">
                                    <div class="row">
                                        <div class="co-12 mb-4">
                                            <label for="wilayah" class="fw-bold mb-2">Nama Wilayah</label>
                                            <input type="hidden" name="id_wilayah" id="id_wilayah">
                                            <input type="text" name="wilayah" id="wilayah" class="form-control" placeholder="Malang,Batu,Batam,Mojokerto" minlength="3" required>
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
                                            <th>NO</th>
                                            <th>WILAYAH</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $selWil = mysqli_query($konek,"SELECT * FROM wilayah");
                                            $no = 1;
                                            while($rowWil=mysqli_fetch_assoc($selWil)) {
                                        ?>
                                                <tr>
                                                    <td><?=$no++;?></td>
                                                    <td><?=$rowWil['wilayah']?></td>
                                                    <td>
                                                        <button onclick="edit('<?=$rowWil['id_wilayah']?>','<?=$rowWil['wilayah']?>')" class="btn btn-primary btn-ungu"><i class="las la-pen"></i></button>
                                                        <a href="wilayah.php?w=<?=$rowWil['id_wilayah']?>" class="btn btn-info text-white"><i class="las la-trash"></i></a>
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
            $insertWil = mysqli_query($konek,"INSERT INTO wilayah (wilayah) VALUES ('$_POST[wilayah]')");
            echo "<script>window.location.href= 'wilayah.php'</script>";
        }
        else if(isset($_POST['ubah'])) {
            $ubahWil = mysqli_query($konek,"UPDATE wilayah SET wilayah='$_POST[wilayah]' WHERE id_wilayah='$_POST[id_wilayah]'");
            echo "<script>window.location.href= 'wilayah.php'</script>";
        }
        else if(isset($_GET['w'])) {
            $delWil = mysqli_query($konek,"DELETE FROM wilayah WHERE id_wilayah='$_GET[w]'");
            echo "<script>window.location.href= 'wilayah.php'</script>";
        }
   ?>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <script src="asssets/js/bootstrap.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
   <script src="../assets/js/bootstrap.min.js"></script>
   <script>
       const edit = (id,wilayah) => {
            $('#id_wilayah').val(id);
            $('#wilayah').val(wilayah);
       }
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
   </script>
</body>
</html>