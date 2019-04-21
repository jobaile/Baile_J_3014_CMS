<?php
	//ob_start(); //fixes the issue of the page not refreshing with a successful update
	require_once('scripts/config.php');
	include('scripts/connect.php');
	confirm_logged_in();

	if(isset($_REQUEST['update_id'])){
		try{
			$id = $_REQUEST['update_id']; 
			$update_user_query = 'SELECT * FROM tbl_products WHERE prod_id =:id';
			
			$update_set = $pdo->prepare($update_user_query);
			$update_set->execute(
				array(
					':id'=>$id
				)
			);
		}
		catch(PDOException $e) {
			$e->getMessage();
		}
	}

	if(isset($_REQUEST['update_prod'])){
		$pic    = $_FILES['pic'];
		$name  	= $_POST['name'];
		
		//Validation
		if(empty($name)){
			$message = 'Please fill the required fields';
		}else{
			$result  = editProduct($id, $name, $pic, $cat_id);
			$message = $result;
		}
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Testing</title>
</head>
<body>
	<!-- Dashboard Nav -->
	<?php include('../templates/dashboard.html'); ?>
	<!-- Dashboard Nav End-->
	
	<h2>Testing</h2>
	<?php if(!empty($message)):?>
		<p><?php echo $message;?></p>
	<?php endif;?>

	<?php if($row = $update_set->fetch(PDO::FETCH_ASSOC)):?>
		<form method="post">
			<label for="first-name">Product Name:</label>
			<input type="text" id="prod-name" name="name" value="<?php echo $row['prod_name'];?>"><br><br>

			<label for="picture">Product Image:</label>
			<input type="file" name="pic" id="pic" value="<?php echo $row['prod_pic'];?>"><br><br>
			<img src="../images/<?php echo $row['prod_pic']; ?>" height="100" width="100" /></p>

			<label for="desc">Product Text/Description:</label>
			<input type="text" id="prod-desc" name="text" value="<?php echo $row['prod_text'];?>"><br><br>

			<label for="first-name">Product Price:</label>
			<input type="text" id="prod-price" name="price" value="<?php echo $row['prod_price'];?>"><br><br>

		<input type="submit" name="update_prod" value="Update">
		</form>
	<?php endif; ?>
</body>
</html>