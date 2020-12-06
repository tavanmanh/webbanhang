<?php $this->layoutPath = "LayoutTrangChu.php"; ?>
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-7">
                <!-- Billing Details -->
                <form method='post' action="index.php?controller=cart&action=checkOut">
                <div class="billing-details">
                    <div class="section-title">
                        <h3 class="title">Địa chỉ thanh toán</h3>
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="name" placeholder="Họ Và Tên" required="">
                    </div>
                    <div class="form-group">
                        <input class="input" type="email" name="email" placeholder="Email" required="">
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="address" placeholder="Địa chỉ" required="">
                    </div>
                    <div class="form-group">
                        <input class="input" type="tel" name="phone" placeholder="Số điện thoại" required="">
                    </div>
                </div>
                <!-- /Billing Details -->

                <!-- Shiping Details -->
                <!-- /Shiping Details -->

                <!-- Order notes -->
                <div class="order-notes">
                    <textarea class="input" name="note" placeholder="Ghi Chú"></textarea>
                </div>
                <!-- /Order notes -->

            </div>

            <!-- Order Details -->
            <div class="col-md-5 order-details">
                <div class="section-title text-center">
                    <h3 class="title">Sản Phẩm của bạn</h3>
                </div>
                <div class="order-summary">
                    <div class="order-col">
                        <div><strong>Sản Phẩm</strong></div>
                        <div><strong>Giá</strong></div>
                    </div>
                    <div class="order-products">
                        <?php foreach($_SESSION["cart"] as $rows): ?>
                            <div class="order-col">
                                <div><?php echo $rows["name"] ?></div>
                                <div><?php echo number_format($rows["price"]-($rows["discount"]*$rows["price"]/100)); ?>₫</div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="order-col">
                        <div>Shiping</div>
                        <div><strong>FREE</strong></div>
                    </div>
                    <div class="order-col">
                        <div><strong>TỔNG</strong></div>
                        <div><strong class="order-total"><?php echo number_format($this->cartTotal()); ?>₫</strong></div>
                    </div>
                </div>
                <div class="payment-method">
                    <div class="input-radio">
                        <input type="radio" name="payment" id="payment-1">
                        <label for="payment-1">
                            <span></span>
                            Thanh toán trực tuyến
                        </label>
                    </div>
                    <div class="input-radio">
                        <input type="radio" name="payment" id="payment-2">
                        <label for="payment-2">
                            <span></span>
                            Thanh toán khi nhận hàng
                        </label>
                    </div>
                </div>
                <input type="submit" class="button" value="Thanh toán">
                </form>
            </div>
            <!-- /Order Details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>