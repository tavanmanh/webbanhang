<!-- load file layout chung -->
<?php $this->layoutPath = "Layout.php"; ?>
<?php
$p = isset($_GET["p"]) && is_numeric($_GET["p"]) && $_GET["p"] > 0 ? ($_GET["p"]-1) : 0;
$startDate = isset($_GET["startDate"]) ? $_GET["startDate"] : '';
$endDate = isset($_GET["endDate"]) ? $_GET["endDate"] : '';
?>
<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">Nhập sản phẩm</div>
        <div class="panel-body">
            <script type="text/javascript">
                function smartSearch() {
                    var key = document.getElementById('key').value;
                    if (key !== "") {
                        document.getElementById('smart-search-1').setAttribute("style", "display:block;");
                        //---
                        $.ajax({
                            url: "index.php?controller=search&action=smartSearch&key=" + key,
                            success: function (result) {
                                $("#smart-search-1 ul").empty();
                                $("#smart-search-1 ul").append(result);
                            }
                        });
                        //---
                    } else {
                        document.getElementById('smart-search-1').setAttribute("style", "display:none;");
                    }
                }

                function handleClickProduct(id) {
                    const name = document.getElementById(id).name
                    $("#idInput").val(id)
                    $('#smart-search-1 ul').empty()
                    $('#key').val(name)
                }

                //---
            </script>
            <form method="post" action="<?php echo $action; ?>">
                <!-- rows -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Tên sản phẩm</div>
                    <div class="col-md-10">
                        <input name="id" type="text" id="idInput" hidden>
                        <input type="text" onkeyup="smartSearch();"
                               value="<?php echo isset($record->name) ? $record->name : ''; ?>" id="key" name="name"
                               class="form-control" required>
                    </div>
                    <style type="text/css">
                        #smart-search-1 ul {
                            padding: 0px;
                            margin: 0px;
                            list-style: none;
                        }

                        #smart-search-1 ul li {
                            border-bottom: 1px solid #dddddd;
                        }

                        #smart-search-1 {
                            position: absolute;
                            width: 75%;
                            z-index: 1;
                            background: white;
                            display: none;
                        }
                    </style>
                </div>
                <div id="smart-search-1">
                    <ul>
                    </ul>
                </div>
                <!-- end rows -->
                <!-- rows -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Số lượng</div>
                    <div class="col-md-10">
                        <input type="number" value="<?php echo isset($record->email) ? $record->amount : ''; ?>"
                               name="amount" <?php if (isset($record->amount)): ?> disabled <?php else: ?> required <?php endif; ?>
                               class="form-control">
                    </div>
                </div>
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <input type="submit" value="Process" class="btn btn-primary">
                    </div>
                </div>
                <!-- end rows -->
            </form>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div>
        <label>Từ ngày</label>
        <input id="import-start-date" value="<?php echo $startDate?>" type="date">
        <label>Đến ngày</label>
        <input id="import-end-date" type="date" value="<?php echo $endDate?>">
        <button class="btn btn-primary" onclick="location.href = 'index.php?controller=import&startDate=' + document.getElementById('import-start-date').value + '&endDate=' + document.getElementById('import-end-date').value">Xem</button>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Danh sách sản phẩm</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th style="width: 100px;">Photo</th>
                    <th>Tên</th>
                    <th style="width: 100px;">Giá</th>
                    <th style="width: 100px;">Giảm giá</th>
                    <th style="width: 100px;">Số lượng</th>
<!--                    <th style="width:150px;text-align: center">Danh mục</th>-->
<!--                    <th style="width:150px;text-align: center">Nhãn hàng</th>-->
                    <th style="width:100px; text-align: center;">Sản phẩm hot</th>
                    <th style="width:100px; text-align: center;">Ngày Nhập</th>
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
                            <?php echo number_format($rows->price); ?>
                        </td>
                        <td style="text-align: center;">
                            <?php echo $rows->discount; ?> %
                        </td>
                        <td style="text-align: center;">
                            <?php echo $rows->amount; ?>
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