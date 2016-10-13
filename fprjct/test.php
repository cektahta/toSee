<?php
require_once 'dbconn.php';
require_once 'User.php';
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirmpassword'];
$user = new User($name,$email,$password);

echo $user->getName();



$pdo = dbconn::getInstance();
$query = "INSERT INTO users (user_name, user_email, user_password)
					   VALUES (:name,:email, :password)";

$statement = $pdo->prepare($query);
$data = [
    ':name' => $name,
    ':email' => $email,
    ':password' => $password,

];

$success = $statement->execute($data);
