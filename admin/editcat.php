<?php
include '../classes/Category.php';
?>
<?php
$catupdate=new Category();
if(!isset($_GET['catid']) || $_GET['catid']== NULL){
	header("Location:catlist.php");
}
else{
	$catid=$_GET['catid'];
}
?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$catupname=$_POST['catname'];

$updatecat=$catupdate->updateCategory($catupname,$catid);
}
?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
			
                <h2>Update Category</h2>
               <div class="block copyblock"> 
			   
			   <?php 
			
			if(isset($updatecat)){
				echo $updatecat;
			}
			
			?>
<?php
$res=$catupdate->getCatById($catid);
if($res){
	while($result=$res->fetch_assoc()){
?>
                 <form action="" method="post">
                    <table class="form">

					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['catname'];?>" class="medium" name="catname" />
                            </td>
                        </tr>
						<tr> 
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
<?php include 'inc/footer.php';?>