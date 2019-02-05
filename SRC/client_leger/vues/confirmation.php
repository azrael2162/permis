<?php
require 'fonctionphp/verifToken.php';


  if ($_SESSION['valider'] == 0) {
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
    echo "
    <div class='container'>
    <center>
    <img height='300px' width='600px' src='https://www.anthedesign.fr/w2015/wp-content/uploads/2015/10/errreur-404-not-found-e1445791813328.jpg' alt=''><br>
    <a href='?page=accueil'>Veuillez retourner sur l'accueil.</a>
    </center>
    </div>";
  }

?>
