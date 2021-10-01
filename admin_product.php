<?php
	session_start();
	require_once "./functions/admin.php";
	$title = "List of Products";
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();
	$result = getAll($conn);
?>
	<p class="lead"><a href="admin_add.php">Add new product</a></p>
	<a href="admin_signout.php" class="btn btn-primary">Sign out!</a>
	<table class="table" style="margin-top: 20px">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<!--<th>Author</th>!-->
			<th>Image</th>
			<th>Description</th>
			<!--<th>Price</th>
			<th>Publisher</th>!-->
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		<?php while($row = mysqli_fetch_assoc($result)){ ?>
		<tr>
			<td><?php echo $row['pid']; ?></td>
			<td><?php echo $row['pname']; ?></td>
			
			<td><?php echo $row['pimage']; ?></td>
			<td><?php echo $row['pdesc']; ?></td>
			
			<td><a href="admin_edit.php?pid=<?php echo $row['pid']; ?>">Edit</a></td>
			<td><a href="admin_delete.php?pid=<?php echo $row['pid']; ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>

<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>