<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/Category.php'; ?>
<?php include '../classes/Product.php'; ?>
<?php
include '../classes/Brand.php';
$brandlist=new Brand();
?>

<?php

$pd=new Product();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
	
	$insrtproduct=$pd->productinsrt($_POST,$_FILES);
}
?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
<?php 

if(isset($insrtproduct)){
	echo $insrtproduct;
}

?>		
        <div class="block">               
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Product Name..." class="medium" name="productname" />
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
                            <option value="<?php echo $result['catid'];?>"><?php echo $result['catname'];?></option>	
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

$productcategory=$brandlist->showbrandlist();
if($productcategory){
	while($result=$productcategory->fetch_assoc()){


?>
                            <option value="<?php echo $result['brandid'];?>"><?php echo $result['brandname'];?></option>	
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
                        <textarea class="tinymce" name="body"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Price..." class="medium" name="price" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
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
                            <option value="0">General</option>
                            <option value="1">Featured</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
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


