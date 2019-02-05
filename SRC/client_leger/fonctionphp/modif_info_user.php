<?php
function modif_info_user(){
  include 'config.php';
  GLOBAL $db;
if (isset($_POST['valider'])) {
  $Nom = htmlentities($_POST['nom']);
  $Prenom = htmlentities($_POST['prenom']);
  $email = htmlentities($_POST['email']);
  $dateNaissa = htmlentities($_POST['date']);
  $telephone = htmlentities($_POST['tel']);
  $adress = htmlentities($_POST['adress']);
  $codeZip = htmlentities($_POST['zip']);
  $passwd = htmlentities($_POST['password']);
  $id = $_SESSION['idu'];


    if ($Nom) {
      $query = "UPDATE `client` SET `nom` = '$Nom' WHERE `client`.`idu` = $id;";
      $query2ok=$db->prepare($query);
      $query2ok->execute();
      echo "<div class='alert alert-dismissible alert-success'>
            <a class='alert-link'href='?page=membre' >Les informations on été changé >Cliquez ici pour rafraichir,svp.</a>
            </div>";
    }
    if ($Prenom) {
      $query = "UPDATE `client` SET `prenom` = '$Prenom' WHERE `client`.`idu` = $id;";
      $query2ok=$db->prepare($query);
      $query2ok->execute();
      echo "<div class='alert alert-dismissible alert-success'>
            <a class='alert-link'href='?page=membre' >Les informations on été changé >Cliquez ici pour rafraichir,svp.</a>
            </div>";
    }
    if ($email) {
      $query = "UPDATE `client` SET `mail` = '$email' WHERE `client`.`idu` = $id;";
      $query2ok=$db->prepare($query);
      $query2ok->execute();
      echo "<div class='alert alert-dismissible alert-success'>
            <a class='alert-link'href='?page=membre' >Les informations on été changé >Cliquez ici pour rafraichir,svp.</a>
            </div>";
    }
    if ($dateNaissa) {
        $query = "UPDATE `client` SET `datenaissa` = '$dateNaissa' WHERE `client`.`idu` = $id;";
        $query2ok=$db->prepare($query);
        $query2ok->execute();
        echo "<div class='alert alert-dismissible alert-success'>
              <a class='alert-link'href='?page=membre' >Les informations on été changé >Cliquez ici pour rafraichir,svp.</a>
              </div>";
      }
      if ($telephone) {
        $query = "UPDATE `client` SET `tel` = '$telephone' WHERE `client`.`idu` = $id;";
        $query2ok=$db->prepare($query);
        $query2ok->execute();
        echo "<div class='alert alert-dismissible alert-success'>
              <a class='alert-link'href='?page=membre' >Les informations on été changé >Cliquez ici pour rafraichir,svp.</a>
              </div>";
      }
      if ($adress) {
        $query = "UPDATE `client` SET `adresse` = '$adresse' WHERE `client`.`idu` = $id;";
        $query2ok=$db->prepare($query);
        $query2ok->execute();
        echo "<div class='alert alert-dismissible alert-success'>
              <a class='alert-link'href='?page=membre' >Les informations on été changé >Cliquez ici pour rafraichir,svp.</a>
              </div>";
      if ($codeZip) {
        $query = "UPDATE `client` SET `code_zip` = '$codeZip' WHERE `client`.`idu` = $id;";
        $query2ok=$db->prepare($query);
        $query2ok->execute();
        echo "<div class='alert alert-dismissible alert-success'>
              <a class='alert-link'href='?page=membre' >Les informations on été changé >Cliquez ici pour rafraichir,svp.</a>
              </div>";
    }
      if ($passwd) {
        if (strlen($passwd) >= 6) {
        $passwdcrypt = sha1($passwd);
        $query = "UPDATE `client` SET `passwd` = '$passwdcrypt' WHERE `client`.`idu` = $id;";
        $query2ok=$db->prepare($query);
        $query2ok->execute();
        echo "<div class='alert alert-dismissible alert-success'>
              <a class='alert-link'href='?page=membre' >Les informations on été changé >Cliquez ici pour rafraichir,svp.</a>
              </div>";
          }
      }
    }
  }
}
?>
