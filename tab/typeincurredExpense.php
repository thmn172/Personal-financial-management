<?php
    include ('../inc/database.php');
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $uri = $_SERVER['REQUEST_URI'];
        $delete_query = Database::query("DELETE FROM loai_chitieu WHERE Id_loai =$id");
        if ($delete_query) {
         header("Location: typeincurredExpense.php");
         exit();
        } 
    }
    if(!empty($_GET['btnS'])){
        $nd = $_GET['btnS'];
    }else $nd = '';
    if(!isset($_SESSION["user"])){
        header ("Location: login.php");
      }
    _header('Loại chi tiêu phát sinh');
    _navbar();
    echo '<div style = "display: flex;">';
    _slidebar('Chi tiêu phát sinh', 'chi tiêu', 'chi tiêu','incurredExpense');
    echo '<div style = "display: block;width: 100%; margin: 20px 15px;">';
    if(isset($_POST['btnAdd'])&&!empty($_POST['txtTL'])){
        tadd("loai_chitieu", "1");
        echo "<div class='alert alert-success'><strong>Thêm thành công!!</strong></div>";
    }
             _bodytype('chi tiêu phát sinh', "SELECT * FROM ktragiuaky.loai_chitieu where User_Id = ".$_SESSION['id']." and loai_chitieu.type =1", "SELECT * FROM ktragiuaky.loai_chitieu WHERE type = 1 and User_Id =".$_SESSION['id']." and tenloai LIKE N'%".$nd."%'",'typeincurredExpense',"chitieu","1"); 
             _typepaginagetions();
        echo'</div>';
    echo'</div>';
    _footer();
?>