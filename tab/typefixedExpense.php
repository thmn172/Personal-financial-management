<?php
    include ('../inc/database.php');
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $uri = $_SERVER['REQUEST_URI'];
        $delete_query = Database::query("DELETE FROM loai_chitieu WHERE Id_loai =$id");
        if ($delete_query) {
         header("Location: typefixedExpense.php");
         exit();
        } 
    }
    if(!empty($_GET['btnS'])){
        $nd = $_GET['btnS'];
    }else $nd = '';
    if(!isset($_SESSION["user"])){
        header ("Location: login.php");
      }
    _header('Loại chi tiêu cố định');
    _navbar();
    echo '<div style = "display: flex;">';
    _slidebar('Chi tiêu cố định', 'chi tiêu', 'chi tiêu','fixedExpense');
    echo '<div style = "display: block;width: 100%; margin: 20px 15px;">';
    if(isset($_POST['btnAdd'])&&!empty($_POST['txtTL'])){
        tadd("loai_chitieu", "0");
        echo "<div class='alert alert-success'><strong>Thêm thành công!!</strong></div>";
    }
             _bodytype('chi tiêu cố định', "SELECT * FROM ktragiuaky.loai_chitieu where User_Id = ".$_SESSION['id']." and loai_chitieu.type =0", "SELECT * FROM ktragiuaky.loai_chitieu WHERE type = 0 and User_Id =".$_SESSION['id']." and tenloai LIKE N'%".$nd."%'",'typefixedExpense',"chitieu","0"); 
             _typepaginagetions();
        echo'</div>';
    echo'</div>';
    _footer();
?>