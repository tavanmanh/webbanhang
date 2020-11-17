<!-- load file layout chung -->
<?php $this->layoutPath = "Layout.php"; ?>
<div class="col-md-12">
    <?php if(isset($_GET["notify"]) && $_GET["notify"] == "emailExists"): ?>
        <!-- <div class="alert alert-warning">Email đã tồn tại</div> -->
        <script type="text/javascript">alert('Email đã tồn tại!');</script>
    <?php endif; ?>
    <div class="panel panel-primary">
        <div class="panel-heading">Nhập sản phẩm</div>
        <div class="panel-body">
            <script type="text/javascript">
                function search(){
                    var key = document.getElementById('key').value;
                    //di chuyen den trang search
                    location.href="index.php?controller=search&action=productName&key="+key;
                }
                //---
                function smartSearch(){
                    var key = document.getElementById('key').value;
                    if(key != ""){
                        document.getElementById('smart-search').setAttribute("style","display:block;");
                        //---
                        $.ajax({
                            url: "index.php?controller=search&action=smartSearch&key="+key,
                            success: function( result ) {
                                $( "#smart-search ul" ).empty();
                                $( "#smart-search ul" ).append(result);
                            }
                        });
                        //---
                    }else{
                        document.getElementById('smart-search').setAttribute("style","display:none;");
                    }
                }
                //---
            </script>
            <form method="post" action="<?php echo $action; ?>">
                <!-- rows -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Tên sản phẩm</div>
                    <div class="col-md-10">
                        <input type="text" onkeyup ="smartSearch();"value="<?php echo isset($record->name) ? $record->name:''; ?>" id="key" name="name" class="form-control" required>
                    </div>
                    <style type="text/css">
                        #smart-search ul{padding:0px; margin:0px; list-style: none;}
                        #smart-search ul li{border-bottom: 1px solid #dddddd;}
                        #smart-search{position: absolute; width: 75%; z-index: 1; background: white; display: none;}
                    </style>
                    <div id="smart-search">
                        <ul >
                        </ul>
                    </div>
                </div>
                <!-- end rows -->
                <!-- rows -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Số lượng</div>
                    <div class="col-md-10">
                        <input type="email" value="<?php echo isset($record->email) ? $record->email : ''; ?>" name="email" <?php if(isset($record->email)): ?> disabled <?php else: ?> required <?php endif; ?> class="form-control">
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