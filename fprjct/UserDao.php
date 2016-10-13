<?php
require_once 'dbconn.php';
require_once 'UserModel.php';
class UserDao
{
    public static function addUser(User $user)
    {
        try {
            $pdo = dbconn::getInstance();
            $query = "INSERT INTO users (user_name, user_email, user_password, user_joining_date)
					   VALUES (:name,:email, :password,:date_of_reg)";


            $statement = $pdo->prepare($query);

            $data = [
                ':name' => $user->getName(),
                ':email' => $user->getEmail(),
                ':password' => $user->getPassword(),
                ':date_of_reg' => $user->getDateOfReg()
            ];


            $success = $statement->execute($data);



        } catch (\PDOException $e) {
            $result['message'] = $e->getMessage();

        }


    }

}