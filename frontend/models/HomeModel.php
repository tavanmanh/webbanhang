<?php 
	trait HomeModel{
		//lay 6 san pham noi bat
		public function modelRanDomLaptop(){
			$conn = Connection::getInstance();
			$query = $conn->query("SELECT * FROM products WHERE category_id=1 order by rand()");
			return $query->fetch();
		}		
		//hien thi cac danh muc co truong displayhome=1
		public function modelRanDomCamera(){
			$conn = Connection::getInstance();
			$query = $conn->query("SELECT * FROM products WHERE category_id=6 order by rand()");
			return $query->fetch();
		}		
		//lay 6 san pham thuoc danh muc co id truyen vao
		public function modelRanDomPhone(){
			$conn = Connection::getInstance();
			$query = $conn->query("SELECT * FROM products WHERE category_id=4 order by rand()");
			return $query->fetch();
		}	
		//lay 6 tin tuc noi bat
		public function modelNewProduct(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products order by time desc limit 0,6");
			return $query->fetchAll();
		}
		public function modelBigSale(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products ORDER BY discount desc limit 0,6");
			return $query->fetchAll();
		}
		public function modelTopSelling1(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products ORDER BY discount desc LIMIT 3 OFFSET 0");
			return $query->fetchAll();
		}
		public function modelTopSelling2(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products ORDER BY discount desc LIMIT 3 OFFSET 3");
			return $query->fetchAll();
		}
		public function modelTopSelling3(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products ORDER BY discount desc LIMIT 3 OFFSET 6");
			return $query->fetchAll();
		}
		//tinh tong so sao trung binh tuong ung voi tung san pham
		public function modelTotalRating($product_id){
			$conn = Connection::getInstance();
			//tinh tong cac cot star cua table rating tuong ung voi id truyen vao
			$query1 = $conn->query("select sum(star) as sumStar from rating where product_id=$product_id");
			$result1 = $query1->fetch();
			$sumStar = isset($result1->sumStar) ? $result1->sumStar : 0;
			//tinh so luong cac ban ghi cua taable rating tuong ung voi id truyen vao
			$query2 = $conn->query("select id from rating where product_id=$product_id");
			$totalRecord = $query2->rowCount();
			if($totalRecord >0){
				$avgStar = ceil($sumStar/($totalRecord));
				return $avgStar;
			}
			return 0;
		}

	}
 ?>