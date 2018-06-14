<?php

namespace Joey\Controller;

use Joey\Helper\BaseController;
use Joey\Helper\Connect;
use Joey\Helper\Session;
use Joey\Model\Sales;

class SecurityController extends BaseController
{

    private $id;
    private $mail;
    private $pwd;
    private $role;
    private $session;
    private $bdd;
    private $sales;

    public function __construct()
    {
        parent::__construct();
        $this->bdd = Connect::getConnect();
        $this->sales = new Sales();

    }

    public function signIn()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['connexion_bouton'] = 'Se Connecter'){
           $verif = $this->verif($_POST);


           if ($verif){
               $this->session();

               if($this->session->role == 'sales'){
                   header('Location: ./?a=sales/client');
                   exit();
               }elseif ($this->session->role == 'client'){
                   header('Location: ./?a=sales/client');
                   exit();
               }elseif ($this->session->role == 'admin'){
                   header('Location: ./?a=admin/home');
                   exit();
               }



           }else{
               $error = "Le mail est inexistant ou Mot de passe incorrect";

           }

        }
        echo self::$twig->render("sign-in.html.twig", [
            'error' => $error
        ]);
    }

    public function signUp()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['sign-up-button'] = 'Sign up'){
            $verif = $this->verifSalesRegister($_POST);

            if ($verif != false) {
                $this->sales->register($_POST);

                header('Location: ./?a=sign-in');
                exit();

            }else{
                $error = "Le mail est inexistant ou Mot de passe incorrect";

            }

        }
        echo self::$twig->render("sales/sign-up.html.twig", [
            'error' => $error
        ]);
    }

    public function signOut(){
        $session = Session::getInstance();
        $session->destroy();
        header('Location: ./?a=sign-in');
        exit();

    }

    public function verifAdmin($data)
    {
        $sql = "SELECT
                  id,
                 mail,
                 pwd,
                 role
                 FROM
                 admin
                 WHERE
                 mail = :mail 
                 AND pwd = :pwd";

        $requete = $this->bdd->prepare($sql);
        $requete->bindValue('mail', $data['mail']);
        $requete->bindValue('pwd', $data['pwd']);
        $requete->execute();


        return $requete->fetch();

    }
    public function verifSales($data)
    {
        $sql = "SELECT
                  id,
                 mail,
                 pwd,
                 role
                 FROM
                 sales
                 WHERE
                 mail = :mail 
                 AND pwd = :pwd";

        $requete = $this->bdd->prepare($sql);
        $requete->bindValue('mail', $data['mail']);
        $requete->bindValue('pwd', $data['pwd']);
        $requete->execute();


        return $requete->fetch();


    }
    public function verifSalesRegister($data)
    {
        $sql = "SELECT
                  id,
                 mail,
                 pwd,
                 role
                 FROM
                 sales
                 WHERE
                 mail = :mail 
                 ";

        $requete = $this->bdd->prepare($sql);
        $requete->bindValue('mail', $data['mail']);
        $requete->execute();


        return $requete->fetch();


    }
    public function verifClient($data)
    {
        $sql = "SELECT
                  id,
                 mail,
                 pwd,
                 role
                 FROM
                 client
                 WHERE
                 mail = :mail 
                 AND pwd = :pwd";

        $requete = $this->bdd->prepare($sql);
        $requete->bindValue('mail', $data['mail']);
        $requete->bindValue('pwd', $data['pwd']);
        $requete->execute();


        return $requete->fetch();


    }

    public function verif($data){
        $reponse = $this->verifAdmin($data);
        if($reponse){
            $this->setId($reponse['id']);
            $this->setPwd($reponse['pwd']);
            $this->setMail($reponse['mail']);
            $this->setRole($reponse['role']);
            return 1;
        }else{
            $reponse = $this->verifSales($data);
            if($reponse){
                $this->setId($reponse['id']);
                $this->setPwd($reponse['pwd']);
                $this->setMail($reponse['mail']);
                $this->setRole($reponse['role']);
                return 1;

            }else{
                $reponse = $this->verifClient($data);
                if($reponse){
                    $this->setId($reponse['id']);
                    $this->setPwd($reponse['pwd']);
                    $this->setMail($reponse['mail']);
                    $this->setRole($reponse['role']);
                    return 1;

                }else{
                    return 0;

                }
            }
        }

    }
    public function session()
    {

       $this->session = Session::getInstance();
        $this->session->id = $this->getId();
        $this->session->mail = $this->getMail();
        $this->session->role = $this->getRole();

//        return 1;
    }


    /*===============================getter et setter================================*/

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


    public function getMail()
    {
        return $this->mail;
    }
    public function setMail($mail)
    {
        $this->mail = $mail;
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
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }



}
