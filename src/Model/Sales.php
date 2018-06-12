<?php

namespace Joey\Model;

use Joey\Helper\Connect;

class Sales
{
        private $connect;

        private $id;
        private $firstName;
        private $lastName;
        private $phone;
        private $pwd;
        private $login;
        private $mail;

    /**
     * Sales constructor.
     * @param $connect
     */
    public function __construct()
    {

        $this->connect = new Connect();
//        dump($this->connect::getConnect());
//        die;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * @param mixed $pwd
     */
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
        return $this;
    }

//    public function add(){
//        $query = "Select * from sales";
//        dump($query);
//        die;
//        $stmt = $this->connect::getConnect();
//        $stmt->prepare($query);
//        $stmt->execute();
//        $this->errorManagement($stmt);
//        return $stmt->fetchAll(\PDO::FETCH_OBJ);

//    };
//    public function update();
//    public function delete();
//    public function show();

}