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

    <title>Detail DWR</title>
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
            height : 400px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            margin : 0 auto;
        }

        label{
            margin-left : 70px;
            margin-top : 20px;
        }

        .data-2{
            margin-left : 60px;
        }

        .data-3{
            margin-left : 50px;
        }

        .data-4{
            margin-left :75px;
        }

        .data-5{
            margin-left : 95px;
        }

        .data-6{
            margin-left : 110px;
        }
        .tabel{
        overflow-x:auto;
        height : 200px;
        
      }

      .btn-primary{
          margin-left : 19%;
      }

      .kartu-1{
          margin-left : 21%;

      }

      .card{
       margin-right : 10px;   
      }

      .kartu-2{
          margin-left : 30%;
      }

     
    }

    @media print{
        .card{
            margin-right : 20px;
            margin-left : 20px;
        }

        .noprint{
            display : none !important;
        }
        h2{
            color : red;
        }
        th{
            background-color: red;
        }
        
    }

</style>
<body>
    <h2>Detail DWR</h2>
    <div class="noprint">
    <button class="btn btn-success" onClick="window.print();" style="position : absolute; margin-left: 75%; margin-top : -50px;">Print</button>
    </div>

    <?php
          $sql = "SELECT dwr_form.id_dwr, login.id_login, dwr_form.id_login, dwr_form.nama, dwr_form.tanggal, dwr_form.jam_masuk, dwr_form.jam_pulang, dwr_form.unit, dwr_form.merk,dwr_form.tipe,dwr_form.serial_number, dwr_form.laporan_kerja_1, dwr_form.laporan_kerja_2, dwr_form.laporan_kerja_3, dwr_form.laporan_kerja_4, dwr_form.laporan_kerja_5, dwr_form.gambar, dwr_form.gambar_2, dwr_form.gambar_3, dwr_form.gambar_4, dwr_form.gambar_5, dwr_form.status FROM dwr_form INNER JOIN login ON dwr_form.id_login = login.id_login WHERE dwr_form.id_dwr = '".$_GET['id_dwr']."'";
          $result =$conn-> query($sql);
             if($result->num_rows > 0){
                 $i=1;
               while($row = $result->fetch_assoc()){

         
       
    ?>

    <div class="kartu-rqs">
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">ID DWR</th>
            <th scope="col">Nama</th>
            <th scope="col">Tanggal DWR</th>
            <th scope="col">Jam Masuk</th>
            <th scope="col">Jam Pulang</th>
            
            </tr>
        </thead>
        <tbody>
            <tr>
            <td><?php echo $row['id_dwr'];?></td>
            <td><?php echo $row['nama'];?></td>
            <td><?php echo date('d-m-Y', strtotime($row['tanggal']));?></td>
            <td><?php echo date('H:i', strtotime($row['jam_masuk']));?></td>
            <td><?php echo date('H:i', strtotime($row['jam_pulang']));?></td>
            </tr>
        </tbody>
        </table>
       <br>
       
        <!-- tabel -->
        <div class="tabel">
            <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Unit</th>
                <th scope="col">Tipe</th>
                <th scope="col">Merk</th>
                <th scope="col">Serial Number</th>
                <th scope="col">Laporan Kerja</th>
                <th scope="col">Status</th>
            
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                    <?php echo $row['unit'];?>
                    </td>

                    <td>
                    <?php echo $row['tipe'];?>
                    </td>

                    <td>
                    <?php echo $row['merk'];?>
                    </td>

                    <td>
                    <?php echo $row['serial_number'];?>
                    </td>

                    <td>
                    
                    <?php echo $i++." ".$row['laporan_kerja_1'];?><br>
                    <?php echo $i++." ".$row['laporan_kerja_2'];?><br>
                    <?php echo $i++." ".$row['laporan_kerja_3'];?><br>
                    <?php echo $i++." ".$row['laporan_kerja_4'];?><br>
                    <?php echo $i++." ".$row['laporan_kerja_5'];?>
                    </td>

                    <td>
                    <?php echo $row['status'];?>
                    </td>

                    
                    
                    

                    

                    
                </tr>
            </tbody>
            </table>
        </div><br>

       
        
    </div>
            <br>
    <div class="row kartu-1">

        
            <div class="card" style="width: 15rem;">
                <?php
                echo '<img src="../'.$row['gambar'].'"width="100%" height="250px" alt="gambar pekerjaan">';
                ?>
              <div class="card-body">
              <h5 class="card-title d-flex justify-content-center">gambar pekerjaan 1</h5>
              </div>
            </div>
       

        
            <div class="card" style="width: 15rem;">
                <?php
                echo '<img src="../'.$row['gambar_2'].'"width="100%" height="250px" alt="gambar pekerjaan">';
                ?>
              <div class="card-body">
              <h5 class="card-title d-flex justify-content-center">gambar pekerjaan 2</h5>
              </div>
            </div>
        

        
            <div class="card" style="width: 15rem;">
                <?php
                echo '<img src="../'.$row['gambar_3'].'"width="100%" height="250px" alt="gambar pekerjaan">';
                ?>
              <div class="card-body">
              <h5 class="card-title d-flex justify-content-center">gambar pekerjaan 3</h5>
              </div>
            </div>
        

    </div>
    <br>
    <div class="row kartu-2">
                
        
            <div class="card" style="width: 15rem;">
                <?php
                echo '<img src="../'.$row['gambar_4'].'"width="100%" height="250px" alt="gambar pekerjaan">';
                ?>
              <div class="card-body">
              <h5 class="card-title d-flex justify-content-center">gambar pekerjaan 4</h5>
              </div>
            </div>
        

        
            <div class="card" style="width: 15rem;">
                <?php
                echo '<img src="../'.$row['gambar_5'].'"width="100%" height="250px" alt="gambar pekerjaan">';
                ?>
              <div class="card-body">
              <h5 class="card-title d-flex justify-content-center">gambar pekerjaan 3</h5>
              </div>
            </div>
        
    </div>
    <div class="noprint">
    <a href="dwr.php" class="btn btn-primary">Kembali</a>
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