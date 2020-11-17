<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electro - HTML Ecommerce Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="../assets/frontend/css/bootstrap.min.css"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="../assets/frontend/css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="../assets/frontend/css/slick-theme.css"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="../assets/frontend/css/nouislider.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="../assets/frontend/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="../assets/frontend/css/style.css"/>
    <link href='../assets/frontend/100/047/633/themes/517833/assets/font-awesome.min221b.css?1481775169361' rel='stylesheet' type='text/css' />
    <link href='../assets/frontend/100/047/633/themes/517833/assets/bootstrap.min221b.css?1481775169361' rel='stylesheet' type='text/css' />
    <link href='../assets/frontend/100/047/633/themes/517833/assets/owl.carousel221b.css?1481775169361' rel='stylesheet' type='text/css' />
    <link href='../assets/frontend/100/047/633/themes/517833/assets/responsive221b.css?1481775169361' rel='stylesheet' type='text/css' />
    <link href='../assets/frontend/100/047/633/themes/517833/assets/styles.scss221b.css?1481775169361' rel='stylesheet' type='text/css' />
    <link href='../assets/frontend/100/047/633/themes/517833/assets/bw-statistics-style221b.css?1481775169361' rel='stylesheet' type='text/css' />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<!-- HEADER -->
<?php include "views/HeaderView.php"; ?>
<!-- /HEADER -->

<!-- NAVIGATION -->
<!-- /NAVIGATION -->

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <?php
                    $category_id = isset($_GET["id"]) ? $_GET["id"] : 0;
                    ?>
                    <li><a href="index.php">Home</a></li>
                    <li><?php echo $this->modelGetCategory($category_id); ?></a></li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->
<?php
$NameBrand = $this->modelNameBrand();
$brandId = isset($_GET["brandId"]) ? $_GET["brandId"] : 0;
$fromPrice = isset($_GET["fromPrice"]) ? $_GET["fromPrice"] : 0;
$toPrice = isset($_GET["toPrice"]) ? $_GET["toPrice"] : 0;
$id = isset($_GET["id"]) ? $_GET["id"] : 0;
$key = isset($_GET["key"]) ? $_GET["key"] : 0;
?>
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <div id="aside" class="col-md-3">
                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Nhãn Hàng</h3>
                    <div class="checkbox-filter">
                        <?php foreach ($NameBrand as $rows): ?>
                        <div class="input-checkbox">
                            <input type="checkbox" name="type[]"  <?php if($rows->id==$brandId) echo 'checked'?> onclick="location.href = 'index.php?controller=search&action=productBrand&<?php if ($id) echo "id=$id"?>&brandId=<?php echo $rows->id?><?php if ($toPrice) echo "&fromPrice=$fromPrice&toPrice=$toPrice"?><?php if ($key) echo "&key=$key"?>'" value="<?php echo $rows->id; ?>" id="cb_type_<?php echo $rows->id; ?>">
                            <label for="cb_type_<?php echo $rows->id; ?>">
                                <span></span>
                                <?php echo $rows->name; ?>
                            </label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="panel panel-default" style="margin-top:15px;">
                    <div class="panel-heading"> Tìm theo mức giá </div>
                    <div class="panel-body">
                        <ul class="list-group" style="border:0px;">
                            <li class="list-group-item" style="border:0px;">Giá từ &nbsp;&nbsp;(Triệu)
                                <input type="number" min="0" value="0" id="fromPrice" class="form-control" />
                            </li>
                            <li class="list-group-item" style="border:0px;">Đến &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="number" min="0" value="0" id="toPrice" class="form-control"/>
                            </li>
                            <li class="list-group-item" style="border:0px; text-align:center">
                                <input type="button" class="btn btn-warning" value="Tìm mức giá" onclick="location.href = 'index.php?controller=search&action=productPrice&<?php if ($id) echo "id=$id&"?><?php if ($key) echo "&key=$key"?>fromPrice=' + document.getElementById('fromPrice').value + '&toPrice=' + document.getElementById('toPrice').value;" />
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="aside">
                    <h3 class="aside-title">Top selling</h3>
                    <?php
                    $TopSelling1 = $this->modelTopSelling1();
                    ?>
                    <?php foreach ($TopSelling1 as $rows): ?>
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="../assets/upload/products/<?php echo $rows->photo; ?>" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a
                                            href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a>
                                </h3>
                                <h4 class="product-price"><?php echo number_format($rows->price - ($rows->price * $rows->discount) / 100); ?>
                                    <del class="product-old-price"><?php echo number_format($rows->price); ?></del>
                                </h4>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- /aside Widget -->
            </div>
            <div id="store" class="col-md-9">
            <!-- /ASIDE -->
                <?php echo $this->view;?>
            <!-- STORE -->
            <!-- /STORE -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- NEWSLETTER -->
<div id="newsletter" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="newsletter">
                    <p>ĐĂNG KÍ NHẬN <strong>THƯ MỚI</strong></p>
                    <form>
                        <input class="input" type="email" placeholder="Enter Your Email">
                        <button class="newsletter-btn"><i class="fa fa-envelope"></i> ĐĂNG KÍ</button>
                    </form>
                    <ul class="newsletter-follow">
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /NEWSLETTER -->

<!-- FOOTER -->
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Thông tin</h3>
                        <p></p>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i>4/23/58 Trần Bình</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>0326648389</a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i>tavanmanh@gmmail.com</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Mặt Hàng</h3>
                        <ul class="footer-links">
                            <li><a href="#">Laptops</a></li>
                            <li><a href="#">Smartphones</a></li>
                            <li><a href="#">Cameras</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Thông tin</h3>
                        <ul class="footer-links">
                            <li><a href="#">Chúng tôi</a></li>
                            <li><a href="#">Sản phẩm</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Dịch vụ</h3>
                        <ul class="footer-links">
                            <li><a href="#">Tài khoản</a></li>
                            <li><a href="#">Giỏ hàng</a></li>
                            <li><a href="#">Đơn hàng</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="footer-payments">
                        <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                    </ul>
                    <span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="../assets/frontend/js/jquery.min.js"></script>
<script src="../assets/frontend/js/bootstrap.min.js"></script>
<script src="../assets/frontend/js/slick.min.js"></script>
<script src="../assets/frontend/js/nouislider.min.js"></script>
<script src="../assets/frontend/js/jquery.zoom.min.js"></script>
<script src="../assets/frontend/js/main.js"></script>

</body>
</html>
