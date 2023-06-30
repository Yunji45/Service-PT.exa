<?php
    include "../db/koneksi.php";
    session_start();
    if (isset($_SESSION['level'])){
    if($_SESSION['level'] == "manager") {
    
    $password_lama = $_POST['password_lama'];
    $password_baru = $_POST['password_baru'];
    $konf_password = $_POST['konf_password'];
    $password_lama	= md5($password_lama);
    $sql = "SELECT password FROM login WHERE password='$password_lama'";
    $result =$conn-> query($sql);
    if($result->num_rows > 0){
        if(strlen($password_baru) >= 5){
            if($password_baru == $konf_password){
                $password_baru 	= md5($password_baru);
                $id_login		= $_SESSION['id_login'];
                $update = $conn->query("UPDATE login SET password='$password_baru' WHERE id_login='$id_login'");
                if($update){
                    ?>
                    <!-- kondisi jika proses query UPDATE berhasil -->
                <!doctype html>
                <html lang="en">
                <head>
                    <!-- Required meta tags -->
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

                    <!-- Bootstrap CSS -->
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

                    <link rel="stylesheet" href="../style.css">
                    <title>Exxa Admin Sistem</title>
                </head>
                <body>
                    <div class="kotaknotif">
                        <h3 class="txtnotif">Password Berhasil Diubah</h3>
                        <a href="../manager/admin.php"><button class="btn btn-warning tblback" >Back</button></a>
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
                    <title>Exxa Admin Sistem</title>
                </head>
                <body>
                    <div class="kotaknotif">
                        <h3 class="txtnotif">Password Gagal Diubah</h3>
                        <a href="../manager/ubahpassword.php"><button class="btn btn-warning tblback" >Back</button></a>
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
                    <title>Exxa Admin Sistem</title>
                </head>
                <body>
                    <div class="kotaknotif">
                        <h3 class="txtnotif">Password Tidak Cocok</h3>
                        <a href="../manager/ubahpassword.php"><button class="btn btn-warning tblback" >Back</button></a>
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
                    <title>Exxa Admin Sistem</title>
                </head>
                <body>
                    <div class="kotaknotif">
                        <h3 class="txtnotif">Password Baru Minimal 5 Karakter</h3>
                        <a href="../manager/ubahpassword.php"><button class="btn btn-warning tblback" >Back</button></a>
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
                    <title>Exxa Admin Sistem</title>
                </head>
                <body>
                    <div class="kotaknotif">
                        <h3 class="txtnotif">Password Lama Tidak Cocok</h3>
                        <a href="../manager/ubahpassword.php"><button class="btn btn-warning tblback" >Back</button></a>
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
    mysqli_close($conn);

    // header('Location: ../manager/admin.php');
    }
    ?>
     
    <?php
} else{
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
?>