<?php 
	trait ProductsModel{
		//ham lay danh sach cac ban ghi co phan trang
		public function modelRead($category_id,$recordPerPage){
			//lay bien p truyen tu url
			$p = isset($_GET["p"]) && is_numeric($_GET["p"]) && $_GET["p"] > 0 ? ($_GET["p"]-1) : 0;			
			//lay tu ban ghi nao
			$from = $p * $recordPerPage;
			//---
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//---
			//sap xep cac ban ghi theo thu tu
			$orderBy = "order by products.id desc";
			$order = isset($_GET["order"]) ? $_GET["order"] : "";
			switch($order){
				case "priceAsc":
					$orderBy = "order by price asc ";
					break;
				case "priceDesc":
					$orderBy = "order by price desc ";
					break;
                case "nameAsc":
                    $orderBy = "order by products.name asc ";
                    break;
                case "nameDesc":
                    $orderBy = "order by products.name desc ";
                    break;
			}
			//thuc hien truy van
			$query = $conn->query("SELECT * FROM  products where category_id=$category_id $orderBy limit $from,$recordPerPage");
			//lay toan bo ket qua tra ve
			$result = $query->fetchAll();

			//---
			return $result;
		}
		public function totalRecord($category_id,$recordPerPage){
			//lay bien ket noi
            $conn = Connection::getInstance();
            $query = $conn->query("SELECT * FROM products WHERE category_id=$category_id");
            //tra ve tong so ban ghi
            return $query->rowCount();
		}
		public function modelGetRecord($id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where id=$id");
			//tra ve mot ban ghi
			return $query->fetch();
		}
		public function modelGetCategory($category_id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->query("select name from categories where id=$category_id");
			$result = $query->fetch();
			return isset($result->name) ? $result->name : "";
		}
		public function modelRating($product_id, $star){
			//insert ban ghi vao table rating
			//lay bien ket noi
			$conn = Connection::getInstance();
			$conn->query("insert into rating set product_id=$product_id, star=$star");
		}
		public function modelGetStar($product_id, $star){
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->query("select id from rating where product_id=$product_id and star=$star");

			//tra ve so luong ban ghi
			return $query->rowCount();
		}

        public function modelTopSelling1(){
            $conn = Connection::getInstance();
            $query = $conn->query("select * from products ORDER BY discount desc LIMIT 6 OFFSET 0");
            return $query->fetchAll();
        }

        public function modelNameCategory(){
            $conn = Connection::getInstance();
            $query = $conn->query("select * from categories where parent_id=0 ");
            return $query->fetchAll();
        }
        public function modelNameBrand(){
            $conn = Connection::getInstance();
            $query = $conn->query("select * from brand ");
            return $query->fetchAll();
        }
        public function modelFilterByNameBrand($brand_id){
            $conn = Connection::getInstance();
            $query = $conn->query("SELECT * FROM `products` WHERE brand_id=$brand_id order by rand() LIMIT 4");
            return $query->fetchAll();
        }
        public function modelReladedProduct($category_id){
            $conn = Connection::getInstance();
            $query = $conn->query("SELECT * FROM products WHERE products.category_id=$category_id order by rand() LIMIT 4");
            return $query->fetchAll();
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