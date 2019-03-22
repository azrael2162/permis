<?php
function contact(){
    @$prenom  =$_POST['prenom'];
    @$nom     =$_POST['nom'];
    @$objet   =$_POST['objet'];
    @$mail    =$_POST['mail'];
    @$sujet   =$_POST['sujet'];
    $to      = "ppe@mailinator.com";
    $subject = $objet;
    $message = $sujet;
    mail($to, $subject, $message);
}
?>
