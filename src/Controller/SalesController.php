<?php


namespace Joey\Controller;


use Joey\Helper\BaseController;
use Joey\Helper\Session;
use Joey\Model\Client;

class SalesController extends BaseController
{
    private $sales;
    private $client;
    private $session;

    public function __construct()
    {
        parent::__construct();
        $this->client = new Client();
        $this->session = Session::getInstance();
        if($this->session->id == null){
            $this->session->destroy();
            header('Location: ./?a=sign-in');
            exit();
        }
    }


    public function salesClient()
    {

        $clients = $this->client->findClientBySalse($this->session->id);
        $session = $this->session->firstName;

        echo self::$twig->render("sales/salesClientList.html.twig", [
            'clients' => $clients,
            'sessionUser' => $session
        ]);

    }
    public function salesListClient()
    {

        $clients = $this->client->findClientBySalse($this->session->id);
        $session = $this->session->firstName;


        echo self::$twig->render("sales/salesClientList.html.twig", [
            'clients' => $clients,
            'sessionUser' => $session
        ]);

    }

    public function salesAddClient()
    {
        $session = $this->session->firstName;

        echo self::$twig->render("sales/salesClientAdd.html.twig", [
            'sessionUser' => $session

        ]);

    }
    public function salesUpdateClient()
    {
        $session = $this->session->firstName;

        echo self::$twig->render("sales/salesClientUpdate.html.twig", [
            'sessionUser' => $session

        ]);

    }
}