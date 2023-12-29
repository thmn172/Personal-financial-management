<?php
    session_start();
    class Database{
        static $conn;
        public static function getConnection(){
            if(self::$conn == null)
                return new mysqli("localhost", "root","minh123","KtraGiuaKy");
            return null;
        }
        public static function query($s){
            return self::getConnection()->query($s);
        }
       
    }
    function _header($title){
        $s = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <title>'.$title.'</title>
                <style>
                #mydiv {
                    position: absolute;
                    left: 81%;
                    bottom: 34%;
                    text-align:center;
                    padding:40px;
                    background-color:white;
                    font-family:"Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
                    border-radius: 10px
                }
                .rtg{
                    color: white;
                    width: 200px;
                    height: 90px;
                    padding:4%;

                    }
                    
                    body {
                        margin: 0;
                        font-family: Arial, sans-serif;
                      }
                  
                      .sidebar {
                        height: 100vh;
                        width: 250px;
                        background-color: #212529;
                        color: white;
                        position: fixed;
                        overflow-x: hidden;
                        padding-top: 20px;
                      }
                  
                      .sidebar a {
                        padding: 10px;
                        text-decoration: none;
                        font-size: 18px;
                        color: white;
                        display: block;
                        text-align: center;
                      }
                  
                      .sidebar a:hover {
                        background-color: #555;
                      }
                  
                      .content {
                        margin-left: 250px;
                        padding: 16px;
                      }
                </style>
            </head>
            <body>
        ';
        echo $s;
    }
    function _footer(){
        $s = '
            </body>
            </html>
        ';
        echo $s;
    }
    function _navbar(){
        $s = '
            <nav class="navbar navbar-expand-lg bg-body-tertiary " style="box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
                <div class="container-fluid">
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                <a class="navbar-brand" href="index.php"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEf0lEQVR4nO2XfUwbZRzHTzP/0H/ogGyOZOrIeHPAilVLTABhiFo0bCJCS+ndoRSm3VbWiXM4qYMtbIuEREYpLbSF3h0vMhdm1D90qNPMOB2Dwdh05aXHosn8w7/Q+PYzz0ET7F15OQo05r7JL3dPm+s9n+f5fp/nKYZJkiRJkiRJcyK99Ncky8D8Unz1zroU6dcPgmUuYovJ/6FQAiBZBiQAhd8oKS/VQe5oE6g9TsCnaK6KPE7IHTnDfRfSM5A12AD4FCX4IlTou6wrDaEJkDXYELDj/iUWglwtAGSNhUaeNxNeSpSdSIHfUg9bivHbVPyKAJDnl9p5X6lGmoICoBlq5a6l03SFaAAU0uUCoGeCCUCydKVoAN0y7DM/0EEFmO7KFg2wHP/Pz0EwAV720JtFA6jX2UKEl7mzshCPnFm3EKvRDHiZz9Z0GdUFcxm9agXC03GpdMweJRoAFdqcVrqRoZnEp2juKtQOBFBy3QH4eOdfBMucFA3gg0DhXGjkF9qFfasZPrdC+bcDAWhH7EBMUsLH6+UA+OyE/F10y8F1ABW6R58tZhs00ropitsYhdqBMqAZRjmgUZgNKwZYzSIDAGhH24Dw0n8KLqWhDqBBGbjpRCtRv2CIUThCFQD3dIB6yMpdiemuAkGAGqi5u/CKJa/gsuUT9dXW31UX6iHOUQ7bWgh4oFkX1FJ9eZoLJarYtjJ49otT3H3h983c+1Rzba6Qda63cf7HJ92/Fnh77sUW03PfWe9T9pnMD9bv+SXMlA5bap+HGCsBO9yvQmLPAYjv3gfR7nLY1qkXVfL+KnhhxAKZF09w7d1DsxukbqITttN7QTvewbfQNTuQE24btlyl9hkfedhWej6qPm9G9uaTEPZGBoQdSgfZ65mw9WQ+JLSXwc4eIyR/cBBiuwyigOK6DZA2UAvJ5w5CfLeBnwEv+j/QCsQUk4atRCnUa/nxNvzbzcdz/5a9lQWy6kyQHckEDqwKgaVBZHUORDeqIcGph6Tu/bCj9wA3qkuFUXx4mJ+BcTdohm1eDOAuLBhSWPX3yF0Vpu3Nmh8jap4CDmZ++cAOZ8yCmdLgfrMKYlpwSOmtBOXH1ZDYZxS0YfrndTwA7Q9O0N5wHMdWQ8kdFZsSXeVNDzW+dGfjUT8QAagkRxm3HBaP2kHeXgGJ7XrYNXACUj86AonvG+Hpb97lA4w5oOSmKwFbbT3Wa3w0wfFKf9Sp3b8FAgl/OxtSzx6CJ/qrINycA9kX6gCfcHNLZHRDITxOGzm/q6/ZoHi0DbRj7eh+EFtryel9L6K8bKpTzeYlQMVZcdB6XJB3uREijz0DRTfss8eFSYoD091yoVMo/+iwVsoYqNmQ0rW/KralxBNhzvlnIZgYSwnPPgTL/KG/TUVioaDUnsrwZGpvQ/R76p83Hs3mAez69JjAMYI+h4WilD0mRZJLf3br6T0zqPMR5hwo8bh4AKUslY+FuuSUoUDZZzpPsvRP/7UPvbSjQ6ioBgY2ECylIliGJll6hmSZ2vXukyRJkiT9j/Uv0pN5awO+o7cAAAAASUVORK5CYII=">𝕄𝕪𝔽𝕚𝕟𝕒𝕔𝕖</a>
                  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0" style = "margin: 0 auto;">
                        <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php" style = "margin-right: 10px;">Trang chủ</a>
                        </li>
                        <li class="nav-item dropdown" style = "margin-right: 10px;">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Thu nhập
                        </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="index.php?page=mainIncome">Thu nhập chính</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item" href="index.php?page=secondaryIncome">Thu nhập phụ</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown" style = "margin-right: 10px;">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Chi tiêu
                        </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="index.php?page=fixedExpense">Chi tiêu cố định</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item" href="index.php?page=incurredExpense">Chi tiêu phát sinh</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown" style = "margin-right: 10px;">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Thống kê
                        </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="thongkengay.php">Thống kê ngày</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item" href="thongkethang.php">Thống kê tháng</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item" href="thongkenam.php">Thống kê năm</a></li>
                            </ul>
                        </li>
                    </ul>
                        <div popover id="mydiv">
                            <h2 class=" border border-3  rounded-5" style="background-color: #212529;height: 50px; color: white; width: 50px;padding: 2px;margin: auto;"><i class=" fa-solid fa-user"></i></h2>
                            <hr>
                            <p>'.$_SESSION['name'].'</p>
                            <hr>
                            <p>0'.$_SESSION['sdt'].'</p>
                            <hr>
                            <p>'.$_SESSION['email'].'</p>
                        </div>
                        <button popovertarget="mydiv" class=" border border-3  rounded-5" style = "width: 46px;background-color: #212529 ;margin-right:15px;color: white;padding-bottom: 0px;padding-top: 3px"><h4><i class=" fa-solid fa-user"></i></h4></button>
                        <form action="logout.php" method = "post">
                            <input type="submit" value="LOG OUT" name = "btnDX" style = "font-weight: bold; color: white;" class="btn btn-info">
                        </form>
                    </div>
                </div>
              </nav>
        ';
        if(isset($_REQUEST['page'])){
           // $_SESSION['page'] = $_REQUEST['page'];
            switch ($_REQUEST['page']){
                case 'mainIncome':
                    header ("location: mainIncome.php");
                    break;
                case 'secondaryIncome':
                    header ("location: secondaryIncome.php");    
                    break;
                case 'fixedExpense':
                    header ("location: fixedExpense.php");   
                    break;
                case 'incurredExpense':
                    header ("location: incurredExpense.php");  
                    break;
                case 'thongke':
                    header ("location: thongke.php");  
                    break;
            }
        
        }
        echo $s;
    }
    function _paginagetions(){
        $s='
        <nav class="navbar navbar-expand-lg navbar-light bg-light" aria-label="Page navigation example" style="margin: 10px 12px; width:98%;">
            <ul class="pagination" style="margin: 0 12px;">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
            </ul>
        </nav>
        ';
        echo $s;
    }
    function _typepaginagetions(){
        $s='
        <nav class="navbar navbar-expand-lg navbar-light bg-light" aria-label="Page navigation example" style="margin: 10px 0px; width:100%;">
            <ul class="pagination" style="margin: 0 12px;">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
            </ul>
        </nav>
        ';
        echo $s;
    }
    function _body($name, $sqery, $query ,$p,$update, $type, $tb, $t){
        $sum= database::query("SELECT sum(sotien) as tong FROM ktragiuaky.".$tb." where type = ".$t." and User_Id = " .$_SESSION['id']."");
        $r = $sum->fetch_array();
        $s = '
        <div class="container">
        <div style="display: flex">
        <h2 style="max-width: none; margin-left:20px; margin-top: 10px; font-weight:bold">'.$name.'</h2>
        <h4 style="max-width: none; margin-left:39%; margin-top: 18px; font-weight:bold">Tổng số tiền: '.number_format($r['tong'], 0, ',', '.').'</h4>
        </div>
        <nav style="margin-top:20px;" class="navbar navbar-expand-lg navbar-light bg-light">
            <div style = "width:50%; margin-left: 10px;" class="form-outline" data-mdb-input-init>
                <form action="" method="get">
                    <input type="search" name="btnS" id="form1" class="form-control" placeholder="Search..." aria-label="Search"/>
                </form>
            </div>
                <div  style = "margin-left: 26%;" >
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Thêm</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm thông tin</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                      <form action="" method="post">
                      <div class="container" style="width:100%">
                                  <div class="form-group">
                                      <span >Số tiền</span>
                                      <input class="form-control" type="number" name="txtST" placeholder="Nhập số tiền...">
                                      <span>Ghi chú</span>
                                      <input class="form-control" type="text" name="txtGC" placeholder="Mô tả...">
                                      <span>Loại tiền sử dụng</span>
                                      <select name="mySelect" class="form-select" aria-label="Default select example">';
                                      $q = Database::query("".$type."");
                                              while($r= $q->fetch_array()){
                                                  $s.='<option value="'.$r['Id_loai'].'">'.$r['tenloai'].'</option>';
                                          }
                                          if(isset($_POST['btnAdd'])){
                                            if(empty($_POST['txtST'])||empty($_POST['txtGC'])){
                                                echo "<div class='alert alert-danger'><strong>Vui lòng điền đủ thông tin!!</strong></div>";
                                            }
                                        }
                                        $s.='</select>
                                  </div>
                                  </div>
                                  <div class="modal-footer" style="margin:10px 0 ;">
                                      <input name= "btnHuy" type="submit" value="Hủy" class="btn btn-secondary ">
                                      <input name= "btnAdd" type="submit" value="Thêm" class="btn btn-danger ">
                                 </div>
                  </form>
                      </div>
                    </div>
                  </div>
                
            </div>
                <li class="nav-item dropdown btn btn-primary" style="margin: 0 2px;">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" >Lọc</a>
                    <ul class="dropdown-menu">
                <li><a data-bs-toggle="modal" data-bs-target="#Backdrop" class="dropdown-item" href="#">Loại</a></li>
                <div class="dropdown-divider"></div>
                <li><a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="dropdown-item" href="#">Ngày</a></li>
                </ul>
                </li>
                <!-- Modal ngày -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Chọn ngày</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="" method="post">
                          <div style="margin: 0 10px;">
                              <span>Từ ngày:</span>
                              <input type="date" name="dateST">
                              <span style="margin-left:10px;">Đến ngày:</span>
                              <input type="date" name="dateEND">
                          </div>
                          </div>
                          <div class="modal-footer">
                          <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                          <button type="submit" name="btnln" class="btn btn-primary">Xem</button>
                          </form>';
                          
                      $s.='</div>
                    </div>
                  </div>
                </div>
                <!-- Modal loại -->
                <div class="modal fade" id="Backdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Chọn loại</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="" method="post">
                          <div style="margin: 0 10px;">
                            <select name="mySelect" class="form-select" aria-label="Default select example">';
                          $q = Database::query("".$type."");
                                  while($r= $q->fetch_array()){
                                      $s.='<option value="'.$r['Id_loai'].'">'.$r['tenloai'].'</option>';
                              }
                            
                            $s.='</select></div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button type="submit" name="btnll" class="btn btn-primary">Xem</button>
                            </form>
                      </div>
                    </div>
                  </div>
                </div>
                <li class="nav-item dropdown btn btn-warning">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white">Sắp xếp</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="?sx=date">Ngày</a></li>
                      <div class="dropdown-divider"></div>
                      <li><a class="dropdown-item" href="?sx=st">Số tiền</a></li>
                    </ul>
                </li>
            </div>
            ';
        $s.='</nav> '; 
        if(!empty($_GET['btnS'])){
          $q = Database::query("".$query."");
            $s.='<nav><p>Tìm kiếm từ khóa:'." ".''.$_GET['btnS'].' </p></nav>';
        }else{
            if(isset($_POST['btnln'])&&!empty($_POST['dateST'])&&!empty($_POST['dateEND'])){
                $q = Database::query("SELECT * FROM ktragiuaky.".$tb." WHERE type = ".$t." AND User_Id = ".$_SESSION['id']." AND DATE(ngaySD) BETWEEN '".$_POST['dateST']."' AND '".$_POST['dateEND']."'
                ");
            }else{
                if(isset($_POST['btnll'])){
                    $q = Database::query("SELECT * FROM ktragiuaky.".$tb." WHERE type = ".$t." AND User_Id = ".$_SESSION['id']." AND Id_loai = ".$_POST["mySelect"]." ");
                }
                else if(!empty($_GET['sx'])){
                    if($_GET['sx'] == 'date'){
                       $q = Database::query("SELECT * FROM ktragiuaky.".$tb." where type =".$t." and User_Id= ".$_SESSION['id']." order BY ngaySD  DESC");
                    }
                    else $q = Database::query("SELECT * FROM ktragiuaky.".$tb." where type =".$t." and User_Id=".$_SESSION['id']." order BY sotien  DESC");
                }
                else
                    $q = Database::query("".$sqery."");
            }
            //$q = Database::query("SELECT * FROM ktragiuaky.khoan_chitieu where type = 0 and User_Id = " .$_SESSION['id']."");
        }
        $s.='
        <nav style="margin-top:20px;" class="navbar navbar-expand-lg navbar-light bg-light">  
            <div class="table-container" style="width:80%; margin:auto">
                <table class="table table-striped table-light" style="width: 100%; ">
                <thead>
                  <tr>
                  <th scope="col">STT</th>
                  <th scope="col">Số tiền</th>
                  <th scope="col">Ghi chú</th>
                  <th scope="col">Ngày sử dụng</th>
                  <th scope="col">Thao tác</th>
                  </tr>
                  </thead>
                  </table>
                    <div style="max-height: 290px; overflow-y: auto;">
                    <table class="table table-striped">
                  <tbody >
                  ';
        $count = 1;
        
                  while($r= $q->fetch_array()){
        
                      $s.='
                  <tr>
                  <th scope="row">'.$count.'</th>
                  <td>'.number_format($r['sotien'], 0, ',', '.').' vnđ</td>
                  <td>'.$r['ghichu'].'</td>
                  <td>'.$r['ngaySD'].'</td>
                  <td >
                      <a onclick="return confirm(\'Bạn có chắc chắn muốn xóa sản phẩm này không?\');" href="'.$p.'.php?delete='.$r['Id_khoan'].'" style="margin: 5px;"><i class="fa-solid fa-trash"></i></a>     
                      <a style="margin: 10px;" href="'.$update.'.php?'.$p.'='.$r['Id_khoan'].'""><i class="fa-solid fa-pen-to-square"></i></a>
                      ';
                      $count++;
                      $_SESSION['p'] = $p;
                  }
                  
                  $s.='
                  
              </td>
                  </tbody>
                  </table>
                  </div>
                  </div>
        </div>
            </nav>
                    ';
        echo $s;
    } 
    function _bodyTKngay(){
        if(!empty($_POST['btndate'])){
            $y = $_POST['btndate'];
        }else $y="";
        
        
        $s = '
        <div style="display:block; width: 90%; margin: auto; " >
        <h2 style="max-width: none; margin-left:20px; margin-top: 5px; font-weight:bold; text-align: center">Thống kê ngày</h2>
        <h2 style="max-width: none; margin-left:20px; font-weight:bold; text-align: center">'.$y.'</h2>
        <div class="border border-2 rounded-1 container"  style="padding: 0 0; margin-top: 10px">
        <nav class=" navbar navbar-expand-lg navbar-light bg-light ">
            <div style = "width: 100%; margin: 0 10px; margin-left: 32%; padding-top: 0"  class="form-outline" data-mdb-input-init>
                <form style = "display: flex; " action="" method="post">
                    <span style = "width: 23%;font-weight:bold " >chọn ngày muốn xem:</span>
                    <input style = "width: 155px; margin-left:5px " type="date" name="btndate" id="form1" class="form-control">
                    <div>
                        <button name="btnXem" type="submit" class="btn btn-success " style="color: white; margin-left: 20px">Xem</button>
                    </div>
                </form>
            </div>
        </nav>';
        if(!empty($_POST['btndate'])){
            $ngay= database::query("SELECT DATE(ngaySD) as ngay, sum(sotien) AS TongTien 
            FROM khoan_thunhap where Date(ngaySD) = '".$_POST['btndate']."'and User_Id=".$_SESSION['id']."
            GROUP BY DATE(ngaySD);");
            $ngay1= database::query("SELECT DATE(ngaySD) as ngay, sum(sotien) AS TongTien 
                FROM khoan_chitieu where Date(ngaySD) = '".$_POST['btndate']."'and User_Id=".$_SESSION['id']."
                GROUP BY DATE(ngaySD);");
                    $r = $ngay->fetch_array();
                    $rows = $ngay1->fetch_array();  
                    if(!is_null(mysqli_num_rows($ngay))||!is_null(mysqli_num_rows($ngay1))){
                        if(mysqli_num_rows($ngay)>0){
                            $ss=$r['TongTien'];
                        }else $ss="0";
                        if(mysqli_num_rows($ngay1)>0){
                            $s1=$rows['TongTien'];
                        }else $s1="0";
        
                            $s.='
                            <div style="display: block">
                                <div class="col" style="display:flex; margin: auto; width:fit-content;padding: 20px">
                                <span class="border border-2 bg-warning  rounded-3 rtg" style="color: white; padding: 20px; text-align:center; font-weight:bold">Tổng số thu nhập <p>'.number_format($ss, 0, ',', '.').'</p></span>
                                <span class="border border-2 bg-danger rounded-3  rtg" style="color: white; margin: 0px 40px; padding: 20px; text-align:center; font-weight:bold">Tổng chi tiêu <p>'.number_format($s1, 0, ',', '.').'</p></span>
                                </div>';
                                
                                   $s.='<div style="display: block; margin-top: 6px">
                                   <div class="border border-1" style="margin: auto auto ;width:100%; height:300px">
                                   <canvas id="myChart" style="margin:auto; width: 70%" ></canvas>
                                   
                                   <script>
                                   document.addEventListener("DOMContentLoaded", function () {
                                    const labels = ["Thu nhập", "Chi tiêu"];
                                    const data = {
                                        labels: labels,
                                        datasets: [
                                            {
                                                label: "Tổng thu nhập",
                                                data: ['.$ss.', '.$s1.'],
                                                backgroundColor: ["rgba(255,193,7)", "rgba(220,53,69)"],
                                                borderColor: ["rgba(255,193,7)", "rgba(220,53,69)"],
                                                borderWidth: 1,
                                            },
                                            
                                        ],
                                    };
                                    const config = {
                                        type: "bar",
                                        data: data,
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        },
                                    };
                        
                                    const ctx = document.getElementById("myChart").getContext("2d");
                                    const myChart = new Chart(ctx, config);
                                });
                                   </script>
                                   </div>     
                                   </div>     
                                   </div>     
                           
                            ';
                    
                    $row_count = mysqli_num_rows($ngay);
                    $_SESSION['row_count'] = $row_count;
                    $row_count1 = mysqli_num_rows($ngay1);
                    $_SESSION['row_count1'] = $row_count1;
             
                $s.="
                ";
                }
            
        }
            echo $s;
    } 
    function _bodyTKthang(){
        if(!empty($_POST['mselect'])){
            $y = $_POST['mselect'];
        }else $y="";
        $s = '
            <div style="display:block; width: 90%; margin: auto; " >
            <h2 style="max-width: none; margin-left:20px; margin-top: 3px; font-weight:bold; text-align: center">Thống kê tháng</h2>
            <h2 style="max-width: none; margin-left:20px; font-weight:bold; text-align: center">'.$y.'</h2>
            <div class="border border-2 rounded-1 container"  style="padding: 0 0; margin-top: 10px">
            <nav class=" navbar navbar-expand-lg navbar-light bg-light ">
                <div style = "width: 100%; margin: 0 10px; margin-left: 32%; padding-top: 0"  class="form-outline" data-mdb-input-init>
                    <form style = "display: flex; " action="" method="post">
                        <span style = " width: 24%;font-weight:bold " >chọn tháng muốn xem:</span>
                        <select style="width: 124px;margin-left:5px" name="mselect" class="form-select" aria-label="Default select example">';
                          $count = 1;
                          while($count<=12){
                              $s.= '<option value="'.$count.'">Tháng '.$count.'</option>';
                              $count++;
                          }
                          $s.='</select>
                        <div>
                            <button name="btnXem" class="btn btn-success" style="color: white; margin-left: 15px">Xem</button>
                        </div>
                    </form>
                </div>
            </nav>';
            if(!empty($_POST['mselect'])){
                $ngay= database::query("SELECT MONTH(ngaySD) as ngay, sum(sotien) AS TongTien 
                FROM khoan_thunhap where MONTH(ngaySD) = '".$_POST['mselect']."'and User_Id=".$_SESSION['id']."
                GROUP BY MONTH(ngaySD);");
                $ngay1= database::query("SELECT MONTH(ngaySD) as ngay, sum(sotien) AS TongTien 
                FROM khoan_thunhap where MONTH(ngaySD) = '".$_POST['mselect']."'and User_Id=".$_SESSION['id']."
                GROUP BY MONTH(ngaySD);");
                        $r = $ngay->fetch_array();
                        $rows = $ngay1->fetch_array();  
                        if(!is_null(mysqli_num_rows($ngay))||!is_null(mysqli_num_rows($ngay1))){
                            if(mysqli_num_rows($ngay)>0){
                                $ss=$r['TongTien'];
                            }else $ss="0";
                            if(mysqli_num_rows($ngay1)>0){
                                $s1=$rows['TongTien'];
                            }else $s1="0";
            
                                $s.='
                                <div style="display: block">
                                    <div class="col" style="display:flex; margin: auto; width:fit-content;padding: 20px">
                                    <span class="border border-2 bg-warning  rounded-3 rtg" style="color: white; padding: 20px; text-align:center; font-weight:bold">Tổng số thu nhập <p>'.number_format($ss, 0, ',', '.').'</p></span>
                                    <span class="border border-2 bg-danger rounded-3  rtg" style="color: white; margin: 0px 40px; padding: 20px; text-align:center; font-weight:bold">Tổng chi tiêu <p>'.number_format($s1, 0, ',', '.').'</p></span>
                                    </div>';
                                    
                                       $s.='<div style="display: block; margin-top: 6px">
                                       <div class="border border-1" style="margin: auto auto ;width:100%; height:300px">
                                       <canvas id="myChart" style="margin:auto; width: 70%" ></canvas>
                                       
                                       <script>
                                       document.addEventListener("DOMContentLoaded", function () {
                                        const labels = ["Thu nhập", "Chi tiêu"];
                                        const data = {
                                            labels: labels,
                                            datasets: [
                                                {
                                                    label: "Tổng thu nhập",
                                                    data: ['.$ss.', '.$s1.'],
                                                    backgroundColor: ["rgba(255,193,7)", "rgba(220,53,69)"],
                                                    borderColor: ["rgba(255,193,7)", "rgba(220,53,69)"],
                                                    borderWidth: 1,
                                                },
                                                
                                            ],
                                        };
                                        const config = {
                                            type: "bar",
                                            data: data,
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            },
                                        };
                            
                                        const ctx = document.getElementById("myChart").getContext("2d");
                                        const myChart = new Chart(ctx, config);
                                    });
                                       </script>
                                       </div>     
                                       </div>     
                                       </div>     
                               
                                ';
                        
                        $row_count = mysqli_num_rows($ngay);
                        $_SESSION['row_count'] = $row_count;
                        $row_count1 = mysqli_num_rows($ngay1);
                        $_SESSION['row_count1'] = $row_count1;
                 
                    $s.="
                    ";
                    }
                
            }
                echo $s;
            
    }
    function _bodyTKnam(){
       
            if(!empty($_POST['yselect'])){
                $y = $_POST['yselect'];
            }else $y="";
        $s = '
        <div style="display:block; width: 90%; margin: auto; " >
        <h2 style="max-width: none; margin-left:20px; margin-top: 3px; font-weight:bold; text-align: center">Thống kê theo năm</h2>
        <h2 style="max-width: none; margin-left:20px; font-weight:bold; text-align: center">'.$y.'</h2>
        <div class="border border-2 rounded-1 container"  style="padding: 0 0; margin-top: 5px">
        <nav class=" navbar navbar-expand-lg navbar-light bg-light ">
            <div style = "width: 100%; margin: 0 10px; margin-left: 32%; padding-top: 0"  class="form-outline" data-mdb-input-init>
                <form style = "display: flex; " action="" method="post">
                    <span style = "width: 22%;font-weight:bold " >chọn năm muốn xem:</span>
                    <select style="width: 124px;margin-left:10px" name="yselect" class="form-select" aria-label="Default select example">
                      <option value="2021">2021</option>
                      <option value="2022">2022</option>
                      <option value="2023">2023</option>
                      <option value="2024">2024</option>
                    </select>
                    <div>
                        <button name="btnXem" type="submit" class="btn btn-success" style="color: white; margin-left: 20px">Xem</button>
                    </div>
                </form>
            </div>
        </nav>';
        if(!empty($_POST['yselect'])){
            $ngay= database::query("SELECT YEAR(ngaySD) as ngay, sum(sotien) AS TongTien 
            FROM khoan_thunhap where YEAR(ngaySD) = '".$_POST['yselect']."'and User_Id=".$_SESSION['id']."
            GROUP BY YEAR(ngaySD);");
            $ngay1= database::query("SELECT YEAR(ngaySD) as ngay, sum(sotien) AS TongTien 
            FROM khoan_chitieu where YEAR(ngaySD) = '".$_POST['yselect']."'and User_Id=".$_SESSION['id']."
            GROUP BY YEAR(ngaySD);");
                    $r = $ngay->fetch_array();
                    $rows = $ngay1->fetch_array();  
                    if(!is_null(mysqli_num_rows($ngay))||!is_null(mysqli_num_rows($ngay1))){
                        if(mysqli_num_rows($ngay)>0){
                            $ss=$r['TongTien'];
                        }else $ss="0";
                        if(mysqli_num_rows($ngay1)>0){
                            $s1=$rows['TongTien'];
                        }else $s1="0";
        
                            $s.='
                            <div style="display: block">
                                <div class="col" style="display:flex; margin: auto; width:fit-content;padding: 20px">
                                <span class="border border-2 bg-warning  rounded-3 rtg" style="color: white; padding: 20px; text-align:center; font-weight:bold">Tổng số thu nhập <p>'.number_format($ss, 0, ',', '.').'</p></span>
                                <span class="border border-2 bg-danger rounded-3  rtg" style="color: white; margin: 0px 40px; padding: 20px; text-align:center; font-weight:bold">Tổng chi tiêu <p>'.number_format($s1, 0, ',', '.').'</p></span>
                                </div>';
                                
                                   $s.='<div style="display: block; margin-top: 6px">
                                   <div class="border border-1" style="margin: auto auto ;width:100%; height:300px">
                                   <canvas id="myChart" style="margin:auto; width: 70%" ></canvas>
                                   
                                   <script>
                                   document.addEventListener("DOMContentLoaded", function () {
                                    const labels = ["Thu nhập", "Chi tiêu"];
                                    const data = {
                                        labels: labels,
                                        datasets: [
                                            {
                                                label: "Tổng thu nhập",
                                                data: ['.$ss.', '.$s1.'],
                                                backgroundColor: ["rgba(255,193,7)", "rgba(220,53,69)"],
                                                borderColor: ["rgba(255,193,7)", "rgba(220,53,69)"],
                                                borderWidth: 1,
                                            },
                                            
                                        ],
                                    };
                                    const config = {
                                        type: "bar",
                                        data: data,
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        },
                                    };
                        
                                    const ctx = document.getElementById("myChart").getContext("2d");
                                    const myChart = new Chart(ctx, config);
                                });
                                   </script>
                                   </div>     
                                   </div>     
                                   </div>     
                           
                            ';
                    
                    $row_count = mysqli_num_rows($ngay);
                    $_SESSION['row_count'] = $row_count;
                    $row_count1 = mysqli_num_rows($ngay1);
                    $_SESSION['row_count1'] = $row_count1;
             
                $s.="
                ";
                }
            
        }
            echo $s;
    }
    function _bodytype($name, $sqery, $query, $p, $update,$t){
        $s = '
        <div class="container">
        <h2 style="max-width: none; margin-left:20px; margin-top: 5px; font-weight:bold">Danh sách loại '.$name.'</h2>
        <nav style="margin-top:20px;" class="navbar navbar-expand-lg navbar-light bg-light">
            <div style = "width:50%; margin-left: 10px;" class="form-outline" data-mdb-input-init>
                <form action="" method="get">
                    <input type="search" name="btnS" id="form1" class="form-control" placeholder="Search..." aria-label="Search"/>
                </form>
            </div>
            <div style = "margin-left: 32%;" >
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Thêm</button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm thông tin</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <form action="" method="post">
              <div class="container" style="width:100%">
                          <div class="form-group">
                              <span >Tên loại</span>
                              <input class="form-control" type="text" name="txtTL" placeholder="Nhập tên loại...">';
                              if(isset($_POST['btnAdd'])){
                                if(empty($_POST['txtTL'])){
                                    echo "<div class='alert alert-danger'><strong>Vui lòng điền đủ thông tin!!</strong></div>";
                                }
                            }
                          $s.='</div>
                          </div>
                          <div class="modal-footer" style="margin:10px 0 ;">
                              <input name= "btnHuy" type="submit" value="Hủy" class="btn btn-secondary ">
                              <input name= "btnAdd" type="submit" value="Thêm" class="btn btn-danger ">
                         </div>
                </form>       
                      </div>    
                    </div>  
                  </div>    
                </div>  
            </div>  
            <div style = "margin-left: 10px;" >
                <li class="nav-item dropdown btn btn-warning">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:white">Sắp xếp</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="?sx=tenloai">Tên loại</a></li>
                    </ul>
                </li>
            </div>
        </nav>';
        if(!empty($_GET['btnS'])){
            $q = Database::query("".$query."");
            $s.='<nav><p>Tìm kiếm từ khóa:'." ".''.$_GET['btnS'].' </p></nav>';
        }else{
            if(!empty($_GET['sx'])){
                $q = Database::query("SELECT * FROM loai_".$update." where type = ".$t." and User_Id=".$_SESSION['id']." order BY tenloai");
            }
            else
                $q = Database::query("".$sqery."");
        }
        
        $s.='
        <nav style="margin-top: 20px;" class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="table-container" style="width:80%; margin:auto">
          <table class="table table-striped table-light" style="width: 100%;">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên loại</th>
                <th scope="col">Thao tác</th>
              </tr>
            </thead>
          </table>
          <div style="max-height: 300px; overflow-y: auto;">
          <table class="table table-striped">
            <tbody >';
                $count = 1;
                while($r= $q->fetch_array()){
                  $s.= '
                    <tr>
                      <th scope="row">'.$count.'</th>
                      <td>'.$r['tenloai'].'</td>
                      <td>
                        <a onclick="return confirm(\'Bạn có chắc chắn muốn xóa sản phẩm này không?\');" href='.$p.'.php?delete='.$r['Id_loai'].' style="margin: 5px;"><i class="fa-solid fa-trash"></i></a>
                        <a href="tUpdate_'.$update.'.php?'.$p.'='.$r['Id_loai'].'" style="margin: 10px;"><i class="fa-solid fa-pen-to-square"></i></a>
                      </td>
                    </tr>';
                  $count++;
                }
                $_SESSION['tp'] = $p;
            $s.='</tbody>
          </table>
        </div>
        </div>
      </nav>
      
           ';
        echo $s;
    }
    function _slidebar($name,$khoan,$loai, $page){
        $s = '
            <div class="container-fluid" style="width: 20%; padding: 0px;margin:0px; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
            <div class=" flex-nowrap">
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark" style="width: 104%;">
                <div class="sidebar" style="margin-left:-8px" >
                    <a href="" ><h4 style="font-weight:bold">'.$name.'</h4></a>
                    <a href="'.$page.'.php" style="font-size:15px; font-weight:bold">Khoản '.$khoan.'</a>
                    <a href="type'.$page.'.php" style="font-size:15px; font-weight:bold">Loại '.$loai.'</a>
                </div>
              
                    </div>
                </div>
            </div>
        ';
       
        echo $s;
        
    }
    function _slidebarTK(){
        $s = '
            <div class="" style="width: 20%; padding: 0px;margin:0px; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
            <div class=" flex-nowrap">
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark" style="width: 109%;">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100 ">
                <div class="sidebar">
                <a href=""><h4 style="font-weight:bold">THỐNG KÊ</h4></a>
                <a href="thongkengay.php" style="font-size:15px; font-weight:bold">Thống kê ngày</a>
                <a href="thongkethang.php" style="font-size:15px; font-weight:bold">Thống kê tháng</a>
                <a href="thongkenam.php" style="font-size:15px; font-weight:bold">Thống kê năm</a>
              </div>
              
                </div>
                    </div>
                </div>
            </div>
        ';
       
        echo $s;
        
    }
    function _register(){
        if(!empty($_POST['txtus'])&&!empty($_POST['txtpw'])&&!empty($_POST['txtpw2'])&&!empty($_POST['txtphone'])&&!empty($_POST['txtEmail'])){
            if(preg_match('/^0[0-9]{9}+$/',$_POST['txtphone'])&&$_POST['txtpw2']==$_POST['txtpw']){
                $us= $_POST['txtus'];
                $mail = $_POST['txtEmail'];
                $phone= $_POST['txtphone']; 
                $pw = $_POST['txtpw'];
                
                // $q = Database::query("INSERT INTO ktragiuaky.user(User_Name,Password,sdt,email)
                //                         VALUES ('".$_SESSION['txtus']."','".$_SESSION['txtpw']."','".$_SESSION['txtPhone']."','".$_SESSION['txtEmail']."')");  
                $q = Database::query("insert into ktragiuaky.user(User_Name,Password,sdt,email)
                values ('".$us."','".$pw."','".$phone."','".$mail."')");  
                echo "<script>alert('Đăng ký thành công.');"; 
                echo "window.location.href='http://localhost/exam/view/tab/login.php';</script>";
            }else echo "<script>alert('Đăng ký không thành công!');</script>";
            
       }
    }
    function _User_Id(){
        $q = Database::query("SELECT User_Id FROM ktragiuaky.user where User_Name= ".$_SESSION['user']."");
    }
    function add($p, $t){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $day = date('Y-m-d');
        $time = date('H:i:s');
        $date=$day."T".$time;
            $st = $_POST["txtST"];
            $GC = $_POST["txtGC"];
            $sl = $_POST["mySelect"];
            $q = Database::query("INSERT INTO ".$p." (sotien, ghichu, ngaySD, Id_loai, User_Id, type)
                                    VALUES (".$st.", '".$GC."', '".$date."',".$sl.", ".$_SESSION['id'].", ".$t.")");  
    }
    function tadd($p, $t){
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('Y-m-d H:i:s');
                $tl = $_POST["txtTL"];
                $q = Database::query("INSERT INTO ".$p." (tenloai, User_Id, type)
                                        VALUES ('".$tl."', ".$_SESSION['id'].", ".$t.")");  
    }
   
?>

    

