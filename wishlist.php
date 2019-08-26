  <?php include 'inc/header.php'; ?>
  <?php 
  $login =  Session::get("cuslogin");
  if ($login == false) {
  	header("Location:login.php");
  }

  ?>

 
 <?php
  if (isset($_GET['delwlistid'])) {
  $productId = $_GET['delwlistid'];
  $delWlist = $pd->delWlistData($cmrId,$productId);
  }
 ?>
 <style>
 #tblone td{text-align: center;} 
  #tblone tr th{text-align: center;} 
 </style>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Zelje </h2>
            
						<table class="table table-bordered table-hover" id="tblone">
							<tr>
								<th width="5%">Id</th>
								<th width="30%">Knjiga</th>
								<th width="10%">Slika</th>
								<th width="15%">Cijena</th>
								  
								<th width="10%">Akcija</th>
							</tr>
                                <?php
                     
 					$getPd = $pd->checkWlistData($cmrId);
 					if ($getPd) {
 						$i = 0;
 						 
 						while ($result = $getPd->fetch_assoc()) {
 							 $i++;
 						         ?>
 								<tr>
								<td><?php echo $i;  ?></td>
								<td><a href="preview.php?proid=<?php echo $result['productId']; ?>"><?php echo $result['productName']; ?></a></td>
								<td><img src="admin/pages/tables/<?php echo $result['image']; ?>" height="100px;" width="80px;" alt=""/></td>
								<td>€ <?php echo $result['price'];  ?></td>
								 
								 
						 <td><a onclick="return confirm('Da li ste sigurni?')" href="preview.php?proid=<?php echo $result['productId']; ?>">  <button type="button" class="btn btn-light">Vidi</button> </a> 
                         <a href="?delwlistid=<?php echo $result['productId']; ?>">  <button type="button" class="btn btn-danger">Ukloni</button> </a> 

						 </td>


							</tr>
 							 

							<?php } }   ?>
							 
							
						</table>
								         

					</div>
					<div class="shopping">
						<div class="shopleft" style="width: 1050px;">
							<a href="index.php"><button class="btn btn-warning" type="button">
							Nastavi kupovinu  <span class="glyphicon glyphicon-shopping-cart"></span>
							</button></a>
						</div>
						 
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
   
    <?php include 'inc/footer.php'; ?>