<?php include 'inc/header.php'; ?>

<div class="main">
<?php
if(!isset($_GET['catid']) || $_GET['catid']== NULL){
	header("Location:index.php");
}
else{
	$catid=$_GET['catid'];
}

?>


    <div class="content">
    	<div class="content_top">
    		<div class="heading">
<?php
$getcatname=$cat->getCatName($catid);
if($getcatname){
	while($result=$getcatname->fetch_assoc()){
?>
    		<h3>Latest from <?php echo $result['catname'];?></h3>
<?php }} ?>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
		  
<?php
$getproductbycat=$pd->getProductByCat($catid);
if($getproductbycat){
	while($result=$getproductbycat->fetch_assoc()){
?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="deatils.php?proid=<?php echo $result['productid']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['productname'];?> </h2>
					 <p><?php echo $result['body'];?></p>
					 <p><span class="price">$<?php echo $result['price'];?></span></p>
				     <div class="button"><span><a href="deatils.php?proid=<?php echo $result['productid']; ?>" class="details">Details</a></span></div>
				</div>
<?php }}else{
	echo "<br><span style='color:#9e1994;'>No product Of This Category Available!!</span>";
} ?>				
		 </div>

	
 </div>

<?php include 'inc/footer.php'; ?>
