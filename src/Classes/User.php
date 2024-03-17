<?php

class User
{
    private $userID;
    private $name;
    private $surname;
    private $email;
    private $password;

    public function __construct($userID, $name, $surname, $email, $password)
    {
        $this->userID = $userID;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
    }
    public function getUserID()
    {
        return $this->userID;
    }
    public function setUserID($userID)
    {
        $this->userID = $userID;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }


    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }



    public function toAssociativeArray()
    {
        return [
            "userID" => $this->userID,
            "name" => $this->name,
            "surname" => $this->surname,
            "email" => $this->email,
            "password" => $this->password
        ];
    }
}
