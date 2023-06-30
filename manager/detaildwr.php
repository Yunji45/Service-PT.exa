<?php
  include '../db/koneksi.php';
  session_start();
  if (isset($_SESSION['level'])){
    if($_SESSION['level'] == "manager") {
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
                  

                  $sql = "SELECT dwr_form.id_dwr, login.id_login, dwr_form.id_login, dwr_form.nama, dwr_form.tanggal, dwr_form.jam_masuk, dwr_form.jam_pulang, dwr_form.unit, dwr_form.merk,dwr_form.tipe,dwr_form.serial_number, dwr_form.laporan_kerja_1, dwr_form.laporan_kerja_2, dwr_form.laporan_kerja_3, dwr_form.laporan_kerja_4, dwr_form.laporan_kerja_5, dwr_form.status FROM dwr_form INNER JOIN login ON dwr_form.id_login = login.id_login WHERE dwr_form.id_dwr = '".$_GET['id_dwr']."'";
                  $result =$conn-> query($sql);
                     if($result->num_rows > 0){
                       while($row = $result->fetch_assoc()){
       ?>
    
      <div class="container">
      <h1 class="d-flex justify-content-start">DETAIL DAILY WORK REPORT</h1>
      </div>


      <div class="container">
        <div class="row ml-1">
          <div class="col-md-2 bg-warning">
            <b><label for="">ID DWR</label>
          </div>
          <div class="col-md-2 bg-danger">
            <label for="" style="color : white;">: <?php echo $row['id_dwr'];?></label></b>
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
        <div class="row ml-1">
          <div class="col-md-2 bg-warning">
            <b><label for="">Jam Masuk :</label>
          </div>
          <div class="col-md-2 bg-danger">
            <label for="" style="color : white;">: <?php echo date('H:i',strtotime($row["jam_masuk"]));?></label></b>
          </div>
        </div>
        <div class="row ml-1">
          <div class="col-md-2 bg-warning">
            <b><label for="">Jam Pulang :</label>
          </div>
          <div class="col-md-2 bg-danger">
            <label for="" style="color : white;">: <?php echo date('H:i',strtotime($row["jam_pulang"]));?></label></b>
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
            <th scope="col">Laporan Kerja</th>
            <th scope="col">Status</th>            
            </tr>
        </thead>
        <tbody>
        
              <tr>
                <?php
              $i = 1;
              echo '<td>'.$row['unit'].'</td>';
              echo '<td>'.$row['merk'].'</td>';
              echo '<td>'.$row['tipe'].'</td>';
              echo '<td>'.$row['serial_number'].'</td>';
              echo '<td>'.$i++.". ".$row['laporan_kerja_1']."<br>".
                          $i++.". ".$row['laporan_kerja_2']."<br>".
                          $i++.". ".$row['laporan_kerja_3']."<br>".
                          $i++.". ".$row['laporan_kerja_4']."<br>".
                          $i++.". ".$row['laporan_kerja_5']."<br>".
              '</td>';
              echo '<td>'.$row['status'].'</td>';
                       };
                };
            ?>
            </tr>
        </tbody>
        </table>
        <BR>
        <!-- koding manggil gambar -->
        <?php
          $sql2 = "SELECT * FROM `dwr_form` WHERE id_dwr = '".$_GET['id_dwr']."'";
          
          $result = $conn->query($sql2);

          if($result->num_rows > 0){
            //output data of each row
            while ($row = $result->fetch_assoc()) {
        ?>
        <!-- akhir koding manggil gambar -->
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

          
        </div>
        <br>
        <div class="row">
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
            }
          }
        ?>
        <br>  
        <a href="dwr.php"><button class="btn btn-primary"> back</button></a>
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
