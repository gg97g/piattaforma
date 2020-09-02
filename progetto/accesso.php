<?php include 'db.php' ?>

<?php
if(isset($_POST['login'])){

$email = $_POST['email'];

$email = mysqli_real_escape_string($connessione, $email);

$query = "SELECT * FROM mytable WHERE email = '{$email}' ";

$trova_email = mysqli_query($connessione, $query);

if(!$trova_email){
  die('RICHIESTA FALLITA!!!'. mysqli_error($connessione));
}

while($row = mysqli_fetch_array($trova_email)){
  $idUtente = $row['id'];
  $emailUtente = $row['email'];
}

if($email === $emailUtente){
  header('Location: generatoreqrcode.php');
}else{
  header('Location: login.php');
  
}

}

  

?>