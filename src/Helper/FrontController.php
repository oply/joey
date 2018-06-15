<?php


namespace Joey\Helper;

use Joey\Controller\admin\AdminController;
use Joey\Controller\SalesController;
use Joey\Controller\SecurityController;

class FrontController
{
    /**
     * FrontController constructor.
     */
    public function __construct()
    {

        $a = $_GET['a'];
        $a = ltrim(rtrim($a, "/"), "/");
        try {
            switch ($a) {
                case "sign-in";
                    $controller = new SecurityController();
                    $output     = $controller->signIn();
                    break;

                case "sign-out";
                    $controller = new SecurityController();
                    $output     = $controller->signOut();
                    break;

                case "sign-up";
                    $controller = new SecurityController();
                    $output     = $controller->signUp();
                    break;

                case "admin/home":
                    $controller = new AdminController();
                    $output = $controller->adminHome();
                    break;

                case "admin/client";
                    $controller = new AdminController();
                    $output     = $controller->adminClient();
                    break;

                case "admin/client/add";
                    $controller = new AdminController();
                    $output     = $controller->adminAddClient();
                    break;

               case "admin/client/edit";
                    $controller = new AdminController();
                    $output     = $controller->adminEditClient();
                    break;

                case "admin/client/delete":
                    $controller = new AdminController();
                    $output     = $controller->adminDeleteClient();
                    break;


                case "sales/client";
                    $controller = new SalesController();
                    $output     = $controller->salesClient();
                    break;

                case "sales/client/add";
                    $controller = new SalesController();
                    $output     = $controller->salesAddClient();
                    break;

//                case "admin/sales";
//                    $controller = new AdminController();
//                    $output     = $controller->
//                case "details":
//                    $controller = new PageController();
//                    $output = $controller->adminDetails();
//                    break;
//
//                default:
//                    $controller = new PageController();
//                    $output = $controller->adminHome();
//                    break;
            }

        } catch (\PDOException $e) {
            die('Erreur PDO '. $e->getMessage());
        }
        return $output;
    }
}