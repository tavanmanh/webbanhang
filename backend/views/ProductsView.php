<!-- load file layout chung -->
<?php $this->layoutPath = "Layout.php"; ?>
<div class="col-md-12">
    <div style="margin-bottom:5px;">
        <a href="index.php?controller=products&action=create" class="btn btn-primary">Thêm sản phẩm</a>
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
                    <th style="width:150px;text-align: center">Danh mục</th>
                    <th style="width:150px;text-align: center">Nhãn hàng</th>
                    <th style="width:100px; text-align: center;">Sản phẩm hot</th>
                    <th style="width:100px; text-align: center;">Ngày Nhập</th>
                    <th style="width:100px;">Chỉnh sửa</th>
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
                    <td style="text-align: center;">
                        <?php echo $this->modelGetCategory($rows->category_id); ?>
                    </td>
                    <td style="text-align: center;">
                        <?php echo $this->modelGetBrand($rows->brand_id); ?>
                    </td>
                    <td style="text-align: center;">
                        <?php if($rows->hot == 1): ?>
                            <span class="fa fa-check"></span>
                        <?php endif; ?>
                    </td>  
                    <td style="text-align: center;">
                    <?php echo $rows->time; ?>
                    </td>                
                    <td style="text-align:center;">
                        <a href="index.php?controller=products&action=update&id=<?php echo $rows->id; ?>">Edit</a>&nbsp;
                        <a href="index.php?controller=products&action=delete&id=<?php echo $rows->id; ?>" onclick="return window.confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
            	<?php endforeach; ?>
            </table>
            <style type="text/css">
                .pagination{padding:0px; margin:0px;}
            </style>
            <div>
            	<ul class="pagination">
            		<li class="disabled"><a href="#">Page</a></li>
            		<?php for($i = 1; $i <= $numPage; $i++): ?>
            		<li><a href="index.php?controller=products&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            		<?php endfor; ?>
            	</ul>
            </div>
        </div>
    </div>
</div>