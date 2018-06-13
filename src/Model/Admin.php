<?php


namespace Joey\Model;


use Joey\Helper\Connect;

class Admin
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
                   name,
                   mail,
                   pwd
                 FROM 
                   admin";

        $stmt = $this->connect->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);

    }

    /**
     * @param $data
     *
     * @return string
     */
    public function add($data)
    {
        $query = /** @lang text */
            "INSERT INTO 
                  admin
                  (
                    id, 
                    name,
                    mail,
                    pwd
                  )
                  VALUE 
                  (
                    null , 
                    :name,
                    :mail,
                    :pwd
                  )";

        $stmt = $this->connect->prepare($query);
        $stmt->bindValue('name', $data['name']);
        $stmt->bindValue('mail,', $data['mail']);
        $stmt->bindValue('pwd,', $data['pwd']);
        $stmt->execute();
        //        $this->errorManagement($stmt);
        return $this->connect->lastInsertId();

    }

    public function update($data)
    {
        $query = "UPDATE
                    admin
                  SET
                  name = :name,
                  mail = :mail,
                  pwd = :pwd
                  WHERE
                    id = :id";

        $stmt = $this->connect->prepare($query);
        $stmt->bindValue('id', $data['id']);
        $stmt->bindValue('name,', $data['name'] ?? '');
        $stmt->bindValue('mail,', $data['mail'] ?? '');
        $stmt->bindValue('pwd,', $data['pwd'] ?? '');
        $stmt->execute();

        return true;
    }


    public function delete($id)
    {
        $query = "DELETE
                  FROM
                  admin
                  WHERE id = :id";

        $stmt = $this->connect->prepare($query);
        $stmt->bindValue('id', $id);
        $stmt->execute();

        return true;
    }
}