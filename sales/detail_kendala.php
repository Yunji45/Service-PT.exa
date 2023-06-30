<?php
  include '../db/koneksi.php';
  session_start();
  if (isset($_SESSION['level'])){
    if($_SESSION['level'] == "sales") {
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
            width : 800px;
            height : 600px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            margin : 0 auto;
        }

        label{
            margin-left : 20px;
            margin-top : 20px;
            font-size : 30px;  
        }

        .data-2{
            margin-left : 30px;
        }
        .tabel{
        overflow-x:auto;
        height : 200px;
        
      }

      .btn-primary{
          margin-left : 40px;
      }

      span{
          font-size : 30px;
      }
    }


</style>
<body>
    <h2>Detail Kendala</h2>

    <?php
         $sql = "SELECT * FROM kendala_form INNER JOIN login on login.id_login = kendala_form.id_login WHERE kendala_form.id_kendala = '".$_GET['id_kendala']."'";

         
         $result =$conn-> query($sql);
         if($result->num_rows > 0){
           while($row = $result->fetch_assoc()){
    ?>

    <div class="kartu-rqs">
        <!--  baris 1 -->
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">ID Kendala</th>
            <th scope="col">Nama</th>
            <th scope="col">Tanggal Laporan</th>
            <th scope="col">Tanggal Respon</th>
            <th scope="col">Jam Laporan</th>
            <th scope="col">Jam Respon</th>
            <th scope="col">Unit</th>
            <th scope="col">Tipe</th>
            <th scope="col">Merek</th>
            <th scope="col">Serial Number</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td><?php echo $row['id_kendala'];?></td>
            <td><?php echo $row['nama'];?></td>
            <td><?php echo date('d-m-Y', strtotime($row['tanggal_kendala']));?></td>
            <?php
            if ($row['status_kendala'] == "DIRESPON") {
            ?>
            <td><?php echo date('d-m-Y', strtotime($row['tanggal_respon']));?></td>
            <?php
            }else{
            ?>
            <td>Belum di Respon</td>
            <?php
            };
            ?>
            <td><?php echo date('H:i', strtotime($row['jam_kendala']));?></td>
            <?php
            if ($row['status_kendala'] == "DIRESPON") {
            ?>
            <td><?php echo date('H:i', strtotime($row['jam_kendala_respon']));?></td>
            <?php
            }else{
            ?>
            <td>Belum di Respon</td>
            <?php
            };
            ?>
            <td><?php echo $row['unit_kendala'];?></td>
            <td><?php echo $row['tipe_kendala'];?></td>
            <td><?php echo $row['merk_kendala'];?></td>
            <td><?php echo $row['serial_number_kendala'];?></td>
            </tr>
        </tbody>
        </table>
       <br>

        <label for="">Keterangan : <span><?php echo $row['keterangan_kendala'];?></span></label>
        <br>
        <?php
        if ($row['status_kendala'] == "DIRESPON") {
        ?>
        <label for=""> status : <span style="color : green;"><?php echo $row['status_kendala'];?></span></label><br>
        <label for=""> Keterangan : <span><?php echo $row['respon_kendala'];?></span></label>
        <?php
            
        }else{
            ?>
            <label for=""> status : <span><?php echo $row['status_kendala'];?></span></label>
            <?php
        }
        ?>
        <!-- tabel -->
        
        </div><br>
        
    </div>
    
    <a href="kendala.php" class="btn btn-primary" style="margin-left : 22%; margin-top: 20px;">Kembali</a>
    
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