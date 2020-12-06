<?php
//include file model
include "models/SearchModel.php";
class SearchController extends Controller{
    //su dung file model o day
    use SearchModel;
    //ham tao
    public function __construct(){
    }
    //hien thi danh sach cac ban ghi co phan trang
    public function productName(){
        $key = isset($_GET["key"]) ? $_GET["key"] : "";
        //dinh nghia so ban ghi tren mot trang
        $recordPerPage = 5;
        //tinh tong so trang
        $numPage = ceil($this->totalRecordSearchProductName($key,$recordPerPage)/$recordPerPage);
        //lay du lieu tu model
        $data = $this->modelReadSearchProductName($key,$recordPerPage);
        //load view, truyen du lieu ra view
        $this->loadView("SearchProductNameView.php",["data"=>$data,"numPage"=>$numPage]);
    }
    public function productPrice(){
        $categoryId = isset($_GET["id"]) ? $_GET["id"] : 0;
        $fromPrice = isset($_GET["fromPrice"]) ? $_GET["fromPrice"] : 0;
        $toPrice = isset($_GET["toPrice"]) ? $_GET["toPrice"] : 0;
        $key = isset($_GET["key"]) ? $_GET["key"] : '';
        //dinh nghia so ban ghi tren mot trang
        $recordPerPage = 9;
        //tinh tong so trang
        $numPage = ceil($this->totalRecordSearchProductPrice($categoryId, $fromPrice,$toPrice, $key, $recordPerPage)/$recordPerPage);
        //lay du lieu tu model
        $data = $this->modelReadSearchProductPrice($categoryId, $fromPrice,$toPrice, $key, $recordPerPage);
        //load view, truyen du lieu ra view
        $this->loadView("SearchProductPriceView.php",["data"=>$data,"numPage"=>$numPage]);
    }
    public function productBrand(){
        $categoryId = isset($_GET["id"]) ? $_GET["id"] : 0;
        $brandId = isset($_GET["brandId"]) ? $_GET["brandId"] : 0;
        $fromPrice = isset($_GET["fromPrice"]) ? $_GET["fromPrice"] : 0;
        $toPrice = isset($_GET["toPrice"]) ? $_GET["toPrice"] : 0;
        $key = isset($_GET["key"]) ? $_GET["key"] : 0;

        //dinh nghia so ban ghi tren mot trang
        $recordPerPage = 9;
        //tinh tong so trang
        $numPage = ceil($this->totalRecordSearchProductBrand($categoryId, $fromPrice, $toPrice, $brandId, $key, $recordPerPage)/$recordPerPage);
        //lay du lieu tu model
        $data = $this->modelReadSearchProductBrand($categoryId, $fromPrice, $toPrice, $brandId, $key, $recordPerPage);
        //load view, truyen du lieu ra view
        $this->loadView("SearchProductBrandView.php",["data"=>$data,"numPage"=>$numPage]);
    }
    public function smartSearch(){
        $key = isset($_GET["key"]) ? $_GET["key"] : "";
        $data = $this->modelSmartSearch($key);
        foreach($data as $rows){
            echo "<li onclick='handleClickProduct($rows->id)'><img style='width:100px;' src='../assets/upload/products/$rows->photo'> <a name='$rows->name' id='$rows->id'>$rows->name</a></li>";
        }
    }
}
?>