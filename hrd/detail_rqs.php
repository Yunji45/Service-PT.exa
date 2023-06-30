<?php
  include '../db/koneksi.php';
  session_start();
  if (isset($_SESSION['level'])){
    if($_SESSION['level'] == "hrd") {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <link href="../fontawesome/css/all.css" rel="stylesheet"> 
    
    <!--load all styles -->

    <title>Detail RQS</title>
</head>
<style>
    @media (min-width:1100px){
        h2{
            text-align : center;
            text-transform : uppercase;
            margin-top : 20px;
        }

        .kartu-rqs{
            width : 1000px;
            height : 400px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            margin : 0 auto;
        }

        label{
            margin-left : 40px;
            margin-top : 20px;
        }

        .data-2{
            margin-left : 30px;
        }
        .tabel{
        overflow-x:auto;
        height : 200px;
        
      }

      .btn-primary{
          margin-top : 20px;
          margin-left : 12rem;
      }

      
    }

    @media print{
        .noprint{
            display:none !important;
        }

        h2{
            color : red;
        }
    }

</style>
<body>
    <h2>Detail RQS</h2>

    <?php
         $sql = "SELECT rqs_form.id_rqs, login.id_login, rqs_form.id_login, rqs_form.nama, rqs_form.tanggal, rqs_form.tanggal_acc, rqs_form.jam_acc, rqs_form.merk, rqs_form.tipe, rqs_form.unit, rqs_form.serial_number,rqs_form.permintaan_1,rqs_form.sn_permintaan_1, rqs_form.qty_1,rqs_form.satuan_1,permintaan_2,rqs_form.sn_permintaan_2, rqs_form.qty_2,rqs_form.satuan_2,permintaan_3,rqs_form.sn_permintaan_3, rqs_form.qty_3,rqs_form.satuan_3,rqs_form.permintaan_4,rqs_form.sn_permintaan_4, rqs_form.qty_4,rqs_form.satuan_4,rqs_form.permintaan_5,rqs_form.sn_permintaan_5, rqs_form.qty_5,rqs_form.satuan_5,rqs_form.permintaan_6,rqs_form.sn_permintaan_6, rqs_form.qty_6,rqs_form.satuan_6,permintaan_7,rqs_form.sn_permintaan_7, rqs_form.qty_7,rqs_form.satuan_7,rqs_form.permintaan_8,rqs_form.sn_permintaan_8, rqs_form.qty_8,rqs_form.satuan_8,permintaan_9,rqs_form.sn_permintaan_9, rqs_form.qty_9,rqs_form.satuan_9,permintaan_10,rqs_form.sn_permintaan_10, rqs_form.qty_10,rqs_form.satuan_10,rqs_form.status, rqs_form.tanggal_catatan, rqs_form.jam_catatan, rqs_form.catatan, rqs_form.tanggal_reject, rqs_form.jam_reject, rqs_form.catatan_reject FROM rqs_form INNER JOIN login ON rqs_form.id_login = login.id_login WHERE rqs_form.id_rqs = '".$_GET['id_rqs']."'";

         
         $result =$conn-> query($sql);
         if($result->num_rows > 0){
           while($row = $result->fetch_assoc()){
    ?>

    <div class="kartu-rqs">
        <!--  baris 1 -->
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">ID RQS</th>
            <th scope="col">Nama</th>
            <th scope="col">Tanggal RQS</th>
            <th scope="col">Unit</th>
            <th scope="col">Tipe</th>
            <th scope="col">Merek</th>
            <th scope="col">Serial Number</th>
            <?php
            if ($row['status'] == 'ACC') {
                ?>
            <th scope="col">Tanggal Acc</th>
            <th scope="col">Jam Acc</th>                 
            <?php
            }else{
                echo "";
            }
            ?>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td><?php echo $row['id_rqs'];?></td>
            <td><?php echo $row['nama'];?></td>
            <td><?php echo date('d-m-Y', strtotime($row['tanggal']));?></td>
            <td><?php echo $row['unit'];?></td>
            <td><?php echo $row['tipe'];?></td>
            <td><?php echo $row['merk'];?></td>
            <td><?php echo $row['serial_number'];?></td>
            <?php
            if ($row['status'] == 'ACC') {
                ?>
            <td><?php echo date('d-m-Y', strtotime ($row['tanggal_acc']));?></td>
            <td><?php echo date('H:i', strtotime ($row['jam_acc']));?></td>
            <?php
            }else{
                echo "";
            }
            ?>
            </tr>
        </tbody>
        </table>
       <br>
        <!-- tabel -->
        <div class="tabel">
            <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Permintaan</th>
                <th scope="col">Part Number</th>
                <th scope="col">QTY</th>
                <th scope="col">Satuan</th>
                <th scope="col">Status</th>
                <?php
                if ($row['status'] == 'PENDING') {
                ?>
                <th scope="col">Notes Pending</th>

                <?php
                };
                ?>
            
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                    <?php echo $row['permintaan_1'];?><br>
                    <?php echo $row['permintaan_2'];?><br>
                    <?php echo $row['permintaan_3'];?><br>
                    <?php echo $row['permintaan_4'];?><br>
                    <?php echo $row['permintaan_5'];?><br>
                    <?php echo $row['permintaan_6'];?><br>
                    <?php echo $row['permintaan_7'];?><br>
                    <?php echo $row['permintaan_8'];?><br>
                    <?php echo $row['permintaan_9'];?><br>
                    <?php echo $row['permintaan_10'];?>
                    </td>

                    <td>
                    <?php echo $row['sn_permintaan_1'];?><br>
                    <?php echo $row['sn_permintaan_2'];?><br>
                    <?php echo $row['sn_permintaan_3'];?><br>
                    <?php echo $row['sn_permintaan_4'];?><br>
                    <?php echo $row['sn_permintaan_5'];?><br>
                    <?php echo $row['sn_permintaan_6'];?><br>
                    <?php echo $row['sn_permintaan_7'];?><br>
                    <?php echo $row['sn_permintaan_8'];?><br>
                    <?php echo $row['sn_permintaan_9'];?><br>
                    <?php echo $row['sn_permintaan_10'];?>
                    </td>

                    <td>
                    <?php echo $row['qty_1'];?><br>
                    <?php echo $row['qty_2'];?><br>
                    <?php echo $row['qty_3'];?><br>
                    <?php echo $row['qty_4'];?><br>
                    <?php echo $row['qty_5'];?><br>
                    <?php echo $row['qty_6'];?><br>
                    <?php echo $row['qty_7'];?><br>
                    <?php echo $row['qty_8'];?><br>
                    <?php echo $row['qty_9'];?><br>
                    <?php echo $row['qty_10'];?>
                    </td>

                    <td>
                    <?php echo $row['satuan_1'];?><br>
                    <?php echo $row['satuan_2'];?><br>
                    <?php echo $row['satuan_3'];?><br>
                    <?php echo $row['satuan_4'];?><br>
                    <?php echo $row['satuan_5'];?><br>
                    <?php echo $row['satuan_6'];?><br>
                    <?php echo $row['satuan_7'];?><br>
                    <?php echo $row['satuan_8'];?><br>
                    <?php echo $row['satuan_9'];?><br>
                    <?php echo $row['satuan_10'];?>
                    </td>

                    <td>
                    <?php echo $row['status'];?>
                    </td>

                    <?php
                    if ($row['status'] == "PENDING") {
                    ?>

                    <td>
                    <?php echo $row['catatan'];}?>
                    </td>
                </tr>
            </tbody>
            </table>
        </div><br>
        
    </div>

    <div class="noprint">
    <a href="rqs.php" class="btn btn-primary">Kembali</a>
    <button class="btn btn-success" onClick="window.print();" style="margin-top : 20px; position : absolute; margin-left : 20px;">Print</button>
    </div>
    <?php
           }
        };
    ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
</body>
</html>

<?php
    }
};
?>