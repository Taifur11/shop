<?php include 'inc/header.php'; ?>
<?php
$chklog=Session::get('cmrlogin');
if($chklog==false){
	header('location:login.php');
}
?>
<style>
.payment{
	width:500px;
	min-height:200px;
	text-align:center;
	border:1px solid blue;
	margin:0 auto;
	padding:50px;
}
.payment h2{
	border-bottom:1px solid blue;
	margin-bottom:40px;
	padding-bottom:10px;
}
.payment a{
	background-color:green;
	border-radius:5px;
	color:black;
	font-size:25px;
	padding:5px 30px;
}
.back a{
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
<div class="main">
    <div class="content">
    	<div class="section group">
			<div class="payment">
				 <h2>Offline Payment Order Successfull</h2>
<?php
$cmrid=Session::get('cmrid');
$ordersuccess=$cart->orderSuccess($cmrid);
$sum="";
if($ordersuccess){
	$sum = 0;
	while($row=$ordersuccess->fetch_assoc() ){
		$price=$row['price'];
		$sum = $sum + $price;
	}
} ?>



<p>Total Payable Ammount</p>

<font> <?php
$vat=$sum*.1;
//$vat=$sum*.1;
//$final=$vat + $sum;

 echo $sum+$vat; ?>  </font>

			</div>
 		</div>
 	</div>
</div>
   <?php include 'inc/footer.php'; ?>