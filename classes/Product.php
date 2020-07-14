<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

?>

<?php

class Product{
	
	private $db;
	private $fm;
	
	
	public function __construct(){
		$this->db=new Database();
		$this->fm=new Format();
		
	}
	
	public function productinsrt($postdata,$file){
		
		$productname = $this->fm->validation($postdata['productname']);
		$productname = mysqli_real_escape_string($this->db->link,$productname);
		
		$catid       = $this->fm->validation($postdata['catid']);
		$catid       = mysqli_real_escape_string($this->db->link,$catid);
		
		$brandid     = $this->fm->validation($postdata['brandid']);
		$brandid     = mysqli_real_escape_string($this->db->link,$brandid);
		
		$body        = $this->fm->validation($postdata['body']);
		$body        = mysqli_real_escape_string($this->db->link,$body);
		
		$price       = $this->fm->validation($postdata['price']);
		$price       = mysqli_real_escape_string($this->db->link,$price);
		
		$type        = $this->fm->validation($postdata['type']);
		$type        = mysqli_real_escape_string($this->db->link,$type);
		
	/* Image Upload */
		$permited  = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $file['image']['name'];
		$file_size = $file['image']['size'];
		$file_temp = $file['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		$uploaded_image = "upload/".$unique_image;
	/* Image Upload */
	
    if($productname == "" || $catid == "" || $brandid == "" || $body == "" || $price == "" || $type == "" || $file_name == "" ){
		$msg = "<span style='color:red;'>Field Must Not Empty!!</span>";
		return $msg;
	}
	elseif ($file_size >1048567) {
     $msg = "<span style='color:red;'>Fiele Size Must Not Be larger Than 1MB!!</span>";
	 return $msg;
    }
	elseif (in_array($file_ext, $permited) === false) {
     $msg = "<span style='color:red;'>You can upload only:-"
     .implode(', ', $permited)."</span>";
	  return $msg;
    }
	else{
		move_uploaded_file($file_temp, $uploaded_image);
		
		$query = "INSERT INTO tbl_product
		
		(productname,catid,brandid,body,price,image,type) 
		
				  VALUES
				  
		('$productname','$catid','$brandid','$body','$price','$uploaded_image','$type');";
		
		$inserted_rows = $this->db->insert($query);
		
		if ($inserted_rows) {
		 $msg = "<span style='color:green;'>Product Inserted Successfully.
		 </span>";
		 return $msg;
		}else {
		 $msg = "<span style='color:red;'>Product Not Inserted !</span>";
		 return $msg;
		}
    }
	
	
}

	public function showproductlist(){
			$query="SELECT tbl_product.*,tbl_category.catname,tbl_brand.brandname 
			FROM
			tbl_product
			INNER JOIN tbl_category
			ON
			tbl_product.catid=tbl_category.catid
			INNER JOIN tbl_brand
			ON
			tbl_product.brandid=tbl_brand.brandid
			ORDER BY tbl_product.productid DESC;";
			$result=$this->db->select($query);
			return $result;
		}

	
	public function getProductById($productid){
		$query="SELECT * FROM tbl_product WHERE productid='$productid';";
		$result=$this->db->select($query);
		return $result;
	}
	
	public function productUpdate($postdata,$file,$productid){
		$productname = $this->fm->validation($postdata['productname']);
		$productname = mysqli_real_escape_string($this->db->link,$productname);
		
		$catid       = $this->fm->validation($postdata['catid']);
		$catid       = mysqli_real_escape_string($this->db->link,$catid);
		
		$brandid     = $this->fm->validation($postdata['brandid']);
		$brandid     = mysqli_real_escape_string($this->db->link,$brandid);
		
		$body        = $this->fm->validation($postdata['body']);
		$body        = mysqli_real_escape_string($this->db->link,$body);
		
		$price       = $this->fm->validation($postdata['price']);
		$price       = mysqli_real_escape_string($this->db->link,$price);
		
		$type        = $this->fm->validation($postdata['type']);
		$type        = mysqli_real_escape_string($this->db->link,$type);
		
	/* Image Upload */
		$permited  = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $file['image']['name'];
		$file_size = $file['image']['size'];
		$file_temp = $file['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		$uploaded_image = "upload/".$unique_image;
	/* Image Upload */
	
    if($productname == "" || $catid == "" || $brandid == "" || $body == "" || $price == "" || $type == "" )
	{
		$msg = "<span style='color:red;'>Field Must Not Empty!!</span>";
		return $msg;
	}
	
	else{
		
			if(!empty($file_name))
			{
			
				if ($file_size >1048567) {
				 $msg = "<span style='color:red;'>Fiele Size Must Not Be larger Than 1MB!!</span>";
				 return $msg;
				}
				elseif (in_array($file_ext, $permited) === false){
				 $msg = "<span style='color:red;'>You can upload only:-"
				 .implode(', ', $permited)."</span>";
				 
				  return $msg;
				}
				else{
					move_uploaded_file($file_temp, $uploaded_image);
					
					$query="UPDATE tbl_product
								SET
								
								productname='$productname',
								catid='$catid',
								brandid='$brandid',
								body='$body',
								price='$price',
								image='$uploaded_image',
								type='$type'
								
								WHERE
								
								productid='$productid';";
						$result=$this->db->update($query);
						if($result){
							$msg="<span style='color:green;'>Product Updated Successfully.!!!!</span>";
							return $msg;
						}
						else{
							$msg="<span style='color:red;'>Product Not Updated Successfully.!!!!</span>";
							return $msg;
						}
				}
			}else
			{
					$query="UPDATE tbl_product
								SET
								
								productname='$productname',
								catid='$catid',
								brandid='$brandid',
								body='$body',
								price='$price',
								type='$type'
								
								WHERE
								
								productid='$productid';";
						$result=$this->db->update($query);
						if($result){
							$msg="<span style='color:green;'>Product Updated Successfully.!!!!</span>";
							return $msg;
						}
						else{
							$msg="<span style='color:red;'>Product Not Updated Successfully.!!!!</span>";
							return $msg;
						}
				
				
			}
		
		
       }
 }
 
	public function deleteProductById($id){
		$query="SELECT * FROM tbl_product WHERE productid='$id';";
		$value=$this->db->select($query);
		if($value){
			while($res=$value->fetch_assoc()){
				$dellink=$res['image'];
				unlink($dellink);
			}
		}
		
		$delquery="DELETE FROM tbl_product WHERE productid='$id';";
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
	
	public function getFeaturedProduct(){
		$query="SELECT * FROM tbl_product WHERE type='1' ORDER BY productid DESC LIMIT 4;";
		$result=$this->db->select($query);
		return $result;
	}
	
	public function getProductDetails($proid){
		$query="SELECT p.*, c.catname, b.brandname
				FROM tbl_product as p, tbl_category as c, tbl_brand as b
				WHERE p.catid=c.catid AND p.brandid=b.brandid AND p.productid='$proid';";
		$result=$this->db->select($query);
		return $result;
		
	}
	
	public function getProductByCat($catid){
		$query="SELECT p.*, c.catname, b.brandname
				FROM tbl_product as p, tbl_category as c, tbl_brand as b
				WHERE p.catid='$catid' AND p.catid=c.catid AND p.brandid=b.brandid ;";
		$result=$this->db->select($query);
		return $result;
		
	}

	public function getProductByBrand($brandid){
		$query="SELECT p.*, c.catname, b.brandname
				FROM tbl_product as p, tbl_category as c, tbl_brand as b
				WHERE p.brandid='$brandid' AND p.catid=c.catid AND p.brandid=b.brandid ;";
		$result=$this->db->select($query);
		return $result;
		
	}
	
	public function getNewProduct(){
		$query="SELECT * FROM tbl_product ORDER BY productid DESC LIMIT 4;";
		$result=$this->db->select($query);
		return $result;
	}
	
	public function getIphone(){
		$query="SELECT * FROM tbl_product WHERE brandid='5';";
		$result=$this->db->select($query);
		return $result;
	}
	
	public function getSamsung(){
		$query="SELECT * FROM tbl_product WHERE brandid='3' ORDER BY productname ASC LIMIT 1;";
		$result=$this->db->select($query);
		return $result;
	}
	
	public function getAcer(){
		$query="SELECT * FROM tbl_product WHERE brandid='2' ORDER BY productname ASC LIMIT 1;";
		$result=$this->db->select($query);
		return $result;
	}
	
	public function getCanon(){
		$query="SELECT * FROM tbl_product WHERE brandid='4' ORDER BY productname ASC LIMIT 1;";
		$result=$this->db->select($query);
		return $result;
	}

}
?>
