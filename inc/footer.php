<div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Informacije</h4>
						<ul>
						<li><a href="#">O nama</a></li>
						<li><a href="#">Korisnicki servis</a></li>
						<li><a href="#"><span>Napredna pretraga</span></a></li>
						<li><a href="#">Narudzbe i povracaj</a></li>
						<li><a href="#"><span>Kontakt</span></a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Zasto kupovati kod nas?</h4>
						<ul>
						<li><a href="about.php">O nama</a></li>
						<li><a href="faq.php">Korisnicki servis</a></li>					
						<li><a href="contact.php"><span>Mapa sajta</span></a></li>
						<li><a href="preview.php"><span>Termini za pretragu</span></a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Moj nalog</h4>
						<ul>
							<li><a href="contact.php">Prijava</a></li>
							<li><a href="index.php">Vidi korpu</a></li>
							<li><a href="wishlist.php">Moja lista zelja</a></li>
							<li><a href="#">Prati moju narudzbu</a></li>
							<li><a href="faq.php">Pomoc</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Kontakt</h4>
						<ul>
							<li><span>elmaz.feratovic@gmail.com</span></li>							
						</ul>
						<div class="social-icons">
							<h4>Prati nas</h4>
					   		  <ul>

						 <?php 
					        $brand =  new Brand();
					        $getsocial = $brand->getsocialById();
					        if ($getsocial) {
					           while ($result = $getsocial->fetch_assoc()) {
					           
					     ?>
				 <li class="facebook"><a href="<?php echo $result['fb'] ?>" target="_blank"> </a></li>
				 <li class="twitter"><a href="<?php echo $result['tw'] ?>" target="_blank"> </a></li>
				 <li class="googleplus"><a href="<?php echo $result['ln'] ?>" target="_blank"> </a></li>
				 <li class="contact"><a href="<?php echo $result['gp'] ?>" target="_blank"> </a></li>

							       <?php    }  }  ?>
							      <div class="clear"></div>
						     </ul>
   	 					</div>
				</div>
			</div>
			<div class="copy_right">
		<?php 
        $brand =  new Brand();
        $getcopy = $brand->getcopyById();
        if ($getcopy) {
           while ($result = $getcopy->fetch_assoc()) {
           
     ?>
				<p><?php echo $result['copyright'];  ?></p>

				 <?php    }  }  ?>
		   </div>
     </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
    <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
	  <script defer src="js/jquery.flexslider.js"></script>
	  <script type="text/javascript">
		$(function(){
		  SyntaxHighlighter.all();
		});
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>


</body>
</html>
