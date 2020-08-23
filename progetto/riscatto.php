<?php
  function generaStringaRandom($lunghezza) {
    $caratteri = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $stringaRandom = '';
    for ($i = 0; $i < $lunghezza; $i++) {
      $stringaRandom .= $caratteri[rand(0, strlen($caratteri) - 1)];
    }
    return $stringaRandom;
  }

  //$timestamp = strtotime("+1 day");
  //echo date('d/m/Y H:i:s', $timestamp); // stamperà, ad esempio, 17/07/2016 14:30:14

  // Prendo il timestamp inviato
  if(isset($_GET['timestamp'])) {
    $timestamp = $_GET['timestamp'];

    $rv = array(
      "secret" => hash_hmac('sha256', generaStringaRandom(128), $timestamp)
    );

    header('Content-Type: application/json');
    echo json_encode($rv);
  }
?>
