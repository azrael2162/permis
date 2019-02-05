<?php
          session_start();
          unset($_SESSION['idu']);
          unset($_SESSION['grp']);
          unset($_SESSION['valider']);

          header('location: ?page=accueil');
 ?>
