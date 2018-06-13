<?php

namespace Joey\Model;

use Joey\Helper\Connect;

class Sales
{
    private $connect;

    /**
     * Sales constructor.
     * @param $connect
     */
    public function __construct()
    {

        $this->connect = Connect::getConnect();

    }

    public function findAll()
    {
        $query = "SELECT
                   id, 
                   mail,
                   pwd,
                   phone,
                   first_name,
                   last_name   
                 FROM 
                   sales";

        $stmt = $this->connect->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);

    }

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
                  null,
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