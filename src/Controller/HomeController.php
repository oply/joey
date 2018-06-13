<?php

namespace Joey\Controller;

use Joey\Helper\BaseController;
use Joey\Model\Sales;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends BaseController
{
    public function home()
    {


//        dump($result);
//        die;


        return new Response(self::$twig->render("page/index.html.twig"));
    }

}