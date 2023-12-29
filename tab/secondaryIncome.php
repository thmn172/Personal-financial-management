<?php
    include ('../inc/database.php');
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $uri = $_SERVER['REQUEST_URI'];
        echo $uri;
        $delete_query = Database::query("DELETE FROM khoan_thunhap WHERE Id_khoan =$id");
        if ($delete_query) {
         header("Location: secondaryIncome.php");
         //  echo  "<script>window.location.href='http://localhost/exam/view/tab/".$lct.".php'</script>";
            exit();
        } 
    }
    if(!empty($_GET['btnS'])){
        $nd = $_GET['btnS'];
    }else $nd = '';
    if(!isset($_SESSION["user"])){
        header ("Location: login.php");
      }
    _header('Thu nhập phụ');
    _navbar();
    echo '<div style = "display: flex;">';
    _slidebar('Thu nhập phụ', 'thu nhập', 'thu nhập','secondaryIncome');
    echo '<div style = "display: block;width: 100%; margin: 20px 15px;">';
    if(isset($_POST['btnAdd'])&&!empty($_POST['txtST'])&&!empty($_POST['txtGC'])){
        add("khoan_thunhap", "1");
        echo "<div class='alert alert-success'><strong>Thêm thành công!!</strong></div>";
      }
             _body('Danh sách thu nhập phụ',"SELECT * FROM ktragiuaky.khoan_thunhap where type = 1 and User_Id = " .$_SESSION['id']."", 
             "SELECT * FROM ktragiuaky.khoan_thunhap WHERE type = 1 and User_Id =".$_SESSION['id']." and ghichu LIKE N'%".$nd."%'","secondaryIncome","Update_thunhap"
             ,"SELECT tenloai,Id_loai FROM ktragiuaky.loai_thunhap where type = 1 and User_id = ".$_SESSION['id']."","khoan_thunhap", "1"); 
             
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