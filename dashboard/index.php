<?php 

require_once('../model/database.php');
require_once('../model/dash-functions.php');

// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../index.php');
	exit();
}

$dsn = 'mysql:host=localhost;dbname=u541626658_reub';
$username = 'u541626658_joggr';
$password = 'Alicia2018';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include '../model/errors.php';
    exit;
}

/*// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close(); */

$userData = getUser($_SESSION['id']);
$userClientData = getUserInfo($_SESSION['id']);

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'home';
    } 
}

if ($action == 'home') {
    include('home-dash.php');
} else if ($action == 'profile') {
    include('profile.php');
} else if ($action == 'logout') {
    header('Location: logout.php');
}


?>