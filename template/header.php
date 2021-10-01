<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title; ?></title>

    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="./bootstrap/css/jumbotron.css" rel="stylesheet">
      <style>
.foot {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color:darkseagreen;
  color: white;
  text-align: center;
}
          #sttt
          {
              
              background-color: darkgray;
          }
</style>
  </head>

  <body id="sttt">

    <nav class="navbar navbar-inverse navbar-fixed-top" >
      <div class="container" >
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">SURYA Enterprises</a>
        </div>

        <!--/.navbar-collapse -->
        <div id="navbar" class="navbar-collapse collapse" >
          <ul class="nav navbar-nav navbar-right">
             
              <li><a href="about.php"><span class="glyphicon glyphicon-user"></span>&nbsp; About US</a></li>
              
              <li><a href="products.php"><span class="glyphicon glyphicon-th-list"></span>&nbsp; Products</a></li>
              
              <li><a href="contact.php"><span class="glyphicon glyphicon-phone-alt"></span>&nbsp; Contact</a></li>
              
            </ul>
        </div>
      </div>
    </nav>
    <?php
      if(isset($title) && $title == "Surya Enterprise") {
    ?>
    
    <div class="jumbotron">
      <div class="container">
        <h1>Welcome to Surya Enterprise</h1>
       
      </div>
    </div>
    <?php } ?>

    <div class="container" id="main">