<?php

trait OutputModel
{
    public function modelRead($recordPerPage){
        //lay bien p truyen tu url
        $p = isset($_GET["p"]) && is_numeric($_GET["p"]) && $_GET["p"] > 0 ? ($_GET["p"]-1) : 0;
        //lay tu ban ghi nao
        $startDate = isset($_GET["startDate"]) ? $_GET["startDate"] : null;
        $endDate = isset($_GET["endDate"]) ? $_GET["endDate"] : null;
        $dateQuery = $startDate ? "WHERE `date` BETWEEN '$startDate' AND '$endDate'" : '';
        //---
        //lay bien ket noi csdl
        $conn = Connection::getInstance();
        //thuc hien truy van
        $query = $conn->query("SELECT `orderdetails`.`id` AS `id`, `orderdetails`.`quantity`, `orderdetails`.`price`, `orders`.`date`, `products`.`name`, `products`.`description`, `products`.`photo`, `products`.`discount`, `products`.`content`, `products`.`hot` FROM `orderdetails` JOIN `products` ON `orderdetails`.`product_id`=`products`.`id` JOIN `orders` ON `orderdetails`.`order_id`=`orders`.`id` $dateQuery");
        //lay toan bo ket qua tra ve
        $result = $query->fetchAll();
        //---
        return $result;
    }
    //tinh tong so ban ghi
    public function totalRecord($recordPerPage){
        //lay bien ket noi
        $conn = Connection::getInstance();
        $query = $conn->query("SELECT `orderdetails`.`id` AS `id`, `orderdetails`.`quantity`, `orderdetails`.`price`, `orders`.`date`, `products`.`name`, `products`.`description`, `products`.`photo`, `products`.`discount`, `products`.`content`, `products`.`hot` FROM `orderdetails` JOIN `products` ON `orderdetails`.`product_id`=`products`.`id` JOIN `orders` ON `orderdetails`.`order_id`=`orders`.`id`");
        //tra ve tong so ban ghi
        return $query->rowCount();
    }
}

?>