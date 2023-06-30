<?php
  include '../db/koneksi.php';
  session_start();
  if (isset($_SESSION['level'])){
    if($_SESSION['level'] == "hrd") {
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <link href="../fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->

    <title>Exxa Admin System</title>
  </head>
  <style>

    @media (min-width:350px){
      .tabel{
        overflow-x:auto;
        box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
      }
      

      .col-md-2{
        height : 22rem !important;
        margin-top : -10px !important;
      }

      .navbar-brand{
      text-transform : uppercase;
      font-size : 12px;
      
      }

      .btn-detail{
        margin-bottom : 5px;
      }

      .btn-edit{
        margin-bottom : 5px;
      }

      .btn-cancel {
        margin-bottom : 5px;
      }
      
    }

    @media (min-width:1100px){
      .col-md-2{
        height : 40rem !important;
        
      }
    tr{
      text-transform : uppercase;
    }  

    .navbar-brand{
      text-transform : uppercase;
      font-size : 20px;
      
      }

    .fa-sign-out-alt:hover{
      color : white;
      transition : 0.3s;
    }

    .tabel{
      box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
    }

    p{
      display : inline;
    }

    span{
      margin-left : 36px;
    }

    .btn-detail{
        margin-bottom : 0px;
      }

      .btn-edit{
        margin-bottom : 0px;
      }

      .btn-cancel {
        margin-bottom : 0px;
      }

      .kotak-info{
      width : 100%;
      height : 450px;
      
      background : white;
      box-shadow : 0px 10px 20px rgba(0,0,0,0.5);
    }

    .card-body-icon{
      position : absolute;
      z-index : 0;
      top : 25px;
      right : 4px; 
      font-size : 120px;
      opacity : 0.5;
      color : white;
    }

    .card {
      opacity : 0.8;
    }

    .card:hover{
      opacity : 1;
      transition : 0.5s;
    }
  }
  </style>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
      <?php 
      if (isset($_SESSION['nama'])){?>
        <a class="navbar-brand" href="#" style="color : black;"><b>ADMINISTRASI EXXA | WELCOME <?php echo $_SESSION['nama']?></b></a>
        <?php 
      }else{
      ?>
        <a class="navbar-brand" href="#">ADMINISTRASI EXXA
      <?php
      }?>
        <a  href="../logout.php" style="color : black; font-size : 20px; margin-left: auto;"><i class="fas fa-sign-out-alt"></i></a>
        <!-- <a class="btn btn-dark ml-2 tombolout" href="../logout.php">Logout</a> -->
        
        
    </nav>

   
    <div class="row no-gutters mt-5">
        
        <div class="col-md-2 bg-dark mt-2 pr-3 pt-4" style="height : 50rem;">
            <ul class="nav flex-column ml-3 mb-5">
                
                <li class="nav-item">
                    <a class="nav-link text-white" href="dashboard.php"><i class="fas fa-tachometer-alt" style="padding-right : 15px;"></i></i>Dashboard</a><hr class="bg-white">
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="sales.php"><i class="fas fa-chalkboard-teacher" style="padding-right : 20px; "></i>Progress Harian <span style="margin-left : 40px;">Sales</span></a><hr class="bg-white">
                  </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="rqs.php"><i class="fas fa-file-alt" style="padding-right : 20px;"></i>RQS</a><hr class="bg-white">
                  </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="dwr.php"><i class="fas fa-wrench" style="padding-right : 20px;"></i>Daily Work <span>Report</span></a><hr class="bg-white">
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="wo.php"><i class="fas fa-paste" style="padding-right : 20px;"></i>Work Order</a><hr class="bg-white">
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="kendala.php"><i class="fas fa-exclamation-triangle" style="padding-right : 20px;"></i>Kendala</a><hr class="bg-white">
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="ubahpassword.php"><i class="fas fa-key" style="padding-right : 20px;"></i>Ubah Password</a><hr class="bg-white">
                </li>
              </ul>
        </div>

        <div class="col-md-10 p-5 pt-2">
            <h3><i class="fas fa-tachometer-alt" style="padding-right : 20px;"></i>DASHBOARD</h3>
            <hr>

            <!-- awal kotak info -->
            <div class="kotak-info">

                <!-- awal card 1 -->
                <div class="card bg-warning" style="width: 18rem; margin-left : 40px; position : absolute; margin-top : 10px;">
                <div class="card-body">
                    <div class="card-body-icon">
                    <i class="fas fa-file-alt"></i>
                    </div>
                    <h4 class="card-title" style="color : white; padding-left : 0px;">Jumlah RQS</h4>
                    <?php
                    $status = 'SETUJU';
                    $sql = "SELECT COUNT(*) id_rqs FROM rqs_form WHERE validasi = '$status' ";
                    $result = $conn-> query($sql);
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                    ?>
                    <div class ="display-4 text-white" style="font-weight : bold;"><?php echo $row['id_rqs'];}};?></div>
                    <a href="rqs.php" class="btn btn-dark" style="margin-top : 10px;"><p class="card-text" style="font-weight : bold; color: white;">Lihat Detail</p></a>
                </div>
                </div>
                <!-- akhir card 1 -->

                <!-- awal card 2 -->
                <div class="card bg-primary" style="width: 18rem; margin-left : 32%; position : absolute; margin-top : 10px;">
                <div class="card-body">
                    <div class="card-body-icon">
                    <i class="fas fa-wrench" ></i>
                    </div>
                    <h4 class="card-title" style="color : white; padding-left : 0px;">Jumlah DWR</h4>
                    <?php
                    $sql = "SELECT COUNT(*) id_dwr FROM dwr_form WHERE validasi='SETUJU'";
                    $result = $conn-> query($sql);
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                    ?>
                    <div class ="display-4 text-white" style="font-weight : bold;"><?php echo $row['id_dwr'];}};?></div>
                    <a href="dwr.php" class="btn btn-primary" style="margin-top : 10px; background-color : white; border-color : white;"><p class="card-text" style="font-weight : bold; color: black;">Lihat Detail</p></a>
                </div>
                </div>
                <!-- akhir card 2 -->

                <!-- awal card 3 -->
                <div class="card bg-dark" style="width: 18rem; margin-left : 60%; position : absolute; margin-top : 10px;">
                <div class="card-body">
                    <div class="card-body-icon">
                    <i class="fas fa-paste"></i>
                    </div>
                    <h4 class="card-title" style="color : white; padding-left : 0px;">Jumlah WO DONE</h4>
                    <?php
                    $sql = "SELECT COUNT(*) id_wo FROM wo_form WHERE status='DONE'";
                    $result = $conn-> query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                    
                    ?>
                    <div class ="display-4 text-white" style="font-weight : bold;"><?php echo $row['id_wo'];}};?></div>
                    <a href="wo.php" class="btn btn-warning" style="margin-top : 10px; "><p class="card-text" style="font-weight : bold; color: black;">Lihat Detail</p></a>
                </div>
                </div>
                <!-- akhir card 3 -->

                <!-- awal card 4 -->
                <div class="card bg-danger" style="width: 18rem; margin-left : 40px; position : absolute; margin-top : 220px;">
                <div class="card-body">
                    <div class="card-body-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <h4 class="card-title" style="color : white; padding-left : 0px;">Jumlah Kendala</h4>
                    <?php
                    $sql = "SELECT COUNT(*) id_kendala FROM kendala_form";
                    $result = $conn-> query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                    
                    ?>
                    <div class ="display-4 text-white" style="font-weight : bold;"><?php echo $row['id_kendala'];}};?></div>
                    <a href="kendala.php" class="btn btn-primary" style="margin-top : 10px; "><p class="card-text" style="font-weight : bold; color: white;">Lihat Detail</p></a>
                </div>
                </div>
                <!-- akhir card 4 -->

                <!-- awal card 5 -->
                <div class="card bg-info" style="width: 18rem; margin-left : 360px; position : absolute; margin-top : 220px;">
                <div class="card-body">
                    <div class="card-body-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <h4 class="card-title" style="color : white; padding-left : 0px;">Jumlah Laporan Sales</h4>
                    <?php
                    $sql = "SELECT COUNT(*) id_customer FROM sales_form";
                    $result = $conn-> query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                    
                    ?>
                    <div class ="display-4 text-white" style="font-weight : bold;"><?php echo $row['id_customer'];}};?></div>
                    <a href="sales.php" class="btn btn-danger" style="margin-top : 10px; "><p class="card-text" style="font-weight : bold; color: white;">Lihat Detail</p></a>
                </div>
                </div>
                <!-- akhir card 5 -->

            </div>
            <!-- akhir kotak info -->
        </div>
        
    </div>
    
      

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

    <footer>
      &copy; Peryo - 2021
    </footer>
  </body>
    
</html>

<?php
    }
  }else{
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="../style.css">

    <title>orang batu</title>
  </head>
  <body>
    <div class="kotaknotif">
        <h3 class="txtnotif">NO ACCESS FOR YOU</h3>
        <a href="../index.php"><button class="btn btn-warning tblback" >Back</button></a>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>

<?php
  };
?>