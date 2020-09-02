<?php include 'db.php' ?>
<?php
function ok(){
  require "sendEmail.php";
if(isset($_POST['submit'])){
  $email = $_POST['email'];
  
}
}
?>

<!DOCTYPE html>
<html lang='it' dir="ltr">
<head>
  <meta charset="utf-8">
  <title> LOGIN</title>
  <link rel="stylesheet" href="style.css">
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
    <button class="button" type="submit" onclick="ok()"  name="login">Login</button>
  </div>
</form>
  
  
<!--<div class="box">
  <form action="accesso.php" method="post">
    <div class= "form-group">
      <input type="text" class="form-control" id="email" placeholder="Inserisci la tua Email" name="email">
    </div>
    <button type="submit" onclick="ok()"  name="login">Login</button>
  </form>
</div>-->

</body>

</html>
