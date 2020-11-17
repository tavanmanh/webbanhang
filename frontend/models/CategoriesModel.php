<?php 
	trait CategoriesModel{
		//liet ke cac danh muc cap cha
		public function modelListCategories(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from categories order by id desc");
			return $query->fetchAll();
		}
		//liet ke cac danh muc cap con
		public function modelListCategoriesSub($category_id){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from brand order by id desc");
			return $query->fetchAll();
		}
	}
 ?>