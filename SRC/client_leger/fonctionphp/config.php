<?php
$db='';
$ip = 'mysql:dbname='.$db.';host=localhost';
$login = "";
$pass = "";

try {
    $db = new PDO ($ip,$login,$pass);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
?>
