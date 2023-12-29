<?php
    include ('../inc/database.php');
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $uri = $_SERVER['REQUEST_URI'];
        $delete_query = Database::query("DELETE FROM loai_thunhap WHERE Id_loai =$id");
        if ($delete_query) {
         header("Location: typemainIncome.php");
         exit();
        } 
    }
        if(!empty($_GET['btnS'])){
            $nd = $_GET['btnS'];
        }else $nd = '';
    if(!isset($_SESSION["user"])){
        header ("Location: login.php");
      }
    _header('Loại thu nhập chính');
    _navbar();
    echo '<div style = "display: flex;">';
    _slidebar('Thu nhập chính', 'thu nhập', 'thu nhập','mainIncome');
    echo '<div style = "display: block;width: 100%; margin: 20px 15px;">';
    if(isset($_POST['btnAdd'])&&!empty($_POST['txtTL'])){
        tadd("loai_thunhap", "0");
        echo "<div class='alert alert-success'><strong>Thêm thành công!!</strong></div>";
    }
             _bodytype('thu nhập chính', "SELECT * FROM ktragiuaky.loai_thunhap where User_Id = ".$_SESSION['id']." and type =0", "SELECT * FROM ktragiuaky.loai_thunhap WHERE type = 0 and User_Id =".$_SESSION['id']." and tenloai LIKE N'%".$nd."%'", "typemainIncome","thunhap","0"); 
            
             _typepaginagetions();
        echo'</div>';
    echo'</div>';
    _footer();
?>