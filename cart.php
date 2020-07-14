<?php include 'inc/header.php'; ?>
<?php
if(!isset($_GET['id'])){
	echo "<meta http-equiv='refresh' content='0;URL=?id=live'/>";
}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
<?php

if(isset($_GET['delpro'])){
	$delete=$_GET['delpro'];
	$deleteproduct=$cart->deleteProductFrmCrt($delete);
}
?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$cartid=$_POST['cartid'];
	$quantity=$_POST['quantity'];
	if($quantity<=0){
	$deleteproduct=$cart->deleteProductFrmCrt($cartid);
	}else{
	$updatecart=$cart->updateCartQuantity($quantity,$cartid);}
}

if(isset($updatecart)){
	echo $updatecart;
}
elseif(isset($deleteproduct)){
	echo $deleteproduct;
}
?>
						<table class="tblone">
							<tr>
								<th width="5%">SL</th>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="20%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="10%">Action</th>
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
								<td><img src="admin/<?php echo $result['image']; ?>" alt=""/></td>
								<td>Tk. <?php echo $result['price']; ?></td>
								<td>
				<form action="" method="post">
					<input type="hidden" name="cartid" value="<?php echo $result['cartid']; ?>"/>
					
					<input type="number" name="quantity" value="<?php echo $result['quantity']; ?>"/>
					
					<input type="submit" name="submit" value="Update"/>
				</form>
								</td>
								<td>Tk. 
								<?php
								
								$total=$result['price']*$result['quantity'];
								
								$sum=$sum+$total;
								$quantity=$quantity+$result['quantity'];
								Session::set("quantity",$quantity);
								?>
								
								
								
								<?php echo $total; ?></td>
								<td><a onclick="return confirm('Are You Sure');" href="?delpro=<?php echo $result['cartid']; ?>">X</a></td>
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
								<td>TK. <?php echo $sum; ?></td>
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
								Session::set("grand",$grand);
								?> </td>
							</tr>
					   </table>
<?php } else{
	header('location:index.php');
	//echo "<span style='color:blue;'>Shop Now</span>";
} ?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php'; ?>