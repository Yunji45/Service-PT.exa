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
      overflow-x : auto;
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
      height : 250px;
      
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

    .form-control {
        position : absolute;
        width : 300px;
        left : 42rem;
        top : 50px;
    }

    .btn-primary {
        position : absolute;
        left : 62rem;
        top : 50px;
    }
    table{
        
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
            <h3><i class="fas fa-chalkboard-teacher" style="padding-right : 20px; "></i>Progress Harian Sales</h3>
            

            <form action="sales.php" method="get">
                <input type="text" name="cari" class="form-control" placeholder="search..">
                <input type="submit" value="Cari" class="btn btn-primary">
            </form>
            <hr>
            
            
            
            <div class="tabel">
            <table class="table table-hover mt-2">
            <thead class="thead-dark">
                <tr>
                <th scope="col">ID CUSTOMER</th>
                <th scope="col">NAMA</th>
                <th scope="col">NO. TELPON</th>
                <th scope="col">EMAIL</th>
                <th scope="col">TANGGAL</th>
                <th scope="col">PERUSAHAAN</th>
                <th scope="col">KEBUTUHAN ALAT</th>
                <th scope="col">TINJAU</th>
                
                </tr>
            </thead>

            <!-- AWAL KODINGAN PHP -->
            <?php 

            $batas = 10;
            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

            $previous = $halaman - 1;
            $next = $halaman + 1;


            $data = mysqli_query($conn,"SELECT * from sales_form");

            $jumlah_data = mysqli_num_rows($data);
            $total_halaman = ceil($jumlah_data / $batas);

            if(isset($_GET['cari'])){
                $cari = $_GET['cari'];
                $sql = "SELECT * FROM sales_form INNER JOIN login ON sales_form.id_login = login.id_login WHERE   sales_form.id_customer like '%".$cari."%'";
                
            }else{ 
               $sql = "SELECT * FROM sales_form INNER JOIN login ON sales_form.id_login = login.id_login limit $halaman_awal, $batas";
            }

            $result =$conn-> query($sql);
            if($result->num_rows > 0){
                
              while($row = $result->fetch_assoc()){
            ?>
            <tbody>
                <tr>
                <td><?php echo $row['id_customer']; ?></td>
                <td><?php echo $row['nama_customer']; ?></td>
                <td><?php echo $row['no_telp_customer']; ?></td>
                <td><?php echo $row['email_customer']; ?></td>
                <td><?php echo $row['tanggal_laporan_sales']; ?></td>
                <td><?php echo $row['perusahaan_customer']; ?></td>
                <td><?php echo $row['kebutuhan_alat']; ?></td>
                <td><a href="detail_sales.php?id_customer=<?php echo $row['id_customer'];?>" class="btn btn-success">Detail</a></td>
                </tr>
            </tbody>

            <?php
              }
            };
            ?>
            
            </table>
            </div>
            <br>
            <nav>
              <ul class="pagination justify-content-center">
                <li class="page-item">
                  <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
                </li>
                <?php 
                for($x=1;$x<=$total_halaman;$x++){
                  ?> 
                  <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                  <?php
                }
                ?>				
                <li class="page-item">
                  <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                </li>
              </ul>
          </nav>  
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