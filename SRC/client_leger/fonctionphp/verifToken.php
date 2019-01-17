<?php
require 'config.php';
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

        $codecrypt = sha1($code);
        if ($token == $codecrypt) {

          $query5 = "UPDATE `client` SET `valider` = '1' WHERE `client`.`idu` ='".$_SESSION['idu']."';";
          $query5ok=$db->prepare($query5);
          $query5ok->execute();
          header('location: ?page=accueil');
      }else {
        echo "pas string";
      }
    }
  }
}

 ?>
