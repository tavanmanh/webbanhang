<!-- load file layout chung -->
<?php $this->layoutPath = "LayoutTrangChu.php"; ?>
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
					<?php
					$RanDomLaptop= $this->modelRanDomLaptop();
					?>
						<div class="shop">
							<div class="shop-img">
								<img src="./../assets/upload/products/<?php echo $RanDomLaptop->photo; ?>" alt="" style="width:360px;height:240px">
							</div>
							<div class="shop-body">
								<h3>Laptop</h3>
								<a href="index.php?controller=products&action=category&id=1" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
					<?php 
					$RanDomCamera= $this->modelRanDomCamera();
					?>
						<div class="shop">
							<div class="shop-img">
								<img src="./../assets/upload/products/<?php echo $RanDomCamera->photo; ?>" alt="" style="width:360px;height:240px">
							</div>
							<div class="shop-body">
								<h3>Camera</h3>
								<a href="index.php?controller=products&action=category&id=6" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
					<?php 
					$RanDomPhone= $this->modelRanDomPhone();
					?>
						<div class="shop">
							<div class="shop-img">
								<img src="./../assets/upload/products/<?php echo $RanDomPhone->photo; ?>" alt="" style="width:360px;height:240px">
							</div>
							<div class="shop-body">
								<h3>Phone</h3>
								<a href="index.php?controller=products&action=category&id=4" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Danh sách sản phẩm mới</h3>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->
										<?php 
										$newProduct= $this->modelNewProduct();
										?>
										<?php foreach($newProduct as $rows): ?>
                                            <div class="col-md-3 col-xs-6">
                                                <div class="product">
                                                    <div class="product-img">
                                                        <img src="../assets/upload/products/<?php echo $rows->photo; ?>" alt="">
                                                        <div class="product-label">
                                                            <span class="sale">-<?php echo $rows->discount; ?>%</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-body">
                                                        <p class="product-category">Category</p>
                                                        <h3 class="product-name"><a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a></h3>
                                                        <h4 class="product-price"> <?php echo number_format($rows->price - ($rows->price*$rows->discount)/100); ?> <del class="product-old-price"><?php echo number_format($rows->price); ?></del></h4>
                                                        <div class="product-rating">
                                                            <?php
                                                            for ($x = 0; $x < $this->modelTotalRating($rows->id); $x++){
                                                                ?>
                                                                <i class="fa fa-star"></i>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="product-btns">
                                                            <a href="#"><i class="fa fa-heart-o" style="font-size: 20px; margin-right: 30px"></i></a>
                                                            <a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><i class="fa fa-eye" style="font-size: 20px"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="add-to-cart">
                                                        <button class="add-to-cart-btn"> <a href="index.php?controller=cart&action=create&id=<?php echo $rows->id; ?>"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</a></button>
                                                    </div>
                                                </div>
                                            </div>
										<?php endforeach; ?>
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Days</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Hours</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Mins</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Secs</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">Đơn mới trong tuần</h2>
							<p>BỘ SƯU TẬP MỚI GIẢM GIÁ TỚI 50%</p>
							<a class="primary-btn cta-btn" href="#">Shop now</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Sale Khủng</h3>
							<div class="section-nav">
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<!-- product -->
										<?php 
										$BigSale= $this->modelBigSale();
										?>
										<?php foreach($BigSale as $rows): ?>
                                            <div class="col-md-3 col-xs-6">
                                                <div class="product">
                                                    <div class="product-img">
                                                        <img src="../assets/upload/products/<?php echo $rows->photo; ?>" alt="">
                                                        <div class="product-label">
                                                            <span class="sale">-<?php echo $rows->discount; ?>%</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-body">
                                                        <p class="product-category">Category</p>
                                                        <h3 class="product-name"><a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a></h3>
                                                        <h4 class="product-price"> <?php echo number_format($rows->price - ($rows->price*$rows->discount)/100); ?> <del class="product-old-price"><?php echo number_format($rows->price); ?></del></h4>
                                                        <div class="product-rating">
                                                            <?php
                                                            for ($x = 0; $x < $this->modelTotalRating($rows->id); $x++){
                                                                ?>
                                                                <i class="fa fa-star"></i>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="product-btns">
                                                            <a href="#"><i class="fa fa-heart-o" style="font-size: 20px; margin-right: 30px"></i></a>
                                                            <a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><i class="fa fa-eye" style="font-size: 20px"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="add-to-cart">
                                                        <button class="add-to-cart-btn"> <a href="index.php?controller=cart&action=create&id=<?php echo $rows->id; ?>"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</a></button>
                                                    </div>
                                                </div>
                                            </div>
										<?php endforeach; ?>
										<!-- /product -->
									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-3" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-3">
							<div>
							<?php 
										$TopSelling1= $this->modelTopSelling1();
										?>
										<?php foreach($TopSelling1 as $rows): ?>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="../assets/upload/products/<?php echo $rows->photo; ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a></h3>
										<h4 class="product-price"><?php echo number_format($rows->price - ($rows->price*$rows->discount)/100); ?><del class="product-old-price"><?php echo number_format($rows->price); ?></del></h4>
									</div>
								</div>
								<?php endforeach; ?>
								<!-- /product widget -->
							</div>

							<div>
								<!-- product widget -->
								<?php 
										$TopSelling2= $this->modelTopSelling2();
										?>
										<?php foreach($TopSelling2 as $rows): ?>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="../assets/upload/products/<?php echo $rows->photo; ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a></h3>
										<h4 class="product-price"><?php echo number_format($rows->price - ($rows->price*$rows->discount)/100); ?><del class="product-old-price"><?php echo number_format($rows->price); ?></del></h4>
									</div>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-4" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-4">
							<div>
								<!-- product widget -->
								<?php 
										$TopSelling2= $this->modelTopSelling2();
										?>
										<?php foreach($TopSelling2 as $rows): ?>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="../assets/upload/products/<?php echo $rows->photo; ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a></h3>
										<h4 class="product-price"><?php echo number_format($rows->price - ($rows->price*$rows->discount)/100); ?><del class="product-old-price"><?php echo number_format($rows->price); ?></del></h4>
									</div>
								</div>
								<?php endforeach; ?>
								<!-- product widget -->
							</div>

							<div>
								<!-- product widget -->
								<?php 
										$TopSelling3= $this->modelTopSelling3();
										?>
										<?php foreach($TopSelling3 as $rows): ?>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="../assets/upload/products/<?php echo $rows->photo; ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a></h3>
										<h4 class="product-price"><?php echo number_format($rows->price - ($rows->price*$rows->discount)/100); ?><del class="product-old-price"><?php echo number_format($rows->price); ?></del></h4>
									</div>
								</div>
								<?php endforeach; ?>
								<!-- product widget -->
							</div>
						</div>
					</div>

					<div class="clearfix visible-sm visible-xs"></div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-5" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-5">
							<div>
								<!-- product widget -->
								<?php 
										$TopSelling3= $this->modelTopSelling3();
										?>
										<?php foreach($TopSelling3 as $rows): ?>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="../assets/upload/products/<?php echo $rows->photo; ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a></h3>
										<h4 class="product-price"><?php echo number_format($rows->price - ($rows->price*$rows->discount)/100); ?><del class="product-old-price"><?php echo number_format($rows->price); ?></del></h4>
									</div>
								</div>
								<?php endforeach; ?>
								<!-- product widget -->
							</div>

							<div>
							<?php 
										$TopSelling1= $this->modelTopSelling1();
										?>
										<?php foreach($TopSelling1 as $rows): ?>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="../assets/upload/products/<?php echo $rows->photo; ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a></h3>
										<h4 class="product-price"><?php echo number_format($rows->price - ($rows->price*$rows->discount)/100); ?><del class="product-old-price"><?php echo number_format($rows->price); ?></del></h4>
									</div>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
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
							<p>Đăng kí Nhận <strong>THƯ MỚI</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Xác nhận</button>
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