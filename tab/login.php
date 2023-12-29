
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <?php
            ob_start();
            include_once('../inc/database.php');
        ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->
        <title>Login</title>
<style>
    .form-group{
        margin: 5px 0;
    }
    .form-control{
        margin: 10px 0;
    }
    .btn{
        width: 100%;
        margin-top: 5px;
        font-size: 20px;
        font-weight: bold;
        }
        
    </style>;
    </head>
    <body>
    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-black text-center">
                    <h2>Login</h2>
                </div>
                <div class="card-body">
                    <form method="post" action="login.php">
                        <div class="form-group">
                            <input type="text" name ="us" class="form-control" id="username" placeholder="Enter your username" >
                            <input type="password" name ="pw" class="form-control" id="password" placeholder="Enter your password">
                            <?php
                            if(isset($_POST['us']) && isset($_POST['pw'])) {
                                $us = $_POST["us"];
                                $pw = $_POST["pw"];
                                $q = Database::query("SELECT User_Id, User_Name, sdt, email  FROM ktragiuaky.user where User_Name = '$us' AND Password = '$pw'");        
                                $_SESSION['user'] = $us;
                                $r= $q->fetch_array();
                                
                                if(mysqli_num_rows($q) > 0 ){
                                    $_SESSION['id'] = $r['User_Id'];
                                    $_SESSION['name'] = $r['User_Name'];
                                    $_SESSION['sdt'] = $r['sdt'];
                                    $_SESSION['email'] = $r['email'];
                                    header('location:http://localhost/exam/view/tab/index.php');
                                    exit();
                            }
                            else{
                                    echo '<p style="color:red;">Đăng nhập không thành công!</p>';
                                }
                                
                            }
                            ?>
                            <input type="submit" class = "btn btn-primary btn-block" name = "btnlg" value="Login">
                        </div>
                                </form>
                                <a href="register.php" class="text-right">Create Account?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</body> 
</html>


