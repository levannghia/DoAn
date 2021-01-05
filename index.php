<?php
//require_once './config/database.php';
spl_autoload_register(function($class_name){
    require './app/models/' . $class_name . '.php';
});
session_start();
$productModel = new ProductModel();
$FeaturedproductList = $productModel->getFeaturedProduct();
$LatestdproductList = $productModel->getLatestdProduct();
$CategoryModel = new CategoryModel();
$CategoryList = $CategoryModel->getCategory();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportStore | Ecommerce Website Design</title>
    <link rel="stylesheet" href="./public/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<body>

    <div class="header">
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
               <?php
            }
            else {?> 
                    <a href="index.php"><img src="./public/images/logo.png" width="125px"></a>
                    <?php }?>
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
            <div class="row">
                <div class="col-md-5">
                    <h1>Give Your Workout<br> A New Style!</h1>
                    <p>Success ins't always about greatness. It's about consistency. Consistent <br>hard work gains success. Greatness will come. </p>
                    <a href="" class="btn">Explore Now &#8594;</a>
                </div>
                <div class="col-md-7 col-2">
                    <img src="./public/images/image1.png">
                </div>
            </div>
        </div>
    </div>

    <!-- ------------- featured categorries ---------------- -->
    <div class="categories">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <img src="./public/images/category-1.jpg">
                </div>
                <div class="col-3">
                    <img src="./public/images/category-2.jpg">
                </div>
                <div class="col-3">
                    <img src="./public/images/category-3.jpg">
                </div>

            </div>
        </div>

    </div>
    <!-- ------------- featured products ---------------- -->
    <div class="small-container">
        <h2 class="title">Featured Products</h2>
        
        <div class="row">
        <?php
            foreach ($FeaturedproductList as $value) {
            
        ?>
            <div class="col-md-3 col-4">
            <?php $photo = explode(',',$value['product_photo']);?>
                <a href="products_detal.php?id=<?php echo $value['id']; ?>"><img class="img-fluid" src="./public/images/<?php echo $photo[0]; ?>"></a>
                <a href="products_detal.php?id=<?php echo $value['id']; ?>">
                    <h4><?php echo $value['product_name']; ?></h4>
                </a>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p><?php echo number_format($value['product_price']); ?>$</p>
       
            </div>
        <?php
            }
        ?>
        </div>
        <h2 class="title">Latest Products</h2>
        <div class="row">
        <?php
            foreach ($LatestdproductList as $value) {
            
        ?>
            <div class="col-md-3 col-4">
            <?php $photo = explode(',',$value['product_photo']);?>
                <a href="products_detal.php?id=<?php echo $value['id']; ?>"><img class="img-fluid" src="./public/images/<?php echo $photo[0]; ?>"></a>
                <a href="products_detal.php?id=<?php echo $value['id']; ?>">
                    <h4><?php echo $value['product_name']; ?></h4>
                </a>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p><?php echo number_format($value['product_price']); ?></p>
       
            </div>
        <?php
            }
        ?>
        </div>
    </div>
    <!-- ------------ offer -------------- -->
    <div class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-md-7 col-2"><img src="./public/images/SB4_1.png" class="offer-img"> </div>
                <div class="col-md-4 col-2">
                    <p>Exclusive Availabble on SportStore</p>
                    <h1>Garmin Vivosmart 4</h1>
                    <small>
                        The Mi Smart Band 4 features a 39.9% larger (than Mi Band 4) AMOLED color full-touch display
                        with
                        adjustable brightness, so everything is clear as can be</small>
                    <a href="products_detal.php?id=14" class="btn">Buy Now &#8594;</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ------------ testimonial -------------- -->
    <div class="testimonial">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <i class="fa fa-qoute-lef"></i>
                    <p>Abilities or he perfectly pretended so strangers be exquisite. Oh to another chamber pleased imagine do in. Went me rank at last loud shot an draw. Excellent so to no sincerity smallness. Removal request delight if on he we</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <img src="./public/images/user-1.png">
                    <h3>Đạt 1 Phích</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-qoute-lef"></i>
                    <p>Abilities or he perfectly pretended so strangers be exquisite. Oh to another chamber pleased imagine do in. Went me rank at last loud shot an draw. Excellent so to no sincerity smallness. Removal request delight if on he we</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <img src="./public/images/user-2.png">
                    <h3>An Nguyen</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-qoute-lef"></i>
                    <p>Abilities or he perfectly pretended so strangers be exquisite. Oh to another chamber pleased imagine do in. Went me rank at last loud shot an draw. Excellent so to no sincerity smallness. Removal request delight if on he we</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <img src="./public/images/user-3.png">
                    <h3>Quang Hoang</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- ------------------- brands --------------------- -->
    <div class="brands">
        <div class="small-container">
            <div class="row">
                <div class="col-md-2 col-5">
                    <img src="./public/images/logo-godrej.png">
                </div>
                <div class="col-md-2 col-5">
                    <img src="./public/images/logo-oppo.png">
                </div>
                <div class="col-md-2 col-5">
                    <img src="./public/images/logo-coca-cola.png">
                </div>
                <div class="col-md-2 col-5">
                    <img src="./public/images/logo-paypal.png">
                </div>
                <div class="col-md-2 col-5">
                    <img src="./public/images/logo-philips.png">
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