<?php
	session_start();
	require_once "./functions/admin.php";
	$title = "Edit Product";
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();

	if(isset($_GET['pid'])){
		$pid = $_GET['pid'];
	} else {
		echo "Empty query!";
		exit;
	}

	if(!isset($pid)){
		echo "Empty isbn! check again!";
		exit;
	}

	// get book data
	$query = "SELECT * FROM product WHERE pid = '$pid'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	$row = mysqli_fetch_assoc($result);
?>
	<form method="post" action="edit_book.php" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>Product ID</th>
				<td><input type="text" name="pid" value="<?php echo $row['pid'];?>" readOnly="true"></td>
			</tr>
			<tr>
				<th>Name</th>
				<td><input type="text" name="pname" value="<?php echo $row['pname'];?>" required></td>
			</tr>
			
			<tr>
				<th>Image</th>
				<td><input type="file" name="image"></td>
			</tr>
			<tr>
				<th>Description</th>
				<td><textarea name="pdesc" cols="40" rows="5"><?php echo $row['pdesc'];?></textarea>
			</tr>
			
		</table>
		<input type="submit" name="save_change" value="Change" class="btn btn-primary">
		<input type="reset" value="cancel" class="btn btn-default">
	</form>
	<br/>
	<a href="admin_product.php" class="btn btn-success">Confirm</a>
<?php
	if(isset($conn)) {mysqli_close($conn);}
	require "./template/footer.php"
?>