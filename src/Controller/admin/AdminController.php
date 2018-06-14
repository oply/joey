<?php

namespace Joey\Controller\admin;

use Joey\Helper\BaseController;
use Joey\Helper\Session;
use Joey\Model\Admin;
use Joey\Model\Client;
use Joey\Model\Sales;

class AdminController extends BaseController
{
    private $admin;
    private $client;
    private $sales;
    private $session;

    /**
     * AdminController constructor.
     * @param $sales
     */
    public function __construct()
    {
        parent::__construct();
        $this->admin  = new Admin();
        $this->client = new Client();
        $this->sales = new Sales();
//        if(!Session::isSessionState()){
//
//        $this->session = Session::getInstance();
//        }
//        dump($this->session);
//        dump(Session::isSessionState());
//        die;

    }

    public function adminHome()
    {
        $session = Session::getInstance();
        dump($session->id);
        dump($_SESSION);
        echo self::$twig->render("index.html.twig");
    }

    public function adminClient()
    {

       $clients = $this->client->findAll();

        echo self::$twig->render("admin/client/adminClient.html.twig", [
                'clients' => $clients
            ]);

    }
    public function adminEditClient()
    {

        $client = $this->client->findOne($_GET['id']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['submit'] = 'valider') {
            $client = $this->client->update($_POST);


        header('Location: ./?a=admin/client');
        exit();
        }

        echo self::$twig->render("admin/client/adminClientEdit.html.twig", [
            'client' => $client
        ]);
    }
    public function adminAddClient()
    {
        if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
            $this->client->add($_POST);

        header('Location: ./?a=admin/client');
        exit();
        }
        echo self::$twig->render("admin/client/adminClientAdd.html.twig");
    }
    public function adminDeleteClient()
    {
        $data = $this->client->delete($_GET['id'] ?? false);

        header('Location: ./?a=admin/client');
        exit();

    }


    public function adminSales()
    {

        $saless = $this->sales->findAll();

        echo self::$twig->render("admin/sales/adminSales.html.twig", [
            'saless' => $saless
        ]);

    }
    public function adminEditSales()
    {

        $sales = $this->sales->findOne($_GET['id']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['submit'] = 'valider') {
            $sales = $this->sales->update($_POST);


            header('Location: ./?a=admin/sales');
            exit();
        }

        echo self::$twig->render("admin/sales/adminSalesEdit.html.twig", [
            'sales' => $sales
        ]);
    }
    public function adminAddSales()
    {
        if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
            $this->sales->add($_POST);

            header('Location: ./?a=admin/sales');
            exit();
        }
        echo self::$twig->render("admin/sales/adminSalesAdd.html.twig");
    }
    public function adminDeleteSales()
    {
        $data = $this->sales->delete($_GET['id'] ?? false);

        header('Location: ./?a=admin/sales');
        exit();

    }




}