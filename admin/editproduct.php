<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/Category.php'; ?>
<?php include '../classes/Product.php'; ?>
<?php include '../classes/Brand.php'; ?>
<?php
$prodctupdate=new Product();
if(!isset($_GET['productid']) || $_GET['productid']== NULL){
	header("Location:productlist.php");
}
else{
	$productid=$_GET['productid'];
}
?>
<?php

$pd=new Product();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
	
	$updateproduct=$pd->productUpdate($_POST,$_FILES,$productid);
}
?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Product</h2>
<?php 

if(isset($updateproduct)){
	
	echo $updateproduct;
}

?>		
        <div class="block">  

<?php
$res=$prodctupdate->getProductById($productid);
if($res){
	while($value=$res->fetch_assoc()){
?>

		
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $value['productname'];?>" class="medium" name="productname" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catid" >
                            <option>Select Category</option>
<?php
$obj=new Category();
$productcategory=$obj->showcatlist();
if($productcategory){
	while($result=$productcategory->fetch_assoc()){


?>
                            <option 
							<?php
							if($value['catid'] == $result['catid']){ 
							?>
							selected="selected"
							<?php } ?>
							value="<?php echo $result['catid'];?>"><?php echo $result['catname'];?></option>	
<?php 
 } }
?>							
							
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brandid">
                            <option>Select Brand</option>
						
<?php
$brandlist=new Brand();
$productcategory=$brandlist->showbrandlist();
if($productcategory){
	while($result=$productcategory->fetch_assoc()){


?>
                            <option 
							<?php
							if($value['brandid'] == $result['brandid']){ 
							?>
							selected="selected"
							<?php } ?>
							value="<?php echo $result['brandid'];?>"><?php echo $result['brandname'];?></option>	
<?php 
 } }
?>	
	                           
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body"><?php echo $value['body'];?></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $value['price'];?>" class="medium" name="price" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
						<img src="<?php echo $value['image']; ?>" alt="" height="80" width="200"/><br />
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
							
							<?php 
							
							if($value['type'] == 0){
							?>
							
							<option selected="selected" value="0">General</option>
                            <option value="1">Featured</option>
                            
							
							<?php }
							else{
							?>
							<option selected="selected" value="1">Featured</option>
                            <option value="0">General</option>
							<?php }?>
							
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
<?php }} ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


