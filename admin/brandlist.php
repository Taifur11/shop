<?php
include '../classes/Brand.php';
$brandlist=new Brand();
?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
if(isset($_GET['delid'])){
	$delete=$_GET['delid'];
	$deletebrand=$brandlist->deleteBrandById($delete);

}
?>
        <div class="grid_10">
            <div class="box round first grid">
			
                <h2>Brand List</h2>
                <?php
if(isset($deletebrand)){
	echo $deletebrand;
}
?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Brand Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
<?php
$listbrand=$brandlist->showbrandlist();
if($listbrand){
			$i=1;
			while($result=$listbrand->fetch_assoc()){

?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['brandname']; ?></td>
							<td>
							<a href="editbrand.php?brandid=<?php echo $result['brandid'];
							?>">
							Edit
							</a>
							|| 
							<a onclick="return confirm('Are You Sure');" href="?delid=<?php echo $result['brandid']; ?>">Delete</a></td>
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

