<!DOCTYPE html>
<html>
<head>
<title>Prodavnica knjiga</title>
 <link rel="shortcut icon" type="image/png" href="images/icon.png">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<link rel="stylesheet" href="adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="adminlte/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="adminlte/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="adminlte/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="adminlte/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">





<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>

<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
		<div class="header_top">		
			
			    
<nav class="navbar navbar-inverse">
  <div class="container-fluid">    

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Pocetna <span class="sr-only"></span></a></li>

<?php
 include 'lib/Session.php';
 

 // Ovaj dio je dodat za Elmaza, jer mu izbaca: "a session had already been started - ignoring session_start()"
	if(!isset($_SESSION)) 
	{ 
	    Session::init();
	    ob_start(); 
	}

 include 'lib/Database.php';
 include 'helpers/Format.php';
  


  spl_autoload_register(function($class){
   include_once "classes/".$class.".php";

  });

  $db = new Database();
  $fm = new Format();
  $pd = new Product(); // knjiga
  $cat = new Category(); // autor
  $ct = new Cart();
  $cmr = new User();
  $con = New Contact();
  	
?>
        
		<!-- Korpa i placanje -->
		<?php 
        $chkCart = $ct->checkCartTable(); 
        if ($chkCart) { ?>
        	<li><a href="cart.php">
			Korpa  <span class="glyphicon glyphicon-shopping-cart"></span>
			</a></li>
        	<li><a href="payment.php">Placanje</a></li>
      <?php  }  ?>
		
		
		<!-- Porucivanje -->
	<?php 
       $cmrId =  Session::get("cmrId");
        $chkOrder = $ct->checkOrder($cmrId); 
        if ($chkOrder) { ?>
        	<li><a href="order.php">Porucivanje</a></li>
        	 
      <?php  }  ?>
		
		
      <!-- Profil -->
		<?php 
			$login =  Session::get("cuslogin");
			if ($login == true) { ?>
				<li><a href="profile.php">Profil</a></li>
		<?php } 	?>
	

		<!-- Uporedi knjige -->
		 <?php                      
 				/*	$getPd = $pd->getCompareProduct($cmrId);
 					if ($getPd) {  
 						?>
		
		<li><a href="compare.php">Uporedi</a> </li>
         <?php  } */?>


		 <?php     // AKO IMA KNJIGE U LISTI ZELJA, PRIKAZATI DUGME LISTA ZELJA.
		 			// U OVOM SLUCAJU JA TO NECU                
 					// $checkwlist = $pd->checkWlistData($cmrId);
 					// if ($checkwlist) {  
 					
 					// Ako je neko prijavljen, prikazati mu dugme lista zelja
		 if (isset($_SESSION['cuslogin'])) {
		 		?>
		
		<li><a href="wishlist.php">Lista zelja</a> </li>
         <?php   } ?>

		
        <li><a href="contact.php">Kontakt</a> </li>
      </ul>

	  

      <form class="navbar-form navbar-left" action="search.php" method="get">
        <div class="form-group">		 
          <input style="width: 140px" name="search" type="text" class="form-control" placeholder="Pretraga">
      </div>	
		
       <button class="btn btn-light" type="submit"><span class="glyphicon glyphicon-search"></span></button>



	<!-- Prijavljivanje/odjava -->
 <?php
       if (isset($_GET['cid'])) {
       	$cmrId =  Session::get("cmrId");
       	$delDate = $ct->delCustomerCart();
       	$delComp = $pd->delCompareData($cmrId);
        Session::destroy();
       }

			$login =  Session::get("cuslogin");
			  if ($login == false) { ?>
			  <a href="login.php"><button class="btn btn-primary" type="button">
				Prijava  <span class="glyphicon glyphicon-user"></span>
				</button></a>
			
				<?php   }else { ?>
	            <a href="?cid=<?php Session::get('cmrId') ?>"><button class="btn btn-danger" type="button">
				Odjava  <span class="glyphicon glyphicon-user"></span>
				</button></a>            

		  <?php } ?>




		  <a href="cart.php"><button class="btn btn-warning" type="button"><span class="glyphicon glyphicon-shopping-cart"><?php 

                             $getData = $ct->checkCartTable();
                             if ($getData) {
                             	 $sum = Session::get("sum");
                             	 $qty = Session::get("qty");
                           			  echo " " .$sum."eur";	//" Kol. ".$qty;
                             }else{
                             	echo "(Prazno)";
                             }
                            
								?></span></button></a>
</form>
</nav>

 </div>
