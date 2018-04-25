<?php 
require_once 'session_start.php';
require_once 'database.php';

header('Location: /index.php?message=update succeded');

/* new updated content sent from the updateforms updatebutton*/
if (isset($_GET["ID"])){
   $id = $_GET["ID"];
}
if (isset($_POST["TITLE"])){
   $title = $_POST["TITLE"];
}
if (isset($_POST["CONTENT"])){
   $content = $_POST["CONTENT"];
}

$new_date= date("Y-m-d H:i:s", strtotime('+2 hours'));
    
$statement = $db->prepare( "UPDATE `entries` 
  SET `title` = :title, `content`= :content, `createdAt`= :createdAt
  WHERE `entries`.`entryID` = :entryID"
);
$statement->execute([
  ":title" => $_POST["title"],
  ":content" => $_POST["content"],
  ":createdAt" => $new_date,
  ":entryID" => $id
]);


?>



