<?php
function Contact(){
  if (isset($_POST['valid'])) {
    $prenom =$_POST['prenom'];
    $nom =$_POST['nom'];
    $objet =$_POST['objet'];
    $mail =$_POST['mail'];
    $sujet =$_POST['sujet'];

    $to      = "mabite@mailinator.com";
    $subject = $objet;
    $message = $sujet;
    $headers = "From:".$prenom." ".$nom." ".$mail;
    mail($to, $subject, $message, $headers);

    echo "<div class='alert alert-dismissible alert-success'>
          <a class='alert-link' >Mail envoyé merci, Nous allons vous répondre au plus vite :) !</a>
          </div>";
  }else {
    echo "<div class='alert alert-dismissible alert-danger'>
          <a class='alert-link'>Erreur dans les champs<a href='?page=accueil'>Recommencez svp.</a>
          </div>";
  }
}
 ?>
