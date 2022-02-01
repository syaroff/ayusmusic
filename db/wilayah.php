<?php 

    include "konek.php";
    $select = mysqli_query($konek,"SELECT * FROM wilayah");
    $content = [];
    while($row = mysqli_fetch_assoc($select)) {
       array_push($content,$row);
    }
    echo json_encode($content);

?>