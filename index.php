<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>
	

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Featured Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	        <div class="section group">
<?php
$getproduct=$pd->getFeaturedProduct();
if($getproduct){
	while($result=$getproduct->fetch_assoc()){	

?>			
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="deatils.php?proid=<?php echo $result['productid']; ?>"><img height="200" src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['productname']; ?></h2>
					 <p><?php echo $fm->shortTxt($result['body'],20); ?></p>
					 <p><span class="price">$<?php echo $result['price']; ?></span></p>
				     <div class="button"><span>
					 <a href="deatils.php?proid=<?php echo $result['productid']; ?>" class="details">Details</a></span></div>
				</div>
<?php
	}
}
?>				
			</div>
			
			
			
			
		<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			
<?php
$getproduct=$pd->getNewProduct();
if($getproduct){
	while($result=$getproduct->fetch_assoc()){	

?>		
	
				<div class="grid_1_of_4 images_1_of_4">
					<a href="deatils.php?proid=<?php echo $result['productid']; ?>"><img height="200" src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['productname']; ?></h2>
					 <p><span class="price">$<?php echo $result['price']; ?></span></p>
				     <div class="button"><span><a href="deatils.php?proid=<?php echo $result['productid']; ?>" class="details">Details</a></span></div>
				</div>
<?php
	}
}
?>				
			</div>
    </div>
 </div>

<?php include 'inc/footer.php'; ?>