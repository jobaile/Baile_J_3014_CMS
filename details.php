<?php require_once('admin/scripts/config.php');
if(isset($_GET['id'])){
	$tbl = 'tbl_products';
	$col = 'prod_id';
	$value = $_GET['id'];
	$results = getSingle($tbl, $col, $value);
}else{
	
}
?>

<!doctype html>
<html>
<head>
	<meta charset='utf-8'>
	<title>Sport Chek</title>
</head>
<body>
	<!-- Header -->
		<?php include('templates/header.html'); ?>
	<!-- Header End-->

	<a href="index.php">Go Back</a>

	<div>
	<?php while($row = $results->fetch(PDO::FETCH_ASSOC)):?>
		<img src="images/<?php echo $row['prod_pic']; ?>">
		<h2><?php echo $row['prod_name'];?></h2>
		<p><?php echo $row['prod_text'];?></p>
		<p>$<?php echo $row['prod_price'];?></p>
	<?php endwhile;?>
	</div>

	<?php include('templates/footer.html');?>
</body>
</html>