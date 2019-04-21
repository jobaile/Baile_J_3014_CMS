<?php require_once('scripts/config.php');
    $results = getAll('tbl_products');
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
                <th>ID</th>
				<th>Picture</th>
				<th>Name</th>
				<th>Text</th>
				<th>Price</th>
				<th>Edit</th>
				<th>Delete</th>
            </tr>
        </thead>
        <tbody>
			<?php while($row = $results->fetch(PDO::FETCH_ASSOC)):?>
            <tr>
                <td><?php echo $row['prod_id'];?></td>
                <td><img src="../images/<?php echo $row['prod_pic']; ?>" alt="<?php echo $row['prod_name'];?>" width="100px" height="60px"></td>
				<td><?php echo $row['prod_name'];?></td>
				<td><?php echo $row['prod_text'];?></td>
				<td><?php echo $row['prod_price'];?></td>
				<td><a href="product_detail.php?update_id=<?php echo $row['prod_id']; ?>">Edit</a></td>
                <td><a href="scripts/caller.php?caller_id=erase&id=<?php echo $row['prod_id']; ?>">Delete</a></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>
</html>