<?php
    include "../db/koneksi.php";
    session_start();
    if (isset($_SESSION['level'])){
    if($_SESSION['level'] == "admin") {
        
        $nama_depan = $_POST['nama_depan'];
        $nama_belakang = $_POST['nama_belakang'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_md5 = md5($password);
        $level = $_POST['level'];

        $sql = "SELECT * FROM `login` WHERE email = '$email'";
        $result =$conn-> query($sql);
             if($result->num_rows > 0){               
                while($row = $result->fetch_assoc()){
                    if ($row['email'] == $email) {
                
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
                        <h3 class="txtnotif">EMAIL SUDAH ADA</h3>
                        <a href="../admin/tambahuser.php"><button class="btn btn-warning tblback" >Back</button></a>
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
                
            }
        }else{
            $sql = $conn->query("INSERT INTO `login`(`nama`, `nama_belakang`, `email`, `password`, `level`) VALUES ('$nama_depan','$nama_belakang','$email','$password_md5','$level')");
            
            header('Location: ../admin/admin.php');
        }
            
        
        
        mysqli_close($conn);

    
    
    }
};
?>
        