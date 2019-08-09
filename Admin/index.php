<?php //require 'db.php'; ?>
<!-- OVDJE SAM DEKLARISAO USLOV, DA SAMO ADMIN MOZE DA PRISTUPI CMS-U -->
<?php include '../lib/Session.php';  ?>

<?php Session::checkSession(); ?>
  <!-- Header -->
  <?php include 'admin-header.php'; ?>
	

	<!-- Admin navigacija -->
  <?php include 'admin-navigation.php'; ?>
  

  <!-- Lijevi sajdbar -->
  <?php include 'left-sidebar.php'; ?>

  <!-- Tabela Posts -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    		<section class="content-header">
      <h1>
        Dobrodosao <?php $_SESSION['adminUser']; ?>
        <small>admin</small>
      </h1>
      
    </section>

<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          	<div class="box-body">

    <!-- WIDGETS -->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

<?php 
                 $query = "SELECT * FROM tbl_product"; // aktivni postovi

                 $select_query = mysqli_query($conn, $query);

                 $knjige_count = mysqli_num_rows($select_query); // broj kolona u tabeli posts
      
?>

                  <div class='huge'><?php echo $knjige_count; ?></div>
                        <div>Knjige</div>
                    </div>
                </div>
            </div>
            <a href="pages/tables/productlist.php">
                <div class="panel-footer">
                    <span class="pull-left">Lista knjiga</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>


    <div class="col-lg-3 col-md-6">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
<?php 
                 $query = "SELECT * FROM tbl_order";

                 $select_query = mysqli_query($conn, $query);

                 $porudzbine_count = mysqli_num_rows($select_query); // broj kolona u tabeli posts
      
?>

                     <div class='huge'><?php echo $porudzbine_count; ?></div>
                      <div>Porudzbine</div>
                    </div>
                </div>
            </div>
            <a href="pages/tables/mainorder.php">
                <div class="panel-footer">
                    <span class="pull-left">Lista porudzbina</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
<?php 
                 $query = "SELECT * FROM tbl_category";

                 $select_query = mysqli_query($conn, $query);

                 $autori_count = mysqli_num_rows($select_query); // broj kolona u tabeli posts
      
?>
                    <div class='huge'><?php echo $autori_count; ?></div>
                        <div> Autori</div>
                    </div>
                </div>
            </div>
            <a href="pages/tables/catlist.php">
                <div class="panel-footer">
                    <span class="pull-left">Lista autora</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
<?php 
                 $query = "SELECT * FROM tbl_brand";

                 $select_query = mysqli_query($conn, $query);

                 $izdavaci_count = mysqli_num_rows($select_query); // broj kolona u tabeli posts
      
?>
                        <div class='huge'><?php echo $izdavaci_count; ?></div>
                         <div>Izdavaci</div>
                    </div>
                </div>
            </div>
            <a href="pages/tables/brandlist.php">
                <div class="panel-footer">
                    <span class="pull-left">Lista izdavaca</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- /.row  end WIDGETS-->


    <div class="row">      
      
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Chart', 'Count'],
   <?php 
   		  $element_text = ['Knjige', 'Porudzbine', 'Autori', 'Izdavaci'];//naslovi kategorija
          $element_count = [ $knjige_count, $porudzbine_count, $autori_count, $izdavaci_count ]; //vrijednosti kategorija

          for ($i = 0; $i < 4; $i++) {
              echo "['$element_text[$i]'" . "," . "$element_count[$i]],";
          }
    ?>
         
        ]);

        var options = {
          title: '',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>


    <div  id="donutchart" style="width: 900px; height: 400px; margin-top: -20px; margin-left: 180px"></div>

    </div>





       </div>
       <!-- /.container-fluid -->

    

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




<!-- FOOTER -->
 <?php include 'admin-footer.php'; ?>
  
