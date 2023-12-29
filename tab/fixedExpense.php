<?php
    include ('../inc/database.php');
    //include ('../tab/Update.php');
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $uri = $_SERVER['REQUEST_URI'];
        $delete_query = Database::query("DELETE FROM khoan_chitieu WHERE Id_khoan =$id");
        if ($delete_query) {
         header("Location: fixedExpense.php");
         exit();
        } 
    }
    if(!empty($_GET['btnS'])){
        $nd = $_GET['btnS'];
    }else $nd = '';
    if(!isset($_SESSION["user"])){
        header ("Location: login.php");
      }
      
    _header('Chi tiêu cố định');
    _navbar();
    echo '<div style = "display: flex;">';
    _slidebar('Chi tiêu cố định', 'chi tiêu', 'chi tiêu ','fixedExpense');
    echo '<div style = "display: block;width: 100%; margin: 20px 15px;">';
    if(isset($_POST['btnAdd'])&&!empty($_POST['txtST'])&&!empty($_POST['txtGC'])){
        add("khoan_chitieu", "0");
        echo "<div class='alert alert-success'><strong>Thêm thành công!!</strong></div>";
    }
             _body('Danh sách chi tiêu cố định', "SELECT * FROM ktragiuaky.khoan_chitieu where type = 0 and User_Id = " .$_SESSION['id']."",
             "SELECT * FROM ktragiuaky.khoan_chitieu WHERE type = 0 and User_Id =".$_SESSION['id']." and ghichu LIKE N'%".$nd."%'","fixedExpense","Update_chitieu"
             , "SELECT tenloai,Id_loai FROM ktragiuaky.loai_chitieu where type = 0 and User_id = ".$_SESSION['id']."","khoan_chitieu", "0"); 
             
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