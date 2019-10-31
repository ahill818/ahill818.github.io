<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="300">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>CSU-MLP</title>

    <!-- Bootstrap core CSS -->
    <!--<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">-->
	  <link href="../css/bootstrap.min.css" rel="stylesheet">
    <style>
    .carousel-control.left, .carousel-control.right {
      background-image: none;
    }
    </style>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
	  <!--    <link href="navbar.css" rel="stylesheet"> -->
    <link href="../css/navbar.css" rel="stylesheet">


    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/ie-emulation-modes-warning.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      <div class="container">
      	<nav class="navbar navbar-default">
        	<div class="container-fluid">
          		<div class="navbar-header">
            		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              			<span class="sr-only">Toggle navigation</span>
              			<span class="icon-bar"></span>
              			<span class="icon-bar"></span>
              			<span class="icon-bar"></span>
            		</button>
            		<a class="navbar-brand" href="index.php">Vortex SE</a>
          		</div>
          		<div id="navbar" class="navbar-collapse collapse">                                   
            		<ul class="nav navbar-nav">  
              			<li class="dropdown">
                			<a href="nssl_verif.html">GEFS Day 1 Forecasts</a>
              			</li>
            		</ul>     
                <ul class="nav navbar-nav">  
                    <li class="dropdown">
                      <a href="nssl_verif.html">GEFS Day 2 Forecasts</a>
                    </li>
                </ul>    
                <ul class="nav navbar-nav">  
                    <li class="dropdown">
                      <a href="nssl_verif.html">GEFS Day 3 Forecasts</a>
                    </li>
                </ul>                                   
            		<ul class="nav navbar-nav">  
              			<li class="dropdown">
                			<a href="nssl_verif.html">GEFS Verification</a>
              			</li>
            		</ul>                                           
            		<ul class="nav navbar-nav">  
              			<li class="dropdown">
                			<a href="nssl_fcsts.html">NSSL Day 1 Forecasts</a>
              			</li>
            		</ul>                                          
            		<ul class="nav navbar-nav">  
              			<li class="dropdown">
                			<a href="nssl_verif.html">NSSL Verification</a>
              			</li>
            		</ul>         
		      	</div> 
		    </div>
	    </nav>
  <?php
      if (isset ($_GET['id'])){
        $id = ($_GET['id']);
      } else {
        $id = "csu_ari_ml_gefso_day3_110312";
      }
    $imglink = $id.".png"; ?>
  <img src="../figures/20191103/<?php echo $imglink; ?>" height=700px width=800px/>

	</div> <!-- container -->
  </body>
</html>

