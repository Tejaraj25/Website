<?php
  session_start();
  $pid = $_GET['pid'];
  // connecto database
  require_once "./functions/database_functions.php";
  $conn = db_connect();

  $query = "SELECT * FROM product WHERE pid = '$pid'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $row = mysqli_fetch_assoc($result);
  if(!$row){
    echo "No Product";
    exit;
  }

  $title = $row['pname'];
  require "./template/header.php";
?>
      <!-- Example row of columns -->
      <p class="lead" style="margin: 25px 0"><a href="products.php">Product</a> <br/>Name: <?php echo $row['pname']; ?></p>
      <div class="row">
        <div class="col-md-3 text-center">
          <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $row['pimage']; ?>">
        </div>
        <div class="col-md-6">
          <h4>Product Description</h4>
          <p><?php echo $row['pdesc']; ?></p>
          <!--<h4>Product Details</h4>
          <table class="table">
          	<?php foreach($row as $key => $value){
              if($key == "pdesc" || $key == "pimage" || $key == "pname"){
                continue;
              }
              switch($key){
                case "pid":
                  $key = "Id";
                  break;
                case "pname":
                  $key = "name";
                  break;
                
              }
            ?>
            <tr>
              <td><?php echo $key; ?></td>
              <td><?php echo $value; ?></td>
            </tr>
            <?php 
              } 
              if(isset($conn)) {mysqli_close($conn); }
            ?>
          </table>!-->
         <!-- <form method="post" action="cart.php">
            <input type="hidden" name="pid" value="<?php echo $pid;?>">
            <input type="submit" value="Purchase / Add to cart" name="cart" class="btn btn-primary">
          </form>!-->
       	</div>
      </div>
<?php
  require "./template/footer.php";
?>