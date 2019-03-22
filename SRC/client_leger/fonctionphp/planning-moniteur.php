<?php
require 'config.php';
require 'recup_info_membre.php';
GLOBAL $db;
GLOBAL $moni;
GLOBAL $id;

if ($moni == NULL) {

$query = "SELECT * FROM liste_moniteur_libre;";
$queryok=$db->prepare($query);
$queryok->execute();
$count=$queryok->rowCount();

if ($count >= 1) {
  while ($row = $queryok->fetch(PDO::FETCH_NUM)) {
    $idu =$row[0];
    $nom =$row[2];
    $prenom =$row[3];
    echo "
    <br>
    <form>
      <div class='container'>
        <div class='card border-primary mb-3' style='max-width: 20rem;'>
          <div class='card-header'>Moniteur disponible</div>
          <div class='card-body'>
          <h4 class='card-title'>$prenom $nom </h4>
        <center><p class='card-text'><img height='150px' width='150px' src='https://www.papo-france.com/183-thickbox_default/bonhomme-pain-d-epice.jpg' alt=''></p></center>
        <br>
        <center>
        <a href='?page=planning&id=$idu' class='btn btn-primary btn-lg btn-block'>valider</a></center>
        </div>
      </div>
    </form>
       ";

       if (isset($_GET['id'])) {
         $idm = $_GET['id'];

         $ajoutmoni = "UPDATE `client` SET `idu_moniteur` = $idm WHERE `client`.`idu` = $id;";
         echo $ajoutmoni;
         $queryok=$db->prepare($ajoutmoni);
         $queryok->execute();
         $count=$queryok->rowCount();

         echo " <script>alert(Votre Moniteur a bien été choisi);</script>";



       }
   }
}
}else {
  $recupMoniteur = "SELECT m.* FROM moniteur m, client c WHERE m.idu = c.idu_moniteur AND c.idu = $moni;";
  $queryok=$db->prepare($recupMoniteur);
  $queryok->execute();
  $count=$queryok->rowCount();

  if ($count >= 1) {
    while ($row = $queryok->fetch(PDO::FETCH_NUM)) {
      $idu =$row[0];
      $nom =$row[2];
      $prenom =$row[3];

      echo "
      <br>
      <form>
        <div class='container'>
          <div class='card border-primary mb-3' style='max-width: 20rem;'>
            <div class='card-header'>Votre Moniteur</div>
            <div class='card-body'>
            <h4 class='card-title'>$prenom $nom</h4>
          <center><p class='card-text'><img height='150px' width='150px' src='https://www.papo-france.com/183-thickbox_default/bonhomme-pain-d-epice.jpg' alt=''></p></center>
          <br>
          <center>
          </div>
        </div>
      </form>
         ";
    }
  }
}
?>
