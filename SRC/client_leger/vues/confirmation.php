``<?php
function RandToken($token)
{
  if (isset($_POST['cod'])) {
   $token =rand(10,1000);
   $to      = "mabite@mailinator.com";
   $subject = "Confirmation d inscription sur Castellane cars" ;
   $message = "Bonjour !"."\n"."Veuillez rentrer le code dans le formulaire."."\n"."Le code:" .$token;
   $headers = "From: support@Castellanecars.fr";
   mail($to, $subject, $message, $headers);
  }
  return $token;
}

function verifToken()
{
  if (isset($_POST['valider'])) {
    $code = $_POST['code'];
    echo $token;
    die();
    if ($token == $code) {
      echo "C'est le bon token";
    }else {
      echo "c est pas le bon token";
    }
  }
}

  if (!empty($_SESSION['idu'])) {
      echo "
      <div class='container'>
      <br><br><br>

      <h4>Confirmation de compte :</h4>
      <div class='col'>
        <br>
        <form class='' action='' method='post'>
          <input type='submit' class='form-control' name='cod' value='envoyer le code'><br>
          ";
          RandToken();
          echo "
        </form>
        <form class='' action='' method='post'>
        <input type='int' class='form-control' name='code' value='Rentrer le code de confirmation'><br>
        <input type='submit' class='form-control' name='valider' placeholder='Valider'><br>
        ";
        verifToken();
        echo "
        </form>
      </div>
      </div>
      ";
  }else {
    echo "pas string";
  }
 ?>
</div>
