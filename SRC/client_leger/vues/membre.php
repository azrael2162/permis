<?php if (@!empty($_SESSION['grp'] == 2)): ?>
<?php
include 'fonctionphp/recup_info_membre.php';
include 'fonctionphp/modif_info_user.php';?>
<?php
GLOBAL $mail;
GLOBAL $adresse;
GLOBAL $code_zip;
GLOBAL $datenaissa;
GLOBAL $tel;
GLOBAL $nom;
GLOBAL $prenom;
GLOBAL $mail;
 ?>
<div class="container">
<center>
<h3>Vos informations</h3>
<br>
<form class="" action="" method="post">
  <input type="text" class="form-control" name="nom" placeholder="<?=$nom?>"><br>
  <input type="text" class="form-control" name="prenom" placeholder="<?=$prenom?>"><br>
  <input type="mail" class="form-control" name="email" placeholder="<?=$mail?>"><br>
  <input type="date" class="form-control" name="date" value="<?=$datenaissa?>"><br>
  <input type="number" class="form-control" name="tel" placeholder="<?=$tel?>"><br>
  <input type="varchar" class="form-control" name="adress" placeholder="<?=$adresse?>"> <br>
  <input type="number" class="form-control" name="zip" placeholder="<?=$code_zip?>"><br>
  <input type="password" class="form-control" name="password" placeholder="Votre nouveau password"><br>
  <input type="submit" name="valider" value="Valider" class="btn btn-primary btn-lg btn-block">
  <?php modif_info_user(); ?>
</form>
</center>
</div>
<?php endif; ?>
