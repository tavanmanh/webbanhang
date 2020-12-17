
<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> 0326648389</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> TaVanManh111@gmail.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i>4/23/58 Trần Bình Mai Dịch Cầu Giấy</a></li>
					</ul>
					<ul class="header-links pull-right">
          <?php if(isset($_SESSION["customer_email"])): ?>
            <li><a href="#">Xin chào <?php echo $_SESSION["customer_email"]; ?></a>&nbsp; &nbsp;<a href="index.php?controller=account&action=logout">Đăng xuất</a></li>
            <?php else: ?>
              <li><a href="index.php?controller=account&action=login">Đăng nhập</a>&nbsp; &nbsp;<a href="index.php?controller=account&action=register">Đăng ký</a></li>
            <?php endif; ?>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src="./../assets/frontend/img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->
                        <script type="text/javascript">
                            function search(){
                                var key = document.getElementById('key').value;
                                //di chuyen den trang search
                                location.href="index.php?controller=search&action=productName&key="+key;
                            }
                            //---
                            function smartSearch(){
                                var key = document.getElementById('key').value;
                                if(key != ""){
                                    document.getElementById('smart-search').setAttribute("style","display:block;");
                                    //---
                                    $.ajax({
                                        url: "index.php?controller=search&action=smartSearch&key="+key,
                                        success: function( result ) {
                                            $( "#smart-search ul" ).empty();
                                            $( "#smart-search ul" ).append(result);
                                        }
                                    });
                                    //---
                                }else{
                                    document.getElementById('smart-search').setAttribute("style","display:none;");
                                }
                            }
                            //---
                        </script>
                        <div class="col-xs-12 col-sm-12 col-md-6 header-search">
                            <!--<form method="post" id="frm" action="">-->
                            <div style="margin-top:25px;" style="position: relative;">
                                <input type="text" onkeyup ="smartSearch();" value="" placeholder="Nhập từ khóa tìm kiếm..." id="key"  class="input" style="width: 80%">
                                <button class="search-btn" onclick="return search();" STYLE="    height: 42px;
    width: 100px;
    background: #d10024;
    color: #FFF;
    font-weight: 700;
    border: none;
    border-radius: 0px 40px 40px 0px;
">Search</button>
<!--                              <button  onclick="return search();" style="margin-top:5px;height: 42px;width: 60px;border-radius: 0 10px 10px 0px;background: #d10024" type="submit" class="search-btn"> <i class="fa fa-search"></i> </button>-->
                            </div>
                            <!--</form>-->
                            <style type="text/css">
                                #smart-search ul{padding:0px; margin:0px; list-style: none;}
                                #smart-search ul li{border-bottom: 1px solid #dddddd;}
                                #smart-search{position: absolute; width: 75%; z-index: 1; background: white; display: none;}
                            </style>
                            <div id="smart-search">
                                <ul >
                                </ul>
                            </div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Cart -->
                                <?php
                                $numberOfProduct = 0;
                                if(isset($_SESSION["cart"])){
                                    foreach($_SESSION["cart"] as $rows)
                                        $numberOfProduct++;
                                }
                                ?>
                                <div class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span>Your Cart</span>
                                        <div class="qty"> <?php echo $numberOfProduct; ?></div>
                                    </a>
                                    <div class="cart-dropdown">
                                        <div class="cart-list">
                                            <?php
                                            if (isset($_SESSION["cart"])):
                                                foreach($_SESSION["cart"] as $rows): ?>
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="../assets/upload/products/<?php echo $rows["photo"]; ?>" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-name"><a href="index.php?controller=products&action=detail&id=<?php echo $rows["id"]; ?>"><?php echo $rows["name"]; ?></a></h3>
                                                    <h4 class="product-price"><?php echo $rows["number"]; ?> x <?php echo $rows["price"]-($rows["price"]*$rows["discount"]/100); ?></h4>
                                                </div>
                                            </div>
                                            <?php
                                                endforeach;
                                                endif;
                                                ?>
                                        </div>
                                        <div class="cart-btns">
                                            <a href="index.php?controller=cart" style="width: 100%">Giỏ Hàng</a>
                                        </div>
                                    </div>
                                </div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation" style="font-size: 20px">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="index.php">Home</a></li>
            <?php 
              //load MVC bang tay
              include "controllers/CategoriesController.php";
              $obj = new CategoriesController();
              $obj->index();
           ?>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->
