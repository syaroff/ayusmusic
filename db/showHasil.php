<?php
    $total = 0;
    $no = 1;
    if(!isset($_GET['q'])) {
        $elHasil = mysqli_query($konek,"SELECT * FROM hasil");
        
        foreach($elHasil as $row) {
            $total += $row['jumlah_total'];
?>                  
                <tr>
                    <td><?=$no++;?></td>
                    <td><?=$row['tanggal']?></td>
                    <td><?=$row['jumlah_total']?></td>
                </tr>
<?php
        }
    }
    else if(isset($_GET['q'])) {
        $elHasil = mysqli_query($konek,"SELECT * FROM hasil WHERE tanggal LIKE '%$_GET[q]%'");
        
        foreach($elHasil as $row) {
            $total += $row['jumlah_total'];
?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?=$row['tanggal']?></td>
                    <td><?=$row['jumlah_total']?></td>
                </tr>
<?php
        }
    }


?>