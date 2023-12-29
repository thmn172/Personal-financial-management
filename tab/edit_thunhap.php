<?php
         include_once "../inc/database.php";
        // include_once "../tab/Update.php";
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = $_POST['txtDate'];
            $uri = $_SERVER['REQUEST_URI'];
               $u = explode('?', $uri);
            // // var_dump($uri);
            // echo end($u); 
            $st = $_POST['txtST'];
            $gc = $_POST['txtGC'];
            $idkhoan = $_POST['aa'];
            if(isset($_POST['btnedit'])&&!empty($_POST['txtST'])&&!empty($_POST['txtGC'])){
                $edit = Database::query("UPDATE khoan_thunhap SET sotien=".$st.", ghichu ='".$gc."', ngaySD ='".$date."' where Id_khoan = ".$idkhoan."");
                // echo $edit;
                header('location: '.$_SESSION['p'].'.php');
            }
            if(isset($_POST['btnhuy'])){
                header('location: '.$_SESSION['p'].'.php');
            }
                
        
            
            
?>