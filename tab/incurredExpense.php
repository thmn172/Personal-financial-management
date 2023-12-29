<?php
    include ('../inc/database.php');
    if (isset($_GET['delete'])) {
       $id = $_GET['delete'];
       $uri = $_SERVER['REQUEST_URI'];
       echo $uri;
       $delete_query = Database::query("DELETE FROM khoan_chitieu WHERE Id_khoan =$id");
       if ($delete_query) {
        header("Location: incurredExpense.php");
           exit();
       } 
   }
   if(!empty($_GET['btnS'])){
    $nd = $_GET['btnS'];
    }else $nd = '';
    if(!isset($_SESSION["user"])){
        header ("Location: login.php");
      }
      _header('Chi tiêu phát sinh');
    _navbar();
    echo '<div style = "display: flex;">';
    _slidebar('Chi tiêu phát sinh', 'chi tiêu', 'chi tiêu','incurredExpense');
    echo '<div style = "display: block;width: 100%; margin: 20px 15px;">';
    if(isset($_POST['btnAdd'])&&!empty($_POST['txtST'])&&!empty($_POST['txtGC'])){
        add("khoan_chitieu", "1");
        echo "<div class='alert alert-success'><strong>Thêm thành công!!</strong></div>";
      }
    _body('Danh sách chi tiêu phát sinh', "SELECT * FROM ktragiuaky.khoan_chitieu where type = 1 and User_Id = " .$_SESSION['id']."",
    "SELECT * FROM ktragiuaky.khoan_chitieu WHERE type = 1 and User_Id =".$_SESSION['id']." and ghichu LIKE N'%".$nd."%'", 'incurredExpense', "Update_chitieu"
    ,"SELECT tenloai,Id_loai FROM ktragiuaky.loai_chitieu where type = 1 and User_id = ".$_SESSION['id']."","khoan_chitieu", "1");
      
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if(isset($_POST['btnln'])){
        if(empty($_POST['dateST'])||empty($_POST['dateEND']))
        echo "<div class='alert alert-danger' style='margin: 0 12px'><strong>Vui lòng điền đủ thông tin!!</strong></div>";
        else{
            if($_POST['dateST']>$_POST['dateEND'])
            echo "<div class='alert alert-danger' style='margin: 0 12px'><strong>Không có dữ liệu phù hợp!!</strong></div>";
                                          
        }
    }
}
      _paginagetions();
        echo'</div>';
    echo'</div>';
    _footer();
?>