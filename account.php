<?php
session_start();
//require_once './config/database.php';
require './facebook_source.php';
spl_autoload_register(function($class_name){
    require './app/models/' . $class_name . '.php';
});
if(isset($_SESSION['username'])){
    header('Location: http://localhost/DoAn/products');
}
$productModel = new ProductModel();
$productList = $productModel->getProduct();
$CategoryModel = new CategoryModel();
$CategoryList = $CategoryModel->getCategory();
$accountModel = new Account();
$accountList = $accountModel->getAccount();
$accountListAdmin = $accountModel->getAccountAdmin();
// Dang nhap voi tu cach khach hang
if (isset($_POST['login'])&&!empty($_POST['username']) && !empty($_POST['password']))  
{
    $level=0;
    //lay du lieu tu form goi len
    $username = $_POST['username'];
    $password = $_POST['password'];
    //ket noi den csdl
    //Kiem tra tai khoan khach hang
    foreach($accountList as $itemCustomer){
        if(($username==$itemCustomer['username'])&&($password==$itemCustomer['password'])){
            $level = 1;     
            $_SESSION['username2']=$username;
            $_SESSION['photo2']=  $itemCustomer['photo'];
            
            break;
        }
    }
    //Kiem tra tai khoan admin
    foreach($accountListAdmin as $itemAdmin){
        if(($username==$itemAdmin['username'])&&($password==$itemAdmin['password'])){
            $level = 2;
            $_SESSION['usernameAdmin']=$username;
            break;
      }
    }
    if($level==1){
        phpAlert( "Hello $username");
        ?>
        <!-- --them thong bao khi dang ky thanh cong -->
        <script type="text/javascript">
        function delayer(){
            window.location = "http://localhost/DoAn/";
        }
        //-->
        </script>
        </head>
        <body onLoad="setTimeout('delayer()', 0)">
        <?php
    }
    else if($level==2){
        phpAlert( "Hello Administrators $username");
        ?>
        <!-- --them thong bao khi dang ky thanh cong -->
        <script type="text/javascript">
        function delayer(){
            window.location = "http://localhost/DoAn/manageProducts";
        }
        //-->
        </script>
        </head>
        <body onLoad="setTimeout('delayer()', 500)">
        <?php
    }
    else{
        phpAlert( " Account or password is incorrect");
    }

}
//Them tai khoan

if (!empty($_FILES['photo']) &&!empty($_POST['username2']) && !empty($_POST['password2'])&&isset($_POST['login2'])) {
//  Loi goi account model   
if (is_uploaded_file($_FILES['photo']['tmp_name']) && move_uploaded_file($_FILES['photo']['tmp_name'], 'public/images/' . time() . $_FILES['photo']['name'])){ 
//    $accountModel = new Account();
    $photo = time() . $_FILES['photo']['name'];
    $username2 = $_POST['username2'];
    $password2 = $_POST['password2'];
    $count =0;
    foreach($accountList as $item){
        if($item['username']==$username2){
           $count =2;
        }
    }
   if($count==2){
    phpAlert(  "The $username2 username already exists                                                         Please choose another username"  );
   }
   else{
    if($accountModel->createAccount2($photo, $username2, $password2)) {
        phpAlert(  $username2 . " account successfully registered"  );
        ?>
        <!-- --them thong bao khi dang ky thanh cong -->
        <script type="text/javascript">
        
        function delayer(){
            window.location = "http://localhost/DoAn/index";
        }
        //-->
        </script>
        </head>
        <body onLoad="setTimeout('delayer()', 500)">
        <?php
    }
    else{
        phpAlert(  "Account registration is failure"  );
    }
   }
       
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account - SportStore</title>
    <link rel="stylesheet" href="./public/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<?php
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
?>
<?php

        if(!empty($notification)) {
        ?>
        <div class="alert alert-success" role="alert">
            <?php echo $notification; ?>
        </div>
        <?php
        }
        ?>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="index.php"><img src="./public/images/logo.png" width="125px"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                <?php
                    foreach ($CategoryList as $value) {
                        
                    ?>
                    <li><a href="<?php echo $value['category_link']; ?>"><?php echo $value['category_name']; ?></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </nav>
            <a href="<?php echo "cart1.php"; ?>"><img src="./public/images/cart.png" width="30px" height="30px"></a>
            <img src="./public/images/menu.png" class="menu-icon" onclick="menutoggle()">
        </div>
    </div>
    <!-- ------------Account-page------------------- -->
    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="./public/images/image1.png" width="100%">
                </div>

                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="login()">Login</span>
                            <span onclick="register()">Register</span>
                            <hr id="Indicator">
                        </div>
                        
                        <form action="account.php" method="post" id="LoginForm">
                            <input type="text" name="username" id="username" placeholder="Username" required>
                            <input type="password" name="password" id="password" placeholder="Password" required>
                            <button type="submit" value="login" name="login" class="btn">Login</button>
                            <a href="forgotPassword">Forgot password</a>
                            <a href="<?= $loginUrl ?>"><img src="./public/images/fa.png" alt='facebook login' title="Facebook Login" /></a>
                        </form>
                      
                        <form action="account.php" method="post" id="RegForm" enctype="multipart/form-data">
                            <input type="file" name="photo" id="photo" required>
                            <input type="text" placeholder="Username" name="username2" id="username2" required>
                            <input type="password" placeholder="Password" name="password2" id="password2" required>
                            <button type="submit" value="login2" name="login2" class="btn">Register</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ------------footer----------- -->

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <p>Download App for Android and ios mobile phone</p>
                    <div class="app-logo">
                        <img src="./public/images/play-store.png">
                        <img src="./public/images/app-store.png">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="./public/images/logo-white.png">
                    <p>Our Purpose Is To Sustainably Make the Pleasure and Benefits of Sports Accessible to the Many</p>
                </div>
                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Join Affiliate</li>
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Follow us</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Instagram</li>
                        <li>Youtube </li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="Copyright">Copyright 2020 - By QuocHuy</p>
        </div>
        <!-- ------------------- js for toggle menu-------------- -->
        <script>
            var MenuItems = document.getElementById("MenuItems");

            MenuItems.style.maxHeight = "0px";

            function menutoggle() {
                if (MenuItems.style.maxHeight == "0px") {
                    MenuItems.style.maxHeight = "200px";
                } else {
                    MenuItems.style.maxHeight = "0px";
                }
            }
        </script>
        <!-- ------------------- js for Account form-------------- -->

        <script>
            var LoginForm = document.getElementById("LoginForm");
            var RegForm = document.getElementById("RegForm");
            var Indicator = document.getElementById("Indicator");

            function register() {
                RegForm.style.transform = "translateX(0px)";
                LoginForm.style.transform = "translateX(0px)";
                Indicator.style.transform = "translateX(100px)";

            }

            function login() {
                RegForm.style.transform = "translateX(300px)";
                LoginForm.style.transform = "translateX(300px)";
                Indicator.style.transform = "translateX(0px)";
            }
        </script>

</body>

</html>