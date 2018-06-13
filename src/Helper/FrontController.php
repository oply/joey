<?php


namespace Joey\Helper;

use Joey\Controller\AdminController;
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
                case "login";
                    $controller = new SecurityController();
                    $controller->login();
                    break;

                case "logout";
                    $controller = new SecurityController();
                    $controller->logout();
                    break;

                case "admin/home":
                    $controller = new AdminController();
                    $output = $controller->adminHome();
                    break;

                case "admin/client";
                    $controller = new AdminController();
                    $controller->adminClient();
                    break;

               case "admin/client/edit";
                    $controller = new AdminController();
                    $controller->adminEditClient();
                    break;

                case "admin/client/delete":
                    $controller = new AdminController();
                    $output     = $controller->adminDeleteClient();
                    break;
//
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