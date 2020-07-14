<?php include 'inc/header.php'; ?>
<?php
$chklog=Session::get('cmrlogin');
if($chklog==true){
	header('location:order.php');
}
?>
 <div class="main">
    <div class="content">
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
	$logincustomer=$cmr->customerLogin($_POST);
}
?>
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
<?php
if(isset($logincustomer)){
	echo $logincustomer;
}
?>
        	<p>Sign in with the form below.</p>
        	<form action="" method="post" id="member">
                	<input name="name" type="text" placeholder="Enter Your Name Or Username" class="field">
					<input name="email" type="text" placeholder="Enter Your Email" class="field">
                    <input name="password" type="password" placeholder="Enter Your Password" class="field">
					<p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                    <div class="buttons"><div><button class="grey" name="login">Sign In</button></div></div>
					
            </form>
                 
          </div>
					
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
	$insrtcustomer=$cmr->customerRegister($_POST);
}
?>					
					
    	<div class="register_account">
    		<h3>Register New Account</h3>
<?php
if(isset($insrtcustomer)){
	echo $insrtcustomer;
}
?>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" name="name" placeholder="Enter Your Name">
							</div>
							
							<div>
							   <input type="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'City';}" name="city" placeholder="Enter Your City">
							</div>
							
							<div>
								<input type="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Zip-Code';}" name="zip" placeholder="Enter Your Zip-Code">
							</div>
							<div>
								<input type="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-Mail';}" name="email" placeholder="Enter Your Email">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Address';}" name="address" placeholder="Enter Your Address">
						</div>
		    		<div>
						<select id="country" onchange="change_country(this.value)" class="frm-field required" name="country">
							<option value="null">Select a Country</option>         
							<option value="AF">Afghanistan</option>
							<option value="AL">Albania</option>
							<option value="DZ">Algeria</option>
							<option value="AR">Argentina</option>
							<option value="AM">Armenia</option>
							<option value="AW">Aruba</option>
							<option value="AU">Australia</option>
							<option value="AT">Austria</option>
							<option value="AZ">Azerbaijan</option>
							<option value="BS">Bahamas</option>
							<option value="BH">Bahrain</option>
							<option value="BD">Bangladesh</option>

		         </select>
				 </div>		        
	
		           <div>
		          <input type="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone';}" name="phone" placeholder="Enter Your Phone">
		          </div>
				  
				  <div>
					<input type="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" name="password" placeholder="Enter Your Password">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button class="grey" name="register">Create Account</button></div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php'; ?>