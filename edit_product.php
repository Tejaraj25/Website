<?php	
	// if save change happen
	if(!isset($_POST['save_change'])){
		echo "Something wrong!";
		exit;
	}

	$pid = trim($_POST['pid']);
	$title = trim($_POST['pname']);
	//$author = trim($_POST['author']);
	$desc = trim($_POST['pdesc']);
	//$price = floatval(trim($_POST['price']));
	//$publisher = trim($_POST['publisher']);

	if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
		$image = $_FILES['image']['name'];
		$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
		$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
		$uploadDirectory .= $image;
		move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
	}

	require_once("./functions/database_functions.php");
	$conn = db_connect();

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
	}*/


	$query = "UPDATE product SET  
	pname = '$title', 
	 
	pdesc = '$desc'";
	
	if(isset($image)){
		$query .= ", pimage='$image' WHERE pid = '$pid'";
	} else {
		$query .= " WHERE pid = '$id'";
	}
	// two cases for fie , if file submit is on => change a lot
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't update data " . mysqli_error($conn);
		exit;
	} else {
		header("Location: admin_edit.php?pid=$pid");
	}
?>