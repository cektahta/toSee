<?php
class User
{
    protected $name;

    protected $email;

    protected $password;

    protected $date_of_reg;

    public function __construct($name, $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $this->passwordHash($password);
        $this->date_of_reg = date("Y-m-d H:i:s");
    }

    protected function passwordHash($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function getName()
    {
        return $this->name;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function getDateOfReg()
    {
        return $this->date_of_reg;
    }
}