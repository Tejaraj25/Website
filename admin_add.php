<?php
	session_start();
	require_once "./functions/admin.php";
	$title = "Add new product";
	require "./template/header.php";
	require "./functions/database_functions.php";
	$conn = db_connect();

	if(isset($_POST['add'])){
		$id = trim($_POST['id']);
		$id = mysqli_real_escape_string($conn, $id);
		
		$name = trim($_POST['name']);
		$name = mysqli_real_escape_string($conn, $name);

		
		
		$desc = trim($_POST['desc']);
		$desc = mysqli_real_escape_string($conn, $desc);
		
		;

		// add image
		if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
			$image = $_FILES['image']['name'];
			$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
			$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
			$uploadDirectory .= $image;
			move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
		}

		// find publisher and return pubid
		// if publisher is not in db, create new
		/*$findPub = "SELECT * FROM publisher WHERE publisher_name = '$publisher'";
		$findResult = mysqli_query($conn, $findPub);
		if(!$findResult){
			// insert into publisher table and return id
			$insertPub = "INSERT INTO publisher(publisher_name) VALUES ('$publisher')";
			$insertResult = mysqli_query($conn, $insertPub);
			if(!$insertResult){
				echo "Can't add new publisher " . mysqli_error($conn);
				exit;
			}
			$publisherid = mysql_insert_id($conn);
		} else {
			$row = mysqli_fetch_assoc($findResult);
			$publisherid = $row['publisherid'];
		}*/


		$query = "INSERT INTO product VALUES ('" . $id . "', '" . $name . "', '" . $image . "', '" . $descr . "')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't add new data " . mysqli_error($conn);
			exit;
		} else {
			header("Location: admin_product.php");
		}
	}
?>
	<form method="post" action="admin_add.php" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>Product id</th>
				<td><input type="text" name="isbn"></td>
			</tr>
			<tr>
				<th>Product name</th>
				<td><input type="text" name="name" required></td>
			</tr>
			
			<tr>
				<th>Image</th>
				<td><input type="file" name="image"></td>
			</tr>
			<tr>
				<th>Description</th>
				<td><textarea name="descr" cols="40" rows="5"></textarea></td>
			</tr>
			
		</table>
		<input type="submit" name="add" value="Add new book" class="btn btn-primary">
		<input type="reset" value="cancel" class="btn btn-default">
	</form>
	<br/>
<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>