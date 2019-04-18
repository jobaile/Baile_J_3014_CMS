<?php 
require_once('scripts/config.php');
confirm_logged_in();
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
    <!-- Dashboard Nav -->
	<?php include('../templates/dashboard.html'); ?>
    <!-- Dashboard Nav End-->

    <a href="admin_editproduct.php">Go Back</a>
	<div>
	<?php while($row = $results->fetch(PDO::FETCH_ASSOC)):?> 
    <form action="product_detail.php" method="post" enctype="multipart/form-data">
        <label for="prod-name">Product Name:</label>
        <input type="text" id="first-name" name="fname" value="<?php echo $row['prod_name'];?>"><br><br>

        <label for="prod-price">Pic:</label>
        <img src="../images/<?php echo $row['prod_pic']; ?>" width="100px" height="60px">
        <input type="file" name="pic" id="pic" value=""><br><br>

        <label for="prod-text">Text:</label>
        <input type="email" id="email" name="email" value="<?php echo $row['prod_text'];?>"><br><br>

        <label for="prod-price">Price:</label>
        <input type="text" id="password" name="password" value="<?php echo $row['prod_price'];?>"><br><br>

        <button type="submit" name="submit">Edit Product</button>
    </form>
    <?php endwhile;?>
</body>
</html>