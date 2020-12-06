<?php
//include file model
include "models/ImportModel.php";
class ImportController extends Controller{
    use ImportModel;
    public function index(){
        $action = "index.php?controller=import&action=importAmount";
        //dinh nghia so ban ghi tren mot trang
        $recordPerPage = 10;
        //tinh tong so trang
//        $numPage = ceil($this->totalRecord()/$recordPerPage);
        //lay du lieu tu model
        $data = $this->listProductImport($recordPerPage);
        $this->loadView("Import.php", ["action"=>$action, "data"=>$data]);
    }
//    public function Import(){
//        //tao bien $action de dua vao thuoc tinh action cua form
//        $action = "index.php?controller=import&action=importAmount";
//        //goi view, truyen du lieu ra view
//        $this->loadView("Import.php",["action"=>$action]);
//    }
    public function importAmount(){
        //goi ham tu model de create du lieu
        $id = isset($_POST["id"]) ? $_POST["id"] : 0;
        $this->modelUpdate($id);
        $this->updateImport($id);
            //di chuyen den url
        header("location:index.php?controller=import");
    }
}
?>