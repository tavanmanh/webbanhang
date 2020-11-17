<!-- load file layout chung -->
<?php $this->layoutPath = "LayoutTrangChu.php"; ?>
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="index.php">Home</a></li>
                    <li><?php echo $this->modelGetCategory($record->category_id); ?></a></li>
                    <li><?php echo $record->name; ?></a></li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Product main img -->
            <div class="col-md-5 col-md-push-2">
                <div id="product-main-img">
                    <div class="product-preview">
                        <img src="../assets/upload/products/<?php echo $record->photo; ?>" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="../assets/upload/products/<?php echo $record->photo1; ?>" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="../assets/upload/products/<?php echo $record->photo2; ?>" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="../assets/upload/products/<?php echo $record->photo3; ?>" alt="">
                    </div>
                    <div class="product-preview">
                        <img src="../assets/upload/products/<?php echo $record->photo4; ?>" alt="">
                    </div>
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5">
                <div id="product-imgs">
                    <div class="product-preview">
                        <img src="../assets/upload/products/<?php echo $record->photo; ?>" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="../assets/upload/products/<?php echo $record->photo1; ?>" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="../assets/upload/products/<?php echo $record->photo2; ?>" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="../assets/upload/products/<?php echo $record->photo3; ?>" alt="">
                    </div>
                    <div class="product-preview">
                        <img src="../assets/upload/products/<?php echo $record->photo4; ?>" alt="">
                    </div>
                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5">
                <div class="product-details">
                    <h2 class="product-name"><?php echo $record->name; ?></h2>
                    <div>
                        <div class="product-rating">
                            <?php
                            for ($x = 0; $x < $this->modelTotalRating($record->id); $x++){
                                ?>
                                <i class="fa fa-star"></i>

                                <?php
                            }
                            ?>
                        </div>
                        <a class="review-link" href="#"></a>
                    </div>
                    <div>
                        <h3 class="product-price"><?php echo number_format($record->price - ($record->price*$record->discount)/100); ?> <del class="product-old-price"><?php echo $record->price; ?></del></h3>
                    </div>
                    <p><?php echo $record->description; ?></p>

                    <div class="add-to-cart">
                        <div style="margin-top: 10px;">
                            <div class="qty-label">
                                Số lượng
                                <div class="input-number">
                                    <input type="number" id="quantity" min="1" value="1">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                            </div>
                            <a href="#" onclick="addCart();" class="btn btn-primary">Cho vào giỏ hàng</a>
                            <script type="text/javascript">
                                function addCart(){
                                    var quantity = document.getElementById('quantity').value;
                                    location.href="index.php?controller=cart&action=createWithNumber&id=<?php echo $record->id; ?>&quantity="+quantity;
                                }
                            </script>
                        </div>
                    </div>
                    <ul class="product-links">
                        <li>Chia sẻ:</li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                    <div class="product-rating" style="margin-top: 30px">
                        <a href="index.php?controller=products&action=rating&star=1&id=<?php echo $record->id; ?>"><i class="fa fa-star" style="font-size: 20px;margin-right: 10px"></i></a>
                        <a href="index.php?controller=products&action=rating&star=2&id=<?php echo $record->id; ?>"><i class="fa fa-star" style="font-size: 20px;margin-right: 10px"></i></a>
                        <a href="index.php?controller=products&action=rating&star=3&id=<?php echo $record->id; ?>"><i class="fa fa-star" style="font-size: 20px;margin-right: 10px"></i></a>
                        <a href="index.php?controller=products&action=rating&star=4&id=<?php echo $record->id; ?>"><i class="fa fa-star" style="font-size: 20px;margin-right: 10px"></i></a>
                        <a href="index.php?controller=products&action=rating&star=5&id=<?php echo $record->id; ?>"><i class="fa fa-star" style="font-size: 20px;margin-right: 10px"></i></a>
                    </div>
                    <h1>Đánh  giá</h1>

                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- Section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">Sản phẩm liên quan</h3>
                </div>
            </div>
            <?php
           $ReladedProduct= $this->modelReladedProduct($record->category_id);
            ?>
            <?php foreach($ReladedProduct as $rows): ?>
            <!-- product -->
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
        <!-- /row -->
    </div>
    <!-- /container -->
</div>