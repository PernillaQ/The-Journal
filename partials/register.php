<?php
header('Location: /');

require_once 'database.php';

$hashed = password_hash($_POST["password"], PASSWORD_DEFAULT);

$statement = $db->prepare(
  "INSERT INTO users 
  (username, password)
  VALUES (:username, :password)"
);
$statement->execute([
  ":username" => $_POST["username"],
  ":password" => $hashed
]);
