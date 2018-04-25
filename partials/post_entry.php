<?php
header('Location: /');

require_once 'database.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}	
/*date_default_timezone_set('Europe/Stockholm');*/
$new_date= date("Y-m-d H:i:s", strtotime('+2 hours'));

$statement = $db->prepare(
  "INSERT INTO entries 
  (title, content, createdAt, userID)
  VALUES (:title, :content, :createdAt, :userID)"
);

$statement->execute([
  ":title" => $_POST["title"],
  ":content" => $_POST["content"],
  ":createdAt" => $new_date,
  ":userID" => $_SESSION['userID']
]);

/* new post from form.