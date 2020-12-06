<?php $this->layoutPath = "Layout.php"; ?>
<?php
$p = isset($_GET["p"]) && is_numeric($_GET["p"]) && $_GET["p"] > 0 ? ($_GET["p"]-1) : 0;
$startDate = isset($_GET["startDate"]) ? $_GET["startDate"] : '';
$endDate = isset($_GET["endDate"]) ? $_GET["endDate"] : '';
?>
<div class="col-md-12">
    <div>
        <label>Từ ngày</label>
        <input id="output-start-date" value="<?php echo $startDate?>" type="date">
        <label>Đến ngày</label>
        <input id="output-end-date" type="date" value="<?php echo $endDate?>">
        <button class="btn btn-primary" onclick="location.href = 'index.php?controller=output&startDate=' + document.getElementById('output-start-date').value + '&endDate=' + document.getElementById('output-end-date').value">Xem</button>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Danh sách sản phẩm</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th style="width: 100px;">Photo</th>
                    <th>Tên</th>
                    <th style="width: 100px;">Số lượng</th>
                    <th style="width: 100px;">Giá</th>
                    <!--                    <th style="width:150px;text-align: center">Danh mục</th>-->
                    <!--                    <th style="width:150px;text-align: center">Nhãn hàng</th>-->
                    <th style="width:100px; text-align: center;">Sản phẩm hot</th>
                    <th style="width:100px; text-align: center;">Ngày bán</th>
                </tr>
                <?php foreach($data as $rows): ?>
                    <tr>
                        <td style="text-align: center;">
                            <?php if($rows->photo != "" && file_exists("../assets/upload/products/".$rows->photo)): ?>
                                <img src="../assets/upload/products/<?php echo $rows->photo; ?>" style="width:100px;">
                            <?php endif; ?>
                        </td>
                        <td><?php echo $rows->name; ?></td>
                        <td style="text-align: center;">
                            <?php echo $rows->quantity; ?>
                        </td>
                        <td style="text-align: center;">
                            <?php echo number_format($rows->price); ?>
                        </td>

                        <!--                        <td style="text-align: center;">-->
                        <!--                            --><?php //echo $this->modelGetCategory($rows->category_id); ?>
                        <!--                        </td>-->
                        <!--                        <td style="text-align: center;">-->
                        <!--                            --><?php //echo $this->modelGetBrand($rows->brand_id); ?>
                        <!--                        </td>-->
                        <td style="text-align: center;">
                            <?php if($rows->hot == 1): ?>
                                <span class="fa fa-check"></span>
                            <?php endif; ?>
                        </td>
                        <td style="text-align: center;">
                            <?php echo $rows->date; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <!--            <style type="text/css">-->
            <!--                .pagination{padding:0px; margin:0px;}-->
            <!--            </style>-->
            <!--            <div>-->
            <!--                <ul class="pagination">-->
            <!--                    <li class="disabled"><a href="#">Page</a></li>-->
            <!--                    --><?php //for($i = 1; $i <= $numPage; $i++): ?>
            <!--                        <li><a href="index.php?controller=products&p=--><?php //echo $i; ?><!--">--><?php //echo $i; ?><!--</a></li>-->
            <!--                    --><?php //endfor; ?>
            <!--                </ul>-->
            <!--            </div>-->
        </div>
    </div>
</div>
