<?php
require 'fonctionphp/config.php';
function verifToken(){
    if (isset($_POST['valider'])) {
      $code = $_POST['code'];
      GLOBAL $db;
      $query = "Select * from client where idu= '".$_SESSION['idu']."';";

      $query4ok=$db->prepare($query);
      $query4ok->execute();
      $count=$query4ok->rowCount();

      if ($count == 1) {
        while ($row = $query4ok->fetch(PDO::FETCH_NUM)) {
          $token=$row[9];
        }

        $codecrypt = password_hash($code, PASSWORD_BCRYPT);
  
        if ($token == $codecrypt) {
          echo "string";
      }else {
        echo "pas string";
      }
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
