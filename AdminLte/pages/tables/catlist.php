<?php include 'admin-header.php';?>
<?php include 'admin-navigation.php';?>
<?php include 'left-sidebar.php';?>
<?php include '../../../classes/Category.php';  ?>

<?php
 
$cat =  new Category();
 
if (isset($_GET['delcat'])) {
	 $id = $_GET['delcat'];
	 $delCat = $cat->delCatById($id);

}  

?>


         <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Autori
        <small>admin</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

       <?php
         if (isset($delCat)) {
         	echo  $delCat;
         }
          ?>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Autor</th>
                  <th>Akcija</th>
                  
                 
                </tr>
                </thead>

                <tbody>         
                




		  <?php
		 $getCat = $cat->getAllCat();
		  if ($getCat) {
		  	$i = 0;
		  	while ($result = $getCat->fetch_assoc()) {
		  	 $i++;
		  ?>

		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $result['catName']; ?></td>
			<td><a href="catedit.php?catid=<?php echo $result['catId']; ?>"><button type="button" class="btn btn-primary">Izmijeni</button></a> 
				|| <a onclick="return confirm('Da li ste sigurni?')" href="?delcat=<?php echo $result['catId']; ?>"><button type="button" class="btn btn-danger">Izbrisi</button></a></td>
		</tr>

						<?php 	} }  ?>
						 
						 </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		</section>	
<?php include 'admin-footer.php';?>

