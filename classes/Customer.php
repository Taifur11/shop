<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

?>

<?php

class Customer{
	
	private $db;
	private $fm;
	
	
	public function __construct(){
		$this->db=new Database();
		$this->fm=new Format();
		
	}
	
	public function customerRegister($postdata){
		
		$name = $this->fm->validation($postdata['name']);
		$name = mysqli_real_escape_string($this->db->link,$name);
		
		$city = $this->fm->validation($postdata['city']);
		$city = mysqli_real_escape_string($this->db->link,$city);
		
		$zip = $this->fm->validation($postdata['zip']);
		$zip = mysqli_real_escape_string($this->db->link,$zip);
		
		$email = $this->fm->validation($postdata['email']);
		$email = mysqli_real_escape_string($this->db->link,$email);
		
		$address = $this->fm->validation($postdata['address']);
		$address = mysqli_real_escape_string($this->db->link,$address);
		
		$country = $this->fm->validation($postdata['country']);
		$country = mysqli_real_escape_string($this->db->link,$country);
		
		$phone = $this->fm->validation($postdata['phone']);
		$phone = mysqli_real_escape_string($this->db->link,$phone);
		
		$password = $this->fm->validation($postdata['password']);
		$password = mysqli_real_escape_string($this->db->link,$password);
		
		if($name == "" || $city == "" || $zip == "" || $email == "" || $address == "" || $country == "" || $phone == "" || $password == "")
			{
			$msg = "<span style='color:red;'>Field Must Not Empty!!</span>";
			return $msg;
			}
		
		$query="SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1;";
		$result=$this->db->select($query);
		if($result!=false){
			$msg = "<span style='color:red;'>Customer Already Registered
			</span>";
			return $msg;
		}else{
				$query = "INSERT INTO tbl_customer
				
				(name,city,zip,email,address,country,phone,password) 
				
						  VALUES
						  
				('$name','$city','$zip','$email','$address','$country','$phone','$password');";
				
				$inserted_rows = $this->db->insert($query);
				
				if ($inserted_rows) {
				 $msg = "<span style='color:green;'>Registered Successfully!!!
				 </span>";
				 return $msg;
				}else {
				 $msg = "<span style='color:red;'>Not Registered !</span>";
				 return $msg;
				}
				
			}
		}
		
		public function customerLogin($postdata){
			$name = $this->fm->validation($postdata['name']);
			$name = mysqli_real_escape_string($this->db->link,$name);
			
			$password = $this->fm->validation($postdata['password']);
			$password = mysqli_real_escape_string($this->db->link,$password);
			
			$email = $this->fm->validation($postdata['email']);
			$email = mysqli_real_escape_string($this->db->link,$email);
			
			if($name == "" || $password == "" || $email == "")
			{
			$msg = "<span style='color:red;'>Field Must Not Empty!!</span>";
			return $msg;
			}
			
			$query="SELECT * FROM tbl_customer WHERE email='$email' AND password='$password';";
			$result=$this->db->select($query);
			if($result){
				$value=$result->fetch_assoc();
				Session::set("cmrlogin",true);
				Session::set("cmrid",$value['customerid']);
				Session::set("cmrname",$value['name']);
				header('location:cart.php');
			}
			else{
				$msg = "<span style='color:red;'>Email and Password Not Matched!!</span>";
				return $msg;
			}
	}
	
	public function customerProfile($id){
		$query="SELECT * FROM tbl_customer WHERE customerid='$id';";
		$result=$this->db->select($query);
		return $result;
	}
	
	public function profileUpdate($postdata,$id){
		
		$name = $this->fm->validation($postdata['name']);
		$name = mysqli_real_escape_string($this->db->link,$name);
		
		$city = $this->fm->validation($postdata['city']);
		$city = mysqli_real_escape_string($this->db->link,$city);
		
		$zip = $this->fm->validation($postdata['zip']);
		$zip = mysqli_real_escape_string($this->db->link,$zip);
		
		$email = $this->fm->validation($postdata['email']);
		$email = mysqli_real_escape_string($this->db->link,$email);
		
		$address = $this->fm->validation($postdata['address']);
		$address = mysqli_real_escape_string($this->db->link,$address);
		
		$country = $this->fm->validation($postdata['country']);
		$country = mysqli_real_escape_string($this->db->link,$country);
		
		$phone = $this->fm->validation($postdata['phone']);
		$phone = mysqli_real_escape_string($this->db->link,$phone);
		
		$password = $this->fm->validation($postdata['password']);
		$password = mysqli_real_escape_string($this->db->link,$password);

		if($name == "" || $city == "" || $zip == "" || $email == "" || $address == "" || $country == "" || $phone == "" || $password == "")
			{
			$msg = "<span style='color:red;'>Field Must Not Empty!!</span>";
			return $msg;
			}
		$query="UPDATE tbl_customer
				SET
					name='$name',
					city='$city',
					zip='$zip',
					email='$email',
					address='$address',
					country='$country',
					phone='$phone',
					password='$password'
					
				WHERE
					customerid='$id';";
					
				$result=$this->db->update($query);
				if($result){
					$msg="<span style='color:green;'>Profile Updated Successfully.!!!!</span>";
					return $msg;
					}
				else{
					$msg="<span style='color:red;'>Profile Not Updated Successfully.!!!!</span>";
					return $msg;
					}
			
		}
	
}


?>