<?php
//include file model
include "models/ImportModel.php";
class ImportController extends Controller{
    use ImportModel;
    public function index(){
        $this->loadView("Import.php");
    }
}
?>