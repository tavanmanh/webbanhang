<?php 
	include "models/CartModel.php";
	class CartController extends Controller{
		use CartModel;
		//ham tao
		public function __construct(){
			//kiem tra neu gio hang chua ton tai thi khoi tao no
			if(!isset($_SESSION["cart"]))
				$_SESSION["cart"] = array();
		}
		//ham hien thi gio hang
		public function index(){
			$this->loadView("CartView.php");
		}
        public function checkoutView(){
            $products = array();
            $error = "";
            foreach($_SESSION["cart"] as $rows){
                $product_id = $rows["id"];
                $isValid = $this->checkProduct($product_id, $rows["number"]);
                if (!$isValid) {
                    array_push($products, $product_id);
                    $error = "lack";
                }
            }
            if ($error) {
                $product_error = join(" ", $products);
                header("location:index.php?controller=cart&product=$product_error&error=$error");
            } else {
                //quay lai trang gio hang
                $this->loadView("CheckOutView.php");
            }

        }
		//them san pham vao gio hang
		public function create(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//goi ham cartAdd tu model de them phan tu vao session array
			$this->cartAdd($id);
			//quay lai trang gio hang
			header("location:index.php?controller=cart");
		}
		//them san pham vao gio hang
		public function createWithNumber(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			$quantity = isset($_GET["quantity"]) ? $_GET["quantity"] : 0;
			//goi ham cartAdd tu model de them phan tu vao session array
			$this->cartAddWithNumber($id,$quantity);
			//quay lai trang gio hang
			header("location:index.php?controller=cart");
		}
		//xoa phan tu khoi gio hang
		public function delete(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//goi ham cartDelete tu model de xoa phan tu khoi session array
			$this->cartDelete($id);
			//quay lai trang gio hang
			header("location:index.php?controller=cart");
		}
		//update so luong san pham trong gio hang
		public function update(){
		    $products = array();
            $error = "";
            $test = "";
			foreach($_SESSION["cart"] as $rows){
				$product_id = $rows["id"];
				$quantity = $_POST["product_$product_id"];
                $isValid = $this->checkProduct($product_id, $quantity);
                $test = $isValid;
                if ($isValid) {
                    //goi ham update so luong san pham
                    $this->cartUpdate($product_id,$quantity);
                } else {
                    array_push($products, $product_id);
                    $error = "lack";
                }
			}
			if ($error) {
			    $product_error = join(" ", $products);
                header("location:index.php?controller=cart&product=$product_error&error=$error");
            } else {
                //quay lai trang gio hang
                header("location:index.php?controller=cart&test=$test");
            }
		}
		//thanh toan gio hang
		public function checkOut(){
			//kiem tra neu user chua dang nhap thi di chuyen den trang login, nguoc lai thi thanh toan gio hang
			if(!isset($_SESSION["customer_id"]))
				header("location:index.php?controller=account&action=login");
			else{
				$result = $this->cartCheckOut();
				if ($result == true) {
                    header("location:index.php?controller=account&action=notify&message=checkOutSuccess");
                }
            }
		}

		//xoa gio hang
		public function destroy(){
			$this->cartDestroy();
			//quay lai trang gio hang
			header("location:index.php?controller=cart");
		}
	}

 ?>