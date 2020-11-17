<!-- load file layout chung -->
<?php $this->layoutPath = "Layout.php"; ?>
<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">List Categories</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Name</th>
                </tr>
                <?php foreach($data as $rows): ?>
                <tr>
                    <td><?php echo $rows->name; ?></td>
                </tr>
                    <?php 
                        //lay cac danh muc con thuoc danh muc nay
                        $dataSub = $this->modelReadSubCategories($rows->id);
                     ?>
                     <?php foreach($dataSub as $rowsSub): ?>
                        <tr>
                            <td style="padding-left: 30px;"><?php echo $rowsSub->name; ?></td>
                        </tr>
                     <?php endforeach; ?>
            	<?php endforeach; ?>
            </table>
            <style type="text/css">
                .pagination{padding:0px; margin:0px;}
            </style>
            <div>
            	<ul class="pagination">
            		<li class="disabled"><a href="#">Page</a></li>
            		<?php for($i = 1; $i <= $numPage; $i++): ?>
            		<li><a href="index.php?controller=categories&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            		<?php endfor; ?>
            	</ul>
            </div>
        </div>
    </div>
</div>