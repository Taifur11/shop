<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

?>

<?php

class Cart{
	
	private $db;
	private $fm;
	
	
	public function __construct(){
		$this->db=new Database();
		$this->fm=new Format();
		
	}
	
	public function addToCart($quantity,$proid){
		
		$quantity = $this->fm->validation($quantity);
		$quantity = mysqli_real_escape_string($this->db->link,$quantity);
		
		$proid = $this->fm->validation($proid);
		$proid = mysqli_real_escape_string($this->db->link,$proid);
		
		$sesnid=session_id();
		
		$query="SELECT * FROM tbl_product WHERE productid='$proid';";
		$result=$this->db->select($query)->fetch_assoc();
		
		$productname=$result['productname'];
		$image=$result['image'];
		$price=$result['price'];
		
		$chquery="SELECT * FROM tbl_cart WHERE productid='$proid' AND sesnid='$sesnid';";
		$result=$this->db->select($chquery);
		if($result){
			$msg = "<span style='color:blue;'>Product Already Added To Cart!!!!.....
			</span>";
			return $msg;
		}else{
		$query="INSERT INTO tbl_cart
		
		(productid,productname,sesnid,price,quantity,image) 
		
				  VALUES
				  
		('$proid','$productname','$sesnid','$price','$quantity','$image');";
		
		$inserted_rows = $this->db->insert($query);
		
		if ($inserted_rows) {
		header('Location:cart.php');
		}else {
		 header('Location:deatils.php');
		}
		
		}
	}
	
	
	public function showCart(){
		$sesnid=session_id();
		$query="SELECT * FROM tbl_cart WHERE sesnid='$sesnid';";
		$result=$this->db->select($query);
		return $result;
	}
	
	public function updateCartQuantity($quantity,$cartid){
		$query="UPDATE tbl_cart
								SET
								quantity='$quantity'
								WHERE
								cartid='$cartid';";
						$result=$this->db->update($query);
						if($result){
							//$msg="<span style='color:green;'>Product Updated Successfully.!!!!</span>";
							//return $msg;
							header('location:cart.php');
						}
						else{
							$msg="<span style='color:red;'>Product Not Updated Successfully.!!!!</span>";
							return $msg;
						}
	}
	
	public function deleteProductFrmCrt($delete){
		$delquery="DELETE FROM tbl_cart WHERE cartid='$delete';";
		$delvalue=$this->db->delete($delquery);
		if($delvalue){
			$msg="<span style='color:green;'>Product Deleted Successfully!!</span>";
			return $msg;
		}
		else{
			$msg="<span style='color:red;'>Product Not Deleted!!</span>";
			return $msg;
		}
		
	}
	
	public function delCmrCart(){
		$sesnid=session_id();
		$delquery="DELETE FROM tbl_cart WHERE sesnid='$sesnid';";
		$delvalue=$this->db->delete($delquery);
	}


	public function insertOrder($cmrid){
		$sesnid=session_id();
		$query="SELECT * FROM tbl_cart WHERE sesnid='$sesnid';";
		$result=$this->db->select($query);
		if($result){
			while($row=$result->fetch_assoc()){
				$productid=$row['productid'];
				$productname=$row['productname'];
				$quantity=$row['quantity'];
				$price=$row['price']*$quantity;
				$image=$row['image'];

		$query="INSERT INTO tbl_order
		
		(cmrid,productid,productname,price,quantity,image) 
		
				  VALUES
				  
		('$cmrid','$productid','$productname','$price','$quantity','$image');";
		$inserted_rows = $this->db->insert($query);
			}
		}
	}



	public function orderSuccess($cmrid){
		$query="SELECT price FROM tbl_order WHERE cmrid='$cmrid' AND date=now();";
		$result=$this->db->select($query);
		return $result;
	}
	
	
}

?>