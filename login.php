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
                	<input name="email" placeholder="Mejl adresa" type="text" >
                    <input name="pass" placeholder="Lozinka" type="password" >
            <div class="buttons"><div><input style="font-size:14px;" class="btn btn-success" name="login" type="submit" value="Prijava"></div></div>
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


						<!-- Padajuca lista zemalja -->
		    		<div>
						<select style="width: 340px" name="country">
					<?php

					foreach($countries as $key => $value) {

					?>
					<option value="<?= $key ?>" title="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
					<?php

					}

					?>
					</select>
				 </div>		        
	

		           <div>
		          <input type="text" name="phone" placeholder="Tel. Format: +382 69 123 456" />
		          </div>
				  
				  <div>
					  <input style="width: 340px;height: 34px;margin-top: 5px;" type="password" name="pass" placeholder="Sifra" />
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><input style="font-size:14px;" class="btn btn-dark" name="register" type="submit" value="Kreiraj nalog"/></div></div>



		    <p class="terms">Klikom na dugme 'Kreiraj nalog' prihvatate <a href="#">Uslove koriscenja </a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
    <?php include 'inc/footer.php'; ?>