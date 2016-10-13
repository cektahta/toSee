<?php
namespace Controller;

use Database\dbconn;
use Dao\UserDao;
use Model\User;
use Helper\ArrReader;
use Validate\ValidateData;
session_start();

require_once 'RegisterController.php';
$register = new RegisterController();
$register->register();
//$name = ArrReader::getFromArray($_POST, 'first_name');
//var_dump($name);


class RegisterController {

    public function register()
    {
        $name = $_POST['name'];
        var_dump($name);
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirmpassword'];
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



        if (!ValidateData::validateLogin($name)) {
            $errors[] = 'Name must start with letters and must be between 3 and 20 characters!';
        }


        if (!ValidateData::validatePassword($password)) {
            $errors[] = 'Password must contain at least 1 lowercase, 1 uppercase letters and 1 digit.
				Must be between 6 and 20 characters!';
        }
        if (!ValidateData::passwordConfirm($password, $confirm_password)) {

            $errors[] = 'Passwords does not match!';
        }

        return $errors;

    }


}
