<!-- load file layout chung -->
<?php $this->layoutPath = "LayoutTrangTrong.php"; ?>

    <!-- store top filter -->
    <?php
    $category_id = isset($_GET["id"]) ? $_GET["id"] : 0;
    ?>
    <div class="store-filter clearfix">
        <div class="store-sort">
            <label>
                <select class="form-control" onchange="location.href = 'index.php?controller=products&action=category&id=<?php echo $category_id; ?>&order='+this.value;">
                    <option value="0">Sắp xếp </option>
                    <option value="priceAsc">Tăng Dần</option>
                    <option value="priceDesc">Giảm Dần</option>
                    <option value="nameAsc">Sắp xếp A-Z</option>
                    <option value="nameDesc">Sắp xếp Z-A</option>
                </select>
            </label>
        </div>
        <ul class="store-grid">
            <li class="active"><i class="fa fa-th"></i></li>
            <li><a href="#"><i class="fa fa-th-list"></i></a></li>
        </ul>
    </div>
    <!-- /store top filter -->

    <!-- store products -->
    <div class="row">
        <!-- product -->
        <?php
        $category_id = isset($_GET["id"]) ? $_GET["id"] : 0;
        $brand_id = isset($_GET["brand"]) ? $_GET["brand"] : 0;
        ?>
        <?php foreach($data as $rows):
            ?>
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
        <?php endforeach; ?>
    </div>
    <!-- /store products -->

    <!-- store bottom filter -->
    <div class="store-filter clearfix">
        <ul class="pagination">
            <li class="page-item"><span>Trang</span></li>
            <?php for($i = 1; $i <= $numPage; $i++): ?>
                <li class="page-item"><a class="page-link" href="index.php?controller=products&action=category&id=<?php echo $category_id; ?>&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php endfor; ?>
        </ul>
    </div>
    <!-- /store bottom filter -->


