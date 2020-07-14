<?php include 'inc/header.php'; ?>
<?php
$chklog=Session::get('cmrlogin');
if($chklog==false){
	header('location:login.php');
}
?>
<?php
$id=Session::get('cmrid');
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
	$updateprofile=$cmr->profileUpdate($_POST,$id);
}
?>
<div class="main">
    <div class="content">
    	<div class="section group">
			<div class="register_account">
<?php
if(isset($updateprofile)){
	echo $updateprofile;
}
?>
    		<h3>Profile Update</h3>
    		<form action="" method="post">
<?php
if(!isset($_GET['profid']) || $_GET['profid']== NULL){
	header("Location:profile.php");
}
else{
	$profid=$_GET['profid'];
} 
$cmredit=$cmr->customerProfile($profid);
if($cmredit){
	while($result=$cmredit->fetch_assoc()){
?>
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" name="name" value="<?php echo $result['name']; ?>">
							</div>
							
							<div>
							   <input type="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'City';}" name="city" value="<?php echo $result['city']; ?>">
							</div>
							
							<div>
								<input type="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Zip-Code';}" name="zip" value="<?php echo $result['zip']; ?>">
							</div>
							<div>
								<input type="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-Mail';}" name="email" value="<?php echo $result['email']; ?>">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Address';}" name="address" value="<?php echo $result['address']; ?>">
						</div>
		    		<div>
							<input type="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Country';}" name="country" value="<?php echo $result['country']; ?>">
					</div>		        
	
		           <div>
		          <input type="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone';}" name="phone" value="<?php echo $result['phone']; ?>">
		          </div>
				  
				  <div>
					<input type="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" name="password" value="<?php echo $result['password']; ?>">
				</div>
		    	</td>
		    </tr> 
</tbody></table> <?php } } ?>
		   <div class="search"><div><button class="grey" name="update">Update Account</button></div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div> 
		
		
		
		</div>
 	</div>
</div>
<?php include 'inc/footer.php'; ?>