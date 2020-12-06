<?php 
	trait SearchModel{
		//ham lay danh sach cac ban ghi co phan trang
        public function modelReadSearchProductName($key,$recordPerPage){
            //lay bien p truyen tu url
            $p = isset($_GET["p"]) && is_numeric($_GET["p"]) && $_GET["p"] > 0 ? ($_GET["p"]-1) : 0;
            //lay tu ban ghi nao
            $from = $p * $recordPerPage;
            //---
            //lay bien ket noi csdl
            $conn = Connection::getInstance();
            //thuc hien truy van
            $query = $conn->query("select * from products where name like '%$key%' order by id desc limit $from, $recordPerPage");
            //lay toan bo ket qua tra ve
            //---
            return $query->fetchAll();
        }
        //tinh tong so ban ghi
        public function totalRecordSearchProductName($key,$recordPerPage){
            //lay bien ket noi
            $conn = Connection::getInstance();
            $query = $conn->query("select id from products where name like '%$key%'");
            //tra ve tong so ban ghi
            return $query->rowCount();
        }
        //ham lay danh sach cac ban ghi co phan trang
        public function modelReadSearchProductPrice($id, $fromPrice,$toPrice, $key, $recordPerPage){
            //lay bien p truyen tu url
            $p = isset($_GET["p"]) && is_numeric($_GET["p"]) && $_GET["p"] > 0 ? ($_GET["p"]-1) : 0;
            //lay tu ban ghi nao
            $from = $p * $recordPerPage;
            //---
            //lay bien ket noi csdl
            $filterCategory = '';
            $filterName = '';
            $conn = Connection::getInstance();
            if (isset($_GET["key"])) $filterName="and name like '%$key%'";
            if (isset($_GET["id"])) $filterCategory="and category_id = $id";
            //thuc hien truy van
            $query = $conn->query("select * from products where price >= $fromPrice*1000000 and price <= $toPrice*1000000 $filterCategory $filterName order by id desc limit $from,$recordPerPage");
            //lay toan bo ket qua tra ve
            $result = $query->fetchAll();
            //---
            return $result;
        }
        //tinh tong so ban ghi
        public function totalRecordSearchProductPrice($id, $fromPrice,$toPrice,$key, $recordPerPage){
            //lay bien ket noi
            $conn = Connection::getInstance();
            $filterCategory = '';
            $filterName = '';
            if (isset($_GET["id"])) $filterCategory="and category_id = $id";
            if (isset($_GET["key"])) $filterName="and name like '%$key%'";
            $query = $conn->query("select id from products where price >= $fromPrice*1000000 and price <= $toPrice*1000000 $filterCategory $filterName");
            //tra ve tong so ban ghi
            return $query->rowCount();
        }

        public function modelReadSearchProductBrand($id, $fromPrice,$toPrice,$brandId,$key, $recordPerPage){
            $conn = Connection::getInstance();

            $p = isset($_GET["p"]) && is_numeric($_GET["p"]) && $_GET["p"] > 0 ? ($_GET["p"]-1) : 0;
            //lay tu ban ghi nao
            $from = $p * $recordPerPage;

            $filterPrice = '';
            $filterCategory = '';
            $filterName = '';

            $fromPrice = $fromPrice * 1000000;
            $toPrice = $toPrice * 1000000;
            if (isset($_GET["id"])) $filterCategory="and category_id = $id";
            if (isset($_GET["key"])) $filterName="and name like '%$key%'";
            if (isset($_GET["fromPrice"])) $filterPrice="and price >= $fromPrice and price <= $toPrice";
            $query = $conn->query("SELECT * FROM `products` WHERE brand_id=$brandId $filterPrice $filterCategory $filterName  order by id desc LIMIT $from,$recordPerPage");
            return $query->fetchAll();
        }
        public function totalRecordSearchProductBrand($id, $fromPrice,$toPrice,$brandId, $key, $recordPerPage){
            //lay bien ket noi
            $conn = Connection::getInstance();
            $filterPrice = '';
            $filterCategory = '';
            $filterName = '';
            $fromPrice = $fromPrice * 1000000;
            $toPrice = $toPrice * 1000000;
            if (isset($_GET["fromPrice"])) $filterPrice="and price >= $fromPrice and price <= $toPrice";
            if (isset($_GET["id"])) $filterCategory="and category_id = $id";
            if (isset($_GET["key"])) $filterName="and name like '%$key%'";
            $query = $conn->query("select id from products where brand_id = $brandId $filterPrice $filterCategory $filterName");
            //tra ve tong so ban ghi
            return $query->rowCount();
        }

        public function modelSmartSearch($key){
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->query("select id,name,photo,price from products where name like '%$key%' limit 0,6");
			return $query->fetchAll();
		}
        public function modelNameBrand(){
            $conn = Connection::getInstance();
            $query = $conn->query("select * from brand ");
            return $query->fetchAll();
        }
        public function modelTopSelling1(){
            $conn = Connection::getInstance();
            $query = $conn->query("select * from products ORDER BY discount desc limit 0,6");
            return $query->fetchAll();
        }
        public function modelGetCategory($category_id){
            //lay bien ket noi
            $conn = Connection::getInstance();
            $query = $conn->query("select name from categories where id=$category_id");
            $result = $query->fetch();
            return isset($result->name) ? $result->name : "";
        }
        public function modelTotalRating($product_id){
            $conn = Connection::getInstance();
            //tinh tong cac cot star cua table rating tuong ung voi id truyen vao
            $query1 = $conn->query("select sum(star) as sumStar from rating where product_id=$product_id");
            $result1 = $query1->fetch();
            $sumStar = isset($result1->sumStar) ? $result1->sumStar : 0;
            //tinh so luong cac ban ghi cua taable rating tuong ung voi id truyen vao
            $query2 = $conn->query("select id from rating where product_id=$product_id");
            $totalRecord = $query2->rowCount();
            if($totalRecord > 0){
                $avgStar = ceil($sumStar/($totalRecord));
                return $avgStar;
            }
            else{
                return 5;
            }
            return 0;
        }
	}
 ?>