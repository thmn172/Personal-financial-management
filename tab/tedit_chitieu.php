<?php
         include_once "../inc/database.php";
            $st = $_POST['txtTL'];
            $idloai = $_POST['aa'];
                if(isset($_POST['btnedit'])&&!empty($_POST['txtTL'])){
                    $edit = Database::query("UPDATE loai_chitieu SET tenloai ='".$st."' where Id_loai = ".$idloai."");
                // echo $edit;
                    header('location: '.$_SESSION['tp'].'.php');
                }
                if(isset($_POST['btnhuy'])){
                    header('location: '.$_SESSION['tp'].'.php');
                }
            
            ?>