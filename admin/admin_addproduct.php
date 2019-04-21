<?php
require_once 'scripts/config.php';
confirm_logged_in();

$cat_tbl            = 'tbl_category';
$product_categories = getAll($cat_tbl);

if (isset($_POST['submit'])) {
    $pic     = $_FILES['pic'];
    $name    = $_POST['name'];
    $text    = $_POST['text'];
    $price   = $_POST['price'];
    $cat     = $_POST['genList'];
    $result  = addProduct($pic, $name, $text, $price, $cat);
    $message = $result;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    
    <!-- Dashboard Nav -->
	<?php include('../templates/dashboard.html'); ?>
    <!-- Dashboard Nav End-->
    
    <?php if (!empty($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form action="admin_addproduct.php" method="post" enctype="multipart/form-data">
        <label for="cover">Product Image</label>
        <input type="file" name="pic" id="pic" value=""><br><br>

        <label for="title">Product Name:</label>
        <input type="text" name="name" id="name" value=""><br><br>

        <label for="year">Product Text:</label>
        <input type="text" name="text" id="text" value=""><br><br>

        <label for="run">Product Price:</label></label>
        <input type="text" name="price" id="price" value=""><br><br>

        <label for="genlist">Product Category:</label>
        <select name="genList" id="genlist">
            <option>Please select a category...</option>
            <?php while ($product_category = $product_categories->fetch(PDO::FETCH_ASSOC)): ?>
            <option value="<?php echo $product_category['cat_id']; ?>">
                <?php echo $product_category['cat_name']; ?>
            </option>
            <?php endwhile; ?>
        </select><br><br>

        <button type="submit" name="submit">Add Product</button>
    </form>
</body>
</html>