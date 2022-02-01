<?php 

    include "../db/konek.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <style type="text/css">
            body {
                font-family: sans-serif;
                background-color: #fff;
                color: #535353;
                margin: 5px;
            }
            
            table {
                border-collapse: collapse;
                padding: 0;
                width: 100%;
            }
            
            td {
                padding: 0;
                vertical-align: top;
            }
            
            .ticket-title {
                color: #999;
                font-size: 16px;
                letter-spacing: 0;
                line-height: 16px;
                margin-top: 10px;
            }
            
            .ticket-info {
                color: #535353;
                font-size: 14px;
                line-height: 21px;
            }
            
            .ticket-wrapper {
                border: 2px solid #999;
                border-top: 12px solid rgb(33,150,243);
                margin: 15px auto 0;
                padding-bottom: 15px;
                width: 650px;
            }
            
            .ticket-wrapper:first-child {
                margin-top: 0;
            }
            
            .ticket-table {}
            
            .ticket-table .first-col {
                width: 570px;
            }
            
            .ticket-logo {
                border-left: 2px dashed #ccc;
                text-align: center;
                vertical-align: middle;
            }
            
            .ticket-logo img {
                height: 189px;
                width: 38px;
            }
            
            .ticket-name-div {
                border-bottom: 2px dotted #ccc;
                margin: 0 12px 0 22px;
                padding: 15px 0px 15px 0;
                text-align: left;
            }
            
            .ticket-event-longtitle {
                color: #535353;
                font-size: 22px;
                letter-spacing: -1px;
                line-height: 22px;
            }
            
            .ticket-event-shorttitle {
                color: #535353;
                font-size: 18px;
                letter-spacing: -1px;
                line-height: 22px;
            }
            
            .ticket-event-details {
                border-bottom: 2px dotted #ccc;
                margin: 0 12px 0px 22px;
                padding: 15px 0px 15px 0;
                text-align: left;
            }
            
            .ticket-event-details .first-col {
                text-align: left;
                width: 40%;
            }
            
            .ticket-event-details .second-col {
                text-align: right;
                vertical-align: top;
                width: 60%;
            }
            
            .ticket-venue {
                color: #535353;
                font-size: 14px;
                line-height: 21px;
            }
            
            .ticket-venue:first-child {
                font-size: 16px;
            }
            
            .ticket-ticket-details {
                margin: 0 12px 0px 22px;
                text-align: left;
            }
            
            .ticket-ticket-details .first-col {
                border-right: 2px dashed #ccc;
                padding-top: 4px;
                text-align: left;
                vertical-align: top;
                width: 150px;
            }
            
            .ticket-ticket-details .second-col {
                padding: 4px 0px 0px 32px;
                text-align: left;
                width: 225px;
            }
            
            .ticket-ticket-details .third-col {
                text-align: right;
            }
            
            .ticket-qr-code{
                height: 95px;
                margin-top: 10px;
                width: 95px;
            }
            
            /* Print specific styles */
            @media print {
                a[href]:after, abbr[title]:after {
                    content: "";
                }
                
                .ticket-wrapper {
                    width: 16cm;
                }
                
                .ticket-table .first-col {
                    width: 13.8cm;
                }
                
                .ticket-logo img {
                    height: auto;
                    max-width: 100%;
                }
                
                .ticket-ticket-details .first-col {
                    width: 4cm;
                }
                
                .ticket-ticket-details .second-col {
                    width: 6cm;
                }
                
                .ticket-ticket-details .third-col {
                    width: 2.5cm;
                }
                
                @page {
                    margin: 1cm;
                }
            }
        </style>
    </head>
    <body>
        <?php

            if(isset($_GET['i'])) {
                $selectTiket = mysqli_query($konek,"SELECT * FROM vwtransaksi WHERE id_order=$_GET[i]");
                foreach($selectTiket as $row) {
                    $jumlah = $row['jumlah_tiket'];
                }
                for($i=1;$i <= $jumlah;$i++) {
                    foreach($selectTiket as $row) {
        ?>
                                    <!-- Start Ticket -->
                                    <div class="ticket-wrapper">
                                        <table class="ticket-table">
                                            <tr>
                                                <td class="first-col">
                                                    <!-- title -->
                                                    <div class="ticket-name-div">
                                                        <span class="ticket-event-longtitle"><b><?=$row['judul_konser']?></b></span>
                                                    </div>
                                                    <!-- /.ticket-name-div -->
                                                    <!-- venue details start -->
                                                    <div class="ticket-event-details">
                                                        <table>
                                                            <tr>
                                                                <td class="first-col">
                                                                    <div class="ticket-info">
                                                                       <b><?= date("D,"). $row['tanggal']?></b>
                                                                    </div>
                                                                    <!-- /.ticket-info -->
                                                                    <div class="ticket-title">
                                                                    </div>
                                                                    <!-- /.ticket-title -->
                                                                    <div class="ticket-info">
                                                                    </div>
                                                                    <!-- /.ticket-info -->
                                                                </td>
                                                                <!-- /.first-col -->
                                                                <td class="second-col">
                                                                    <div class="ticket-venue">
                                                                        TEMPAT KONSER
                                                                    </div>
                                                                    <!-- /.ticket-venue -->
                                                                    <div class="ticket-venue">
                                                                        <b><?=$row['tempat']?></b>
                                                                    </div>
                                                                    <!-- /.ticket-venue -->
                                                                </td>
                                                                <!-- /.second-col -->
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <!-- /.ticket-event-details -->
                                                    <!-- ticket details start -->
                                                    <div class="ticket-ticket-details">
                                                        <table>
                                                            <tr>
                                                                <td class="first-col">
                                                                    <div class="ticket-title">
                                                                        PRESENTED BY
                                                                    </div>
                                                                    <!-- /.ticket-title -->
                                                                    <div class="ticket-info">
                                                                        <b><?= $row['nama_band']?></b>
                                                                    </div>
                                                                    <!-- /.ticket-info -->
                                                                    <div class="ticket-title">
                                                                        HARGA
                                                                    </div>
                                                                    <!-- /.ticket-title -->
                                                                    <div class="ticket-info">
                                                                        <b>Rp. <?=$row['harga']?></b>
                                                                    </div>
                                                                    <!-- /.ticket-info -->
                                                                </td>
                                                                <!-- /.first-col -->
                                                                <td class="second-col">
                                                                    <div class="ticket-title">
                                                                        TIKET OWNER
                                                                    </div>
                                                                    <!-- /.ticket-title -->
                                                                    <div class="ticket-info">
                                                                        <b><?=$row['nama_pemesan']?></b>
                                                                    </div>
                                                                    <!-- /.ticket-info -->
                                                                    <div class="ticket-title">
                                                                        KODE WILAYAH
                                                                    </div>
                                                                    <!-- /.ticket-title -->
                                                                    <div class="ticket-info">
                                                                        <b><?=$row['wilayah']?></b>
                                                                    </div>
                                                                    <!-- /.ticket-info -->
                                                                </td>
                                                                <!-- /.second-col -->
                                                                <td class="third-col">
                                                                   <i class="las la-music" style="font-size: 5rem;font-weight: bolder;padding: 10px 20px;"></i>
                                                                </td>
                                                                <!-- /.third-col -->
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <!-- /.ticket-ticket-details -->
                                                </td>
                                                <!-- /.first-col -->
                                                <td class="ticket-logo">
                                                    <h3 style="font-weight: bolder;transform: rotate(90deg);">TERVALIDASI</h3>
                                                </td>
                                                <!-- /.ticket-logo -->
                                            </tr>
                                        </table>
                                        <!-- /.ticket-table -->
                                    </div>
                                    <!-- /.ticket-wrapper -->
                                    <!-- End Ticket -->
        <?php
                    }
                }
            }
        
        
        ?>
    </body>
</html>