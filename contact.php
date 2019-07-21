  <?php include 'inc/header.php'; ?>



 <div class="main">
    <div class="content">
    	<div class="support">
  			<div class="support_desc">
  				<h3>Live Support</h3>
  				<p><span>24 časa | 7 dana u nedelju | 365 dana u godini &nbsp;&nbsp; Tehnička podrška</span></p>
  				<p> Davno je ustanovljena činjenica da će čitaoc biti omamljen čitljivim sadržajem stranice kada gleda njegov izgled. Smisao upotrebe Lorema Ipsuma je da ima više ili manje normalne distribucije slova. Postoje mnoge varijacije odlomaka Lorem Ipsum-a, ali većina ih je pretrpjela promjenu u nekoj formi, ubrizganim humorom ili nasumičnim riječima ne izgledaju čak ni malo uvjerljivi. Ako ćete koristiti odlomak Lorem Ipsum, morate biti sigurni da se ništa neugodno ne nađe u sredini teksta.</p>
  			</div>
  				<img src="web/images/contact.png" alt="" />
  			<div class="clear"></div>
  		</div>
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Kontaktirajte nas</h2>

<?php 
   
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ) {
              
        $message = $con->sendMessage($_POST); // ovo con je iz inc/header con = new Contact();
    }

?>


		        <?php 
		          if (isset($message)) {
		          	echo $message;
		          }

		        ?>
					    <form action=" " method="post">
					    	<div>
						    	<span><label>Ime i prezime</label></span>
						    	<span><input name="name" type="text" placeholder="Ime i prezime"></span>
						    </div>
						    <div>
						    	<span><label>Mejl</label></span>
						    	<span><input name="email" type="text" placeholder="example@example.com"></span>
						    </div>
						    <div>
						     	<span><label>Broj telefona</label></span>
						    	<span><input name="phone" type="text" value="" placeholder="Format: 382 69 123 456"></span>
						    </div>
						    <div>
						    	<span><label>Poruka</label></span>
						    	<span><textarea name="message"></textarea></span>
						    </div>
						   <div>
						   		<span><input name="submit" type="submit" value="POSALJI"></span>
						  </div>
					    </form>
				  </div>
  				</div>
				<div class="col span_1_of_3">
      			<div class="company_address">
				     	<h2>Informacije o firmi :</h2>
						    	<p>500 Lorem Ipsum Dolor Sit,</p>
						   		<p>22-56-2-9 Sit Amet, Lorem,</p>
						   		<p>MNE</p>
				   		<p>Tel:(00) 222 666 444</p>
				   		<p>Fax: (000) 000 00 00 0</p>
				 	 	<p>Mejl: <span>elmaz.feratovic@gmail.com</span></p>
				   		<p>Prati nas: <span>Facebook</span>, <span>Twitter</span></p>
				   </div>
				 </div>
			  </div>    	
    </div>
 </div>
</div>
    <?php include 'inc/footer.php'; ?>