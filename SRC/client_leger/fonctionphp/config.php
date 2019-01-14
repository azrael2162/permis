<?php
$db='autoEcole';
$ip = 'mysql:dbname='.$db.';host=localhost';
$login = "root";
$pass = "root";

try {
    $db = new PDO ($ip,$login,$pass);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
?>
