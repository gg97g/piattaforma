<?php include 'db.php' ?>

<?php
$to_email = "g.giuseppetti@campus.uniurb.it";
$subject = "Riscatto WOM";
$body = "Salve,ora puoi riscattare il tuo WOM. I codici sono: OTC: 8f3013de-5337-4f8c-86f0-ca4321f6d792 , PIN: 3945";
$headers = "From: giuseppettigiorgia97@gmail.com";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
  echo "Email sending failed...";
}
?>

<html lang='it' dir="ltr">
<head>
  <meta charset="utf-8">
  <title> Qrcode </title>
  <link rel="stylesheet" href="style_qrcode.css">
  <meta name="viewport" content="width=device-width, initial-scale=1" >
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/all.css">
  <script src="https://kit.fontawesome.com/abc1566418.js" crossorigin="anonymous"></script>

</head>
<body>
  <div class="header">
    <h2 class="logo"><pre></pre><img src="wom.png" ></h2>
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
  
  <div class="box">
    <div class="content">
      <pre> </pre>
      <pre> </pre>
    <h1> Benvenuta/o !
      <p> Ora puoi riscattare il tuo Voucher. </p>
      <p> Ti ricordo che il Pin che ti verrà </p>
      <p> richiesto dopo la scansione l'hai </p>
      <p>ricevuto via email. </p>
      <p> Se non hai ricevuto nessuna email, <a href="http://localhost/progetto/login.php" onclick="sendMail()"> clicca qui. </a> </p> </h1>
    </div>
    
      
      <?php
      if(isset($_GET['timestamp'])) {
        $timestamp = $_GET['timestamp'];
        $rv = array(
          "secret" => hash_hmac('sha256', generaStringaRandom(128), $timestamp));
            header('Content-Type: application/json');
            echo json_encode($rv);
          }
          
          require (__DIR__ . '/vendor/autoload.php');

          DEFINE("INSTRUMENT_PRIVATE_KEY", "keys/source.pem"); //path/to/instrument/key.pem
          DEFINE("INSTRUMENT_PRIVATE_KEY_PASSWORD", ""); //optional-key-password
          DEFINE("INSTRUMENT_ID", "5f2b476780a06dd85c166c6c");
          //DEFINE("DEV", False); // This enables DEV configuration. Delete it for production configuration.
        
          date_default_timezone_set("UTC"); //WOM server uses default UTC timezone.
        
          // VOUCHER GENERATION
          // Generate 10 vouchers with 3 different aims
          $vouchers = array();
          $available_aims = array('H', 'C', 'I');
          for($i=0; $i < 10; $i++){
              $aim = $available_aims[$i%3];
              $vouchers[] = \WOM\Voucher::Create($aim, 42.4564, 12.5263, new DateTime('NOW'));
            }
            // or, if they have identical aim, coordinates, and timestamp, you can generate them using the $count optional parameter
            $vouchers[] = \WOM\Voucher::Create('H', 42.4564, 12.5263, new DateTime('NOW'), 10);
        
        
            // INSTRUMENT CREATION
            // Instantiate the Instrument with its ID, Private Key, and (optionally) the private key's password
            $Instrument = new \WOM\Instrument(INSTRUMENT_ID, INSTRUMENT_PRIVATE_KEY, INSTRUMENT_PRIVATE_KEY_PASSWORD);
        
            // Request Vouchers
            $otc = null;
            $pin = null;
            try{
              $Instrument->RequestVouchers($vouchers,  "", $pin, $otc);
              //echo "Otc: {$otc} Pin:{$pin}";
              \WOM\WOMQRCodeGenerator::GetQRCode($otc, 300, "vouchers.png");
            }catch(Exception $exception) {
              echo "No voucher generated :(";
            }
            
            ?>
            <div class="img">
            <img src="vouchers.png"/>
          </div>
        </div>
      </body>
      </html>
      
      
    