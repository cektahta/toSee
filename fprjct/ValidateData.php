<?php
class DataCheck
{
    public static function validateLogin($login)
    {
        if (!preg_match('/^[a-zA-Z][a-zA-Z0-9-_\.]{2,20}/', $login)) {
            return false;
        }

        return true;
    }

    public static function validatePassword($password)
    {
// 		if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}/', $password)) {
// 			return false;
// 		}

        return true;
    }

    public static function passwordConfirm($password, $confirm_password)
    {
        if ($password != $confirm_password) {
            return false;
        }

        return true;
    }

    public static function validateEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        if(UserDao::checkEmail($email)) {
            return false;
        }

        return true;
    }


}