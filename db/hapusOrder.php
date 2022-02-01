<?Php 

    include "konek.php";
    if(isset($_GET['i'])) {
        $del = mysqli_query($konek,"DELETE FROM `order` WHERE id_order = '$_GET[i]'");
        header("Location: ../admin/order.php");
    }

?>