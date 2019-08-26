  <?php include 'inc/header.php'; ?>
<?php
 if (isset($_GET['delpro'])) {
 	 $delId = $_GET['delpro'];
 	 $delProduct = $ct->delProductByCart($delId);
 }
?>



<?php 
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cartId = $_POST['cartId'];
        $quantity = $_POST['quantity'];
        
        $updateCart = $ct->updateCartQuantity($cartId, $quantity);
        if ($quantity <= 0) {
        	$delProduct = $ct->delProductByCart($cartId);
        }
    }   

?>

<?php
if (!isset($_GET['id'])) {
	echo "<meta http-equiv='refresh' content='0;URL=?id=live'/> ";
}
?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Korpa</h2>
            <?php
         if (isset($updateCart)) {
         	echo $updateCart;
         }
 		if (isset($delProduct)) {
         	echo $delProduct;
         }

            ?>
<style>
 #tblone td{text-align: center;} 
  #tblone tr th{text-align: center; font-weight: bold;} 
 </style>

						<table class="table table-bordered table-hover" id="tblone">
							<tr>
								<th width="5%">Id</th>
								<th width="30%">Naziv knjige</th>
								<th width="10%">Slika</th>
								<th width="15%">Cijena</th>
								<th width="15%">Kolicina</th>
								<th width="15%">Ukupna cijena</th>
								<th width="10%">Akcija</th>
							</tr>
                                <?php
 					$getPro = $ct->getCartProduct();
 					if ($getPro) {
 						$i = 0;
 						$sum = 0;
 						$qty = 0;
 						while ($result = $getPro->fetch_assoc()) {
 							 $i++;
 						         ?>
 								<tr>
								<td><?php echo $i;  ?></td>
								<td><?php echo $result['productName'];  ?></td>
								<td><img src="admin/pages/tables/<?php echo $result['image']; ?>" alt="" height="100px;" width="80px;"/></td>
								<td>€ <?php echo $result['price'];  ?></td>
								<td>
									<form action="" method="post">
		 <input type="hidden" name="cartId" value="<?php echo $result['cartId'];  ?>"/>
		 <input type="number" name="quantity" value="<?php echo $result['quantity'];  ?>"/>
		 <br><br>
										<button type="submit" name="submit" class="btn btn-light">Azuriraj</button>
									</form>
								</td>
								<td>€ 
     							<?php 
     							$total = $result['price'] * $result['quantity'];
     							echo $total;

     							?>			
 
								</td>
								<td><a onclick="return confirm('Da li ste sigurni?');" href="?delpro=<?php echo $result['cartId']; ?>">X</a></td>
							</tr>

 							<?php 
 								
 							    $qty = $qty +  $result['quantity'];
 								$sum = $sum + $total;
 								Session::set("qty", $qty);
 								Session::set("sum", $sum);

 							 ?>


							<?php } }   ?>
							 
							
						</table>
								         <?php 

											 $getData = $ct->checkCartTable();
								             if ($getData) {
								         ?>


						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Neto : </th>
								<td>€ <?php echo $sum;  ?></td>
							</tr>
							<tr>
								<th>Postarina : </th>
								<td>   
      									10% 
								</td>
							</tr>
							<tr>
								<th>Ukupno :</th>
								<td>€ <?php 
									$vat = $sum * 0.1;
									$gtotal = $sum + $vat;
									echo $gtotal;
									?> </td>
							</tr>
					   </table>
                   <?php } else { 
                   	  header("Location:index.php");
                         // echo "Cart Empty";

                    } ?>


					</div>
					<div class="shopping">
						<ul class="nav nav-tabs nav-justified">
							<div class="shopleft">
							<a href="index.php"><button class="btn btn-warning" type="button">
							Nastavi kupovinu  <span class="glyphicon glyphicon-shopping-cart"></span>
							</button></a>
							</div>

							<div class="shopright">
							<a href="payment.php"><button class="btn btn-success" type="button">
							Zavrsi kupovinu  <span class="glyphicon glyphicon-shopping-cart"></span>
							</button></a>
							</div>
						</ul>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
   
    <?php include 'inc/footer.php'; ?>