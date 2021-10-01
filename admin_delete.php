<?php
	$pid = $_GET['pid'];

	require_once "./functions/database_functions.php";
	$conn = db_connect();

	$query = "DELETE FROM product WHERE pid = '$pid'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "delete data unsuccessfully " . mysqli_error($conn);
		exit;
	}
	header("Location: admin_product.php");
?>