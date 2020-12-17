<?php
	trait CartModel{		
		public function cartAdd($id){
		    if(isset($_SESSION['cart'][$id])){
		        //nếu đã có sp trong giỏ hàng thì số lượng lên 1
		        $_SESSION['cart'][$id]['number']++;
		    } else {
		        //lấy thông tin sản phẩm từ CSDL và lưu vào giỏ hàng
		        //$product = db::get_one("select * from products where id=$id");
		        //---
		        //PDO
		        $conn = Connection::getInstance();
		        $query = $conn->prepare("select * from products where id=:id");
		        $query->execute(array("id"=>$id));
		        $query->setFetchMode(PDO::FETCH_OBJ);
		        $product = $query->fetch();
		        //---
		        
		        $_SESSION['cart'][$id] = array(
		            'id' => $id,
		            'name' => $product->name,
		            'photo' => $product->photo,
		            'number' => 1,
		            'price' => $product->price,
		            'discount' => $product->discount
		        );
		    }
		}
		public function cartAddWithNumber($id,$quantity){
		    if(isset($_SESSION['cart'][$id])){
		        //nếu đã có sp trong giỏ hàng thì số lượng lên 1
		        $_SESSION['cart'][$id]['number'] += $quantity;
		    } else {
		        //lấy thông tin sản phẩm từ CSDL và lưu vào giỏ hàng
		        //$product = db::get_one("select * from products where id=$id");
		        //---
		        //PDO
		        $conn = Connection::getInstance();
		        $query = $conn->prepare("select * from products where id=:id");
		        $query->execute(array("id"=>$id));
		        $query->setFetchMode(PDO::FETCH_OBJ);
		        $product = $query->fetch();
		        //---
		        
		        $_SESSION['cart'][$id] = array(
		            'id' => $id,
		            'name' => $product->name,
		            'photo' => $product->photo,
		            'number' => $quantity,
		            'price' => $product->price,
		            'discount' => $product->discount
		        );
		    }
		}
		/**
		 * Cập nhật số lượng sản phẩm
		 * @param int
		 * @param int
		 */
		public function cartUpdate($id, $number){
		    if($number==0){
		        //xóa sp ra khỏi giỏ hàng
		        unset($_SESSION['cart'][$id]);
		    } else {
		        $_SESSION['cart'][$id]['number'] = $number;
		    }
		}

        public function checkProduct($product_id, $number){
            $conn = Connection::getInstance();
            //tinh tong cac cot star cua table rating tuong ung voi id truyen vao
            $query = $conn->query("select amount from products where id=$product_id");
            $product_amount = $query->fetch()->amount;
            return $product_amount >= $number;
        }

		/**
		 * Xóa sản phẩm ra khỏi giỏ hàng
		 * @param int
		 */
		public function cartDelete($id){
		    unset($_SESSION['cart'][$id]);
		}
		/**
		 * Tổng giá trị giỏ hàng
		 */
		public function cartTotal(){
		    $total = 0;
		    foreach($_SESSION['cart'] as $product){
		        $total += ($product['price']-$product['price']*$product['discount']/100) * $product['number'];
		    }
		    return $total;
		}
		/**
		 * Số sản phẩm có trong giỏ hàng
		 */
		public function cartNumber(){
		    $number = 0;
		    foreach($_SESSION['cart'] as $product){
		        $number += $product['number'];
		    }
		    return $number;
		}
		/**
		 * Danh sách sản phẩm trong giỏ hàng
		 */
		public function cartList(){
		    return $_SESSION['cart'];
		}
		/**
		 * Xóa giỏ hàng
		 */
		public function cartDestroy(){
		    $_SESSION['cart'] = array();
		}
		//=============
		//checkout
		public function cartCheckOut(){
		    try{
                $name = $_POST["name"];
                $email = $_POST["email"];
                $address = $_POST["address"];
                $phone = $_POST["phone"];
                $note = $_POST["note"];
                $conn = Connection::getInstance();
                //lay id vua moi insert
                $customer_id = $_SESSION["customer_id"];
                //---
                //---
                //insert ban ghi vao orders, lay order_id vua moi insert
                //lay tong gia cua gio hang
                $price = $this->cartTotal();
                $query = $conn->prepare("insert into orders(customer_id,date,price,address,name,Note,mail,phone) VALUE ($customer_id, now(),$price,\"$address\",\"$name\",\"$note\",\"$email\",\"$phone\")");
                $query->execute();
                //lay id vua moi insert
                $order_id = $conn->lastInsertId();
                //---
                //duyet cac ban ghi trong session array de insert vao orderdetails
                foreach($_SESSION["cart"] as $product){
                    $query = $conn->prepare("insert into orderdetails set order_id=:order_id, product_id=:product_id, price=:price, quantity=:quantity");
                    $query->execute(array("order_id"=>$order_id,"product_id"=>$product["id"],"price"=>$product["price"],"quantity"=>$product["number"]));
                }
                //xoa gio hang
                unset($_SESSION["cart"]);
                return true;
            } catch (Exception $e){
                return false;
            }

        }
		//=============
	}	
?>