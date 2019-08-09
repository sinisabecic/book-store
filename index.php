 <?php include 'inc/header.php'; ?>
  <?php include 'inc/slider.php'; ?>
 <br><br>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3 style="color: #333333">Preporucujemo:</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
              <?php 
            $getFpd = $pd->getFeaturedProduct();
            if ($getFpd) {
            	while ($result = $getFpd->fetch_assoc()) {
            	 
              ?>


				<div class="grid_1_of_4 images_1_of_4" width: 170px;
	height: 370px;>
					 <a href="preview.php?proid=<?php echo $result['productId']; ?>">
					 	<img src="admin/pages/tables/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2 style="color: #4CAF50" class="text-center text-uppercase font-weight-bolder"><?php echo $result['productName']; ?> </h2>
					 <p><?php echo $fm->textShorten($result['body'], 60); ?></p>
					 <p><span style="color: #000;" class="price"><?php echo $result['price']; ?> €</span></p>	     				     		

				     <a href="preview.php?proid=<?php echo $result['productId']; ?>">
				     <input style="font-size:15px;" class="btn btn-dark" type="button" value="Detalji">
				     </a>
				</div>
				 
				 <?php  }  }  ?>
				 
				 
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3 style="color: #333333">Novo u ponudi</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">

				 <?php 
            $getNpd = $pd->getNewProduct();
            if ($getNpd) {
            	while ($result = $getNpd->fetch_assoc()) {
            	 
      ?>
				<div class="grid_1_of_4 images_1_of_4">
					  <a href="preview.php?proid=<?php echo $result['productId']; ?>">
					 	<img src="admin/pages/tables/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2 style="color: #4CAF50" class="text-center text-uppercase font-weight-bolder"><?php echo $result['productName']; ?> </h2>					  
					 <p ><span style="color: #000;" class="price"><?php echo $result['price']; ?> €</span></p>
					 <br>
				     <a href="preview.php?proid=<?php echo $result['productId']; ?>">
				     <input style="font-size:15px;" class="btn btn-dark" type="button" value="Detalji">
				     </a>
				     
				</div>
				 
				  <?php  }  }  ?>
				
				

			</div>
    </div>
 </div>
</div>

     <?php include 'inc/footer.php'; ?>
