<?php include 'inc/header.php'; ?>
<?php
$chklog=Session::get('cmrlogin');
if($chklog==false){
	header('location:login.php');
}
?>
<div class="main">
    <div class="content">
    	<div class="section group">
<?php
$id=Session::get('cmrid');
$profile=$cmr->customerProfile($id);
if($profile){
	while($result=$profile->fetch_assoc()){

?>
			<table class="tblone" width="50" align="center">
							<tr>
								<th width="33%">Name</th>
								<th width="33%">:</th>
								<th width="34%"><?php echo $result['name']; ?></th>
							</tr>
							<tr>
								<th width="33%">City</th>
								<th width="33%">:</th>
								<th width="34%"><?php echo $result['city']; ?></th>
							</tr>
							<tr>
								<th width="33%">Zip Code</th>
								<th width="33%">:</th>
								<th width="34%"><?php echo $result['zip']; ?></th>
							</tr>
							<tr>
								<th width="33%">Email</th>
								<th width="33%">:</th>
								<th width="34%"><?php echo $result['email']; ?></th>
							</tr>
							<tr>
								<th width="33%">Address</th>
								<th width="33%">:</th>
								<th width="34%"><?php echo $result['address']; ?></th>
							</tr>
							<tr>
								<th width="33%">Country</th>
								<th width="33%">:</th>
								<th width="34%"><?php echo $result['country']; ?></th>
							</tr>
							<tr>
								<th width="33%">Phone</th>
								<th width="33%">:</th>
								<th width="34%"><?php echo $result['phone']; ?></th>
							</tr>
							<tr>
								<th width="33%">Password</th>
								<th width="33%">:</th>
								<th width="34%"><?php echo $result['password']; ?></th>
							</tr>
							<tr>
								<th width="33%"></th>
								<th width="33%"><a href="updateprofile.php?profid=<?php echo $result['customerid']; ?>">Update Profile</a></th>
								<th width="34%"></th>
							</tr>
			</table>
<?php }} ?>
 		</div>
 	</div>
</div>
   <?php include 'inc/footer.php'; ?>