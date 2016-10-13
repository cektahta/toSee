<?php

session_start();
require_once 'dbconn.php';
require_once 'UserDao.php';
require_once 'UserModel.php';
require_once 'ValidateData.php';
require_once 'ArrReader.php';
require_once 'RegisterController.php';
$register = new RegisterController();
$register->register();



class RegisterController {

    public function register()
    {

        $name = ArrReader::getFromArray($_POST, 'first_name');
        $email = ArrReader::getFromArray($_POST, 'email');
        $password = ArrReader::getFromArray($_POST, 'password');
        $confirm_password = ArrReader::getFromArray($_POST, 'confirm_password');
        $errors = $this->checkData($name, $email, $password, $confirm_password);
        if(empty($errors)) {
            $user = new User($name,$email,$password);
            UserDao::addUser($user);
            header("Location: Newsfeed.php");

        }
    }

    protected function checkData($name, $email, $password, $confirm_password)
    {
        $errors = [];
        $pdo = dbconn::getInstance();


        if (!DataCheck::validateLogin($name)) {
            $errors[] = 'Name must start with letters and must be between 3 and 20 characters!';
        }

        
        if (!DataCheck::validatePassword($password)) {
            $errors[] = 'Password must contain at least 1 lowercase, 1 uppercase letters and 1 digit.
				Must be between 6 and 20 characters!';
        }
        if (!DataCheck::passwordConfirm($password, $confirm_password)) {

            $errors[] = 'Passwords does not match!';
        }

        return $errors;

    }


}
