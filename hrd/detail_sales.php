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


</style>
<body>
    <h2>Detail Laporan Sales</h2>

    <?php
          $sql = "SELECT * FROM sales_form INNER JOIN login ON sales_form.id_login = login.id_login WHERE sales_form.id_customer = '".$_GET['id_customer']."'";
          $result =$conn-> query($sql);
             if($result->num_rows > 0){
                 $i=1;
               while($row = $result->fetch_assoc()){

         
       
    ?>

    <div class="kartu-rqs">
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">ID Customer</th>
            <th scope="col">Nama Customer</th>
            <th scope="col">Nama Sales</th>
            <th scope="col">Tanggal Laporan</th>
            <th scope="col">No. Telpon Customer</th>
            <th scope="col">Email Customer</th>
            
            </tr>
        </thead>
        <tbody>
            <tr>
            <td><?php echo $row['id_customer'];?></td>
            <td><?php echo $row['nama_customer'];?></td>
            <td><?php echo $row['nama'];?></td>
            <td><?php echo date('d-m-Y', strtotime($row['tanggal_laporan_sales']));?></td>
            <td><?php echo $row['no_telp_customer'];?></td>
            <td><?php echo $row['email_customer'];?></td>
            </tr>
        </tbody>
        </table>
       <br>
       
        <!-- tabel -->
        <div class="tabel">
            <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Nama Perusahaan</th>
                <th scope="col">Alamat Perusahaan</th>
                <th scope="col">Bidang Perusahaan</th>
                <th scope="col">Perencanaan Alat</th>
                <th scope="col">Kebutuhan Alat</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <td>
                    <?php echo $row['perusahaan_customer'];?>
                    </td>

                    <td>
                    <?php echo $row['alamat_perusahaan'];?>
                    </td>

                    <td>
                    <?php echo $row['bidang_perusahaan'];?>
                    </td>

                    <td>
                    <?php echo $row['perencanaan_alat'];?>
                    </td>

                    <td>
                    <?php echo $row['kebutuhan_alat'];?>
                    </td>
                </tr>
            </tbody>
            </table>
        </div><br>

       
        
    </div>
            <br>
    

    <a href="sales.php" class="btn btn-primary">Kembali</a>

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