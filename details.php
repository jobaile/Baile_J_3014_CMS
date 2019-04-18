<?php require_once('admin/scripts/config.php');
if(isset($_GET['id'])){
	$tbl = 'tbl_movies';
	$col = 'movies_id';
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
		<h2><?php echo $row['movies_title'];?></h2>
		<p><?php echo $row['movies_storyline'];?></p>
	<?php endwhile;?>
	</div>

	<?php include('templates/footer.html');?>
</body>
</html>