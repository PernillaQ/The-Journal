<?php
require_once 'session_start.php';
require_once 'database.php';

$statement = $db->prepare(
  "SELECT * FROM users 
  WHERE username = :username"
);
$statement->execute([
  "username" => $_POST["username"]
]);

$user = $statement->fetch();

if (password_verify($_POST["password"], $user["password"])) {
    header('Location: /index.php?message=login succeded');
    $_SESSION["loggedIn"] = true;
    $_SESSION["username"] = $user["username"];
    $_SESSION["userID"] = $user["userID"];
} else {
    header('Location: /index.php?message=login failed');
}
