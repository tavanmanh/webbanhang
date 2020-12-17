<!-- load file layout chung -->
<?php $this->layoutPath = "LayoutTrangChu.php"; ?>àng
<?php
$error = isset($_GET["error"]) ? $_GET["error"] : null;
$product_str = isset($_GET["product"]) ? $_GET["product"] : null;
$products = explode(" ", $product_str);
?>
<style>
    .danger {
        color: red;
        margin-top: 36px;
        padding: 5px;
        position: absolute;
        width: 150px;
    }
</style>
<?php if($this->cartNumber() > 0): ?>
    <div class="template-cart" style="width: 60%;margin: auto">
        <form action="index.php?controller=cart&action=update" method="post">
            <div class="table-responsive">
                <table class="table table-cart">
                    <thead>
                    <tr>
                        <th class="image">Ảnh sản phẩm</th>
                        <th class="name">Tên sản phẩm</th>
                        <th class="price">Giá bán lẻ</th>
                        <th class="quantity">Số lượng</th>
                        <th class="price">Thành tiền</th>
                        <th>Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($_SESSION["cart"] as $rows): ?>
                        <tr>
                            <td><img src="../assets/upload/products/<?php echo $rows["photo"] ?>" class="img-responsive" /></td>
                            <td>
                                <div>
                                    <div>
                                        <a href="index.php?controller=products&action=detail&id=<?php echo $rows["id"]; ?>"><?php echo $rows["name"] ?></a>
                                    </div>
                                </div>
                            </td>
                            <td> <?php echo number_format($rows["price"]-($rows["discount"]*$rows["price"]/100)); ?>₫ </td>
                            <td>
                                <input type="number" id="qty" min="1" class="input-control" value="<?php echo $rows["number"] ?>" name="product_<?php echo $rows["id"] ?>" required="Không thể để trống">
                                <div>
                                    <div class="danger"><?php if ($error=='lack' && in_array($rows['id'], $products)) echo 'Sản phẩm tạm thời hết hàng' ?></div>
                                </div>
                            </td>
                            <td><p><b><?php echo number_format($rows["number"]*($rows["price"]-($rows["discount"]*$rows["price"]/100))); ?>₫</b></p></td>
                            <td><a href="index.php?controller=cart&action=delete&id=<?php echo $rows["id"]; ?>" data-id="2479395"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="6"><a href="index.php?controller=cart&action=destroy" class="button pull-left">Xóa toàn bộ</a> <a href="index.php" class="button pull-right black">Tiếp tục mua hàng</a>
                            <input type="submit" class="button pull-right" value="Cập nhật"></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </form>
        <div class="total-cart" style="margin-bottom: 20px"> Tổng tiền thanh toán:
            <?php echo number_format($this->cartTotal()); ?>₫ <br>
            <?php if (!$error): ?>
            <a href="index.php?controller=cart&action=checkoutView" class="button black"">Thanh toán</a> </div>
            <?php else: ?>
        <button class="button black" onclick="alert('Không thể thanh toán do sản phẩm đã hết hàng')">Thanh toán</button> </div>
            <?php endif; ?>
    </div>
<?php endif; ?>