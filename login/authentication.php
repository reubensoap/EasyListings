<?php
session_start();
// Change this to your connection info.
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

// Now we check if the data from the login form was submitted, isset() well check if the data exists.

if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	die ('Please fill both the username and password field!');
}

// Prepare our SQL, preparing the SQL will prevent SQL injection.

function dataLogin($username) {
	global $db;
	$query = 'SELECT id, password FROM accounts WHERE username = :username';
	$statement1 = $db->prepare($query);
	$statement1->bindValue(':username', $username);
	$statement1->execute();
	$checker = $statement1->fetch();
	$statement1->closeCursor();
	return $checker;
}
/*
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    // Store the result so we can check if the account exists in the database.
    $stmt->store_result();
}
*/
$loginData = dataLogin($_POST['username']);

if (!empty($loginData)) {
	if (password_verify($_POST['password'], $loginData['password'])) {
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['id'] = $loginData['id'];
		header('Location: ../dashboard');
	} else {
		echo 'Incorrect password!';
	}
} else {
	echo 'Incorrect username!';
}
/*
if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
	if (password_verify($_POST['password'], $password)) {
		// Verification success! User has loggedin!
		// Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['id'] = $id;
		header('Location: ../dashboard');
	} else {
		echo 'Incorrect password!';
	}
} else {
	echo 'Incorrect username!';
}
$stmt->close(); */