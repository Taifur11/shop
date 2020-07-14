<?php
include '../classes/Category.php';
$catlist=new Category();
?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
if(isset($_GET['delid'])){
	$delete=$_GET['delid'];
	$deletecat=$catlist->deleteCatById($delete);

}
?>
        <div class="grid_10">
            <div class="box round first grid">
			
                <h2>Category List</h2>
                <?php
                if(isset($deletecat)){
                	echo $deletecat;
                }
                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
<?php
$listcat=$catlist->showcatlist();
if($listcat){
			$i=1;
			while($result=$listcat->fetch_assoc()){

?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['catname']; ?></td>
							<td>
							<a href="editcat.php?catid=<?php echo $result['catid'];
							?>">
							Edit
							</a>
							|| 
							<a onclick="return confirm('Are You Sure To Delete The Category?');" href="?delid=<?php echo $result['catid']; ?>">Delete</a></td>
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

