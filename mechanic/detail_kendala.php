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

    <title>Exxa Admin System</title>
  </head>
  <style>

    @media (min-width : 350px){
      h1{
        text-align : center;
      }
      .tabel {
        overflow-x : auto;
        margin-top : 20px;
        box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
      }
      .data{
        margin-left : -20px;
        text-align : center;
      }
      .card{
        margin-left : auto;
        margin-right : auto;
        margin-top : 10px;
      }

      .btn-primary{
        margin-left : 40%;
       
        
      }
    }

    @media (min-width:1100px){
    
      table{
        margin-top : -10px;
        
      }

      .data{
        margin-left : 0px;
        text-align : left;
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
        margin-left : 0px;
      }
    }
  </style>
  <body>
  <?php
                   

                  $sql = "SELECT kendala_form.id_kendala, kendala_form.id_login, kendala_form.tanggal_kendala, kendala_form.unit_kendala, kendala_form.merk_kendala, kendala_form.tipe_kendala, kendala_form.jam_kendala, kendala_form.keterangan_kendala,kendala_form.serial_number_kendala, kendala_form.status_kendala, kendala_form.jam_kendala_respon, login.id_login, login.nama FROM kendala_form INNER JOIN login ON kendala_form.id_login = login.id_login WHERE kendala_form.id_kendala = '".$_GET['id_kendala']."'";
                  $result =$conn-> query($sql);
                     if($result->num_rows > 0){
                       while($row = $result->fetch_assoc()){
       ?>
    
      <div class="container">
      <h1 class="d-flex justify-content-start">DETAIL LAPORAN KENDALA</h1>
      </div>


      <div class="container">
        <div class="data">
        <div class="row ml-1">
          <div class="col-md-2 bg-warning">
            <b><label for="">ID KENDALA</label>
          </div>
          <div class="col-md-2 bg-danger">
            <label for="" style="color : white;"> <?php echo $row['id_kendala'];?></label></b>
          </div>
        </div>
        <div class="row ml-1">
          <div class="col-md-2 bg-warning">
            <b><label for="">Nama</label>
          </div>
          <div class="col-md-2 bg-danger">
            <label for="" style="color : white;"> <?php echo $row['nama'];?></label></b>
          </div>
        </div>
        <div class="row ml-1">
          <div class="col-md-2 bg-warning">
            <b><label for="">Tanggal </label>
          </div>
          <div class="col-md-2 bg-danger">
            <label for="" style="color : white;"> <?php echo date('d-m-Y', strtotime($row["tanggal_kendala"]));?></label></b>
          </div>
        </div>
        <div class="row ml-1">
          <div class="col-md-2 bg-warning">
            <b><label for="">Jam Laporan </label>
          </div>
          <div class="col-md-2 bg-danger">
            <label for="" style="color : white;"> <?php echo date('H:i',strtotime($row["jam_kendala"]));?></label></b>
          </div>
        </div>

        <?php
        if ($row["status_kendala"] == 'DIRESPON') {
            ?>
            <div class="row ml-1">
            <div class="col-md-2 bg-warning">
                <b><label for="">Jam respon</label>
            </div>
            <div class="col-md-2 bg-danger">
                <label for="" style="color : white;"><?php echo date('H:i',strtotime($row["jam_kendala_respon"]));?></label></b>
            </div>
            </div>
            <?php
        }else{        
        ?>
        <div class="row ml-1">
        <div class="col-md-2 bg-warning">
            <b><label for="">Jam respon</label>
        </div>
        <div class="col-md-2 bg-danger">
            <label for="" style="color : white;"> Belum di respon</label></b>
        </div>
        </div>
        <?php
        };
        ?>
        
      </div>

      <div class="container">
        <div class="tabel">
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Unit</th>
            <th scope="col">Merk</th>
            <th scope="col">Tipe</th>
            <th scope="col">Serial Number</th>
            <th scope="col">Keterangan Kendala</th>
            <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
        
              <tr>
                <?php
              
              echo '<td>'.$row['unit_kendala'].'</td>';
              echo '<td>'.$row['merk_kendala'].'</td>';
              echo '<td>'.$row['tipe_kendala'].'</td>';
              echo '<td>'.$row['serial_number_kendala'].'</td>';
              echo '<td>'.$row['keterangan_kendala'].'</td>';
              echo '<td>'.$row['status_kendala'].'</td>';
                       };
                };
            ?>
            </tr>
        </tbody>
        </table>
        </div>
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
        <a href="kendala.php"><button class="btn btn-primary"> back</button></a>
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
