<?php
session_start();
include 'db/koneksi.php';
$email = $_POST["email"];
$password = md5($_POST['password']);
$query_sql = "SELECT * FROM login WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $query_sql);
if(mysqli_num_rows($result) > 0){
    while($row = $result->fetch_assoc()){
        $_SESSION['id_login']= $row['id_login'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['level'] = $row['level'];
        /*echo $_SESSION['id_login'];
        echo $_SESSION['nama'];
        echo $_SESSION['email'];*/
        }if (isset($_SESSION['email'])){
            if($_SESSION['level'] == "mekanik"){
                header('Location: mechanic/service.php');
            }elseif($_SESSION['level'] == "logistik"){
            header ('Location: logistic/admin.php');
            }elseif($_SESSION['level'] == "manager"){
            header ('Location: manager/admin.php');
            }elseif($_SESSION['level'] == "admin"){
            header ('Location: admin/admin.php');
            }elseif($_SESSION['level'] == "sales"){
            header ('Location: sales/dashboard.php');                
            }else{
                header('Location: hrd/dashboard.php');
            }
        }
    }else{
        header('Location: wrongpassword.php');
    }
?>