<?php include 'db.php' ?>
<?php

if(isset($_POST['submit'])){
  $email = $_POST['email'];
  if(mail($_POST['email'])){
    echo "MAIL send";
 }else{
   echo "Failed";
}

}



//$from_name = "Giorgia"; //da chi arriva l'email
//$to_email = $_POST['mail'];
//$object = "";
//$message = "Sono una bambola";

//echo $from_name.'|'.$to_email.'|'.$object.'|'.$message;
?>


<!DOCTYPE html>
<html lang='it' dir="ltr">
<head>
  <meta charset="utf-8">
  <title> LOGIN </title>
  <link rel="stylesheet" href="style_login.css">
  <meta name="viewport" content="width=device-width, initial-scale=1" >
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/all.css">
  <script src="https://kit.fontawesome.com/abc1566418.js" crossorigin="anonymous"></script>
</head>
<body>
  
  <div class="header">
    <h2 class="logo"><pre></pre><img src="wom.png"></h2>
    <input type="checkbox" id="chk">
    <label for="chk" class="show-menu-btn">
      <i class="fas fa-ellipsis-h"></i>
    </label>
    <ul class="menu">
      <a href="https://wom.social/">About</a>
      <a href="#">Contact</a>
      <label for="chk" class="hide-menu-btn">
        <i class="fas fa-times"></i>
      </label>
    </ul>
  </div>
  <form action="accesso.php" method="post">
  <div class="contact-form">
    <h1></h1>
    <div class="txtb">
      <label><i class="fas fa-envelope-square"></i> Email :</label>
      <input type="email" id="email" placeholder="Inserisci la tua Email" name="email">
      
    </div>
      <div class="txtb">
      <label><i class="far fa-calendar-alt"></i> Evento :</label>
      <input type="evento" id="evento" placeholder="A quale evento hai partecipato?" name="evento">
      
    </div>
    <button class="button" action="generatoreqrcode.php" onclick="" type="submit" name="login">Login</button>
  </div>
</form>
  
  
</body>

</html>
