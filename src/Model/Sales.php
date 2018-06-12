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

        $this->connect = Connect::getConnect();

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



//    public function show()
//    {
//        $query = "SELECT
//
//                 ";
//
//    }

    public function add($data)
    {
        $query = "INSERT INTO 
                  sales
                  (
                   id,
                   mail,
                   pwd,
                   phone,
                   first_name,
                   last_name
                  )
                  VALUE 
                  (
                  :mail,
                  :pwd,
                  :phone,
                  :first_name,
                  :last_name
                  )";

        $stmt = $this->connect->prepare($query);
        $stmt->bindValue('mail',       $data['mail']);
        $stmt->bindValue('pwd',        $data['pwd']);
        $stmt->bindValue('phone',      $data['phone']);
        $stmt->bindValue('first_name', $data['first_name']);
        $stmt->bindValue('last_name',  $data['last_name']);
        $stmt->execute();
//        $this->errorManagement($stmt);
        return $this->connect->lastInsertId();

    }

    public function update($data)
    {
        $query = "UPDATE
                    sales
                  SET
                    mail       = :mail,
                    pwd        = :pwd,
                    phone      = :phone,
                    first_name = :first_name,
                    last_name  = :last_name
                  WHERE
                    id = :id";

        $stmt = $this->connect->prepare($query);
        $stmt->bindValue('id', $data['id']);
        $stmt->bindValue('mail', $data['mail'] ?? '');
        $stmt->bindValue('pwd', $data['pwd'] ?? '');
        $stmt->bindValue('phone', $data['phone'] ?? '');
        $stmt->bindValue('first_name', $data['first_name'] ?? '');
        $stmt->bindValue('last_name', $data['last_name'] ?? '');
        $stmt->execute();

        return true;
    }


    public function delete($id)
    {
        $query = "DELETE
                  FROM
                  sales
                  WHERE id = :id";

        $stmt = $this->connect->prepare($query);
        $stmt->bindValue('id', $id);
        $stmt->execute();

        return true;
    }


}