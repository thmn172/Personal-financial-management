    <?php
  
        //include_once "../tab/fixedExpense.php";
        include_once "../inc/database.php";

            $idk = $_SESSION['p'];;
            echo $_GET["$idk"];
          $q = Database::query("SELECT * FROM ktragiuaky.khoan_chitieu where Id_khoan= ".$_GET["$idk"]."");
            $r= $q->fetch_array();
        
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-light bg-light justify-content-between nav" style="display: block; ">
        <h2 style="text-align: center;">Cập nhật thông tin</h2>
        <form action="edit_chitieu.php" method="post">
            <input type="hidden" name="aa" value="<?php echo $_GET["$idk"] ?>">
            <div class="container" style="width:30%">
                        <div class="form-group">
                            <span >Số tiền</span>
                            <input class="form-control" type="number" name="txtST" value="<?php echo $r['sotien']?>">
                            <span>Ghi chú</span>
                            <input class="form-control" type="text" name="txtGC" value="<?php echo $r['ghichu']?>">
                            <!-- <span>Thời gian sử dụng</span>
                            <input class="form-control" type="datetime" name="txtDate" value="<?php echo $r['ngaySD']?>"> -->
                            <span>Loại tiền sử dụng</span>
                            <select name="mySelect" class="form-select" aria-label="Default select example">
                                <?php
                                    if($idk == "fixedExpense"){
                                        $q = Database::query("SELECT tenloai,Id_loai FROM ktragiuaky.loai_chitieu where type = 0 and User_id = ".$_SESSION['id']."");
                                    }else{
                                        $q = Database::query("SELECT tenloai,Id_loai FROM ktragiuaky.loai_chitieu where type = 1 and User_id = ".$_SESSION['id']."");
                                    }
                                    while($r= $q->fetch_array()){
                                        echo '<option value="'.$r['Id_loai'].'">'.$r['tenloai'].'</option>';
                                }
                                ?>
                              </select>
                        </div>
                       <div style="margin:10px 0 ;">
                       <button class="btn btn-success" name="btnedit">Cập nhật</button>  
                      <button class="btn btn-secondary" name="btnhuy">Hủy</button>  
                        </div>
                    </div>
            </div>
           
        </form>
    </nav>
</body>
</html>

