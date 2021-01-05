<?php
session_start();
//require_once './config/database.php';
spl_autoload_register(function($class_name){
    require './app/models/' . $class_name . '.php';
});

$productModel = new ProductModel();
//$productList = $productModel->getProduct();
$totalRow = $productModel->getTotalRow();
$perPage = 8;
$page = 1;
if(isset($_GET['page'])) 
{
    $page = $_GET['page'];
}
$productList = $productModel->getProductsByPage($perPage, $page);
$CategoryModel = new CategoryModel();
$CategoryList = $CategoryModel->getCategory();
$CategoryofProducts = new CategoryofProductsModel();
$CategoryofProductsList = $CategoryofProducts->getCategoryofProducts();
$pageLinks = Pagination::createPageLinks($totalRow, $perPage, $page);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products - SportStore</title>
    <link rel="stylesheet" href="./public/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
            <?php if(isset($_SESSION['username2'])) {?>
            <div class="row">
               <div class="col-md-3"><a href="./changePassword"><img src="./public/images/<?php echo $_SESSION['photo2']?>" style="width:60px;" alt="..."></a></div>
               <div class="col-md-4">Hello <?php echo $_SESSION['username2']?></div>
               <div class="col-md-2"> <a href="logoutIndex.php" class="btn btn-danger">Log_out</a></div>
               <div class="col-md-3"></div>
            </div>
            <?php  }
            else if(isset($_SESSION['usernameF'])||isset($_SESSION['usernameFR'])){
                ?>
                <div class="row">
                <div class="col-md-2"><a href="./changePassword"><img src="./public/images/f1.png" style="width:60px;" alt="..."></a></div>
                <div class="col-md-4">Hello <?php echo $_SESSION['name']?></div>
                <div class="col-md-2"> <a href="logoutIndex.php" class="btn btn-danger">Log_out</a></div>
                <div class="col-md-4"></div>
             </div>
             <?php  }
               else if(isset($_SESSION['usernameAdmin'])){
                   ?>
              <div class="row">
               <div class="col-md-2"></div>
               <div class="col-md-2"><?php echo $_SESSION['usernameAdmin']?></div>
               <div class="col-md-2"> <a href="logoutIndex.php" class="btn btn-danger">Log_out</a></div>
               <div class="col-md-6"></div>
            </div>
                   <?php
               }
            ?>
            
            </div>
             
            <nav>
                <ul id="MenuItems">
                <?php
                    foreach ($CategoryList as $value) 
                    {                       
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
    </div>                  
    <div class="small-container">

        <div class="row row-2">
            <h2>All Products</h2>
            <select>
                <option>Default Shop</option>
                <option>Short by price</option>
                <option>Short by popularity</option>
                <option>Short by Rating</option>
                <option>Short by Sale</option>
            </select>
        </div>
        <!-- Hàm Chọn Loại Sản Phẩm -->
        <nav class="navbar navbar-expand-sm navbar-light bg-light">           
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">                                               
                    <?php
                    foreach ($CategoryofProductsList as $item)
                    {                                       
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="CategoryofProducts.php?id=<?php echo $item['id']; ?>"><?php echo $item ['category_name']?></a>
                    </li>
                    <?php
                    }
                    ?>                  
                </ul>             
                <form class="form-inline my-2 my-lg-0" action="searchProduct.php"method="post">
                    <input class="form-control mr-sm-2" type="text"name="name" placeholder="Search">
                    <button type="submit">Search</button>
                </form>
            </div>
        </nav>          


        <div class="row">
        <!-- Them san pham_______ -->
        <?php
            foreach ($productList as $value) {         
        ?>
            <div class="col-md-3 col-4">
            <?php $photo = explode(',',$value['product_photo']);?>
            <a href="products_detal.php?id=<?php echo $value['id']; ?>"><img class="img-fluid" src="./public/images/<?php echo $photo[0]; ?>"></a>
                <a href="#">
                    <h4><?php echo $value['product_name']; ?></h4>
                </a>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p><?php echo number_format($value['product_price']);?>$</p>
            </div>
        <?php
            }
        ?>
        <!-- ///////////////////////// -->
        </div>
        <?php echo $pageLinks; ?>
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
</body>

</html>