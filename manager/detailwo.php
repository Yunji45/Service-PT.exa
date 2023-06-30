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

    <title>Exxa Admin System</title>
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
                  

                  $sql = "SELECT wo_form.id_wo, login.id_login, login.nama, wo_form.id_login, wo_form.tanggal_penugasan, wo_form.tanggal_terima ,wo_form.tanggal_selesai, wo_form.jam_penugasan, wo_form.jam_terima, wo_form.jam_selesai, wo_form.customer, wo_form.merk, wo_form.tipe, wo_form.unit, wo_form.serial_number, wo_form.tugas_1, wo_form.tugas_2, wo_form.tugas_3, wo_form.tugas_4, wo_form.tugas_5, wo_form.notes_1, wo_form.notes_2, wo_form.notes_3, wo_form.notes_4, wo_form.notes_5, wo_form.status, wo_form.checking FROM wo_form INNER JOIN login ON wo_form.id_login = login.id_login WHERE wo_form.id_wo = '".$_GET['id_wo']."'";
                  $result =$conn-> query($sql);
                     if($result->num_rows > 0){
                       while($row = $result->fetch_assoc()){
       ?>
    
      <div class="container">
      <h1 class="d-flex justify-content-start">DETAIL WORK ORDER</h1>
      </div>


      <div class="container">

        <div class="row ml-1">
          <div class="col-md-2 bg-warning">
            <b><label for="">ID WO</label>
          </div>
          <div class="col-md-2 bg-danger">
            <label for="" style="color : white;">: <?php echo $row['id_wo'];?></label></b>
          </div>
          <div class="col-md-1">
            <!-- <label for="" style="color : white;"> tes</label> -->
          </div>
          <div class="col-md-2 bg-warning">
            <b><label for="">Tanggal Terima</label></b>
          </div>
          <div class="col-md-2 bg-danger">
            <b><label for="" style="color : white;">: <?php echo $row['tanggal_terima']?></label></b>
          </div>
          
        </div>

        <div class="row ml-1">
          <div class="col-md-2 bg-warning">
            <b><label for="">Nama</label>
          </div>
          <div class="col-md-2 bg-danger">
            <label for="" style="color : white;">: <?php echo $row['nama'];?></label></b>
          </div>
          <div class="col-md-1">
            <!-- <label for="" style="color : white;"> tes</label> -->
          </div>
          
          <div class="col-md-2 bg-warning">
            <b><label for="">Jam Terima</label></b>
          </div>
          <div class="col-md-2 bg-danger">
            <b><label for="" style="color : white;">: <?php echo date('H:i',strtotime($row['jam_terima']));?></label></b>
          </div>
        </div>
        <div class="row ml-1">
          <div class="col-md-2 bg-warning">
            <b><label for="">Tanggal Penugasan :</label>
          </div>
          <div class="col-md-2 bg-danger">
            <label for="" style="color : white;">: <?php echo $row['tanggal_penugasan'];?></label></b>
          </div>
          <div class="col-md-1">
            <!-- <label for="" style="color : white;"> tes</label> -->
          </div>
          <div class="col-md-2 bg-warning">
            <b><label for="">Jam Selesai</label></b>
          </div>
          <div class="col-md-2 bg-danger">
            <b><label for="" style="color : white;">: <?php echo date('H:i',strtotime($row['jam_selesai']));?></label></b>
          </div>
        </div>
        <div class="row ml-1">
          <div class="col-md-2 bg-warning">
            <b><label for="">Jam Penugasan :</label>
          </div>
          <div class="col-md-2 bg-danger">
            <label for="" style="color : white;">: <?php echo date('H:i',strtotime($row["jam_penugasan"]));?></label></b>
          </div>
        </div>
        <div class="row ml-1">
          <div class="col-md-2 bg-warning">
            <b><label for="">Customer</label>
          </div>
          <div class="col-md-2 bg-danger">
            <label for="" style="color : white;">: <?php echo $row['customer'];?></label></b>
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
            <th scope="col">Penugasan</th>
            <th scope="col">Notes Mekanik</th>
            <th scope="col">Status</th>
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
              echo '<td>'.$x++.". ".$row['notes_1']."<br>".
                          $x++.". ".$row['notes_2']."<br>".
                          $x++.". ".$row['notes_3']."<br>".
                          $x++.". ".$row['notes_4']."<br>".
                          $x++.". ".$row['notes_5']."<br>".
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
        <br>  
        <a href="wo.php"><button class="btn btn-primary"> back</button></a>
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
