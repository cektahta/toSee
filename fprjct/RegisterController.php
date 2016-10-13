<?php
session_start();
require_once 'dbconn.php';
require_once 'AbstractController.php';
require_once 'UserDao.php';
require_once 'UserModel.php';
require_once 'ValidateData.php';

class RegisterController extends AbstractController {

    public function register()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirmpassword'];
        $errors = $this->checkData($name, $email, $password, $confirm_password);
        if(empty($errors)) {
            $user = new User($name,$email,$password);
            UserDao::addUser($user);
            echo "1";
        }
    }

    protected function checkData($name, $email, $password, $confirm_password)
    {
        $errors = [];
        $pdo = dbconn::getInstance();


        if (!DataCheck::validateLogin($name)) {
            $errors[] = 'First Name must start with letters and must be between 3 and 20 characters!';
        }

        if (!DataCheck::validateEmail($email)) {

            $errors[] = 'Invalid email or is used!';
        }
        if (!DataCheck::validatePassword($password)) {
            $errors[] = 'Password must containt at least 1 lowercase, 1 uppercase letters and 1 digit.
				Must be between 6 and 20 characters!';
        }
        if (!DataCheck::passwordConfirm($password, $confirm_password)) {

            $errors[] = 'Passwords does not match!';
        }

        return $errors;

    }


}
