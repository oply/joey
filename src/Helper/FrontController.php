<?php


namespace Joey\Helper;

use Joey\Controller\admin\AdminController;
use Joey\Controller\Security\SecurityController;

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
                    $output     = $controller->login();
                    break;

                case "logout";
                    $controller = new SecurityController();
                    $output     = $controller->logout();
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

                case "admin/sales";
                    $controller = new AdminController();
                    $output     = $controller->adminSales();
                    break;

                case "admin/sales/add";
                    $controller = new AdminController();
                    $output     = $controller->adminAddSales();
                    break;

                case "admin/sales/edit";
                    $controller = new AdminController();
                    $output     = $controller->adminEditSales();
                    break;

                case "admin/sales/delete":
                    $controller = new AdminController();
                    $output     = $controller->adminDeleteSales();
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