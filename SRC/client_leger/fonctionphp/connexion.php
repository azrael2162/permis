<?php
require 'config.php';

function Connexion(){
    if (isset($_POST['valider'])) {
    $mail = $_POST['mail'];
    $password = $_POST['passwd'];
    GLOBAL $db;

    $passwordcrypt = sha1($password);

    $query = "select * from client where mail='$mail' and passwd='$passwordcrypt';";
    $query2ok=$db->prepare($query);
    $query2ok->execute();
    $count=$query2ok->rowCount();

      if ($count == 1) {
        while ($row = $query2ok->fetch(PDO::FETCH_NUM)) {
          $id=$row[0];
          $grp=$row[12];
          $val = $row[10];

        }
        header('location: ?page=accueil');
        session_start();
        $_SESSION['idu']=$id;
        $_SESSION['grp']=$grp;
        $_SESSION['valider']=$val;


      }else {
         echo "<div class='alert alert-dismissible alert-danger'>
              <a class='alert-link'>Erreur de login ou mot de passe: Votre compte n existe pas.</a>
              </div>";
      }
   }
}
?>
