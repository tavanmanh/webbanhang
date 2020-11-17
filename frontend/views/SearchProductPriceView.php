<!-- load file layout chung -->
<?php $this->layoutPath = "LayoutTrangTrong.php"; ?>
<div class="special-collection">
    <div class="tabs-container">
        <div class="row" style="margin-top:10px;">
            <div class="head-tabs head-tab1 col-lg-8">
                <?php
                $fromPrice = isset($_GET["fromPrice"]) ? $_GET["fromPrice"] : 0;
                $toPrice = isset($_GET["toPrice"]) ? $_GET["toPrice"] : 0;
                $id = isset($_GET["id"]) ? $_GET["id"] : 0;

                ?>
                <h2>GIÁ TỪ <?php echo number_format($fromPrice*1000000); ?> đ đến <?php echo number_format($toPrice*1000000); ?> đ</h2>
            </div>
            <div class="col-lg-3 pull-right text-right">
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="tabs-content row">
        <div id="content-tabb1" class="content-tab content-tab-proindex">
            <div class="clearfix">
                <?php foreach($data as $rows): ?>
                    <!-- box product -->
                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img src="./../assets/upload/products/<?php echo $rows->photo; ?>" alt="">
                                <div class="product-label">
                                    <span class="sale">-<?php echo $rows->discount; ?>%</span>
                                </div>
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a></h3>
                                <h4 class="product-price"><?php echo number_format($rows->price - ($rows->price*$rows->discount)/100); ?> <del class="product-old-price"><?php echo $rows->price; ?></del></h4>
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
                    <!-- end box product -->
                <?php endforeach; ?>
                <!-- paging -->
                <div style="clear: both;"></div>
                <div style="margin-top: -50px;"  class="&#x70;&#x61;&#x67;&#x69;&#x6E;&#x61;&#x74;&#x69;&#x6F;&#x6E;&#x2D;&#x63;&#x6F;&#x6E;&#x74;&#x61;&#x69;&#x6E;&#x65;&#x72;">
                    <ul class="pagination">
                        <li class="page-item"><span>Trang</span></li>
                        <?php for($i = 1; $i <= $numPage; $i++): ?>
                            <li class="page-item"><a class="page-link" href="index.php?controller=search&action=productPrice<?php if ($id) echo "&id=$id"?>&fromPrice=<?php echo $fromPrice; ?>&toPrice=<?php echo $toPrice; ?>&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php endfor; ?>
                    </ul>
                </div>
                <!-- end paging -->
            </div>
        </div>
    </div>
</div>