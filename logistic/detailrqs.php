<?php
  include '../db/koneksi.php';
  session_start();
  if (isset($_SESSION['level'])){
    if($_SESSION['level'] == "logistik") {
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

    <title>Hello, world!</title>
  </head>
  <style>
   
      table{
        margin-top : 20px;
        
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
  </style>
  <body>
  <?php
                  

                  $sql = "SELECT rqs_form.id_rqs, login.id_login, rqs_form.id_login, rqs_form.nama, rqs_form.tanggal, rqs_form.merk, rqs_form.tipe, rqs_form.unit, rqs_form.serial_number,rqs_form.permintaan_1,rqs_form.sn_permintaan_1, rqs_form.qty_1,rqs_form.satuan_1,permintaan_2,rqs_form.sn_permintaan_2, rqs_form.qty_2,rqs_form.satuan_2,permintaan_3,rqs_form.sn_permintaan_3, rqs_form.qty_3,rqs_form.satuan_3,rqs_form.permintaan_4,rqs_form.sn_permintaan_4, rqs_form.qty_4,rqs_form.satuan_4,rqs_form.permintaan_5,rqs_form.sn_permintaan_5, rqs_form.qty_5,rqs_form.satuan_5,rqs_form.permintaan_6,rqs_form.sn_permintaan_6, rqs_form.qty_6,rqs_form.satuan_6,permintaan_7,rqs_form.sn_permintaan_7, rqs_form.qty_7,rqs_form.satuan_7,rqs_form.permintaan_8,rqs_form.sn_permintaan_8, rqs_form.qty_8,rqs_form.satuan_8,permintaan_9,rqs_form.sn_permintaan_9, rqs_form.qty_9,rqs_form.satuan_9,permintaan_10,rqs_form.sn_permintaan_10, rqs_form.qty_10,rqs_form.satuan_10,rqs_form.status, rqs_form.tanggal_catatan, rqs_form.jam_catatan, rqs_form.catatan, rqs_form.tanggal_reject, rqs_form.jam_reject, rqs_form.catatan_reject FROM rqs_form INNER JOIN login ON rqs_form.id_login = login.id_login WHERE rqs_form.id_rqs = '".$_GET['id_rqs']."'";
                  
                  $result =$conn-> query($sql);
                     if($result->num_rows > 0){
                       while($row = $result->fetch_assoc()){
       ?>
    
      <div class="container">
      <h1 class="d-flex justify-content-start">DETAIL RQS</h1>
      </div>


      <div class="container">
        <div class="row ml-1">
          <div class="col-md-2 bg-warning">
            <b><label for="">No. RQS</label>
          </div>
          <div class="col-md-2 bg-danger">
            <label for="" style="color : white;">: <?php echo $row['id_rqs'];?></label></b>
          </div>
        </div>
        <div class="row ml-1">
          <div class="col-md-2 bg-warning">
            <b><label for="">Nama</label>
          </div>
          <div class="col-md-2 bg-danger">
            <label for="" style="color : white;">: <?php echo $row['nama'];?></label></b>
          </div>
        </div>
        <div class="row ml-1">
          <div class="col-md-2 bg-warning">
            <b><label for="">Tanggal :</label>
          </div>
          <div class="col-md-2 bg-danger">
            <label for="" style="color : white;">: <?php echo $row['tanggal'];?></label></b>
          </div>
        </div>
      </div>

      <div class="container">
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Unit</th>
            <th scope="col">Merk</th>
            <th scope="col">Tipe</th>
            <th scope="col">Serial Number</th>
            <th scope="col">Permintaan</th>
            <th scope="col">Part Number</th>
            <th scope="col">Qty</th>
            <th scope="col">Satuan</th>
            <th scope="col">Status</th>
            <?php
            if($row['status'] == "PENDING"){
              echo '<th scope="col">Catatan</th>';
            }elseif($row['status'] == "REJECT"){
              echo '<th scope="col">Catatan</th>';
            };
            ?>

            
            </tr>
        </thead>
        <tbody>
        
              <tr>
                <?php
              
              echo '<td>'.$row['unit'].'</td>';
              echo '<td>'.$row['merk'].'</td>';
              echo '<td>'.$row['tipe'].'</td>';
              echo '<td>'.$row['serial_number'].'</td>';
              echo '<td>'.$row['permintaan_1'].'<br>'.$row['permintaan_2'].'<br>'.$row['permintaan_3'].'<br>'.$row['permintaan_4'].'<br>'.$row['permintaan_5'].'<br>'.$row['permintaan_6'].'<br>'.$row['permintaan_7'].'<br>'.$row['permintaan_8'].'<br>'.$row['permintaan_9'].'<br>'.$row['permintaan_10'].'<br>'.'</td>';
              echo '<td>'.$row['sn_permintaan_1'].'<br>'.$row['sn_permintaan_2'].'<br>'.$row['sn_permintaan_3'].'<br>'.$row['sn_permintaan_4'].'<br>'.$row['sn_permintaan_5'].'<br>'.$row['sn_permintaan_6'].'<br>'.$row['sn_permintaan_7'].'<br>'.$row['sn_permintaan_8'].'<br>'.$row['sn_permintaan_9'].'<br>'.$row['sn_permintaan_10'].'<br>'.'</td>';
              echo '<td>'.$row['qty_1'].'<br>'.$row['qty_2'].'<br>'.$row['qty_3'].'<br>'.$row['qty_4'].'<br>'.$row['qty_5'].'<br>'.$row['qty_6'].'<br>'.$row['qty_7'].'<br>'.$row['qty_8'].'<br>'.$row['qty_9'].'<br>'.$row['qty_10'].'<br>'.'</td>';
              echo '<td>'.$row['satuan_1'].'<br>'.$row['satuan_2'].'<br>'.$row['satuan_3'].'<br>'.$row['satuan_4'].'<br>'.$row['satuan_5'].'<br>'.$row['satuan_6'].'<br>'.$row['satuan_7'].'<br>'.$row['satuan_8'].'<br>'.$row['satuan_9'].'<br>'.$row['satuan_10'].'<br>'.'</td>';
              echo '<td>'.$row['status'].'</td>';
              if($row['status'] == "PENDING"){
              echo '<td>'.$row['catatan'].'</td>';
              }elseif($row['status'] == "REJECT"){
                echo '<td>'.$row['catatan_reject'].'</td>';
              };
                       };
                };
            ?>
            </tr>
        </tbody>
        </table>


        <!-- koding manggil gambar -->
        <?php
          $sql2 = "SELECT * FROM `rqs_form` WHERE id_rqs = '".$_GET['id_rqs']."'";
          
          $result = $conn->query($sql2);

          if($result->num_rows > 0){
            //output data of each row
            while ($row = $result->fetch_assoc()) {
        ?>
        <!-- akhir koding manggil gambar -->

        <!-- tampilin dambar pake card -->
        <div class ="row">

          <div class="col-md-3">
            <div class="card" style="width: 15rem;">
                <?php
                echo '<img src="../'.$row['gambar_1'].'"width="100%" height="250px" alt="permintaan_1">';
                ?>
              <div class="card-body">
              <h5 class="card-title d-flex justify-content-center">PERMINTAAN 1</h5>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card" style="width: 15rem;">
                <?php
                echo '<img src="../'.$row['gambar_2'].'"width="100%" height="250px" alt="permintaan_2">';
                ?>
              <div class="card-body">
              <h5 class="card-title d-flex justify-content-center">PERMINTAAN 2</h5>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card" style="width: 15rem;">
                <?php
                 echo '<img src="../'.$row['gambar_3'].'"width="100%" height="250px" alt="permintaan_3">';
                ?>
              <div class="card-body">
              <h5 class="card-title d-flex justify-content-center">PERMINTAAN 3</h5>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card" style="width: 15rem;">
                <?php
                 echo '<img src="../'.$row['gambar_4'].'"width="100%" height="250px" alt="permintaan_4">';
                ?>
              <div class="card-body">
              <h5 class="card-title d-flex justify-content-center">PERMINTAAN 4</h5>
              </div>
            </div>
          </div>

          

        </div>
        
        <!-- baris baru -->
        <div class ="row mt-4">

          <div class="col-md-3">
            <div class="card" style="width: 15rem;">
                <?php
                echo '<img src="../'.$row['gambar_5'].'"width="100%" height="250px" alt="permintaan_5">';
                ?>
              <div class="card-body">
              <h5 class="card-title d-flex justify-content-center">PERMINTAAN 5</h5>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card" style="width: 15rem;">
                <?php
                echo '<img src="../'.$row['gambar_6'].'"width="100%" height="250px" alt="permintaan_6">';
                ?>
              <div class="card-body">
              <h5 class="card-title d-flex justify-content-center">PERMINTAAN 6</h5>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card" style="width: 15rem;">
                <?php
                 echo '<img src="../'.$row['gambar_7'].'"width="100%" height="250px" alt="permintaan_7">';
                ?>
              <div class="card-body">
              <h5 class="card-title d-flex justify-content-center">PERMINTAAN 7</h5>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card" style="width: 15rem;">
                <?php
                 echo '<img src="../'.$row['gambar_8'].'"width="100%" height="250px" alt="permintaan_8">';
                ?>
              <div class="card-body">
              <h5 class="card-title d-flex justify-content-center">PERMINTAAN 8</h5>
              </div>
            </div>
          </div>

          

        </div>
        
        <!-- baris baru -->
        <div class ="row mt-4">

          <div class="col-md-3">
            <div class="card" style="width: 15rem;">
                <?php
                echo '<img src="../'.$row['gambar_9'].'"width="100%" height="250px" alt="permintaan_9">';
                ?>
              <div class="card-body">
              <h5 class="card-title d-flex justify-content-center">PERMINTAAN 9</h5>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card" style="width: 15rem;">
                <?php
                echo '<img src="../'.$row['gambar_10'].'"width="100%" height="250px" alt="permintaan_10">';
                ?>
              <div class="card-body">
              <h5 class="card-title d-flex justify-content-center">PERMINTAAN 10</h5>
              </div>
            </div>
          </div>
        </div>

        
        <?php
            }
          }
        ?>
        <BR>
        <a href="admin.php"><button class="btn btn-primary"> back</button></a>
        </div>
        
       
        
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
