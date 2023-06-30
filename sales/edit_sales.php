<?php
  include '../db/koneksi.php';
  session_start();
  if (isset($_SESSION['level'])){
    if($_SESSION['level'] == "sales") {
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
    <link href="../fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->

    <title>Exxa Admin System</title>
  </head>
  <style>
      body{
          background-color : #cfcfcf;
      }

      .kotak-sales{
          width : 1000px;
          height : 600px;
          background-color : white;
          margin : 0 auto;
          margin-top : 40px;
          box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
      }

      h3{
          text-align : center;
          text-transform : uppercase;
          padding-top : 10px;    
      }
  </style>
<body>
    <?php
    
      $sql ="SELECT * FROM sales_form INNER JOIN login WHERE sales_form.id_customer = '".$_GET['id_customer']."' AND login.id_login = '".$_SESSION['id_login']."'";
      $result =$conn-> query($sql);
           if($result->num_rows > 0){
             while($row = $result->fetch_assoc()){
    ?>
    <div class="kotak-sales">
      <h3>Form Edit Progress Harian Sales</h3>
      <form action="../function/edit_sales.php" method="POST">

        <!-- awal baris 1 -->
        <div class="form-group row" style="margin-top : 40px;">
        </div>
        <!-- akhir baris 1 -->

        <!-- awal baris 2 -->
            <label for="" style="margin-left : 40px;">Nama : </label>
            <input type="text" class="form-control" style="width : 200px; position : absolute; margin-top : -30px; margin-left : 210px;" value="<?php echo $row['nama_customer'];?>"name="nama_customer"/>
            <input type="text" class="form-control" style="width : 200px; position : absolute; margin-top : -30px; margin-left : 210px;" value="<?php echo $row['id_customer'];?>"name="id_customer" hidden/>
            <label for="" style="margin-left : 450px;">Nama Perusahaan : </label>
            <input type="text" class="form-control" style="width : 200px; position : absolute; margin-top : -30px; margin-left : 700px;" value="<?php echo $row['perusahaan_customer'];?>" name="nama_perusahaan"/><br><br>
        <!-- akhir baris 2 -->

        
        <!-- awal baris 3 -->
        <label for="" style="margin-left : 40px;">No Telp : </label>
            <input type="text" class="form-control" style="width : 200px; position : absolute; margin-top : -30px; margin-left : 210px;" value="<?php echo $row['no_telp_customer'];?>" name="no_telp_customer"/>
            <label for="" style="margin-left : 430px;">Alamat Perusahaan : </label>
            <textarea class="form-control" style="width : 200px; height : 90px;position : absolute; margin-top : -30px; margin-left : 700px;" name="alamat_perusahaan"><?php echo $row['alamat_perusahaan'];?></textarea><br><br>
        <!-- akhir baris 3 -->

        <!-- awal baris 4 -->
        <label for="" style="margin-left : 40px;">Email : </label>
            <input type="text" class="form-control" style="width : 200px; position : absolute; margin-top : -30px; margin-left : 210px;" value="<?php echo $row['email_customer'];?>" name="email_perusahaan"/><br><br>
        <!-- akhir baris 4 -->  

        <!-- awal baris 5 -->
        <label for="" style="margin-left : 40px;">Tanggal : </label>
            <input type="text" class="form-control" style="width : 200px; position : absolute; margin-top : -30px; margin-left : 210px;" value="<?php echo date('Y-m-d', strtotime($row['tanggal_laporan_sales']));?>" name="tanggal" readonly/>
            <label for="" style="margin-left : 430px;">Bidang Perusahaan : </label>
            <input type="text" class="form-control" style="width : 200px; position : absolute; margin-top : -30px; margin-left : 700px;" value="<?php echo $row['bidang_perusahaan'];?>" name="bidang_perusahaan"/><br><br>
        <!-- akhir baris 5 -->

        <!-- awal baris 6 -->
        <label for="" style="margin-left : 40px;">Kebutuhan Alat : </label>
            <input type="text" class="form-control" style="width : 200px; position : absolute; margin-top : -30px; margin-left : 210px;" value="<?php echo $row['kebutuhan_alat'];?>" name="kebutuhan" /><br><br>
        <!-- akhir baris 6 -->
        
        <!-- awal baris 7 -->
        <label for="" style="margin-left : 40px;">Perencanaan Alat : </label>
        <select class="form-control" id="exampleFormControlSelect1" style="width : 200px; position : absolute; margin-top : -30px; margin-left : 210px;" name="perencanaan">
        <?php
        if($row['perencanaan_alat'] == "rental"){
        ?>
                    <option selected><?php echo $row['perencanaan_alat'];?></option>
                    <option>beli</option>
        <?php 
        }elseif($row['perencanaan_alat'] == "beli"){
        ?>
                    <option selected><?php echo $row['perencanaan_alat'];?></option>
                    <option>rental</option>
        <?php
        };
        ?>
        </select><br><br>
        <!-- akhir baris 7 -->
        <input type="checkbox" value="SETUJU" name="validasi" style="margin-left : 40px;" required/>
                <label class="form-check-label" for="defaultCheck1">
                  Laporan yang saya buat sudah benar, dan saya bertanggung jawab akan laporan ini.
                </label><br>

                <?php
                     }
                    };
                ?>

        <button type="submit" class="btn btn-primary" style="margin-left : 40px; margin-top : 10px;" onclick="return confirm('apakah anda yakin ingin mengirimnya?')">Submit</button>
        <a href="sales.php" class="btn btn-danger" style="margin-top : 10px;">Cancel</a>
      </form>
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