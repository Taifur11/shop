<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

?>
<?php

class Titleslogan{
	
	private $db;
	private $fm;
	
	
	public function __construct(){
		$this->db=new Database();
		$this->fm=new Format();
		
	}

	public function getById($id){
		$query="SELECT * FROM tbl_titleslogan WHERE id='$id';";
		$result=$this->db->select($query);
		return $result;
	}

	
}
?>