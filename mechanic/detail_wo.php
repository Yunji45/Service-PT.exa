<?php
  include '../db/koneksi.php';
  session_start();
  if (isset($_SESSION['level'])){
    if($_SESSION['level'] == "mekanik") {
?>

<!doctype html>
<html lang="en">
  <head>
  
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../style.css"> -->

    <title>Detail WO</title>
  </head>
  <style>
    @media (min-width : 350px){
      h1{
        text-align : center;
      }

      .data{
        margin-left : -10%;
        text-align : center;
      }
      .tabel {
        margin-top : 20px;
        margin-bottom : 20px;
        overflow-x : auto;
        box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
      }
      .card{
        margin-left : auto;
        margin-right : auto;
      }

      .btn-primary{
        margin-left : 0%;
      }

      .id-wo-tolak{
        margin-left : 20px;
        text-transform : uppercase;
      }
      .nama-wo-tolak{
        margin-left : 20px;
        text-transform : uppercase;
      }
      .tgl-wo-tolak{
        margin-left : 20px;
        text-transform : uppercase;
      }
      .jam-wo-tolak{
        margin-left : 20px;
        text-transform : uppercase;
      }
    }
    @media (min-width : 1100px){

      .data{
        margin-left : 0px;
        text-align : left;
      }
      table{
        margin-top : -10px;
        
      }

      
      th{
          text-transform : capitalize;
      }
      tr{
        background-color : RGB(235, 245, 235);
        color : black;
        font-weight : bold;
        text-transform : uppercase;
      }
      .card:hover{
        transform: scale(1.1);
        transition: 0.8s;
      }
      .btn-primary{
        margin-left : 0%;
      }

      .id-wo-tolak{
        margin-left : 0px;
        text-transform : uppercase;
      }
      .nama-wo-tolak{
        margin-left : 0px;
        text-transform : uppercase;
      }
      .tgl-wo-tolak{
        margin-left : 0px;
        text-transform : uppercase;
      }
      .jam-wo-tolak{
        margin-left : 0px;
        text-transform : uppercase;
      }
    }
  </style>
  <body>
  <?php
                  

                  $sql = "SELECT wo_form.id_wo, login.id_login, login.nama, wo_form.id_login, wo_form.tanggal_penugasan,wo_form.tanggal_terima, wo_form.tanggal_selesai, wo_form.target_selesai, wo_form.jam_penugasan,wo_form.jam_terima, wo_form.jam_selesai, wo_form.customer, wo_form.merk, wo_form.tipe, wo_form.unit, wo_form.serial_number, wo_form.tugas_1, wo_form.tugas_2, wo_form.tugas_3, wo_form.tugas_4, wo_form.tugas_5, wo_form.notes_1, wo_form.notes_2, wo_form.notes_3, wo_form.notes_4, wo_form.notes_5,wo_form.gambar, wo_form.gambar_2,wo_form.gambar_3,wo_form.gambar_4,wo_form.gambar_5, wo_form.status, wo_form.alasan_tolak, wo_form.tanggal_tolak FROM wo_form INNER JOIN login ON wo_form.id_login = login.id_login WHERE wo_form.id_wo = '".$_GET['id_wo']."'";

                
                  $result =$conn-> query($sql);
                     if($result->num_rows > 0){
                       while($row = $result->fetch_assoc()){
       ?>
    
      <div class="container">
      <h1 class="d-flex justify-content-start">DETAIL WORK ORDER </h1>
      </div>

      <?php
        if($row['status'] == 'DITOLAK'){
      ?>   
      <!--  AWAL KALAU DITOLAK  -->
      <div class ="row">
        <div class = "container">
            <label for="" class="id-wo-tolak">ID WO : <?php echo $row['id_wo'];?></label><br>
            <label for="" class="nama-wo-tolak">Nama :  <?php echo $row['nama'];?></label><br>
            <label for="" class="tgl-wo-tolak">Tanggal Penugasan :  <?php echo date('d-m-Y', strtotime($row['tanggal_penugasan']));?></label><br>
            <label for="" class="jam-wo-tolak">Jam Penugasan:  <?php echo date('H:i',strtotime($row["jam_penugasan"]));?></label><br>
        </div>
      </div>

      <?php
        }else{
      ?>
      <!--AKHIR DITOLAK  -->

      <!--  AWAL KALAU DITERIMA SAMPE DONE -->
      <div class="container">
        <div class="data">
        <div class="row ml-1">
          <div class="col-md-2 bg-warning">
            <b><label for="">ID WO</label>
          </div>
          <div class="col-md-2 bg-danger">
            <label for="" style="color : white;"> <?php echo $row['id_wo'];?></label></b>
          </div>
          <div class="col-md-1">
            <!-- <label for="" style="color : white;"> tes</label> -->
          </div>
          <div class="col-md-2 bg-warning">
            <b><label for="">Tanggal Terima</label></b>
          </div>
          <div class="col-md-2 bg-danger">
            <b><label for="" style="color : white;">
             <?php 
             if($row['tanggal_terima'] > 0 ){
             echo date("d-m-Y", strtotime($row['tanggal_terima']));
             }else{
               echo "belum diterima";
             };?></label></b>
          </div>
        </div>
        <div class="row ml-1">
          <div class="col-md-2 bg-warning">
            <b><label for="">Nama</label>
          </div>
          <div class="col-md-2 bg-danger">
            <label for="" style="color : white;"> <?php echo $row['nama'];?></label></b>
          </div>
          <div class="col-md-1">
            <!-- <label for="" style="color : white;"> tes</label> -->
          </div>
          
          <div class="col-md-2 bg-warning">
            <b><label for="">Jam Terima</label></b>
          </div>
          <div class="col-md-2 bg-danger">
            <b><label for="" style="color : white;"> 
            <?php 
            if($row['jam_terima'] > 0 ){
            echo date('H:i',strtotime($row['jam_terima']));
            }else{
              echo "belum diterima";
            };?></label></b>
          </div>
        </div>
        <div class="row ml-1">
          <div class="col-md-2 bg-warning">
            <b><label for="">Tanggal Penugasan </label>
          </div>
          <div class="col-md-2 bg-danger">
            <label for="" style="color : white;"> <?php echo date("d-m-Y", strtotime($row['tanggal_penugasan']));?></label></b>
          </div>
          <div class="col-md-1">
            <!-- <label for="" style="color : white;"> tes</label> -->
          </div>
          
          <div class="col-md-2 bg-warning">
            <b><label for="">Tanggal Selesai</label></b>
          </div>
          <div class="col-md-2 bg-danger">
            <b><label for="" style="color : white;"> 
            <?php
            if($row['tanggal_selesai'] > 0 ){ 
            echo date("d-m-Y", strtotime($row['tanggal_selesai']));
            }else{
              echo "belum selesai";
            }?></label></b>
          </div>
        </div>
        <div class="row ml-1">
          <div class="col-md-2 bg-warning">
            <b><label for="">Jam Penugasan </label>
          </div>
          <div class="col-md-2 bg-danger">
            <label for="" style="color : white;"> <?php echo date('H:i',strtotime($row["jam_penugasan"]));?></label></b>
          </div>
          <div class="col-md-1">
            <!-- <label for="" style="color : white;"> tes</label> -->
          </div>
          <div class="col-md-2 bg-warning">
            <b><label for="">Jam selesai</label></b>
          </div>
          <div class="col-md-2 bg-danger">
            <b><label for="" style="color : white;"> 
            <?php
            if($row['jam_selesai'] > 0) { 
            echo date('H:i',strtotime($row['jam_selesai']));
            }else{
              echo "belum selesai";
            };?></label></b>
          </div>
        </div>
        <div class="row ml-1">
          <div class="col-md-2 bg-warning">
            <b><label for="">Customer</label>
          </div>
          <div class="col-md-2 bg-danger">
            <label for="" style="color : white;"> <?php echo $row['customer'];?></label></b>
          </div>
          <div class="col-md-1">
            <!-- <label for="" style="color : white;"> tes</label> -->
          </div>
          <div class="col-md-2 bg-warning">
            <b><label for="">Deadline</label></b>
          </div>
          <div class="col-md-2 bg-danger">
            <b><label for="" style="color : white;"> <?php echo date('d-m-Y',strtotime($row['target_selesai']));?></label></b>
          </div>
        </div>
        </div>
      </div>

      <?php
        };
      ?>

      <div class="container">
        <div class="tabel">
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Unit</th>
            <th scope="col">Merk</th>
            <th scope="col">Tipe</th>
            <th scope="col">Serial Number</th>
            <th scope="col">Penugasan</th>
            <?php
              if($row['status'] == 'DITOLAK'){
              ?>
              <th scope="col">Tanggal Penolakan</th>
              <?php
              }elseif($row['status'] == 'DISERAHKAN'){
              ?>
              <th scope="col">Status</th>
              <?php
              }elseif($row['status'] == 'DITERIMA'){
                ?>
                <th scope="col">Status</th>
                <?php
              }elseif($row['status'] == 'DONE'){
              ?>
            <th scope="col">Notes Mekanik</th>
            
            <th scope="col">Status</th>

            <?php
            
              };?>
            <?php
              if($row['status'] == 'DITOLAK'){
              ?>
              <th scope="col">Alasan</th>
              <?php
              }elseif($row['status'] == 'DONE'){
            ?>
            <th scope="col">Total hari Kerja</th>
            <th scope="col">Kinerja</th>
            <?php
              };
            ?>
            </tr>
        </thead>
        <tbody>
        
              <tr>
                <?php
              $i = 1;
              $x = 1;
              echo '<td>'.$row['unit'].'</td>';
              echo '<td>'.$row['merk'].'</td>';
              echo '<td>'.$row['tipe'].'</td>';
              echo '<td>'.$row['serial_number'].'</td>';
              echo '<td>'.$i++.". ".$row['tugas_1']."<br>".
                          $i++.". ".$row['tugas_2']."<br>".
                          $i++.". ".$row['tugas_3']."<br>".
                          $i++.". ".$row['tugas_4']."<br>".
                          $i++.". ".$row['tugas_5']."<br>".
              '</td>';
              if ($row['status'] == 'DITERIMA') {
                echo '<td>'.$row['status'].'</td>';
              }elseif($row['status'] == "DITOLAK"){
                echo '<td>'.date('d-m-Y', strtotime($row['tanggal_tolak'])).'</td>';
              }elseif($row['status'] == "DISERAHKAN"){
                echo '<td>'.$row['status'].'</td>';
              }elseif($row['status'] == "DONE"){
              echo '<td>'.$x++.". ".$row['notes_1']."<br>".
              $x++.". ".$row['notes_2']."<br>".
              $x++.". ".$row['notes_3']."<br>".
              $x++.". ".$row['notes_4']."<br>".
              $x++.". ".$row['notes_5']."<br>".
              '</td>';
              };

              if($row['status'] == "DONE"){
              echo '<td>'.$row['status'].'</td>';
              }

              if($row['status'] == 'DITOLAK'){
                echo '<td>'.$row['alasan_tolak'].'</td>';
              }elseif($row['status'] == 'DONE'){

                $awal_kerja = $row['tanggal_terima'];
                    $akhir_kerja = $row['tanggal_selesai'];
                     
                    $awal_kerja = strtotime($awal_kerja);
                     
                    $akhir_kerja = strtotime($akhir_kerja);
                     
                    $harikerja = array();
                    $sabtuminggu = array();
                     
                    for ($i=$awal_kerja; $i <= $akhir_kerja; $i += (60 * 60 * 24)) {
                        if (date('w', $i) !== '0' && date('w', $i) !== '6') {
                            $harikerja[] = $i;
                        } else {
                            $sabtuminggu[] = $i;
                        }
                     
                    }
                    $jumlah_kerja = count($harikerja);
                    $jumlah_sabtuminggu = count($sabtuminggu);
                    $abtotal = $jumlah_kerja + $jumlah_sabtuminggu;
              echo '<td>'.$jumlah_kerja." HARI".'</td>';
              $selesai = new DateTime($row['tanggal_selesai']);
              $target = new DateTime($row['target_selesai']);

              if($selesai < $target ){
                  echo '<td>'."selesai lebih cepat".'</td>';
              }elseif($selesai <= $target){
                echo '<td>'."tepat waktu".'</td>';
              }else{
                echo '<td>'."tidak tepat waktu".'</td>';
                ?>
                <?php
              }

            };
            ?>
            </tr>
        </tbody>
        </table>
        </div>

        <?php
          if($row['status'] == 'DONE'){
        ?>
        <div class="row">

        <div class="col-md-3">
            <div class="card" style="width: 15rem;">
                 <?php
                 
                echo '<img src="../'.$row['gambar'].'"width="100%" height="250px" alt="gambar pekerjaan">';
                ?> 
              <div class="card-body">
              <h5 class="card-title d-flex justify-content-center">gambar pekerjaan 1</h5>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card" style="width: 15rem;">
                 <?php
                 
                echo '<img src="../'.$row['gambar_2'].'"width="100%" height="250px" alt="gambar pekerjaan">';
                ?> 
              <div class="card-body">
              <h5 class="card-title d-flex justify-content-center">gambar pekerjaan 2</h5>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card" style="width: 15rem;">
                 <?php
                 
                echo '<img src="../'.$row['gambar_3'].'"width="100%" height="250px" alt="gambar pekerjaan">';
                ?> 
              <div class="card-body">
              <h5 class="card-title d-flex justify-content-center">gambar pekerjaan 3</h5>
              </div>
            </div>
          </div>

        </div>
            <br>
        <div class="row">

        <div class="col-md-3">
            <div class="card" style="width: 15rem;">
                 <?php
                 
                echo '<img src="../'.$row['gambar_4'].'"width="100%" height="250px" alt="gambar pekerjaan">';
                ?> 
              <div class="card-body">
              <h5 class="card-title d-flex justify-content-center">gambar pekerjaan 4</h5>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card" style="width: 15rem;">
                 <?php
                 
                echo '<img src="../'.$row['gambar_5'].'"width="100%" height="250px" alt="gambar pekerjaan">';
                ?> 
              <div class="card-body">
              <h5 class="card-title d-flex justify-content-center">gambar pekerjaan 5</h5>
              </div>
            </div>
          </div>

          

        </div>

        <?php
          } else{
            echo "";
          }  
        }
      };
        ?>
        <BR>
        <!-- koding manggil gambar -->
        <br>  
        <a href="wo.php"><button class="btn btn-primary"> back</button></a>
        </div>
        
        <?php
       
        ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    
    <script type="text/javascript" src="admin.js"></script>

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
}
?>
