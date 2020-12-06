<?php
//include file model
include "models/OutputModel.php";
class OutputController extends Controller{
    use OutputModel;
    public function index(){
        $action = "index.php?controller=output&action=listProduct";
        $recordPerPage = 20;
        //tinh tong so trang
        $numPage = ceil($this->totalRecord($recordPerPage)/$recordPerPage);
        //lay du lieu tu model
        $data = $this->modelRead($recordPerPage);
        $this->loadView("Output.php", ["numPage"=>$numPage, "data"=>$data]);
    }
}
?>