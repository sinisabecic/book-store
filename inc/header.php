<?php
 include 'inc/countries.php';
 include 'lib/Session.php';

 
  Session::init();  // Mora stojati iznad HTML-a    
 

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

<!DOCTYPE html>
<html>
<head>
<title>Prodavnica knjiga</title>
<link rel="shortcut icon" type="image/png" href="images/icon.png">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  h1, h2{color: #4CAF50;}

   .button {
    position: relative;
    background-color: #4CAF50;
    border: none;
    font-size: 18px;
    color: #FFFFFF;
    padding: 10px;
    width: 45px;
    text-align: center;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
    text-decoration: none;
    overflow: hidden;
    cursor: pointer;
   
}
  .button1 {
    position: relative;
    background-color: #4CAF50;
    border: none;
    font-size: 17px;
    color: #FFFFFF;
    padding: 5px;
    width: 115px;
    text-align: center;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
    text-decoration: none;
    overflow: hidden;
    cursor: pointer;
    border-radius: 8px;
}
.button1:after {
  content: "";
  background: #f1f1f1;
  display: block;
  position: absolute;
  padding-top: 300%;
  padding-left: 350%;
  margin-left: -20px !important;
  margin-top: -120%;
  opacity: 0;
  transition: all 0.8s
}
.button1:hover{
  background-color: #3e8e41;
}
.button:hover{
  background-color: #3e8e41;
}

.button1:active:after {
  padding: 0;
  margin: 0;
  opacity: 1;
  transition: 0s
}
  #mySearch { 
  font-size: 14px;
  padding: 9px;
  border: 1px solid #ddd;
}
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
</style>





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

<style>
#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>


</head>
<body>
  <div class="wrap" style="background-color: #333333">
		<div class="header_top">		
			
			    

 <div class="topnav">
   
        <a class="active" href="index.php">Pocetna</a>


        
		<!-- Korpa i placanje -->
		<?php 
        $chkCart = $ct->checkCartTable(); 
        if ($chkCart) { ?>
        	<a href="cart.php">
			Korpa </span>
			</a>
        	<a href="payment.php">Placanje</a>
      <?php  }  ?>
		
		
		<!-- Porucivanje -->
	<?php 
       $cmrId =  Session::get("cmrId");
        $chkOrder = $ct->checkOrder($cmrId); 
        if ($chkOrder) { ?>
        	<a href="order.php">Porucivanje</a>
        	 
      <?php  }  ?>
		
		
      <!-- Profil -->
		<?php 
			$login =  Session::get("cuslogin");
			if ($login == true) { ?>
				<a href="profile.php">Profil</a>
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
		
		<a href="wishlist.php">Lista zelja</a> 
         <?php   } ?>

		
        <a href="contact.php">Kontakt</a>
      
<?php 
        if (Session::get('cmrId') == 0 and Session::get('cuslogin')) { // Id admina je 0.
        ?>    
          <a href="admin/index.php"><i class="fa fa-fw fa-user"></i>Admin</a> 
         <?php   } ?>
	  

      <form action="search.php" method="get">      	

          <input style="width: 130px" name="search" type="text" id="mySearch" onkeyup="myFunction()" placeholder="Pretraga">
    
		
       <button class="button" type="submit"><i class="fa fa-fw fa-search"></i></button>



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
			  <a style="color: #4CAF50" href="login.php"><i class="fa fa-fw fa-user"></i>Prijava</a>
			
				<?php   }else { ?>
	            <a style="color: red" href="?cid=<?php Session::get('cmrId') ?>"><i class="fa fa-fw fa-user"></i>Odjava</a>            

		  <?php } ?>




		  <a href="cart.php"><i class="fa fa-fw fa-eur"></i><?php 

                             $getData = $ct->checkCartTable();
                             if ($getData) {
                             	 $sum = Session::get("sum");
                             	 $qty = Session::get("qty");
                           			  echo " " .$sum;	//" Kol. ".$qty;
                             }else{
                             	echo " 0";
                             }
                            
								?></a>
</form>


 </div>
  </div>
