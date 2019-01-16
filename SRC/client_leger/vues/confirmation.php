<?php
require 'fonctionphp/verifToken.php';


  if (!empty($_SESSION['idu'])) {
      echo "
      <div class='container'>
      <br><br><br>

      <h4>Confirmation de compte :</h4>
      <div class='col'>
        <br>
        <form class='' action='' method='post'>
        <input type='number' class='form-control' name='code' placeholder='Rentrer le code de confirmation'><br>
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
