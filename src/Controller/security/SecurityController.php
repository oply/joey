<?php

namespace Joey\Controller\Security;

use Joey\Helper\BaseController;
use Joey\Helper\Connect;
use Joey\Helper\Session;

class SecurityController extends BaseController
{

    private $id;
    private $mail;
    private $pwd;

    private $bdd;
    public function __construct()
    {
        parent::__construct();
        $this->bdd = Connect::getConnect();

    }
    public function login()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['connexion_bouton'] = 'Se Connecter') {
            $verif = $this->verif($_POST);
            if ($verif){
                $this->session();
                header('Location: ./?a=admin/home');
                exit();

            }else{
                return "Le mail est inexistant ou Mot de passe incorrect";
            }

        }
        echo self::$twig->render("login.html.twig");
    }

    public function logout()
    {
        $session = Session::getInstance();
        $session->destroy();
        header('Location: ./?a=login');
        exit();

    }

    public function verifAdmin($data)
    {
        $sql = "SELECT
                  id,
                 mail,
                 pwd
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
                 pwd
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
    public function verifClient($data)
    {
        $sql = "SELECT
                  id,
                 mail,
                 pwd
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

    public function verif($data)
    {
        $reponse = $this->verifAdmin($data);
        if($reponse){
            $this->setId($reponse['id']);
            $this->setPwd($reponse['pwd']);
            $this->setMail($reponse['mail']);
            return 1;
        }else{
            $reponse = $this->verifSales($data);
            if($reponse){
                $this->setId($reponse['id']);
                $this->setPwd($reponse['pwd']);
                $this->setMail($reponse['mail']);
                return 1;

            }else{
                $reponse = $this->verifClient($data);
                if($reponse){
                    $this->setId($reponse['id']);
                    $this->setPwd($reponse['pwd']);
                    $this->setMail($reponse['mail']);
                    return 1;

                }else{
                    return 0;

                }
            }
        }

    }

    public function session()
    {

        $session = Session::getInstance();
        $session->id = $this->getId();
        $session->mail = $this->getMail();
//        $_SESSION['id'] = $this->getId();
//        $_SESSION['mail'] = $this->getMail();

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
}
