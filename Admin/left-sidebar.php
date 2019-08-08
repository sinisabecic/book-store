<?php 
 include '../lib/Database.php';
 include '../helpers/Format.php';
  


  spl_autoload_register(function($class){
   include_once "../classes/".$class.".php";

  });

  $ct = new Cart();     
       
 ?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
   
    <section class="sidebar">
      <!-- Sidebar user panel -->      
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>


        <div class="pull-left info">
          <p>Admin</p>          
        </div>
      </div>

    


      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
          

       	
		
		<!-- Autori -->
        <li class="treeview">
          <a href="#">           
            <i class="fa fa-user"></i> <span>Autori</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/catlist.php"><i class="fa fa-circle-o"></i> Lista autora</a></li>
            <li><a href="pages/tables/catadd.php"><i class="fa fa-circle-o"></i> Dodaj autora</a></li>
          </ul>          
        </li>

		
		
          <!-- Izdavaci -->
        <li class="treeview">
          <a href="#">           
            <i class="fa fa-stack-overflow"></i> <span>Izdavaci</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/brandlist.php"><i class="fa fa-circle-o"></i> Lista izdavaca</a></li>
            <li><a href="pages/tables/brandadd.php"><i class="fa fa-circle-o"></i> Dodaj izdavaca</a></li>
          </ul>          
        </li> 
		
		
		 <!-- Knjige -->
        <li class="treeview">
          <a href="#">           
            <i class="fa fa-book"></i> <span>Knjige</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/productlist.php"><i class="fa fa-circle-o"></i> Lista knjiga</a></li>
            <li><a href="pages/tables/productadd.php"><i class="fa fa-circle-o"></i> Dodaj knjigu</a></li>
          </ul>          
        </li> 
       


       <!-- Slajder -->
        <li class="">
          <a href="pages/tables/sliderlist.php">           
            <i class="fa fa-slideshare"></i> <span>Slajder knjiga</span>            
          </a>                   
        </li>
		
		
    
		<!-- Porudzbine -->        
    <?php 
          $getOrder = $ct->getOrdersAlert(); //"SELECT * FROM tbl_order WHERE status = 0 ";
                    
          if ($getOrder) { ?>
          <li>
          <a href="pages/tables/mainorder.php">                  
              <i class="fa fa-cc-visa"></i> Porudzbine  <span class="label label-danger"><?php echo $getOrder; ?></span></a>
          </li>

<?php }  else { ?>
          <li>
          <a href="pages/tables/mainorder.php">
              <i class="fa fa-cc-visa"></i> <span>Porudzbine</span></a> 
<?php }  ?>    
          </li> 
		



		<!-- Sajt -->
        <li class="">
          <a href="../" target="__blank">           
            <i class="fa fa-shopping-cart"></i> <span>Prodavnica</span>            
		  </a>                   
        </li> 


        <!-- Prijemno sanduce -->
<?php 
          $getMsg = $ct->getMessagesAlert(); //"SELECT * FROM tbl_order WHERE status = 0 ";
                    
          if ($getMsg) { ?>
        <li class="">
          <a href="pages/tables/messages.php">           
            <i class="fa fa-envelope"></i> Prijemno sanduce <span class="label label-danger"><?php echo $getMsg; ?></span>            
          </a>                   
        </li>

<?php }  else { ?>

        <li class="">
          <a href="pages/tables/messages.php">           
            <i class="fa fa-envelope"></i> Prijemno sanduce </span>            
          </a>                   
        </li>
<?php } ?> 


       
    </section>
    <!-- /.sidebar -->    
  </aside>