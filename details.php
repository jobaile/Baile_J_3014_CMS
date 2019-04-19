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
	<link rel="stylesheet" type="text/css" media="screen" href="css/main.css"/>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
	<title>Sport Chek</title>
</head>
<body>
	<!-- Header -->
	<div class="navstyle">
	<img class="logo" src="images/logo.png" alt="logo">
	<div class="navright">
	<?php include('templates/header.html'); ?>
	<!-- <form method="POST" action="admin/search.php" id="searchform"> 
		<input type="text" name="search"> 
		<input type="submit" name="submit" value="Search"> 
	</form> -->
	</div>
	</div>
	<!-- Header End-->

	<a class="backbtn" href="index.php">GO BACK</a>

	<div>
	<?php while($row = $results->fetch(PDO::FETCH_ASSOC)):?>
		<div class="detailsall">
		<img class="detailspic" src="images/<?php echo $row['prod_pic']; ?>">
		<div class="detailstext">
		<h2 class="detailstitle"><?php echo $row['prod_name'];?></h2>
		<p class="detailsdesc"><?php echo $row['prod_text'];?></p>
		<p class="detailsprice">$<?php echo $row['prod_price'];?></p>
		</div>
		</div>
	<?php endwhile;?>
	</div>

	<?php include('templates/footer.html');?>
</body>
</html>