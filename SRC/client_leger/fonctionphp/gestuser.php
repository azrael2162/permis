<?php
require 'config.php';
function ajout_user(){
    GLOBAL $db;

    if (isset($_POST['valider'])) {
        $nom = $_POST['nom'];
        $prenom = htmlentities($_POST['prenom']);
        $passwd = htmlentities($_POST['password']);
        $email = htmlentities($_POST['email']);
        $date = htmlentities($_POST['date']);
        $tel = htmlentities($_POST['tel']);
        $adress = htmlentities($_POST['adress']);
        $zip = htmlentities($_POST['zip']);



/*
        $comparedateform = date('Y',time());
        $datejeune = date("Y",strtotime($date));
        $comparedatezeze = 2001;
*
        $annee = date('Y');
        $datejeune = date("Y",strtotime($date));
        $comparedate = $annee - $datejeune ;

*/




        

        if ($prenom && $nom && $email && $date && $tel && $adress && $zip) {


            $psswcrypt = password_hash($passwd, PASSWORD_BCRYPT);

            $requete = "INSERT INTO client (`idu`, `adresse`, `code_zip`,`datenaissa`, `tel`, `nom`, `prenom`, `mail`, `passwd`, `idu_moniteur`, `idgrp`) VALUES
            (NULL, '$adress', '$zip', '$date', '$tel', '$nom', '$prenom', '$email', '$psswcrypt', NULL, '1');";



        $requeteprt = $db->prepare($requete);
        $requeteprt->execute();

            echo "<div class='alert alert-dismissible alert-success'>
                  <a class='alert-link'>Inscription Terminée, <a href='?page=connexion'>Bienvenue ! :)</a>
                  </div>";

        }else {
            echo "<div class='alert alert-dismissible alert-danger'>
                  <a class='alert-link'>Erreur dans les champs, <a href='?page=accueil'>Recommencez svp.</a>
                  </div>";
                }

      }else {
          echo "<div class='alert alert-dismissible alert-danger'>
                <a class='alert-link'>Erreur date <a href='?page=accueil'>Recommencez svp.</a>
                </div>";
     	     }
          }
?>
