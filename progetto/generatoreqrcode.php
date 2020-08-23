<html lang='it' dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width" >
  <title> Qrcode </title>
  <link rel="stylesheet" href="style1.css">

</head>
<body>

    
        <h1 style="color: #34495e;"> <p align="center">Qrcode <br> Ora puoi ricevere il tuo Voucher!!:) </br> </p></h1>
      
        <div class="box">
          <?php
            if(isset($_GET['timestamp'])) {
              $timestamp = $_GET['timestamp'];
              $rv = array(
              "secret" => hash_hmac('sha256', generaStringaRandom(128), $timestamp)
            );
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
              echo "Otc: {$otc} Pin:{$pin}";
              \WOM\WOMQRCodeGenerator::GetQRCode($otc, 300, "vouchers.png");
            }catch(Exception $exception) {
              echo "No voucher generated :(";
            } 

          ?>
            <img src="vouchers.png"/>
        </div>
      </body>
      </html>