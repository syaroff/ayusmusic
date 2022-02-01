<?php 

    include "konek.php";
    function random_strings($length_of_string)
    {

    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    return substr(str_shuffle($str_result), 
                       0, $length_of_string);
                }
    if(isset($_GET['i'])) {
        $kode = $_GET['i'].random_strings(34);
        $selJumlahTiket = mysqli_query($konek,"SELECT jumlah FROM tiket WHERE id_tiket = $_GET[t]");
        $rowTiket = mysqli_fetch_assoc($selJumlahTiket);$jumlah = (intval($rowTiket['jumlah']) - intval($_GET['jt']));
        $updateOrder = mysqli_query($konek,"UPDATE `order` SET kode_order='$kode',status_order=1 WHERE id_order='$_GET[i]'");
        $updateTiket = mysqli_query($konek,"UPDATE tiket SET jumlah=$jumlah  WHERE id_tiket = '$_GET[t]'");
        $updateHasil = mysqli_query($konek,"UPDATE hasil SET jumlah_total = '$_GET[j]' WHERE id_order='$_GET[i]'");
        header("Location: ../admin/order.php");
    }

?>