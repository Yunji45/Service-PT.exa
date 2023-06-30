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
        margin-top : 40px;
        margin-left : 0px;
        font-size : 15px; 
      }

      th{
        padding : 10px;
        color : white;
        background : black;
        
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
  
      <div class="container">
      <h1 class="d-flex justify-content-center">DETAIL SERVICE</h1>
      </div>

      <?php
    $sql ="SELECT * FROM service_form INNER JOIN login ON service_form.id_login = login.id_login WHERE service_form.id_service ='".$_GET['id_service']."'";
    $result =$conn-> query($sql);
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){;
  ?>

  <!-- Awal koding tabel 1-->
  <div class="container">
        <table>
        <tr>
            <th scope="col">Nama</th>
            <th scope="col">:</th>
            <th scope="col"><?php echo $row['nama'];?></th>
        </tr>
        <tr>
            <th scope="col">Tgl. Service</th>
            <th scope="col">:</th>  
            <th scope="col"><?php echo $row['tgl_service'];?></th>
        </tr>
        <tr>
            <th scope="col">Jenis unit</th>
            <th scope="col">:</th>  
            <th scope="col"><?php echo $row['jenis_service'];?></th>
        </tr>
        <tr>
            <th scope="col">Model Unit</th>
            <th scope="col">:</th>  
            <th scope="col"><?php echo $row['model_service'];?></th>
        </tr>
        <tr>
            <th scope="col">SN unit</th>
            <th scope="col">:</th>  
            <th scope="col"><?php echo $row['sn_service'];?></th>
        </tr>
        <tr>
            <th scope="col">Hour Meter</th>
            <th scope="col">:</th>  
            <th scope="col"><?php echo $row['hour_meter'];?></th>
        </tr>
    </thead>    
    </table>
    </div>
<!-- Akhir coding tabel 1 -->

<!-- Awal coding tabel 2 -->
    <br>
        <div class="container">
        <h3 class="d-flex justify-content-start">PENGISIAN OLI & SOLAR</h3>
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col"></th>
            <th scope="col">Jumlah</th>
            <th scope="col">Satuan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">Pengisian Oli Mesin</th>
            <td><?php echo $row['jml_oli_msn'];?></td>
            <td>Liter</td>
            </tr>
            <tr>
            <th scope="row">Pengisian Oli Hidraulik</th>
            <td><?php echo $row['jml_oli_hyd'];?></td>
            <td>Liter</td>
            </tr>
            <tr>
            <th scope="row">Pengisian Oli Transmisi</th>
            <td><?php echo $row['jml_oli_trans'];?></td>
            <td>Liter</td>
            </tr>
            <tr>
            <th scope="row">Pengisian Oli Differential</th>
            <td><?php echo $row['jml_oli_dif'];?></td>
            <td>Liter</td>
            </tr>
            <tr>
            <th scope="row">Pengisian Solar</th> 
            <td><?php echo $row['jml_solar'];?></td>
            <td>Liter</td>
            </tr>
        </tbody>
        </table>
        </div>
<!-- Akhir coding tabel 2 -->

<!-- Awal Coding tabel 3 -->
        <BR>
        <div class="container">
        <h3 class="d-flex justify-content-start">PENGGANTIAN FILTER</h3>
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col"></th>
            <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">Penggantian Filter Oli</th>
            <td><?php echo $row['flt_oli'];?></td>
            </tr>
            <th scope="row">Penggantian Filter Solar</th>
            <td><?php echo $row['flt_solar'];?></td>
            </tr>
            <tr>
            <th scope="row">Penggantian Filter Udara</th>
            <td><?php echo $row['flt_udara'];?></td>
            </tr>
        </tbody>
        </table>
        </div>
<!-- Akhir Coding tabel 3 -->
<?php
      }
    };
?>

    <br>
    <div class="container">
        <a href="service.php"><button class="btn btn-primary">kembali</button></a>
    </div>
    <br>

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
