<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Exxa Admin System</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
        <a class="navbar-brand" href="#">ADMINISTRASI EXXA</a>
        <form class="form-inline my-2 my-lg-0 ml-auto">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
      </nav>

   
    <div class="row no-gutters mt-5">
        
        <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
            <ul class="nav flex-column ml-3 mb-5">
                
                <li class="nav-item">
                    <a class="nav-link text-white" href="admin.html">RQS</a><hr class="bg-white">
                  </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="sps.html">SPS</a><hr class="bg-white">
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="ir.html">Inspection Report</a><hr class="bg-white">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="wo.html">Work Order</a><hr class="bg-white">
                  </li>
              </ul>
        </div>

        <div class="col-md-10 p-5 pt-2">
            <h3>WORK ORDER</h3>
            <hr>
            <a href="woform.html" class="btn btn-primary mb-2">TAMBAH WO</a>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Merk</th>
                    <th scope="col">Type</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Serial Number</th>
                    <th scope="col">Satus</th>
                    <th scope="col">Action</th>
                   
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>TOMMY</td>
                    <td>09/08/2021</td>
                    <td>TADANO</td>
                    <td>CRANE</td>
                    <td>ATF70</td>
                    <td>70023</td>
                    <td>DISERAHKAN</td>
                    <td><a href="" class="btn btn-primary">DETAIL</a>
                        <a href="" class="btn btn-warning">EDIT</a>
                        <a href="" class="btn btn-danger">HAPUS</a></td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>NURMAN</td>
                    <td>09/08/2021</td>
                    <td>KOMATSU</td>
                    <td>BULLDOZER</td>
                    <td>D31P</td>
                    <td>45128</td>
                    <td>DISERAHKAN</td>
                    <td><a href="" class="btn btn-primary">DETAIL</a>
                        <a href="" class="btn btn-warning">EDIT</a>
                        <a href="" class="btn btn-danger">HAPUS</a></td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>TEDDY</td>
                    <td>09/08/2021</td>
                    <td>JLG</td>
                    <td>BOOMLIFT</td>
                    <td>JLG660</td>
                    <td>87818</td>
                    <td>DISERAHKAN</td>
                    <td><a href="" class="btn btn-primary">DETAIL</a>
                        <a href="" class="btn btn-warning">EDIT</a>
                        <a href="" class="btn btn-danger">HAPUS</a></td>
                  </tr>
                </tbody>
              </table>

        </div>
        
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
    <footer>
      &copy; Peryo - 2021
    </footer>
  </body>
</html>