<?php
require 'fonctionphp/gestuser.php'
?>
<div class="container">
<center>
 <h1 class="my-4">Bienvenue sur,
        <small>Castellane cars !</small>
      </h1>
      <p>Ce site à pour bute de vous former dans les meilleurs conditons possible.
      <br>Nous serons ravis de vous recevoir au sein de notre etablissement ! </p>
      <br>
</center>
<section>
  <div class="row">
    <div class="col-sm">
      <div class="col">
        <img src="img/calendar.png"  class=" img-fluid d-block mx-auto" height="128px" width="128px" alt=""><br>
        <center><b> Réservez vos cours de conduite en ligne , <br>facilement grace à notre site ergonomique. </b></center>
      </div>
      <br>
      <br>
    </div>
    <div class="col-sm">
      <img src="img/progress.png"  class="rounded-circle img-fluid d-block mx-auto" height="128px" width="128px" alt=""><br>
      <center><b>Vous pouvez passer vos quizz sur notre site directement en <br>ligne, vous aurez un suivie sur votre profil.</b>
    </div>
    <br>
    </div>
</section>
  <br><br><br><br><br><br><br><br>

<section>
    <div class="row">

        <div class="col">
            <center>
                <a href="?page=formule"><img src="img/turn.png" height="420px" width="420px"></a>
            </center>
        </div>
        <div class="col"><center><h3>Permis de Conduire</h3>
                <br>
            <b>Permis de Conduire
                Apprenez à conduire près de chez vous selon votre emploi du temps <br>avec plus de 300 enseignants diplômés et pédagogues.
                Obtenez votre permis grâce à la pédagogie Ornikar : <br> plan de formation personnalisé, livret pédagogique et accompagnement par notre équipe.</b>
                <br><br>
                <a href="?page=formules" class="btn btn-primary btn-lg btn-block"><p>Voir les Formlues</p></a>
            </center></div>
    </div>
</section>
    <br>
    <br>
    <br>
    <br>
    <section>
    <br><br><br><br>
  <center>
  <div class="row">
    <div class="col">
      <h5>Devenez membre</h5>
      <br>
      <form class="" action="" method="post">
        <input type="text" class="form-control" name="nom" placeholder="Nom"><br>
        <input type="text" class="form-control" name="prenom" placeholder="Prenom"><br>
        <input type="password" class="form-control" name="password" placeholder="Password"><br>
        <input type="mail" class="form-control" name="email" placeholder="Email"><br>
        <input type="Date" class="form-control" name="date" placeholder=""><br>
        <input type="number" class="form-control" name="tel" placeholder="Numero de télépohne"><br>
        <input type="varchar" class="form-control" name="adress" placeholder="Adresse"> <br>
        <input type="number" class="form-control" name="zip" placeholder="Départment"><br>
        <input type="submit" name="valider" value="Valider" class="btn btn-primary btn-lg btn-block">
        <?php ajout_user();?>
      </form>
    </div>
    <div class="col">
      <h5>Formulaire de contact</h5>
      <br>
      <form class="" action="" method="post">
          </a>        <div class="row">
          <div class="col">
            <input type="text" class="form-control" placeholder="Prénom">
          </div>
          <div class="col">
            <input type="text" class="form-control" placeholder="Nom">
          </div>
          <br><br>
        </div>
        <br>
        <input type="text" name="" class="form-control" placeholder="L'objet">
        <br>
        <input type="mail" name="" class="form-control" placeholder"votre Email">
        <br><br>
        <textarea class="form-control" id="exampleTextarea" placeholder="Votre sujet" rows="9"></textarea>
        <br><br>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Envoyer</button>
      </form>
    </div>
  </div>
</center>
  </section>
  </div>
</div>
