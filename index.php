<?php require_once('admin/scripts/config.php');
if(isset($_GET['filter'])){
	$tbl = 'tbl_products';
	$tbl_2 = 'tbl_category';
	$tbl_3 = 'tbl_prod_cat';
	$col = 'prod_id';
	$col_2 = 'cat_id';
	$col_3 = 'cat_name';
	$filter = $_GET['filter'];
	$results = filterResults($tbl,$tbl_2,$tbl_3,$col,$col_2,$col_3,$filter);
}else{
	$results = getAll('tbl_products');
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

	<div class="all">
		<?php while($row = $results->fetch(PDO::FETCH_ASSOC)):?>
		<div class="productall">
		<a href="details.php?id=<?php echo $row['prod_id'];?>">
			<img class="productpic" src="images/<?php echo $row['prod_pic'];?>" alt="<?php echo $row['prod_name'];?>">
		
			<h2 class="producttitle"><?php echo $row['prod_name'];?></h2>
			</a>
		</div>
		<?php endwhile;?>
	</div>

	<!-- Footer -->
	<?php include('templates/footer.html');?>
	<!-- Footer End -->

</body>
</html>