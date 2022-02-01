<?php 

    include "konek.php";
    if(isset($_GET['q'])) {
        $search = mysqli_query($konek,"SELECT * FROM vwtransaksi WHERE id_order LIKE '%$_GET[q]%' OR nama_pemesan LIKE '%$_GET[q]%' OR judul_konser LIKE '%$_GET[q]%'");
        $no = 1;
        while($row = mysqli_fetch_assoc($search)) {
                $pesan = "Halo Admin,saya ingin memberitahu pesanan saya dengan ID = $row[id_order] atas Nama = $row[nama_pemesan] agar segera diproses.";
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
