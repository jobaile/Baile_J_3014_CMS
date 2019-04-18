<?php 
	require_once('scripts/config.php');
	confirm_logged_in();
?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Admin Panel</title>
</head>

<body>

	<!-- Dashboard Nav -->
	<?php include('../templates/dashboard.html'); ?>
	<!-- Dashboard Nav End-->

	
	<h1>Admin Dashboard</h1>
	<h3>Welcome <?php echo $_SESSION['user_name'];?></h3>
	<p>This is the admin dashboard page</p>

	<?php if(!empty($message)):?>
		<p><?php echo $message;?></p>
	<?php endif;?>

	<nav>
		<ul>
			<li><a href="admin_createuser.php">Create User</a></li>
			<li><a href="admin_edituser.php">Edit User</a></li>
			<li><a href="admin_deleteuser.php">Delete User</a></li>
		</ul>

		<ul>
			<li><a href="admin_addproduct.php">Add A Product</a></li>
			<li><a href="admin_editproduct.php">Edit A Product</a></li>
		</ul>
	</nav>
</body>

</html>