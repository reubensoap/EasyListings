<?php 

require_once('model/database.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'home';
    }
}

if ($action == 'home') {
    include('main.php');
} else if ($action == 'contact') {
    include('contact.php');
} else if ($action == 'about') {
    include('about.php');
} else if ($action == 'process') {
    include('process.php');
} else if ($action == 'form-submit') {
    $firstName = filter_input(INPUT_POST, 'FirstName');
    $lastName = filter_input(INPUT_POST, 'LastName');
    $email = filter_input(INPUT_POST, 'Email');
    $phone = filter_input(INPUT_POST, 'Phone');
    

    $body = '<html><body>';
    $body .= '<div style="text-align: center;">';
    $body .= '<h2 style="padding-bottom: 10px;">Thank You '. strip_tags($_POST['FirstName']) . ', We Will Get Back With You Shortly</h2>';
    $body .= '<p style="padding-bottom: 10px;">In the mean time, check out my previous work to see what ideas come to mind when
                we collaborate. We look forward to working with you.</p>';
    $body .= '<a href="www.easylistingsmarketing.com" style="padding: 5px 10px; background: #6b6dff; text-decoration: none; color: white;">Back To Site</a>';
    $body .= '</div></body></html>';

    $headers = "From: support@easylistingsmarketing.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $subject = "Thank You! From Easy Listings Marketing";
    $to_email = $email;


/* --------------------------------------------------------------- */

    $meBody = '<html><body>';
    $meBody .= '<h2>Contact Information From Requester</h2></br>';
    $meBody .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
    $meBody .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($_POST['FirstName']) . " " . strip_tags($_POST['LastName']) . "</td></tr>";
    $meBody .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['Email']) . "</td></tr>";
    $meBody .= "<tr><td><strong>Phone:</strong></td><td>" . strip_tags($_POST['Phone']) . "</td></tr>";
    $meBody .= "</table>";
    $meBody .= "</body></html>";


    $meHeaders = "From: reubensoapy@gmail.com\r\n";
    $meHeaders .= "MIME-Version: 1.0\r\n";
    $meHeaders .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $meSubject = "New Message From Website";
    $meTo_email = 'support@easylistingsmarketing.com';

    if (mail($to_email, $subject, $body, $headers)) {
        
        mail($meTo_email, $meSubject, $meBody, $meHeaders);
        include('thanks.php');

    } else {
        include('thanks.php');
    }

}


?>