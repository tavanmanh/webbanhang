<?php
trait ImportModel{
    //ham lay danh sach cac ban ghi co phan trang
    public function smartSearch(){
        $key = isset($_GET["key"]) ? $_GET["key"] : "";
        $data = $this->modelSmartSearch($key);
        foreach($data as $rows){
            echo "<li><img style='width:100px;' src='../assets/upload/products/$rows->photo'> <a href='index.php?controller=products&action=detail&id=$rows->id'>$rows->name</a></li>";
        }
    }
    public function modelSmartSearch($key){
        //lay bien ket noi
        $conn = Connection::getInstance();
        $query = $conn->query("select id,name,photo,price from products where name like '%$key%'");
        return $query->fetchAll();
    }

}
?>