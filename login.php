  <?php include 'inc/header.php'; ?>

  <?php 
  $login =  Session::get("cuslogin");
  if ($login == true) {
  	header("Location:index.php");
  }

  ?>


<?php 
   
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login']) ) {
              
        $customLogin = $cmr->customerLogin($_POST);
    }

?>




 <div class="main">
    <div class="content">
    	 <div class="login_panel">


		        <?php 
		          if (isset($customLogin)) {
		          	echo $customLogin;
		          }

		        ?>

        	<h3>Registrovani korisnici</h3>
        	<p>Prijavi se pomocu forme ispod.</p>

        	<form action=" " method="post">
                	<input name="email" placeholder="Email" type="text" >
                    <input name="pass" placeholder="Password" type="password" >
            <div class="buttons"><div><button class="grey" name="login" >Prijava</button></div></div>
                    </div>

                 </form>
                  
                   

<?php 
   
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register']) ) {
              
        $customerReg = $cmr->customerRegistration($_POST);
    }

?>


		        <?php 
		          if (isset($customerReg)) {
		          	echo $customerReg;
		          }

		        ?>


    	<div class="register_account">
    		<h3>Registracija</h3>
    		<form action=" " method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Ime i prezime" />
							</div>
							
							<div>
							  <input type="text" name="city" placeholder="Grad" />
							</div>
							
							<div>
								<input type="text" name="zip" placeholder="Postanski broj" />
							</div>
							<div>
								<input type="text" name="email" placeholder="Mejl" />
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Adresa" />
						</div>
		    		<div>
						<input type="text" name="country" placeholder="Zemlja" />
				 </div>		        
	
		           <div>
		          <input type="text" name="phone" placeholder="Telefon" />
		          </div>
				  
				  <div>
					  <input type="text" name="pass" placeholder="Sifra" />
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button class="grey" name="register">Kreiraj nalog</button></div></div>
		    <p class="terms">Klikom na dugme 'Kreiraj nalog' prihvatate <a href="#">Uslove &amp; Koriscenje </a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
    <?php include 'inc/footer.php'; ?>