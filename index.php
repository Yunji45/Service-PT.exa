<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->

    <title>Exxa Admin System</title>
  </head>
  <style>
@media (min-width:350px)
{
  body {
      background-color : grey;
    }

    .kotak-login{
      margin : 0 auto;
      margin-top : 5%;
      width : 70%;
      
      background-color : white;
      border-radius : 20px;
      box-shadow: 2px 2px 10px rgba(0,0,0,0.8);      
    }

    .gambar {
      width : 100%;
      height : 40%;
      border-radius : 20px;
    }
    span{
      
      
      font-size : 20px;
      margin-top : 20px;
      margin-left : 22%;

    }

    input {
    width : 200px !important;
  }

  .fa-envelope{
    position: absolute;
    margin-top : -25px;
    margin-left : 12rem;
    
    
  }

  .fa-lock{
    position: absolute;
    margin-top : -25px;
    margin-left : 12rem;
  }

  button{
    margin-left : 20px !important;
    margin-bottom : 10px;
  }

  .btncancel {
    margin-left : 2px !important;
    
  }
}

@media (min-width:1100px)
{ 
  
  body {
      background-color : grey;
    }

    .kotak-login{
      margin : 0 auto;
      margin-top : 5%;
      width : 65%;
      height : 500px;
      background-color : white;
      border-radius : 20px;
      box-shadow: 2px 2px 10px rgba(0,0,0,0.8);      
    }

    .gambar {
      width : 70%;
      height : 100%;
      border-radius : 20px;
    }

    span{
      
      position  : absolute;
      font-size : 20px;
      margin-top : 20px;
      margin-left : 20px;

    }

  form {
    margin-top : -26rem;
    margin-left : 39rem;
  }

  input {
    width : 230px !important;
  }

  button{
    margin-left : 20px !important;
  }

  .btncancel {
    margin-left : 2px !important;
  }

  .fa-envelope{
    position: absolute;
    margin-top : -26px;
    margin-left : 14rem;
    opacity : 0.7;
    
  }

  .fa-lock{
    position: absolute;
    margin-top : -26px;
    margin-left : 14rem;
    opacity : 0.7;
  }
}  

@media (min-width:1500px){
    
      .kotak-login{
      margin : 0 auto;
      margin-top : 10%;
      width : 900px;
      height : 500px;
      background-color : white;
      border-radius : 20px;
      box-shadow: 2px 2px 10px rgba(0,0,0,0.8);      
    }

      .gambar {
        width : 70%;
        height : 100%;
        border-radius : 20px;
      }

      span{
      
      position  : absolute;
      font-size : 20px;
      font-weight : bold;
      margin-top : 20px;
      margin-left : 20px;

    }

    form {
    margin-top : -26rem;
    margin-left : 39rem;
  }

  input {
    width : 200px !important;
  }

  button{
    margin-left : 20px !important;
  }

  .btncancel {
    margin-left : 2px !important;
  }
  .fa-envelope{
    position: absolute;
    margin-top : -26px;
    margin-left : 12rem;
    opacity : 0.7;
  }

  .fa-lock{
    position: absolute;
    margin-top : -26px;
    margin-left : 12rem;
    opacity : 0.7;
  }
}
    
  </style>
  <body>

    <div class="kotak-login">
      <img src="img/home.jpg" alt="" class="gambar">
      <span>LOGIN USER <i class="fas fa-user"></i></span>

      <form action="login.php" method="POST">

      <!-- Awal baris Username -->
      <label for="" class="lblusername">Username</label>
      
      <input type="text" class="form-control inputusername" name="email" placeholder="enter email"/>
      <i class="fas fa-envelope"></i>
      <!-- Akhir baris Username -->

      <!-- Awal baris Username -->
      <label for="" class="lblusername">Password</label>
      <input type="password" class="form-control inputusername" name="password" placeholder="enter password">
      <i class="fas fa-lock"></i>
      <!-- Akhir baris Username -->

      <!-- Awal baris tombol -->
      <button type="submit" class="btn btn-primary btnlogin" name="tbllogin">Login</button>
      <button type="reset" class="btn btn-danger btncancel"> Cancel</button>
      <!-- Akhir baris tombol -->
      </form>
      
    </div>

      <!-- <div class="row">
        <div class="col-md-6">
            <img src="img/gambar1.jpg" alt="" class="gambarjumbo">
        </div>

        <div class="col-md-6 bg-dark akseslogin">
            <marquee class="tulisanjalan">WELCOME TO EXXA ADMINISTRATION SYSTEM</marquee>
            <div class="logo">
                <img src="img/exxa.jpg" alt="" class="logoexxa">
            </div>
            <form action="login.php" method="post">
            <div class="kotaklogin">
                <label for="" class="lblusername">Username</label>
                <input type="text" class="form-control form-control-sm inputusername" name="email" placeholder="masukkan email">
                <label for="" class="lblpassword">Password</label>
                <input type="password" class="form-control form-control-sm inputpassword" name="password" placeholder="masukkan password">
                    <div class="row baristombol">
                        <button type="submit" class="btn btn-primary btnlogin" name="tbllogin"> Login</button>
                        <button type="reset" class="btn btn-danger btncancel"> Cancel</button>
                    </div>
            </div>
            </form>
        </div>
      </div> -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>