<?php require_once('admin/scripts/config.php');
if(isset($_GET['filter'])){
	$tbl = 'tbl_movies';
	$tbl_2 = 'tbl_genre';
	$tbl_3 = 'tbl_mov_genre';
	$col = 'movies_id';
	$col_2 = 'genre_id';
	$col_3 = 'genre_name';
	$filter = $_GET['filter'];
	$results = filterResults($tbl,$tbl_2,$tbl_3,$col,$col_2,$col_3,$filter);
}else{
	$results = getAll('tbl_movies');
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
	<form method="POST" action="admin/search.php?go" id="searchform"> 
		<input type="text" name="search"> 
		<input type="submit" name="submit" value="Search"> 
	</form> 
	<!-- Header End-->

	<div>
		<?php while($row = $results->fetch(PDO::FETCH_ASSOC)):?>
		<a href="details.php?id=<?php echo $row['movies_id'];?>">
			<img src="images/<?php echo $row['movies_cover'];?>" alt="<?php echo $row['movies_title'];?>">
		</a>
			<h2><?php echo $row['movies_title'];?></h2>
		<?php endwhile;?>
	</div>

	<!-- Footer -->
	<?php include('templates/footer.html');?>
	<!-- Footer End -->

</body>
</html>