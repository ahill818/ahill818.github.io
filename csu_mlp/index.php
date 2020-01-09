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

    <title>CSU MLP</title>

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
    <?php
      $dates = array_diff(scandir('../figures/',1),array('.','..'));
      $first_date = $dates[0];
      $def_prod = 'csu_ari_ml_gefso_day1';
      ?>
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
            <a class="navbar-brand" href="index.php">CSU MLP</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
              <li>
                  <?php 
                  if (isset($_GET['date'])) { ?>
                  <li><a href="index.php?date=<?php echo ($_GET['date']);?>&product=raw_grid"><span style="text-align:center">Latest <br />Observations</span></a></li>
                  <?php } else { ?>
                  <li><a href="index.php?date=<?php echo $first_date;?>&product=raw_grid"><span style="text-align:center">Latest <br />Observations</span></a></li>
                  <?php } ?>        
              </li>
          </ul>  
          <ul class="nav navbar-nav">
              <li>
                <a href="rawobs.php">Observation <br />Table</a>
              </li>
          </ul>  
            <ul class="nav navbar-nav navbar-right"> 
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dates <span class="caret"></span></a>
                <ul class="dropdown-menu scroll-menu">
                <?php 
                foreach(array_diff(scandir('../figures',1), array('.','..')) as $filename):?>
                  <li><a href="index.php?date=<?php echo basename($filename);?>&product=<?php echo ($_GET['product']);?>&id=<?php echo ($_GET['id']);?>"><?php echo basename($filename);?></a></li>
                <?php endforeach;?>
                </ul> 
        
              </li>
            </ul> 
                     
		      </div> 
		    </div>
	    </nav>

      <div class="row">
       <?php
        if (!isset($_GET['product'])) {
          date_default_timezone_set('UTC');
          $time = date('H'); 
          $dirname = '../figures/'.$first_date.'/';
          $ilink = "csu_ari_ml_gefso_day1*.png";
          $files = glob($dirname.$ilink);
          $latest_file = end($files);
          $imglink = "../figures/" . $first_date . "/csu_ari_ml_gefso_day1_1031" . "12.png";
       ?>
       
        <div class="col-md-8 col-xs-12">
          <img src="<?php echo $latest_file;?>" height=600px width=auto class="center"/>
        </div>
       <?php } else {

        $class_active = true;
        $dirname = '../seimages/'.$_GET['date'].'/';
        date_default_timezone_set('UTC');
        $time = date('H');
        $minute = date('M');
        #if (isset($_GET['id'])) {
        if ($_GET['product']=='met') {
           $id = $_GET['id'];
           $imglink = $id."_meteogram.png";?>
           <div class="col-xs-6 col-md-4"> 
             <h2>Station ID: <?php echo $_GET['statid'];?></h2>
             <h2>Probe: <?php echo $_GET['id'];?></h2>
             <h2>Location: <?php echo $_GET['location'];?> </h2>     
             <h2>Elevation: <?php echo $_GET['elev'];?> m</h2>
             <h2>Installed: <?php echo $_GET['installed'];?></h2>
             <img src="../assets/images/<?php echo $_GET['id'];?>.jpg" height=250px width=auto/>
           </div>   <!-- col-xs-4 -->
           <div class="col-xs-12 col-md-8">
             <img src="<?php echo $dirname;?><?php echo $imglink; ?>" height=auto width=600px/>
           </div>   <!-- col-xs-8 -->
        <?php } else {
           $prod = $_GET['product'];
           $imglink = $prod."_201*.png";
           $files = glob($dirname.$imglink);
           $latest_file = end($files); ?>  
           <div id="myCarousel" class="carousel" style="width: 100%; margin: 0 auto"> <!--data-ride="carousel" data-interval="false">-->
           <div class="carousel-inner" role="listbox">                                 
           <?php foreach(glob($dirname.$imglink) as $filename):
               if ($filename ==  $latest_file) { ?>
                   <div class="item active"><img src="<?php echo $filename;?>" height=1000px width=auto/></div>
               <?php } else { ?>
                   <div class="item"><img src="<?php echo $filename;?>" height=1000px width=auto/></div>                 
               <?php }; ?>
           <?php endforeach; ?>
               <!-- Left and right controls -->
               <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                 <span class="glyphicon glyphicon-chevron-left" aria-hidden="true" style="color:red"></span>
                 <span class="sr-only">Previous</span>
               </a>
               <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                 <span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="color:red"></span>
                 <span class="sr-only">Next</span>
               </a> 

           <?php } ?>

                </div> <!-- carousel-inner -->
                </div> <!-- myCarousel -->

       <?php }; ?>  <!-- if isset -->

     </div> <!-- row -->
</div> <!-- container -->

    <!-- <img src="../seimages/<?php echo $date;?>/<?php echo $imglink; ?>" height=800px width=auto/>

        <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="./js/jquery.min.js"><\/script>')</script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
    <script src="../js/bootstrap-slider.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script>$(document).ready(function(){
      $('#myCarousel').carousel({interval:400,pause:"false"});
      $('#myCarousel').carousel('pause');});
      $("#play").click(function(){$('#myCarousel').carousel('cycle');});
      $("#pause").click(function(){$('#myCarousel').carousel('pause');});
      jQuery(document).on('keydown',function(e){if(e.keyCode==39){jQuery('a.carousel-control.right').trigger('click');}else if(e.keyCode==37){jQuery('a.carousel-control.left').trigger('click');}});
    </script>
  </body>
</html>
