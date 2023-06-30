<?php
    $host = "localhost";
    $username = "admin";
    $password = "updatedata";
    $database = "exa";

    $conn = new mysqli($host, $username ,$password, $database);

    if ($conn->connect_errno){
        echo "failed to conect to MySQL : " . $mysqli -> connect_error; 
        exit();
    }else{
        // echo "<p> koneksi berhasil </p>";
    }
?>