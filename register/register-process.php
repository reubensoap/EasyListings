<?php

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

function accountChecker($user) {
    global $db;
    $query = 'SELECT id, password FROM accounts WHERE username = :username';
    $statement1 = $db->prepare($query);
    $statement1->bindValue(':username', $user);
    $statement1->execute();
    $search = $statement1->fetchAll();
    $statement1->closeCursor();
    return $search;
}

function createAccount($user, $pass, $em) {
    global $db;
    $query = 'INSERT INTO accounts (username, password, email) VALUES (:username, :password, :email)';
    $statement2 = $db->prepare($query);
    $statement2->bindValue(':username', $user);
    $statement2->bindValue(':password', $pass);
    $statement2->bindValue(':email', $em);
    $statement2->execute();
    $statement2->closeCursor();

}

if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
    $error_note = 'Please Complete the Registration Form.';
    include('register.php');
    exit;
} else if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
    $error_note = 'Please Complete the Registration Form.';
    include('register.php');
    exit;
} else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $error_note =  'Email is not valid.';
    include('register.php');
    exit;
} else {
    $searchy = accountChecker($_POST['username']);
    if (!empty($searchy)) {
        $error_note = 'Username exists, please choose another!';
        include('register.php');
        exit;
    } else {
        $passInsert = password_hash($_POST['password'], PASSWORD_DEFAULT);
        createAccount($_POST['username'], $passInsert, $_POST['email']);

        $body = '<html><body>';
        $body .= '<div style="text-align: center;">';
        $body .= '<p style="padding-bottom: 10px;">Thank You for registering with Easy Listings Marketing. Below is your Username associated with your account,
                    keep this information saved so you do not forget. You will be contacted shortly to make sure you are helped with any questions you may have.</p>';
        $body .= '<h2 style="padding-bottom: 10px;">The Username associated with your account is: '. strip_tags($_POST['username']) . ' remember to keep this info saved.</h2>';
        $body .= '<a href="www.easylistingsmarketing.com" style="padding: 5px 10px; background: #6b6dff; text-decoration: none; color: white;">Back To Site</a>';
        $body .= '</div></body></html>';

        $headers = "From: support@easylistingsmarketing.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $subject = "Thank You! From Easy Listings Marketing";
        $to_email = $_POST['email'];
        /*mail($to_email, $subject, $body, $headers); */
        $error_note = 'You have successfully registered, you can now login!';
        include('register.php');
    }
}

?>