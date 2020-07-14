<?php
$filepath=realpath(dirname(__FILE__));
include ($filepath.'/../lib/Session.php');
Session::checkLogin();

include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

?>


<?php

class Adminlogin{
	
	private $db;
	private $fm;
	
	
	public function __construct(){
		$this->db=new Database();
		$this->fm=new Format();
		
	}
	
	public function adminlogin($adminUser,$adminPass){
		
		$adminUser=$this->fm->validation($adminUser);
		$adminPass=$this->fm->validation($adminPass);
		
		$adminUser=mysqli_real_escape_string($this->db->link,$adminUser);
		$adminPass=mysqli_real_escape_string($this->db->link,$adminPass);
		
		if(empty($adminUser) || empty($adminPass)){
			$loginmsg="User Name & Password Must Not Empty";
			return $loginmsg;
		}
		
		else{
			$query="SELECT * FROM tbl_admin WHERE adminUser='$adminUser' AND adminPass='$adminPass';";
			$result=$this->db->select($query);	
			if($result!=false){
			$result_array=mysqli_fetch_array($result);
			$value=mysqli_num_rows($result);
			
				if($value>0){
				
				Session::set("adminlogin",true);
				Session::set("adminID",$result_array['adminID']);
				Session::set("adminUser",$result_array['adminUser']);
				Session::set("adminName",$result_array['adminName']);
				header("Location:index.php");
				}
			}
			else{
				$loginmsg="Username & Password Not Matched";
				return $loginmsg;
			}
		
	}
            

	}

}

?>