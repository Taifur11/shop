<?php include 'inc/header.php'; ?>
 <div class="main">
    <div class="content">
<?php

$catlist=new Category();
$listcat=$catlist->showcatlist();
if($listcat){
	while($result=$listcat->fetch_assoc()){

?>
    	<div class="content_top">
    		<div class="heading">
    		<h3><?php echo $result['catname']; ?></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
			<?php
$getproductbycat=$pd->getProductByCat($result['catid']);
if($getproductbycat){
	while($result=$getproductbycat->fetch_assoc()){
?>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="deatils.php?proid=<?php echo $result['productid']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['productname'];?></h2>
					 <p><?php echo $result['body'];?></p>
					 <p><span class="price">$<?php echo $result['price'];?></span></p> 
				     <div class="button"><span><a href="deatils.php?proid=<?php echo $result['productid']; ?>" class="details">Details</a></span></div>
				</div>
<?php }}
else{
	echo "<font color='red'> No Product Available of this Category </font>";
} ?>

			</div>
<?php }} ?>
    </div>
 </div>
   <?php include 'inc/footer.php'; ?>