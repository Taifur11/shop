	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">

<?php
$getiphone=$pd->getIphone();
if($getiphone){
	while($result=$getiphone->fetch_assoc()){
?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="deatils.php?proid=<?php echo $result['productid']; ?>"> <img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Iphone</h2>
						<p><?php echo $result['productname'];?></p>
						<div class="button"><span><a href="deatils.php?proid=<?php echo $result['productid']; ?>">Add to cart</a></span></div>
				   </div>
			   </div>	
<?php }} ?>	

<?php
$getiphone=$pd->getSamsung();
if($getiphone){
	while($result=$getiphone->fetch_assoc()){
?>		   
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="deatils.php?proid=<?php echo $result['productid']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" / ></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Samsung</h2>
						  <p><?php echo $result['productname'];?></p>
						  <div class="button"><span><a href="deatils.php?proid=<?php echo $result['productid']; ?>">Add to cart</a></span></div>
					</div>
				</div>
<?php }} ?>	
			</div>
			<div class="section group">

<?php
$getiphone=$pd->getAcer();
if($getiphone){
	while($result=$getiphone->fetch_assoc()){
?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="deatils.php?proid=<?php echo $result['productid']; ?>"> <img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Acer</h2>
						<p><?php echo $result['productname'];?></p>
						<div class="button"><span><a href="deatils.php?proid=<?php echo $result['productid']; ?>">Add to cart</a></span></div>
				   </div>
			   </div>
<?php }} ?>
<?php
$getiphone=$pd->getCanon();
if($getiphone){
	while($result=$getiphone->fetch_assoc()){
?>			   
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="deatils.php?proid=<?php echo $result['productid']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Canon</h2>
						  <p><?php echo $result['productname'];?></p>
						  <div class="button"><span><a href="deatils.php?proid=<?php echo $result['productid']; ?>">Add to cart</a></span></div>
					</div>
				</div>
<?php }} ?>
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<?php
$getproduct=$pd->getFeaturedProduct();
if($getproduct){
	while($result=$getproduct->fetch_assoc()){	

?>
						<li> <img src="admin/<?php echo $result['image']; ?>" alt=""width="1023" height="300"/> </li>
<?php
	}
}
?>	
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>