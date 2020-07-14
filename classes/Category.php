<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

?>

<?php

class Category{
	
	private $db;
	private $fm;
	
	
	public function __construct(){
		$this->db=new Database();
		$this->fm=new Format();
		
	}
	
	public function catinsrt($catname){
		
		$catname=$this->fm->validation($catname);
		
		$catname=mysqli_real_escape_string($this->db->link,$catname);
		
		if(empty($catname)){
			$msg="<span style='color:blue;'>Category Must Not Empty.</span>";
			return $msg;
		}
		
		else{
				$query="INSERT INTO tbl_category (catname) VALUES ('$catname');";
				$result=$this->db->insert($query);	
				if($result){
					$msg="<span style='color:green;'>Category Inserted Successfully.</span>";
					return $msg;
				}
				else{
					$msg="<span style='color:Red;'>Category Not Inserted Successfully.</span>";
					return $msg;
				}
			}
			
		
	}
     

	public function showcatlist(){
		$query="SELECT * FROM tbl_category ORDER BY catid ASC;";
	    $result=$this->db->select($query);
		return $result;
	}
	
	
	public function getCatById($catid){
		$query="SELECT * FROM tbl_category WHERE catid='$catid';";
		$result=$this->db->select($query);
		return $result;
	}
	
	public function updateCategory($name,$id){
		$name=$this->fm->validation($name);
		$id=$this->fm->validation($id);
		
		$name=mysqli_real_escape_string($this->db->link,$name);
		$id=mysqli_real_escape_string($this->db->link,$id);
		
		if(empty($name) || empty($id)){
			$msg="<span style='color:blue;'>Category Must Not Empty.</span>";
			return $msg;
		}
		else{
			$query="UPDATE tbl_category
					SET
					catname='$name'
					WHERE
					catid='$id';
			";
			$result=$this->db->update($query);
			if($result){
				$msg="<span style='color:green;'>Category Updated Successfully.!!!!</span>";
				return $msg;
			}
			else{
				$msg="<span style='color:red;'>Category Not Updated Successfully.!!!!</span>";
				return $msg;
			}
		}
	}
	
	public function deleteCatById($id){
		$query="DELETE FROM tbl_category WHERE catid='$id';";
		$delete_category=$this->db->delete($query);
	if($delete_category){
		$msg= "<span style='color:green;'>Category Deleted Successfully!!</span>";
		return $msg;
	}
	else {
		$msg="<span style='color:red;'>Category Not Deleted!!</span>";
		return $msg;
	}
	}
	
	public function getCatName($catid){
		$query="SELECT * FROM tbl_category WHERE catid='$catid';";
	    $result=$this->db->select($query);
		return $result;
	}

}


?>