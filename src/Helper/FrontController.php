<?php


namespace Joey\Helper;


use Joey\Controller\HomeController;

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
                case "home":
                    $controller = new HomeController();
                    $output = $controller->home();
                    break;


//                case "delete":
//                    $controller = new HomeController();
//                    $output     = $controller->de();
//                    break;
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
        return $output->send();
    }
}