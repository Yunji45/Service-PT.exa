<?php
    include "../db/koneksi.php";
    session_start();
    if (isset($_SESSION['level'])){
    if($_SESSION['level'] == "mekanik") {
        $norqs = $_POST['norqs'];
        $txtperm1 = $_POST['txtperm1'];
        $txtperm2 = $_POST['txtperm2'];
        $txtperm3 = $_POST['txtperm3'];
        $txtperm4 = $_POST['txtperm4'];
        $txtperm5 = $_POST['txtperm5'];
        $txtperm6 = $_POST['txtperm6'];
        $txtperm7 = $_POST['txtperm7'];
        $txtperm8 = $_POST['txtperm8'];
        $txtperm9 = $_POST['txtperm9'];
        $txtperm10= $_POST['txtperm10'];
        $qty1 = $_POST['qty1'];
        $qty2 = $_POST['qty2'];
        $qty3 = $_POST['qty3'];
        $qty4 = $_POST['qty4'];
        $qty5 = $_POST['qty5'];
        $qty6 = $_POST['qty6'];
        $qty7 = $_POST['qty7'];
        $qty8 = $_POST['qty8'];
        $qty9 = $_POST['qty9'];
        $qty10 = $_POST['qty10'];
        $sat1 = $_POST['sat1'];
        $sat2 = $_POST['sat2'];
        $sat3 = $_POST['sat3'];
        $sat4 = $_POST['sat4'];
        $sat5 = $_POST['sat5'];
        $sat6 = $_POST['sat6'];
        $sat7 = $_POST['sat7'];
        $sat8 = $_POST['sat8'];
        $sat9 = $_POST['sat9'];
        $sat10 = $_POST['sat10'];
        $sn1 = $_POST['sn1'];
        $sn2 = $_POST['sn2'];
        $sn3 = $_POST['sn3'];
        $sn4 = $_POST['sn4'];
        $sn5 = $_POST['sn5'];
        $sn6 = $_POST['sn6'];
        $sn7 = $_POST['sn7'];
        $sn8 = $_POST['sn8'];
        $sn9 = $_POST['sn9'];
        $sn10 = $_POST['sn10'];
        $gambarlama = $_POST['gambarlama'];
        $gambarlama2 = $_POST['gambarlama2'];
        $gambarlama3 = $_POST['gambarlama3'];
        $gambarlama4 = $_POST['gambarlama4'];
        $gambarlama5 = $_POST['gambarlama5'];
        $gambarlama6 = $_POST['gambarlama6'];
        $gambarlama7 = $_POST['gambarlama7'];
        $gambarlama8 = $_POST['gambarlama8'];
        $gambarlama9 = $_POST['gambarlama9'];
        $gambarlama10 = $_POST['gambarlama10'];

        // echo $_FILES['gambar_1']['size'];
        // exit;
        
        $gbr_1 = $gambarlama;
        if(isset($_FILES['gambar_1'])) {
            
            if( $_FILES['gambar_1']['size'] > 0 && 
                $_FILES['gambar_1']['size'] < 500000
            ){

                $target_dir = "gambar_rqs/mekanik/permintaan_1/";
                $name = '';
                $name = substr(str_shuffle(MD5(microtime())), 0, 12).'-'.$_FILES['gambar_1']['name'];
                $target_file = '../'.$target_dir . basename($name);
              
                //memilih tipe file
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
              
                // tipe file yang di perbolehkan
              
                $extensions_arr = array("jpg","jpeg","png","pdf","gif");
              
                // upload file
                if( in_array($imageFileType,$extensions_arr)){
                    move_uploaded_file($_FILES['gambar_1']['tmp_name'],'../'.$target_dir.$name);
                }
              
              
                $gbr_1 = $target_dir.$name;
            }
        }

        $gbr_2 = $gambarlama2;
        if(isset($_FILES['gambar_2'])) {
            
            if( $_FILES['gambar_2']['size'] > 0 && 
                $_FILES['gambar_2']['size'] < 500000
            ){

                $target_dir = "gambar_rqs/mekanik/permintaan_2/";
                $name = '';
                $name = substr(str_shuffle(MD5(microtime())), 0, 12).'-'.$_FILES['gambar_2']['name'];
                $target_file = '../'.$target_dir . basename($name);
              
                //memilih tipe file
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
              
                // tipe file yang di perbolehkan
              
                $extensions_arr = array("jpg","jpeg","png","pdf","gif");
              
                // upload file
                if( in_array($imageFileType,$extensions_arr)){
                    move_uploaded_file($_FILES['gambar_2']['tmp_name'],'../'.$target_dir.$name);
                }
              
              
                $gbr_2 = $target_dir.$name;
            }
        }

        $gbr_3 = $gambarlama3;
        if(isset($_FILES['gambar_3'])) {
            
            if( $_FILES['gambar_3']['size'] > 0 && 
                $_FILES['gambar_3']['size'] < 500000
            ){

                $target_dir = "gambar_rqs/mekanik/permintaan_3/";
                $name = '';
                $name = substr(str_shuffle(MD5(microtime())), 0, 12).'-'.$_FILES['gambar_3']['name'];
                $target_file = '../'.$target_dir . basename($name);
              
                //memilih tipe file
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
              
                // tipe file yang di perbolehkan
              
                $extensions_arr = array("jpg","jpeg","png","pdf","gif");
              
                // upload file
                if( in_array($imageFileType,$extensions_arr)){
                    move_uploaded_file($_FILES['gambar_3']['tmp_name'],'../'.$target_dir.$name);
                }
              
              
                $gbr_3 = $target_dir.$name;
            }
        }

        $gbr_4 = $gambarlama4;
        if(isset($_FILES['gambar_4'])) {
            
            if( $_FILES['gambar_4']['size'] > 0 && 
                $_FILES['gambar_4']['size'] < 500000
            ){

                $target_dir = "gambar_rqs/mekanik/permintaan_4/";
                $name = '';
                $name = substr(str_shuffle(MD5(microtime())), 0, 12).'-'.$_FILES['gambar_4']['name'];
                $target_file = '../'.$target_dir . basename($name);
              
                //memilih tipe file
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
              
                // tipe file yang di perbolehkan
              
                $extensions_arr = array("jpg","jpeg","png","pdf","gif");
              
                // upload file
                if( in_array($imageFileType,$extensions_arr)){
                    move_uploaded_file($_FILES['gambar_4']['tmp_name'],'../'.$target_dir.$name);
                }
              
              
                $gbr_4 = $target_dir.$name;
            }
        }

        $gbr_5 = $gambarlama5;
        if(isset($_FILES['gambar_5'])) {
            
            if( $_FILES['gambar_5']['size'] > 0 && 
                $_FILES['gambar_5']['size'] < 500000
            ){

                $target_dir = "gambar_rqs/mekanik/permintaan_5/";
                $name = '';
                $name = substr(str_shuffle(MD5(microtime())), 0, 12).'-'.$_FILES['gambar_5']['name'];
                $target_file = '../'.$target_dir . basename($name);
              
                //memilih tipe file
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
              
                // tipe file yang di perbolehkan
              
                $extensions_arr = array("jpg","jpeg","png","pdf","gif");
              
                // upload file
                if( in_array($imageFileType,$extensions_arr)){
                    move_uploaded_file($_FILES['gambar_5']['tmp_name'],'../'.$target_dir.$name);
                }
              
              
                $gbr_5 = $target_dir.$name;
            }
        }

        $gbr_6 = $gambarlama6;
        if(isset($_FILES['gambar_6'])) {
            
            if( $_FILES['gambar_6']['size'] > 0 && 
                $_FILES['gambar_6']['size'] < 500000
            ){

                $target_dir = "gambar_rqs/mekanik/permintaan_6/";
                $name = '';
                $name = substr(str_shuffle(MD5(microtime())), 0, 12).'-'.$_FILES['gambar_6']['name'];
                $target_file = '../'.$target_dir . basename($name);
              
                //memilih tipe file
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
              
                // tipe file yang di perbolehkan
              
                $extensions_arr = array("jpg","jpeg","png","pdf","gif");
              
                // upload file
                if( in_array($imageFileType,$extensions_arr)){
                    move_uploaded_file($_FILES['gambar_6']['tmp_name'],'../'.$target_dir.$name);
                }
              
              
                $gbr_6 = $target_dir.$name;
            }
        }
       
        $gbr_7 = $gambarlama7;
        if(isset($_FILES['gambar_7'])) {
            
            if( $_FILES['gambar_7']['size'] > 0 && 
                $_FILES['gambar_7']['size'] < 500000
            ){

                $target_dir = "gambar_rqs/mekanik/permintaan_7/";
                $name = '';
                $name = substr(str_shuffle(MD5(microtime())), 0, 12).'-'.$_FILES['gambar_7']['name'];
                $target_file = '../'.$target_dir . basename($name);
              
                //memilih tipe file
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
              
                // tipe file yang di perbolehkan
              
                $extensions_arr = array("jpg","jpeg","png","pdf","gif");
              
                // upload file
                if( in_array($imageFileType,$extensions_arr)){
                    move_uploaded_file($_FILES['gambar_7']['tmp_name'],'../'.$target_dir.$name);
                }
              
              
                $gbr_7 = $target_dir.$name;
            }
        }

        $gbr_8 = $gambarlama8;
        if(isset($_FILES['gambar_8'])) {
            
            if( $_FILES['gambar_8']['size'] > 0 && 
                $_FILES['gambar_8']['size'] < 500000
            ){

                $target_dir = "gambar_rqs/mekanik/permintaan_8/";
                $name = '';
                $name = substr(str_shuffle(MD5(microtime())), 0, 12).'-'.$_FILES['gambar_8']['name'];
                $target_file = '../'.$target_dir . basename($name);
              
                //memilih tipe file
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
              
                // tipe file yang di perbolehkan
              
                $extensions_arr = array("jpg","jpeg","png","pdf","gif");
              
                // upload file
                if( in_array($imageFileType,$extensions_arr)){
                    move_uploaded_file($_FILES['gambar_8']['tmp_name'],'../'.$target_dir.$name);
                }
              
              
                $gbr_8 = $target_dir.$name;
            }
        }

        $gbr_9 = $gambarlama9;
        if(isset($_FILES['gambar_9'])) {
            
            if( $_FILES['gambar_9']['size'] > 0 && 
                $_FILES['gambar_9']['size'] < 500000
            ){

                $target_dir = "gambar_rqs/mekanik/permintaan_9/";
                $name = '';
                $name = substr(str_shuffle(MD5(microtime())), 0, 12).'-'.$_FILES['gambar_9']['name'];
                $target_file = '../'.$target_dir . basename($name);
              
                //memilih tipe file
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
              
                // tipe file yang di perbolehkan
              
                $extensions_arr = array("jpg","jpeg","png","pdf","gif");
              
                // upload file
                if( in_array($imageFileType,$extensions_arr)){
                    move_uploaded_file($_FILES['gambar_9']['tmp_name'],'../'.$target_dir.$name);
                }
              
              
                $gbr_9 = $target_dir.$name;
            }
        }

        $gbr_10 = $gambarlama10;
        if(isset($_FILES['gambar_10'])) {
            
            if( $_FILES['gambar_10']['size'] > 0 && 
                $_FILES['gambar_10']['size'] < 500000
            ){

                $target_dir = "gambar_rqs/mekanik/permintaan_10/";
                $name = '';
                $name = substr(str_shuffle(MD5(microtime())), 0, 12).'-'.$_FILES['gambar_10']['name'];
                $target_file = '../'.$target_dir . basename($name);
              
                //memilih tipe file
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
              
                // tipe file yang di perbolehkan
              
                $extensions_arr = array("jpg","jpeg","png","pdf","gif");
              
                // upload file
                if( in_array($imageFileType,$extensions_arr)){
                    move_uploaded_file($_FILES['gambar_10']['tmp_name'],'../'.$target_dir.$name);
                }
              
              
                $gbr_10 = $target_dir.$name;
            }
        }


    $sql = "UPDATE `rqs_form` SET `permintaan_1`='$txtperm1',`sn_permintaan_1`='$sn1',`qty_1`='$qty1',`satuan_1`='$sat1',`gambar_1` = '$gbr_1',`permintaan_2`='$txtperm2',`sn_permintaan_2`='$sn2',`qty_2`='$qty2',`satuan_2`='$sat2',`gambar_2` = '$gbr_2',`permintaan_3`='$txtperm3',`sn_permintaan_3`='$sn3',`qty_3`='$qty3',`satuan_3`='$sat3',`gambar_3` = '$gbr_3',`permintaan_4`='$txtperm4',`sn_permintaan_4`='$sn4',`qty_4`='$qty4',`satuan_4`='$sat4',`gambar_4` = '$gbr_4',`permintaan_5`='$txtperm5',`sn_permintaan_5`='$sn5',`qty_5`='$qty5',`satuan_5`='$sat5',`gambar_5` = '$gbr_5',`permintaan_6`='$txtperm6',`sn_permintaan_6`='$sn6',`qty_6`='$qty6',`satuan_6`='$sat6', `gambar_6` = '$gbr_6',`permintaan_7`='$txtperm7',`sn_permintaan_7`='$sn7',`qty_7`='$qty7',`satuan_7`='$sat7',`gambar_7` = '$gbr_7',`permintaan_8`='$txtperm8',`sn_permintaan_8`='$sn8',`qty_8`='$qty8',`satuan_8`='$sat8',`gambar_8` = '$gbr_8',`permintaan_9`='$txtperm9',`sn_permintaan_9`='$sn9',`qty_9`='$qty9',`satuan_9`='$sat9',`gambar_9` = '$gbr_9',`permintaan_10`='$txtperm10',`sn_permintaan_10`='$sn10',`qty_10`='$qty10',`satuan_10`='$sat10', `gambar_10` = '$gbr_10' WHERE `id_rqs` = '$norqs'";

    // echo $sql;
    // die();

   
    mysqli_query($conn, $sql);
    mysqli_close($conn);

    header('Location: ../mechanic/admin.php');
    

    }
};

?>