<?php


namespace Joey\Model;


use Joey\Helper\Connect;

class Client
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
                   first_name,
                   last_name,
                   mail,
                   pwd,
                   civility,
                   phone,
                   adress,
                   zip,
                   city,
                   country,
                   dob,
                   company  
                 FROM 
                   client";

        $stmt = $this->connect->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);

    }

    public function findOne($data)
    {
        $query = "SELECT
                   id, 
                   first_name,
                   last_name,
                   mail,
                   pwd,
                   civility,
                   phone,
                   adress,
                   zip,
                   city,
                   country,
                   dob,
                   company   
                 FROM 
                   client
                 WHERE 
                    id = :id  
                   ";

        $stmt = $this->connect->prepare($query);
        $stmt->bindValue('id', $data);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_OBJ);

    }

    public function add($data)
    {
        $query = "INSERT INTO 
                  client
                  (
                    id, 
                    first_name,
                    last_name,
                    mail,
                    pwd,
                    civility,
                    phone,
                    adress,
                    zip,
                    city,
                    country,
                    dob,
                    company   
                  )
                  VALUE 
                  (
                    null , 
                    :first_name,
                    :last_name,
                    :mail,
                    :pwd,
                    :civility,
                    :phone,
                    :adress,
                    :zip,
                    :city,
                    :country,
                    :dob,
                    :company   
                  )";

        $stmt = $this->connect->prepare($query);
        $stmt->bindValue('first_name', $data['first_name']);
        $stmt->bindValue('last_name', $data['last_name']);
        $stmt->bindValue('mail', $data['mail']);
        $stmt->bindValue('pwd', $data['pwd']);
        $stmt->bindValue('civility', $data['civility']);
        $stmt->bindValue('phone',  $data['phone']);
        $stmt->bindValue('adress', $data['adress']);
        $stmt->bindValue('zip', $data['zip']);
        $stmt->bindValue('city', $data['city']);
        $stmt->bindValue('country', $data['country']);
        $stmt->bindValue('dob', $data['dob']);
        $stmt->bindValue('company', $data['company'] ?? '');
        $stmt->execute();
        //        $this->errorManagement($stmt);
        return $this->connect->lastInsertId();

    }

    public function update($data)
    {
        $query = "UPDATE
                    client
                  SET
                  first_name = :first_name,
                  last_name = :last_name,
                  mail = :mail,
                  pwd = :pwd,
                  civility = :civility,
                  phone = :phone,
                  adress = :adress,
                  zip = :zip,
                  city = :city,
                  country = :country,
                  dob = :dob,
                  company = :company  
                  WHERE
                    id = :id";

        $stmt = $this->connect->prepare($query);
        $stmt->bindValue('id', $data['id']);
        $stmt->bindValue('first_name', $data['first_name'] ?? '');
        $stmt->bindValue('last_name', $data['last_name'] ?? '');
        $stmt->bindValue('mail', $data['mail'] ?? '');
        $stmt->bindValue('pwd', $data['pwd'] ?? '');
        $stmt->bindValue('civility', $data['civility'] ?? '');
        $stmt->bindValue('phone',  $data['phone'] ?? '');
        $stmt->bindValue('adress', $data['adress'] ?? '');
        $stmt->bindValue('zip', $data['zip'] ?? '');
        $stmt->bindValue('city', $data['city'] ?? '');
        $stmt->bindValue('country', $data['country'] ?? '');
        $stmt->bindValue('dob', $data['dob'] ?? '');
        $stmt->bindValue('company', $data['company'] ?? '');
        $stmt->execute();

        return true;
    }


    public function delete($id)
    {
        $query = "DELETE
                  FROM
                  client
                  WHERE id = :id";

        $stmt = $this->connect->prepare($query);
        $stmt->bindValue('id', $id);
        $stmt->execute();

        return true;
    }
}