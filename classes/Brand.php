<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

?>

<?php

class Brand{
	
	private $db;
	private $fm;
	
	
	public function __construct(){
		$this->db=new Database();
		$this->fm=new Format();
		
	}
	
	public function brandinsrt($brandname){
		
		$brandname=$this->fm->validation($brandname);
		
		$brandname=mysqli_real_escape_string($this->db->link,$brandname);
		
		if(empty($brandname)){
			$msg="<span style='color:blue;'>Brand Must Not Empty.</span>";
			return $msg;
		}
		
		else{
				$query="INSERT INTO tbl_brand (brandname) VALUES ('$brandname');";
				$result=$this->db->insert($query);	
				if($result){
					$msg="<span style='color:green;'>Brand Inserted Successfully.</span>";
					return $msg;
				}
				else{
					$msg="<span style='color:Red;'>Brand Not Inserted Successfully.</span>";
					return $msg;
				}
			}
			
		
	}
     

	public function showbrandlist(){
		$query="SELECT * FROM tbl_brand ORDER BY brandid DESC;";
	    $result=$this->db->select($query);
		return $result;
	}
	
	
	public function getBrandById($brandid){
		$query="SELECT * FROM tbl_brand WHERE brandid='$brandid';";
		$result=$this->db->select($query);
		return $result;
	}
	
	public function updateBrand($name,$id){
		$name=$this->fm->validation($name);
		$id=$this->fm->validation($id);
		
		$name=mysqli_real_escape_string($this->db->link,$name);
		$id=mysqli_real_escape_string($this->db->link,$id);
		
		if(empty($name) || empty($id)){
			$msg="<span style='color:blue;'>Brand Must Not Empty.</span>";
			return $msg;
		}
		else{
			$query="UPDATE tbl_brand
					SET
					brandname='$name'
					WHERE
					brandid='$id';
			";
			$result=$this->db->update($query);
			if($result){
				$msg="<span style='color:green;'>Brand Updated Successfully.!!!!</span>";
				return $msg;
			}
			else{
				$msg="<span style='color:red;'>Brand Not Updated Successfully.!!!!</span>";
				return $msg;
			}
		}
	}
	
	public function deleteBrandById($id){
		$query="DELETE FROM tbl_brand WHERE brandid='$id';";
		$delete_brand=$this->db->delete($query);
	if($delete_brand){
		$msg= "<span style='color:green;'>Brand Deleted Successfully!!</span>";
		return $msg;
	}
	else {
		$msg="<span style='color:red;'>Brand Not Deleted!!</span>";
		return $msg;
	}
	}

}


?>