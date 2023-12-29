<?php
    
    include ('../inc/database.php');
    if(!isset($_SESSION["user"])){
        header ("Location: login.php");
      }
    
?>
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
                <title>Trang chủ</title>
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
                    width: 280px;
                    height: 80px;
                    padding-top:1%;
                    border-radius: 2px;
                    font-weight: bold;
                    }
                    .border{
                     
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

    .sidebar .dropdown {
      padding: 10px;
    }

    .sidebar .dropdown-content {
      display: none;
      padding-left: 20px;
    }

    .sidebar .dropdown:hover .dropdown-content {
      display: block;
    }

    .content {
      margin-left: 250px;
      padding: 16px;
    }
                </style>
</head>
<body>
  <?php
    _navbar();
    ?>
    <div style="display:flex">
    <div class="sidebar">
  <a href="index.php" style="font-weight:bold"><i class="fas fa-home"></i>
  TRANG CHỦ</a>
  <!-- Dropdown 1 -->
  <div class="dropdown">
    <a href="#"
       class="list-group-item list-group-item-action py-2 ripple"
       aria-current="true"
       data-mdb-toggle="collapse"
       aria-expanded="true"
       aria-controls="collapseExample1"
    >
    <i class="fa-solid fa-wallet"></i><span style="font-weight:bold"> THU NHẬP</span>
    </a>
    <div class="dropdown-content" style="font-weight:bold">
      <a href="mainIncome.php" style="font-size:15px" class="text-reset">Thu nhập chính</a>
      <a href="secondaryIncome.php" style="font-size:15px" class="text-reset">Thu nhập phụ</a>
    </div>
  </div>
  <!-- End Dropdown 1 -->

  <!-- Dropdown 2 -->
  <div class="dropdown">
    <a href="#"
       class="list-group-item list-group-item-action py-2 ripple"
       aria-current="true"
       data-mdb-toggle="collapse"
       aria-expanded="true"
       aria-controls="collapseExample2"
    >
    <i class="fas fa-money-check"></i><span style="font-weight:bold"> CHI TIÊU</span>
    </a>
    <div class="dropdown-content" style="font-weight:bold">
      <a href="fixedExpense.php" style="font-size:15px" class="text-reset">Chi tiêu cố định</a>
      <a href="incurredExpense.php" style="font-size:15px" class="text-reset">Chi tiêu phát sinh</a>
    </div>
  </div>
  <!-- End Dropdown 2 -->
 <div class="dropdown">
    <a href="#"
       class="list-group-item list-group-item-action py-2 ripple"
       aria-current="true"
       data-mdb-toggle="collapse"
       aria-expanded="true"
       aria-controls="collapseExample2"
    >
    <i class="fa-solid fa-chart-line"></i><span style="font-weight:bold"> THỐNG KÊ</span>
    </a>
    <div class="dropdown-content" style="font-weight:bold">
      <a href="thongkengay.php" style="font-size:15px" class="text-reset">Ngày</a>
      <a href="thongkethang.php" style="font-size:15px" class="text-reset">Tháng</a>
      <a href="thongkenam.php" style="font-size:15px" class="text-reset">Năm</a>
    </div>
  </div>
</div>


 
<div class="container text-center " style="margin: 20px 33%; width:50%" >
        <div class="row" style="display:">
          <div class="col" style="display:flex; margin: 0px 0px;padding: 5px 5px">
          <?php
            $ngay= database::query("SELECT sum(sotien) AS TongTien FROM khoan_thunhap where User_Id=".$_SESSION['id']."");
            $r = $ngay->fetch_array();
            $ngay1= database::query("SELECT sum(sotien) AS TongTien FROM khoan_chitieu where User_Id=".$_SESSION['id']."");
            $row = $ngay1->fetch_array();
          ?>
          <span class="border border-2 bg-warning  rounded-3 rtg" style="color: white">Tổng số thu nhập <p><?php echo number_format($r['TongTien'], 0, ',', '.')?></p></span>
          <span class="border border-2 bg-danger rounded-3  rtg" style="color: white; margin: 0px 40px; ">Tổng chi tiêu <p><?php echo number_format($row['TongTien'], 0, ',', '.')?></p></span>
          <span class="border border-2 bg-success rounded-3  rtg" style="color: white">Số dư <p><?php echo number_format($r['TongTien']-$row['TongTien'], 0, ',', '.') ?></p></span>
</div>
</div>
<div class="col border border-1" style="display:flex; margin: 30px; margin-left: -100px; width:126%">
           <div style="display: block; margin-top: 6px">
             <h3 style="font-weight:bold">Biểu đồ thống kê</h3>
             <div class="border border-1" style="margin: 15px 42px 30px 20px;width:300px; height:300px">
           <canvas id="myChart" ></canvas>
           
           <script>
               document.addEventListener("DOMContentLoaded", function () {
                 const data = {
                   labels: [
                     'Chi tiêu',
                     'Số dư',
                     'Thu nhập'
                   ],
                   datasets: [{
                     label: 'My First Dataset',
                     data: [<?php echo $row['TongTien']?>,<?php echo $r['TongTien']-$row['TongTien']?>, <?php echo $r['TongTien']?> ],
                     backgroundColor: [
                       'rgb(194, 56, 58)',
                       'rgb(52, 125, 61)',
                       'rgb(255, 205, 86)'
                     ],
                     hoverOffset: 4
                   }]
                 };
                   const config = {
                     type: 'pie',
                     data: data,
                   };
           
                   // Create a new chart instance
                   const myChart = new Chart(document.getElementById('myChart'), config);
               });
           </script>
           </div>     
                 
<!-- Add a canvas element with an id for the chart to be drawn on -->

            </div>
            <div style="display: block; width:100%; margin-top: 5px">
             <h3 style="font-weight:bold">Thu-chi mới nhất</h3>
             <div class="border border-1" style="margin: 15px; height: 299px;">
                <table class="table table-success">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Số tiền</th>
                            <th scope="col">Ngày sử dụng</th>
                            <th scope="col">Ghi chú</th>
                        </tr>
                    </thead>
                </table>
                <div class="tbody-container" style="max-height: calc(100% - 30px); overflow: auto;">
                    <table class="table table-striped">
                        <tbody>
                            <?php
                            $q = Database::query("SELECT *FROM khoan_thunhap where User_Id = ".$_SESSION['id']." UNION SELECT * FROM khoan_chitieu where User_Id = ".$_SESSION['id']." order by ngaySD DESC");
                            $i = 1;
                            while ($r = $q->fetch_array()) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $i ?></th>
                                    <td><?php echo $r['sotien']?></td>
                                    <td><?php echo $r['ngaySD']?></td>
                                    <td><?php echo $r['ghichu']?></td>
                                </tr>
                            <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

          </div>

      </div>
</body>
</html>