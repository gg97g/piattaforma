<html lang='it' dir="ltr">
<head>
  <meta charset="utf-8">
  <title>INDEX</title>
  <link rel="stylesheet" href="style_index.css">
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
  
     <script>
      // Fetch API
      function caricaFile() {
      const dateTime = new Date();
      timestamp = Math.floor(dateTime / 1000);
      
    
      console.log('http://localhost/progetto/riscatto.php?timestamp=' + timestamp);
      fetch('http://localhost/progetto/riscatto.php?timestamp=' + timestamp)
      .then(response => response.json())
      .then(data => {
        console.log(data);
        document.write(img);
        return data;
      })      
    }
    
    async function convertiJson() {
      let btc = caricaFile();
      console.log(btc);
    }
      
    //setTimer lo fa una sola volta 
    setInterval(() => {
      //console.log('http://localhost/progetto/generatoreqrcode.php');
      console.log(caricaFile());
    }, 6000);

    console.log(caricaFile());
  </script>
  <?php
  function refreshQr(){
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
    
  }
    
  ?>
  <div align="center">
  <img id="img" src="vouchers.png"onload="refreshQr()" onload="caricaFile()"/>
</div>
  
</body>
</html>

