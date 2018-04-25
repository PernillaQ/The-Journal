<?php  
require_once'database.php';
header('Location: /index.php?message=delete succeded');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}	
if(isset($_GET["ID"])){
  $id = $_GET["ID"]; //ID from $article['entryID'] sent with deletelink (index.php) to get ID from the specific article.
}

$statement = $db->prepare("DELETE FROM `entries` WHERE `entries`.`entryID` = :entryID"
);

$statement->execute([":entryID" => $id]);

