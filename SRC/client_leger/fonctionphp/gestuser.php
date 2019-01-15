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
*/
        $annee = date('Y');
        $datejeune = date("Y",strtotime($date));
        $comparedate = $annee - $datejeune ;


        if ($datejeune > 18) {

        if ($prenom && $nom && $email && $date && $tel && $adress && $zip) {

           if (strlen($passwd) > 6) {


            $psswcrypt = password_hash($passwd, PASSWORD_BCRYPT);

            $requete = "INSERT INTO client (`idu`, `adresse`, `code_zip`,`datenaissa`, `tel`, `nom`, `prenom`, `mail`, `passwd`, `valider`, `idu_moniteur`, `idgrp`) VALUES
            (NULL, '$adress', '$zip', '$date', '$tel', '$nom', '$prenom', '$email', '$psswcrypt','0', NULL, '1');";



        $requeteprt = $db->prepare($requete);
        $requeteprt->execute();


        $query2= "SELECT * FROM client WHERE mail='$email';";

        $query2ok=$db->prepare($query2);
        $query2ok->execute();
        $count=$query2ok->rowCount();

        if ($count >= 1) {
          while ($row = $query2ok->fetch(PDO::FETCH_NUM)) {
            $id=$row[0];
          }

          //ouverture de la session_start
          
          $_SESSION['idu']=$id;
          header("location: ?page=confirmation");

        }else {
          echo "<div class='alert alert-dismissible alert-danger'>
                <a class='alert-link'>Erreur dans les champs<a href='?page=accueil'>Recommencez svp.</a>
                </div>";
        }


        }else {
            echo "<div class='alert alert-dismissible alert-danger'>
                  <a class='alert-link'>Erreur Password: 6 caracteres min,<a href='?page=accueil'>Recommencez svp.</a>
                  </div>";
                }

      }else {
          echo "<div class='alert alert-dismissible alert-danger'>
                <a class='alert-link'>Erreur dans les champs<a href='?page=accueil'>Recommencez svp.</a>
                </div>";
              }
      }else {
          echo "<div class='alert alert-dismissible alert-danger'>
                <a class='alert-link'>Vous n'etes pas majeurs<a href='?page=accueil'>Recommencez svp.</a>
                </div>";
              }
            }
          }
?>
