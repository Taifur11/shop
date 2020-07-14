<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Product.php'; ?>
<?php include_once '../helpers/Format.php'; 
$fm=new Format();
$pd=new Product();
?>
<?php
$objpro=new Product();
if(isset($_GET['delproductid'])){
	$delete=$_GET['delproductid'];
	$deleteproduct=$objpro->deleteProductById($delete);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
		
<?php

if(isset($deleteproduct)){
	echo $deleteproduct;
}

?>		
		
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Sl</th>
					<th>Product Name</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Description</th>
					<th>Price</th>
					<th>Iamge</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
<?php 
$productlist=$pd->showproductlist();
if($productlist){
			$i=1;
			while($result=$productlist->fetch_assoc()){

?>
		
				<tr class="odd gradeX">
					<td width="5%"><?php echo $i; ?></td>
					<td width="10%"><?php echo $result['productname']; ?></td>
					<td width="10%"><?php echo $result['catname']; ?></td>
					<td width="10%"><?php echo $result['brandname']; ?></td>
					<td width="15%"><?php echo $fm->shortTxt($result['body'],30); ?></td>
					<td width="10%"><?php echo $result['price']; ?></td>
					<td width="15%">
					<img src="<?php echo $result['image']; ?>" alt="" height="50" width="100"/>
					</td>
					<td width="10%">
					
					<?php
					
					if($result['type'] == 0)
					{
						echo "General";
					}
					else{
						echo "Featured";
					}
					?>
					
					
					</td>
					<td width="15%">
							<a href="editproduct.php?productid=<?php echo $result['productid'];
							?>">
							Edit
							</a>
							|| 
							<a onclick="return confirm('Are You Sure To Delete The Product??');" href="?delproductid=<?php echo $result['productid']; ?>">Delete</a>
					</td>
				</tr>
<?php $i++; } } ?>			
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
