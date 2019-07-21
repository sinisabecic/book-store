    <?php include 'inc/header.php'; ?>
 
 <?php 
  $login =  Session::get("cuslogin");
  if ($login == false) {
  	header("Location:login.php");
  }

  ?>

<?php 
    $cmrId =  Session::get("cmrId");
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ) {
              
        $updateCmr = $cmr->customerUpdate($_POST, $cmrId);
    }

?>




<style>
 #tblone{width: 550px; margin: 0 auto;  } 
 #tblone input[type="text"]{width:400px; padding: 5px; font-size: 15px; }


</style>

 <div class="main">
    <div class="content">
      <div class="section group">
 
  <?php 
   $id = Session::get('cmrId');
   $getdata = $cmr->getCustomerData($id);
   if ($getdata) {
     while ($result = $getdata->fetch_assoc()) {
        
  ?>

   <form action=" "  method="post" id="tblone">  
  
 <?php 
  if (isset($updateCmr)) {
    echo "<tr> <td colspan='2'>".$updateCmr."</td> </tr>";
  }  ?>

  <div class="form-group" >
    <label>Ime i prezime</label>
    <input name="name" type="text" class="form-control"  value="<?php echo $result['name']; ?>">

  </div>
   <div class="form-group" >
    <label>Telefon</label>
    <input name="phone" type="text" class="form-control" id="formGroupExampleInput" value="<?php echo $result['phone']; ?>">
  </div>

   <div class="form-group" >
    <label for="exampleInputEmail1">Mejl</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $result['email']; ?>">
  </div>

   <div class="form-group" >
    <label >Adresa</label>
    <input name="address" type="text" class="form-control" id="formGroupExampleInput" value="<?php echo $result['address']; ?>">
  </div>

   <div class="form-group" >
    <label >Grad</label>
    <input name="city" type="text" class="form-control" id="formGroupExampleInput" value="<?php echo $result['city']; ?>">
  </div>

  <div class="form-group" >
    <label >Postanski broj</label>
    <input name="zip" type="text" class="form-control" id="formGroupExampleInput" value="<?php echo $result['zip']; ?>">
  </div>

   <div class="form-group" >
    <label >Zemlja</label>
    <input name="country" type="text" class="form-control" id="formGroupExampleInput" value="<?php echo $result['country']; ?>">  
  </div>

  <button type="submit" name="submit" class="btn btn-primary">Sacuvaj</button>
  <a href="profile.php"><button type="button" class="btn btn-danger">Odustani</button></a>
  <a href="offline.php"><button type="button" class="btn btn-warning">Nastavi sa porucivanjem</button></a>

       
    </table>
   </form>

  <?php   } }  ?> 

    </div>
 </div>
</div>
   
    <?php include 'inc/footer.php'; ?>