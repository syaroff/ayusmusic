<?php
    
    $no = 1;
    if(!isset($_GET['q'])) {
        $elHasil = mysqli_query($konek,"SELECT * FROM vwtransaksi");
        
        foreach($elHasil as $row) {
                $pesan= "Hai Pelanggan!,Transaksi kamu berhasil,kamu bisa mengambil tiketmu sekarang dengan memasukkan kode berikut : $row[kode_order]";
?>                  
                <tr>
                    <td><?=$no++;?></td>
                    <td><?=$row['nama_pemesan']?></td>
                    <td><?=$row['judul_konser']?></td>
                    <td><?=$row['no_wa']?></td>
                    <td><?=$row['jumlah_tiket']?></td>
                    <td><?=$row['hatot']?></td>
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
                    <td><?=$row['kode_order']?></td>
                    <td>
                        <?php
                                if(!$row['status_order']) {
                        ?>
                                <a href="../db/done.php?i=<?=$row['id_order']?>&j=<?=$row['hatot']?>&jt=<?=$row['jumlah_tiket']?>&t=<?=$row['id_tiket']?>" class="btn btn-primary btn-ungu"><i class="las la-check-circle"></i></a>
                        <?php
                                }
                        ?>
                        <a href="https://wa.me/<?=$row['no_wa']?>?text=<?=$pesan?>" class="btn btn-success mt-1 mt-md-0"><i class="lab la-whatsapp"></i></a>
                        <a href="../db/hapusOrder.php?i=<?=$row['id_order']?>" class="btn btn-danger mt-1 mt-md-0"><i class="las la-trash"></i></a>
                    </td>
                </tr>
<?php
        }
    }
    else if(isset($_GET['q'])) {
        $elHasil = mysqli_query($konek,"SELECT * FROM vwtransaksi WHERE nama_pemesan LIKE '%$_GET[q]%' OR judul_konser LIKE '%$_GET[q]%' OR no_wa LIKE '%$_GET[q]%' OR id_order LIKE '%$_GET[q]%'");
        $pesan= "Hai Pelanggan!,Transaksi kamu berhasil,kamu bisa mengambil tiketmu sekarang dengan memasukkan kode berikut : $row[kode_order]";
        foreach($elHasil as $row) {
?>
                <tr>
                    <td><?=$no++;?></td>
                    <td><?=$row['nama_pemesan']?></td>
                    <td><?=$row['judul_konser']?></td>
                    <td><?=$row['no_wa']?></td>
                    <td><?=$row['jumlah_tiket']?></td>
                    <td><?=$row['hatot']?></td>
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
                    <td><?=$row['kode_order']?></td>
                    <td>
                        <?php
                                if(!$row['status_order']) {
                        ?>
                                <a href="../db/done.php?i=<?=$row['id_order']?>&j=<?=$row['hatot']?>&jt=<?=$row['jumlah_tiket']?>&t=<?=$row['id_tiket']?>" class="btn btn-primary btn-ungu"><i class="las la-check-circle"></i></a>
                        <?php
                                }
                        ?>
                        <a href="https://wa.me/<?=$row['no_wa']?>?text=<?=$pesan?>" class="btn btn-success mt-1 mt-md-0"><i class="lab la-whatsapp"></i></a>
                        <a href="../db/hapusOrder.php?i=<?=$row['id_order']?>" class="btn btn-danger mt-1 mt-md-0"><i class="las la-trash"></i></a>
                    </td>
                </tr>
<?php
        }
    }


?>