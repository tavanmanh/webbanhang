<?php

trait ImportModel
{
    //ham lay danh sach cac ban ghi co phan trang

    public function modelUpdate($id)
    {
        $amount = $_POST["amount"];
        //lay bien ket noi
        $conn = Connection::getInstance();
        //update du lieu tuong ung voi id truyen vao
        $conn->query("update products set amount=products.amount+$amount where id=$id");
    }
    public function updateImport($id)
    {
        $amount = $_POST["amount"];
        $timestamp = date('Y-m-d H:i:s');
        //lay bien ket noi
        $conn = Connection::getInstance();
        //update du lieu tuong ung voi id truyen vao
        $conn->query("insert into import set product_id=$id,amount=$amount,date='$timestamp'");
    }
    public function listProductImport($recordPerPage)
    {
        //lay bien p truyen tu url
        $p = isset($_GET["p"]) && is_numeric($_GET["p"]) && $_GET["p"] > 0 ? ($_GET["p"]-1) : 0;
        $startDate = isset($_GET["startDate"]) ? $_GET["startDate"] : null;
        $endDate = isset($_GET["endDate"]) ? $_GET["endDate"] : null;
        $dateQuery = $startDate ? "WHERE `date` BETWEEN '$startDate' AND '$endDate'" : '';
        //lay tu ban ghi nao
        $from = $p * $recordPerPage;
        //---
        //lay bien ket noi csdl
        $conn = Connection::getInstance();
        //thuc hien truy van
        $query = $conn->query("SELECT `import`.`id` AS `id`, `import`.`amount`, `import`.`date`, `products`.`name`, `products`.`description`, `products`.`photo`, `products`.`price`, `products`.`discount`, `products`.`content`, `products`.`hot` FROM `import` JOIN `products` ON `import`.`product_id`=`products`.`id` $dateQuery");
        //lay toan bo ket qua tra ve
        $result = $query->fetchAll();
        //---
        return $result;
    }

}

?>