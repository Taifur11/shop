<?php include 'inc/header.php'; ?>
<?php
$chklog=Session::get('cmrlogin');
if($chklog==false){
	header('location:login.php');
}
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Order PAGE</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
    </div>
 </div>
<?php include 'inc/footer.php'; ?>