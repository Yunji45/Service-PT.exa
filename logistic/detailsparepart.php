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
          text-transform : uppercase;
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
                  

            $sql = "SELECT unit_hmap.id_unit,unit_hmap.jenis, unit_hmap.model, unit_hmap.serial_number FROM unit_hmap WHERE unit_hmap.id_unit = '".$_GET['id_unit']."' ";
         
            $result =$conn-> query($sql);
            if($result->num_rows > 0){
              while($row = $result->fetch_assoc()){
                       
       ?>
    
      <div class="container">
      <h1 class="d-flex justify-content-center bg-light">DETAIL SPAREPART</h1>
      </div>  

      <div class="container">            
        <div class="row">
          <div class="col-sm-2">
                <label for=""> ID UNIT</label>
          </div>
                <div class="col-sm-4">
                <label for="" style="text-transform:uppercase;"><b>: <?php echo $row['id_unit']; ?></b></label>
          </div>
        </div>
       </div>

       <div class="container">            
        <div class="row">
          <div class="col-sm-2">
                <label for=""> Jenis</label>
          </div>
                <div class = "col-sm-4">
                <label for="" style="text-transform:uppercase;"><b>: <?php echo $row['jenis'];?></b></label>
          </div>
        </div>
       </div>

       <div class="container">            
        <div class="row">
          <div class="col-sm-2">
                <label for=""> Model</label>
          </div>
                <div class = "col-sm-4">
                <label for="" style="text-transform:uppercase;"><b>: <?php echo $row['model'];?></b></label>
          </div>
        </div>
       </div>

       <div class="container">            
        <div class="row">
          <div class="col-sm-2">
                <label for=""> Serial Number</label>
          </div>
                <div class = "col-sm-4">
                <label for="" style="text-transform:uppercase;"><b>: <?php echo $row['serial_number']; }};?></b></label>
          </div>
        </div>
       </div>

       <div class="container">
       <div class="table-wrapper-scroll-y my-custom-scrollbar">
       <table class="table">
        <thead class="thead-dark" >
          <tr>
            <th scope="col">No</th>
            <th scope="col">ID Sparepart</th>
            <th scope="col">Nama</th>
            <th scope="col">Parts Number</th>
            <th scope="col">QTY</th>
            <th scope="col">PO Number</th>
          </tr>
        </thead>
        <tbody>
          <?php

          
            $sql ="SELECT sparepart_hmap.id_sparepart, sparepart_hmap.id_unit, sparepart_hmap.nama, sparepart_hmap.parts_number, sparepart_hmap.qty, sparepart_hmap.po_number FROM sparepart_hmap WHERE sparepart_hmap.id_unit = '".$_GET['id_unit']."'";
            
            $result =$conn-> query($sql);
            if($result->num_rows > 0){
              $nomor = 1;
              while($row = $result->fetch_assoc()){
          ?>
          <tr>
            <?php
              echo '<td>'.$nomor++.'</td>';
              echo '<td>'.$row['id_sparepart'].'</td>';
              echo '<td>'.$row['nama'].'</td>';
              echo '<td>'.$row['parts_number'].'</td>';
              echo '<td>'.$row['qty'].'</td>';
              echo '<td>'.$row['po_number'].'</td>';
              }
            };

            ?>
          </tr>
        </tbody>
      </table>

      
      </div>
       </div>
      

      


      

         <div class="container">
        <a href="hmap.php"><button class="btn btn-primary"> back</button></a>
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
};
?>
