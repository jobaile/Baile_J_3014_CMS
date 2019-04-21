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

	if(isset($_REQUEST['btn_update'])){
		$pic     = $_FILES['pic'];
		$prod_name  = $_POST['name'];
		
		//Validation
		if(empty($prod_name)){
			$message = 'Please fill the required fields';
		}else{
			$result  = editProduct($id, $prod_name, $prod_pic);
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
			<label for="first-name">First Name:</label>
			<input type="text" id="first-name" name="name" value="<?php echo $row['prod_name'];?>"><br><br>

		<input type="submit"  name="btn_update" value="Update">
		</form>
	<?php endif; ?>
</body>
</html>