<?php
include 'config.php';
@$id = $_SESSION['idu'];
GLOBAL $db;
$query = "SELECT * FROM client WHERE idu=$id;";

$query2ok=$db->prepare($query);
$query2ok->execute();
$count=$query2ok->rowCount();

  if ($count == 1) {
    while ($row = $query2ok->fetch(PDO::FETCH_NUM)) {
      $id=$row[0];
      $adresse=$row[1];
      $code_zip=$row[2];
      $datenaissa=$row[3];
      $tel=$row[4];
      $nom=$row[5];
      $prenom=$row[6];
      $mail=$row[7];
    }

}
?>
