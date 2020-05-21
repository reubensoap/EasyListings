<?php 

function getUser($id) {
    global $db;
    $query = 'SELECT password, email, username FROM accounts WHERE id = :id';
    $statement1 = $db->prepare($query);
    $statement1->bindValue(':id', $id);
    $statement1->execute();
    $userData = $statement1->fetch();
    $statement1->closeCursor();
    return $userData;
}

function getUserInfo($id) {
    global $db;
    $query = 'SELECT * FROM clientprofile WHERE id = :id';
    $statement2 = $db->prepare($query);
    $statement2->bindValue(':id', $id);
    $statement2->execute();
    $userClientData = $statement2->fetch();
    $statement2->closeCursor();
    return $userClientData;
 }

?>