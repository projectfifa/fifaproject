<?php
	session_start();
	
	include 'classes/class.database.php';
	include '../constants.php';

	$db = new Database($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_database']);
	$db->connect();
	
	$categories = $db->getCategories();
	
	include 'user.php';
	
	if (isset($_GET['dcat']) && is_numeric($_GET['dcat'])) {
		$db->deleteCategory($_GET['dcat']);
		header("location: index.php");
		exit;
	}
	
	if (isset($_POST['acat'])) {
		$db->addCategory($_POST['acat']);
		header("location: index.php");
		exit;
	}
	
	if (isset($_POST['action'])) {
		$itemId = isset($_POST['itemid']) ? $_POST['itemid'] : -1;
		$name = $_POST['name'];
		$category = $_POST['category'];
		$price = $_POST['price'];
		$discount = $_POST['discount'];
		$image = $_POST['image'];
		
		if ($_POST['action'] == "save") {
			$db->updateItem($itemId, $image, $name, $category, $price, $discount);
			header("location: index.php");
			exit;
		}
		
		if ($_POST['action'] == "add") {
			$db->addItem($name, $category, $price, $discount, $image);
			header("location: index.php");
			exit;
		}
		
		if ($_POST['action'] == "delete") {
			$db->deleteItem($itemId);
			header("location: index.php");
			exit;
		}
	}
?>

<!DOCTYPE html>
<html>
<?php include 'templates/head.php'; ?>
<body>
	<div class="container">
		<?php 
			include 'templates/navbar.php';
			include 'templates/alert.php';
		?>
		
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<h4 style="margin:0;">Hello, <?php echo ucwords($username); ?>!</h4>
				</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-heading">Categories</div>
				<div class="panel-body">
					<ul class="list-group">
						<?php 
							foreach($categories as $cat) {
								echo '<li class="list-group-item">
										<a href="?dcat='.$cat['cid'].'" class="badge"><i class="fa fa-times"></i></a>
										'.$cat['cat_title'].'
									</li>';
							}
						?>
					</ul>
					<form action="index.php" method="post" id="itemform">
						<div class="form-group">
							<div class="input-group">
								<input class="form-control input-sm" type="text" name="acat" placeholder="Category title">
								<span class="input-group-btn">
						 			<button type="submit" class="btn btn-primary btn-sm"  name="action" value="add">Add</button>
						    	</span>
						  	</div>
						</div>
					</form>
				</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-heading">Add New Product</div>
				<div class="panel-body">
					<form action="index.php" method="post" id="itemform">
						<label>Image URL</label>
						<input class="form-control input-sm" type="text" name="image">
						<label>Item Name</label>
						<input class="form-control input-sm" type="text" name="name">
						<label>Category</label>
						<select class="form-control input-sm" name="category">
							<?php
								foreach ($categories as $cat) {
									echo '<option value="'.$cat['cid'].'">'.$cat['cat_title'].'</option>';
								}
							?>
				        </select>
						<label>Item Price</label>
						<input class="form-control input-sm" type="text" name="price">
						<label>Item Discount</label>
						<input class="form-control input-sm" type="text" name="discount">
						
						<br>
						
						<button type="submit" class="btn btn-success btn-sm btn-block" name="action" value="add">Add Product</button>
					</form>
				</div>
			</div>

		</div>
		
		<div class="col-md-9">
			<table class="table table-hover">
				<tr>
					<td>Item Name</td>
					<td>Category</td>
					<td>Image URL</td>
					<td>Price</td>
					<td>Discount</td>
					<td></td>
					<td></td>
				</tr>
			<?php 
				$products = $db->getProducts();
				foreach($products as $product) {
					include 'templates/product.php';
				}
			?>
			</table>
		</div>
		
	</div>
	<?php include 'templates/footer.php'; ?>
</body>
<?php include 'templates/script.php'; ?>
</html>