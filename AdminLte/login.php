
<?php include 'admin-header.php'; ?>
<?php include '../classes/Adminlogin.php';  ?>



<div class="container" style="width: 30%; margin-top: 50px;">
	

  <?php
    $al = new Adminlogin();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    	$adminUser = $_POST['adminUser'];
    	$adminPass = $_POST['adminPass'];

    	$loginChk = $al->adminLogin($adminUser,$adminPass);
    }

  ?>



   <?php 
    if (isset($loginChk)) {
    	echo $loginChk;
    }

   ?>

	<form action="" method="post">
	  <div class="form-group">
	    <label for="exampleInputEmail1">Korisnicko ime</label>
	    <input name="adminUser" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Korisnicko ime">
	    
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Lozinka</label>
	    <input name="adminPass" type="password" class="form-control" id="exampleInputPassword1" placeholder="Lozinka">
	  </div>
	
	  <button type="submit" class="btn btn-primary">Prijava</button>
	</form>


</div><!-- container -->

</body>
</html>