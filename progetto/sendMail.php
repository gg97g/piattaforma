<?php

  $to_email = "g.giuseppetti@campus.uniurb.it";
  $subject = "Riscatto WOM";
  $body = "Salve,ora puoi riscattare il tuo WOM qui"; 
  $headers = "From: giuseppettigiorgia97@gmail.com ";
  
  if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
  echo "Email sending failed...";
}

?>