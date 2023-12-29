<?php
    include ('../inc/database.php');
    if(!isset($_SESSION["user"])){
        header ("Location: login.php");
      }
    _header('Thống kê năm');
    _navbar();
    echo '<div style="display:flex">';
      _slidebarTK();
    echo '<div style = "display: block; width: 98%; margin: 20px 15px;">';
        _bodyTKnam();
      if(empty($_POST['yseselect'])&&!isset($_POST['btnXem'])){
        echo "<div style='text-align:center ;border-radius: 0px ;margin: 0px 0px ;padding-top:4px; height:35px'><strong>Chưa nhập dữ liệu!!</strong></div>";
      }
      
      echo'</div>';

    _footer();
?>