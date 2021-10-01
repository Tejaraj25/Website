<?php
  session_start();
  $count = 0;
  // connecto database
  
  $title = "Surya Enterprise";
  require_once "./template/header.php";
  require_once "./functions/database_functions.php";
  $conn = db_connect();
  $row = select4Latestproduct($conn);
?>
      <!-- Example row of columns -->
      <p class="lead text-center text-muted">Latest</p>
      <div class="row">
        <?php foreach($row as $p) { ?>
      	<div class="col-md-3">
      		<a href="item.php?pid=<?php echo $p['pid']; ?>">
           <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $p['pimage']; ?>">
          </a>
      	</div>
        <?php } ?>
      </div>
<?php
  if(isset($conn)) {mysqli_close($conn);}
  require_once "./template/footer.php";
?>