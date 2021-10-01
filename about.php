<?php
  session_start();
  $count = 0;
  // connecto database
  
  $title = "About Us";
  require_once "./template/header.php";
  
?>
<head>
<title>
    About Us</title>
</head>
<?php
  if(isset($conn)) {mysqli_close($conn);}
  require_once "./template/footer.php";
?>