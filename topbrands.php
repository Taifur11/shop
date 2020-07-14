<?php include 'inc/header.php'; ?>

 <div class="main">
    <div class="content">


<?php

$brandlist=new Brand();
$listbrand=$brandlist->showbrandlist();
if($listbrand){
	while($result=$listbrand->fetch_assoc()){

?>

    	<div class="content_top">
    		<div class="heading">
    		<h3><?php echo $result['brandname']; ?></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">

<?php
$prodctbybrand=$pd->getProductByBrand($result['brandid']);
if($prodctbybrand){
	while($result=$prodctbybrand->fetch_assoc()){
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
	echo "<font color='red'> No Product Available of this Brand </font>";
} ?>

			</div>
<?php }} ?>
</div>
    </div>


<?php include 'inc/footer.php'; ?>