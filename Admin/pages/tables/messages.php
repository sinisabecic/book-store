<?php include 'admin-header.php';?>
<?php include 'admin-navigation.php';?>
<?php include 'left-sidebar.php'; ?>
<?php include '../../../classes/Contact.php';  ?>
<?php include_once '../../../helpers/Format.php';?>

<?php
$pd = new Contact();
$fm = new Format();

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Prijemno sanduce
        <small>admin</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">



          	<!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">

                <thead>
                <tr>
					<th>ID</th>
					<th>Sadrzaj poruke</th>
					<th>Posiljalac</th>
					<th>Telefon</th>
					<th>Mejl</th>
					<th>Datum</th>					
				</tr>
			</thead>
			<tbody>

<?php 
           $getM = $pd->getAllMessages();
           if ($getM) {
           	$i = 0;
          while ($result = $getM->fetch_assoc() ) {
          	$i++;        

           ?>


           <tr>
					<td width="5%"><?php echo $i; ?></td>
					<td width="60%"><?php echo $fm->textShorten($result['message'], 999);?></td>
					<td width="10%"><?php echo $result['name'];?></td>
					<td width="5%"><?php echo $result['phone'];?></td>				   
					<td width="5%"><?php echo $result['email'];?></td>	
					<td width="15%"><?php echo $result['date'];?></td>					
			
				</tr>
				 <?php  }  } ?>
				
				 
			</tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->          
    
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

<?php include 'admin-footer.php';?>
				