<?php 
require_once('scripts/config.php');
confirm_logged_in();

    $id = $_GET['id'];
	$tbl = 'tbl_products';
	$col = 'prod_id';
	
	$found_prod_set = getSingle($tbl, $col, $id);

	if(is_string($found_prod_set)){
		$message = 'Failed to get product info!';
	}

	if(isset($_POST['submit'])){
		$name = trim($_POST['name']);
		$text = trim($_POST['text']);
		$price = trim($_POST['price']);


		//Validation
		if(empty($name) || empty($text) || empty($price)){
			$message = 'Please fill the required fields';
		}else{
			$result = editUserOne($id, $name, $text, $price);
			$message = $result;
		}
	}
?>

<!doctype html>
<html>
<head>
	<meta charset='utf-8'>
	<title>Sport Chek</title>
</head>
<body>
    <!-- Dashboard Nav -->
	<?php include('../templates/dashboard.html'); ?>
    <!-- Dashboard Nav End-->

    <?php if(!empty($message)):?>
		<p><?php echo $message;?></p>
	<?php endif;?>

    <a href="admin_editproduct.php">Go Back</a>

    <div>
    <?php if($row = $found_prod_set->fetch(PDO::FETCH_ASSOC)):?>
		<form action="product_detail.php" method="post">
			<label for="name">First Name:</label>
			<input type="text" id="first-name" name="name" value="<?php echo $row['prod_name'];?>"><br><br>

			<label for="text">User Name:</label>
			<input type="text" id="username" name="text" value="<?php echo $row['prod_text'];?>"><br><br>

			<label for="price">Password:</label>
			<input type="text" id="password" name="price" value="<?php echo $row['prod_price'];?>"><br><br>

			<button type="submit" name="submit">Edit User</button>
		</form>
	<?php endif; ?>
    </div>
</body>
</html>