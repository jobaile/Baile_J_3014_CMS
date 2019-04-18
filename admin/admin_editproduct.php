<?php require_once('scripts/config.php');

    $results = getAll('tbl_movies');
    
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

	<table>
        <thead>
            <tr>
                <th>Product ID</th>
				<th>Picture</th>
                <th>Name</th>
				<th>Price</th>
				<th>Edit</th>
				<th>Delete</th>
            </tr>
        </thead>
        <tbody>
			<?php while($row = $results->fetch(PDO::FETCH_ASSOC)):?>
            <tr>
                <td><?php echo $row['movies_id'];?></td>
                <td><img src="../images/<?php echo $row['movies_cover']; ?>" width="100px" height="60px"></td>
				<td><?php echo $row['movies_name'];?></td>
				<td><?php echo $row['movies_name'];?></td>
				<td><a href="scripts/products.php?update_id=<?php echo $row['movies_id']; ?>">Edit</a></td>
                <td><a href="scripts/caller.php?caller_id=delete&id=<?php echo $row['movies_id']; ?>">Delete</a></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>
</html>