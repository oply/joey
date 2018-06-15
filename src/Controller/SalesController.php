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

        echo self::$twig->render("sales/salesClient.html.twig", [
            'clients' => $clients
        ]);

    }

    public function salesAddClient()
    {


        echo self::$twig->render("sales/salesClientAdd.html.twig", [
        ]);

    }
}