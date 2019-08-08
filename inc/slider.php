	<div class="header_bottom">
		<div class="header_bottom_left">
			

			<div class="section group">
        <?php 
              $get1 = $pd->latestFrom1();
              if ($get1) {
              	while ($result = $get1->fetch_assoc()) {
              	 
        ?> 
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php?proid=<?php echo $result['productId']; ?>">
						  <img src="admin/pages/tables/<?php echo $result['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">					

						<h1 style="font-size:15px;" class="text-left text-uppercase font-weight-bold"><?php echo $result['productName']; ?></h1><br><br>				
						
						<a href="preview.php?proid=<?php echo $result['productId']; ?>">
						<input style="font-size:13px;" class="btn btn-secondary" type="button" value="Dodaj u korpu"></a>
				   </div>
			   </div>

              <?php 	} } ?>


				<?php 
              $get2 = $pd->latestFrom2();
              if ($get2) {
              	while ($result = $get2->fetch_assoc()) {
              	 
        ?> 
				<div class="listview_1_of_2 images_1_of_2" >
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php?proid=<?php echo $result['productId']; ?>">
						  <img src="admin/pages/tables/<?php echo $result['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h1 style="font-size:15px;" class="text-left text-uppercase font-weight-bold"><?php echo $result['productName']; ?></h1><br><br>		

						<a href="preview.php?proid=<?php echo $result['productId']; ?>">				
						<input style="font-size:13px;" class="btn btn-secondary" type="button" value="Dodaj u korpu"></a>
				   </div>
			   </div>	
              <?php 	} } ?>



			</div>
			<div class="section group">


				<?php 
              $get3 = $pd->latestFrom3();
              if ($get3) {
              	while ($result = $get3->fetch_assoc()) {
              	 
        ?>  
       
        
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php?proid=<?php echo $result['productId']; ?>">
						  <img src="admin/pages/tables/<?php echo $result['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
					<h1 style="font-size:15px;" class="text-left text-uppercase font-weight-bold"><?php echo $result['productName']; ?></h1><br><br>	

						<a href="preview.php?proid=<?php echo $result['productId']; ?>">			
						<input style="font-size:13px;" class="btn btn-secondary" type="button" value="Dodaj u korpu"></a>
				   </div>
			   </div>	
              <?php 	} } ?>




			<?php 
              $get4 = $pd->latestFrom4();
              if ($get4) {
              	while ($result = $get4->fetch_assoc()) {
              	 
        ?> 
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php?proid=<?php echo $result['productId']; ?>">
						  <img src="admin/pages/tables/<?php echo $result['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h1 style="font-size:15px;" class="text-left text-uppercase font-weight-bold"><?php echo $result['productName']; ?></h1><br><br>				

						<a href="preview.php?proid=<?php echo $result['productId']; ?>">	
						<input style="font-size:13px;" class="btn btn-secondary" type="button" value="Dodaj u korpu"></a>
				   </div>
			   </div>	
              <?php 	} } ?>
			  

			  </div>
			  <div class="section group">
			  
			  
			  
			  <?php 
              $get5 = $pd->latestFrom5();
              if ($get5) {
              	while ($result = $get5->fetch_assoc()) {
              	 
        ?>  
       
        
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php?proid=<?php echo $result['productId']; ?>">
						  <img src="admin/pages/tables/<?php echo $result['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h1 style="font-size:15px;" class="text-left text-uppercase font-weight-bold"><?php echo $result['productName']; ?></h1><br><br>				

						<a href="preview.php?proid=<?php echo $result['productId']; ?>">
						<input style="font-size:13px;" class="btn btn-secondary" type="button" value="Dodaj u korpu"></a>
				   </div>
			   </div>	
              <?php 	} } ?>
			  
			  
			  
			  
			  
			  <?php 
              $get6 = $pd->latestFrom6();
              if ($get6) {
              	while ($result = $get6->fetch_assoc()) {
              	 
        ?>         
        
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php?proid=<?php echo $result['productId']; ?>">
						  <img src="admin/pages/tables/<?php echo $result['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h1 style="font-size:15px;" class="text-left text-uppercase font-weight-bold"><?php echo $result['productName']; ?></h1><br><br>						

						<a href="preview.php?proid=<?php echo $result['productId']; ?>">
						<input style="font-size:13px;" class="btn btn-secondary" type="button" value="Dodaj u korpu"></a>
						
						
						
				   </div>
			   </div>	
              <?php 	} } ?>
			  
			  </div>
			  <div class="section group">
			  
			  
			  <?php 
              $get7 = $pd->latestFrom7();
              if ($get7) {
              	while ($result = $get7->fetch_assoc()) {
              	 
        ?>  
       
        
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php?proid=<?php echo $result['productId']; ?>">
						  <img src="admin/pages/tables/<?php echo $result['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h1 style="font-size:15px;" class="text-left text-uppercase font-weight-bold"><?php echo $result['productName']; ?></h1><br><br>				

						<a href="preview.php?proid=<?php echo $result['productId']; ?>">	
						<input style="font-size:13px;" class="btn btn-secondary" type="button" value="Dodaj u korpu"></a>
				   </div>
			   </div>	
              <?php 	} } ?>
			  
			  
			  
			  
			  <?php 
              $get8 = $pd->latestFrom8();
              if ($get8) {
              	while ($result = $get8->fetch_assoc()) {
              	 
        ?>  
       
        
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php?proid=<?php echo $result['productId']; ?>">
						  <img src="admin/pages/tables/<?php echo $result['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h1 style="font-size:15px;" class="text-left text-uppercase font-weight-bold"><?php echo $result['productName']; ?></h1><br><br>					

						<a href="preview.php?proid=<?php echo $result['productId']; ?>">	
						<input style="font-size:13px;" class="btn btn-secondary" type="button" value="Dodaj u korpu"></a>
				   </div>
			   </div>	
              <?php 	} } ?>
			  
			  </div>
			  <div class="section group">
			  
			  
			  
			  <?php 
              $get9 = $pd->latestFrom9();
              if ($get9) {
              	while ($result = $get9->fetch_assoc()) {
              	 
        ?>  
       
        
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php?proid=<?php echo $result['productId']; ?>">
						  <img src="admin/pages/tables/<?php echo $result['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h1 style="font-size:15px;" class="text-left text-uppercase font-weight-bold"><?php echo $result['productName']; ?></h1><br><br>	

						<a href="preview.php?proid=<?php echo $result['productId']; ?>">	
						<input style="font-size:13px;" class="btn btn-secondary" type="button" value="Dodaj u korpu"></a>
				   </div>
			   </div>	
              <?php 	} } ?>
			  
			  
			  
			  
			  
			  <?php 
              $get10 = $pd->latestFrom10();
              if ($get10) {
              	while ($result = $get10->fetch_assoc()) {
              	 
        ?>  
       
        
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php?proid=<?php echo $result['productId']; ?>">
						  <img src="admin/pages/tables/<?php echo $result['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h1 style="font-size:15px;" class="text-left text-uppercase font-weight-bold"><?php echo $result['productName']; ?></h1><br><br>	

						<a href="preview.php?proid=<?php echo $result['productId']; ?>">	
						<input style="font-size:13px;" class="btn btn-secondary" type="button" value="Dodaj u korpu"></a>
				   </div>
			   </div>	
              <?php 	} } ?>
			  			  
			</div>


		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<?php 
            $product =  new Product();
           $getIm = $product->getAllProductImageSlider();
           if ($getIm) {
            
          while ($result = $getIm->fetch_assoc() ) {
           
           ?>
				<li><img src="admin/pages/tables/<?php echo($result['image']); ?>"  alt=""/></li>			
				<?php  }  } ?>	
					 
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>	