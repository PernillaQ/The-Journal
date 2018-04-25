<?php 
require_once 'database.php';
require_once 'session_start.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}	
if (isset($_SESSION["loggedIn"])): /* This "if" is just here because I did´nt want to see the message "undefined variable" on the signin page.( Before user has signed in and session has not yet started, $_SESSION["userID"] is not defined)*/

$statement = $db->prepare("SELECT * FROM entries 
JOIN users
ON `entries`.`userID` = `users`.`userID`
WHERE users.userID ='". $_SESSION["userID"] ."'"
);

$statement->execute();

$data = $statement->fetchAll(PDO::FETCH_ASSOC);

endif;?>
