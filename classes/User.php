<?php 
 $filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
 
?>


<?php
 
class User{
  
  private $db;
  private $fm;

    public  function __construct(){
       $this->db   = new Database();
       $this->fm   = new Format();
  }


  function ValidanTelefon($phone)
{
     // Allow +, - and . in phone number
     $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
     // Remove "-" from number
     $phone_to_check = str_replace("-", "", $filtered_phone_number);
     // Check the lenght of number
     // This can be customized if you want phone number from a specific country
     if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
        return false;
     } else {
       return true;
     }
}



 public function customerRegistration($data){

  $name      =  mysqli_real_escape_string($this->db->link, $data['name'] );
  $address     =  mysqli_real_escape_string($this->db->link, $data['address'] );
  $city      =  mysqli_real_escape_string($this->db->link, $data['city'] );
  $country     =  mysqli_real_escape_string($this->db->link, $data['country'] );
  $zip       =  mysqli_real_escape_string($this->db->link, $data['zip'] );
  $phone       =  mysqli_real_escape_string($this->db->link, $data['phone'] );
  $email       =  mysqli_real_escape_string($this->db->link, $data['email'] );
  $pass        =  mysqli_real_escape_string($this->db->link, $data['pass']);

    // Ako se ukuca broj u ime
    if(1 === preg_match('~[0-9]~', $name)){
      $msg = "<div class='alert alert-warning' role='alert'>Cudno ime i prezime. Mozda si ukucao neki broj.</div>";
          return $msg;
    }

     if(1 === preg_match('~[0-9]~', $city)){
      $msg = "<div class='alert alert-warning' role='alert'>Nepravilno unesen grad.</div>";
          return $msg;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $msg = "<div class='alert alert-warning' role='alert'>Nepravilno unesen mejl.</div>";
          return $msg;
    } 

    if (!is_numeric($zip)) {
      $msg = "<div class='alert alert-warning' role='alert'>Nepravilno unesen postanski broj.</div>";
          return $msg;
    }

    $validan_tel = $this->ValidanTelefon($phone);

    if (!$validan_tel == true) {
          $msg = "<div class='alert alert-warning' role='alert'>Nepravilno unesen broj telefona. Pokusajte ponovo.</div>";
          return $msg;
    } 



   if ($name == "" || $address == "" || $city == "" || $country == "" || $zip == "" || $phone == ""  || $email == ""  || $pass == "" ) {
      $msg = "<div class='alert alert-warning' role='alert'>Popuni sva polja.</div>";
          return $msg;
     }
     $mailquery = "SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
     $mailchk = $this->db->select($mailquery);
     if ($mailchk != false) {
      $msg = "<div class='alert alert-warning' role='alert'>Ovaj mejl vec postoji.</div>";
          return $msg;
     }else {
       $query = "INSERT INTO tbl_customer(name, address, city, country, zip, phone, email, pass) 
          VALUES ('$name','$address','$city','$country','$zip','$phone','$email','$pass')";  

          $inserted_row = $this->db->insert($query);
          if ($inserted_row) {
          $msg = "<div class='alert alert-success' role='alert'>Registracija uspjesna.</div> ";
          return $msg;
        }else {
          $msg = "<div class='alert alert-danger' role='alert'>Greska.</div>";
          return $msg;
        } 
 
     }
    
 }

    public function customerLogin($data){
    $email       =  mysqli_real_escape_string($this->db->link, $data['email'] );
    $pass        =  mysqli_real_escape_string($this->db->link, $data['pass']);
     if ($email == ""  || $pass == "" ) {
      $msg = "<div class='alert alert-warning' role='alert'>Popuni sva polja.</div>";
          return $msg;
     }

     $query = "SELECT * FROM tbl_customer WHERE email='$email' AND pass='$pass' ";
     $result = $this->db->select($query);
     if ($result != false) {
      $value = $result->fetch_assoc();
      Session::set("cuslogin", true);
      Session::set("cmrId", $value['id']);
      Session::set("cmrName", $value['name']);
      header("Location: cart.php");
      }else {
        $msg = "<div class='alert alert-danger' role='alert'>Mejl i sifra se ne poklapaju.</div>";
          return $msg;
      }

    }


  public function getCustomerData($id){
  $query = "SELECT * FROM tbl_customer WHERE id ='$id' ";
  $result = $this->db->select($query);
  return $result;

  }

  public function getCustomers(){
  $query = "SELECT * FROM tbl_customer";
  $result = $this->db->select($query);
  return $result;

  }


 public function customerUpdate($data, $cmrId) {
  $name      =  mysqli_real_escape_string($this->db->link, $data['name'] );
  $address     =  mysqli_real_escape_string($this->db->link, $data['address'] );
  $city      =  mysqli_real_escape_string($this->db->link, $data['city'] );
  $country     =  mysqli_real_escape_string($this->db->link, $data['country'] );
  $zip       =  mysqli_real_escape_string($this->db->link, $data['zip'] );
  $phone       =  mysqli_real_escape_string($this->db->link, $data['phone'] );
  $email       =  mysqli_real_escape_string($this->db->link, $data['email'] );
   
   if ($name == "" || $address == "" || $city == "" || $country == "" || $zip == "" || $phone == ""  || $email == "" ) {
      $msg = "<div class='alert alert-warning' role='alert'>Polja ne smiju biti prazna.</div>";
          return $msg;
     } else { 
         $query = "UPDATE tbl_customer
            SET
            name    = '$name',
            address   = '$address',
            city    = '$city',
            country   = '$country',
            zip     = '$zip',
            phone   = '$phone',
            email     = '$email'
            WHERE id    = '$cmrId' "; 
            $update_row  = $this->db->update($query);
            if ($update_row) {
              $msg = "<div class='alert alert-success' role='alert'>Izmijenjeno.<a href='profile.php' class='alert-link'> Vrati se na profil</a>.</div>";
              return $msg;
            }else {
              $msg = "<div class='alert alert-danger' role='alert'>Nije azurirano.</div> ";
          return $msg;
            }
 
     }

 }


}

?>