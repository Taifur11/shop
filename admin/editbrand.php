<?php
include '../classes/Brand.php';
?>
<?php
$brandupdate=new Brand();
if(!isset($_GET['brandid']) || $_GET['brandid']== NULL){
	header("Location:brandlist.php");
}
else{
	$brandid=$_GET['brandid'];
}
?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$brandupname=$_POST['brandname'];

$updatebrand=$brandupdate->updateBrand($brandupname,$brandid);
}
?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
			
                <h2>Update Brand</h2>
               <div class="block copyblock"> 
			   
			   <?php 
			
			if(isset($updatebrand)){
				echo $updatebrand;
			}
			
			?>
<?php
$res=$brandupdate->getBrandById($brandid);
if($res){
	while($result=$res->fetch_assoc()){
?>
                 <form action="" method="post">
                    <table class="form">

					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['brandname'];?>" class="medium" name="brandname" />
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