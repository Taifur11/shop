<?php include 'inc/header.php'; ?>
<?php
$chklog=Session::get('cmrlogin');
if($chklog==false){
	header('location:login.php');
}
?>




<style>
.division1{
	width:50%;
	background-color:gray;
	float:left;
}
.division2{
	width:50%;
	background-color:gray;
	float:right;
}
.division3 a{
	width:160px;
	margin:5px auto 0;
	padding:7px 0;
	text-align:center;
	display:block;
	background-color:green;
	border:1px solid blue;
	color:black;
	border-radius:5px;
	font-size:25px;	
}
</style>
<?php 
if(isset($_GET['orderid']) && $_GET['orderid'] == 'order'){
	$cmrid=Session::get('cmrid');
	$insertorder=$cart->insertOrder($cmrid);
	$delcmrcart=$cart->delCmrCart();
	header('location:success.php');
}
?>
<div class="main">
    <div class="content">
    	<div class="section group">
			<div class="division1">
				<table class="tblone">
							<tr>
								<th >No</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total Price</th>
							</tr>
							
<?php
$yourcart=$cart->showCart(); 
if($yourcart){
	$sum=0;
	$quantity=0;
	$i=1;
	while($result=$yourcart->fetch_assoc()){

?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productname']; ?></td>
								<td>Tk. <?php echo $result['price']; ?></td>
								<td><?php echo $result['quantity']; ?></td>
								<td>Tk. 
								<?php
								
								$total=$result['price']*$result['quantity'];
								
								$sum=$sum+$total;
								$quantity=$quantity+$result['quantity'];
								?>
								<?php echo $total; ?></td>
							</tr>
<?php }} ?>							
						</table>
<?php
$chkcart=$cart->showCart();
if($chkcart){
?>						
						<table style="float:right;text-align:left;" width="40%">

							<tr>
								<th>Sub Total : </th>
								<td><?php echo $sum; ?></td>
							</tr>
							<tr>
								<th>VAT : 10%</th>
								<td>TK. <?php 
								$vat=$sum*.1;
								
								echo $vat; ?></td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td>TK. <?php 
								$grand=$sum+$vat;
								echo $grand; 
								?> </td>
							</tr>
							<tr>
								<th>Quantity :</th>
								<td><?php 
								echo $quantity; 
								?> </td>
							</tr>
					   </table>
<?php } ?>
			
			</div>
			<div class="division2">
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
			
			<div class="division3">
				<a href="offline.php?orderid=order">Order</a>
			</div>
 		</div>
 	</div>
</div>
   <?php include 'inc/footer.php'; ?>