<?php 

$dsn = 'mysql:host=localhost;dbname=u541626658_reub';
$username = 'u541626658_joggr';
$password = 'Alicia2018';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include 'errors.php';
    exit;
}

?>