<?php 
 $filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

?>
<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
<?php
 
class Category{
	
	private $db;
	private $fm;

    public	function __construct(){
       $this->db   = new Database();
       $this->fm   = new Format();
	}

  public function catInsert($catName){
  	$catName = $this->fm->validation($catName);
    $catName =  mysqli_real_escape_string($this->db->link, $catName );
    if (empty($catName)) {
    	 $msg = "<div class='alert alert-warning' role='alert'>
  Polje ne smije biti prazno! Pokusaj ponovo. <a href='catlist.php' class='alert-link'> Vrati se na spisak autora.</a></div>";
    	 return $msg;
    	}else {
    		$query = "INSERT INTO tbl_category(catName) VALUES ('$catName')";
    		$catinsert = $this->db->insert($query);
    		if ($catinsert) {
    			$msg = "<div class='alert alert-success' role='alert'>
  Uspjesno dodato. <a href='catlist.php' class='alert-link'>Vrati se.</a>.
  </div> ";
    			return $msg;
    		}else {
    			$msg = "<div class='alert alert-danger' role='alert'>
  Nije dodato! Pokusaj ponovo. <a href='catlist.php' class='alert-link'> Vrati se na spisak autora</a>.</div>";
    			return $msg;
    		}
    	}


  }


     public function getAllCat(){
         $query = "SELECT * FROM tbl_category ORDER BY catId DESC";
         $result = $this->db->select($query);
         return $result;

     }


     public function getCatById($id){
     	$query = "SELECT * FROM tbl_category WHERE catId ='$id' ";
         $result = $this->db->select($query);
         return $result;

     }


     public function catUpdate($catName, $id){
     $catName = $this->fm->validation($catName);
     $catName =  mysqli_real_escape_string($this->db->link, $catName );
     $id =  mysqli_real_escape_string($this->db->link, $id );
     if (empty($catName)) {
    	 $msg = "<div class='alert alert-warning' role='alert'>
  Polje ne smije biti prazno! Pokusaj ponovo. <a href='catlist.php' class='alert-link'> Vrati se na spisak autora</a>.</div>";
    	 return $msg;

     }else {
			$query = "UPDATE tbl_category
            SET
            catName = '$catName'
            WHERE catId = '$id' ";
            $update_row  = $this->db->update($query);
            if ($update_row) {
            	$msg = "<div class='alert alert-success' role='alert'>
  Uspjesno azurirano. <a href='catlist.php' class='alert-link'> Vrati se na spisak autora.</a></div>";
            	return $msg;
            }else {
            	$msg = "<div class='alert alert-danger' role='alert'>
  Neuspjesno! Pokusaj ponovo. <a href='catlist.php' class='alert-link'> Vrati se na spisak autora.</a></div>";
    			return $msg;
            }

     }

 }


  public function delCatById($id){
		  $query = "DELETE FROM tbl_category WHERE catId ='$id' ";
		  $deldata = $this->db->delete($query);
		  if ($deldata) {
		  	$msg = "<div class='alert alert-success' role='alert'>Izbrisano!</div> ";
		  return $msg;
		  }else {
		  	$msg = "<div class='alert alert-danger' role='alert'>Greska.</div> ";
		    	 return $msg;
  			}

  	}





}

?>





<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../../bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">