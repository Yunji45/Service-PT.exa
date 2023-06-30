<?php
  include '../db/koneksi.php';
  session_start();
  if (isset($_SESSION['level'])){
    if($_SESSION['level'] == "mekanik") {
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">
        <link href="../fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->
        <title>Exxa Admin System</title>
    </head>
    <style>

        

        h2{
            color : black;
            text-align : center;
        }
        @media (min-width:350px){
            h2{
                margin-top : 20%;
            }

        }

        @media (min-width:1100px){
            h2{
                margin-top : 5%;
            }

            .kotak-info{
                width : 40rem;
                height : 16rem;
                background-color : white;
                margin : 0 auto;
                border-radius : 20px;
                box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            }

            label{
                margin-left : 20px;
                font-size : 20px;
                margin-top : 10px;
            }

            .text{
                width : 400px;
                margin-left : 20px;
            }

            .tanggal{
                width : 200px;
                margin-left : 20px;
            }

            .btn{
                margin-top : 10px;
            }

            button{
                margin-left : 20px;
            }
        }
    </style>
<body>

        <h2>FORM TOLAK WO</h2>
        <div class="kotak-info">
            <form action="../function/tolakwo.php" method="POST">

                <!-- AWAL ID WO -->
                <input type="text" value="<?php echo $_GET['id_wo'];?>" name="id_wo" hidden>
                <!-- AKHIR ID WO -->
                <!-- awal baris tanggal -->
                <label for="">Tanggal Penolakan</label>
                <input type="text" class="form-control tanggal" value="<?php echo date("Y-m-d");?>" name="tanggal_tolak"readonly/>
                <br>
                <!-- akhir baris tanggal -->

                <!-- awal baris alasan -->
                <label>Kenapa anda menolak WO ini?</label>
                <input type="text" class="form-control text" name="alasan"/>
                <!-- akhir baris alasan -->

                <!-- awal tombol submit-->
                <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin ingin menolaknya?')">Submit</button>
                <a href="wo.php" class="btn btn-danger">Cancel</a>
                <!-- akhir tombol submit -->

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
};
?>