<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        ob_start();
        //session_start();
        include_once ('../inc/database.php');
        _register();
        
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->
    <title>Resgister</title>
    
    <style>
        .form-group{
            margin: 5px 0;
        }
        .form-control{
            margin: 10px 0;
        }
        .btn {
            width: 100%;
            margin-top: 5px;
            height: 50px;
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-success text-white text-center">
                            <h2>Register</h2>
                        </div>
                        <div class="card-body">
                            <form method="post" action="register.php">
                                <div class="form-group">
                                    <label for="username">Username:</label>
                                    <input type="text" class="form-control" name="txtus" id="username" placeholder="Enter your username">
                                    <?php 
                                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                        if(empty($_POST['txtus'])&&isset($_POST['btnDK'])){
                                            echo '<p style="color: red;font-size: 14px;">Vui lòng điền đầy đủ thông tin!</p>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="text">Phone number:</label>
                                    <input type="text" class="form-control" name="txtphone" placeholder="Enter your phonenumber">
                                    <?php 
                                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                        if(empty($_POST['txtphone'])&&isset($_POST['btnDK'])){
                                            echo '<p style="color: red;font-size: 14px;">Vui lòng điền đầy đủ thông tin!</p>';
                                        }else if(!preg_match('/^0[0-9]{9}+$/',$_POST['txtphone'])){
                                            echo '<p style="color: red;font-size: 14px;">Nhập sai định dạng!</p>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" name="txtEmail"  placeholder="Enter your password">
                                    <?php 
                                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                        if(empty($_POST['txtEmail'])&&isset($_POST['btnDK'])){
                                            echo '<p style="color: red;font-size: 14px;">Vui lòng điền đầy đủ thông tin!</p>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" name="txtpw" id="password" placeholder="Enter your password">
                                    <?php 
                                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                        if(empty($_POST['txtpw'])&&isset($_POST['btnDK'])){
                                            echo '<p style="color: red;font-size: 14px;">Vui lòng điền đầy đủ thông tin!</p>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="confirmPassword">Confirm Password:</label>
                                    <input type="password" name="txtpw2" class="form-control" id="confirmPassword" placeholder="Confirm your password">
                                    <?php 
                                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                            if(empty($_POST['txtpw2'])&&isset($_POST['btnDK'])){
                                                echo '<p style="color: red;font-size: 14px;">Vui lòng điền đầy đủ thông tin!</p>';
                                            }else if($_POST['txtpw2']!=$_POST['txtpw']){
                                                echo '<p style="font-size: 14px;color:red">Mật khẩu không khớp!</p>';
                                            }
                                            
                                        }
                                    ?>
                                </div>
                                <input type="submit" name="btnDK" value="Register" class="btn btn-success btn-block">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    

</body>
</html>
