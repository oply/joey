<?php

namespace Joey\Controller;

use Joey\Helper\BaseController;
use Joey\Model\Sales;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends BaseController
{
    public function home()
    {

        $sales = new Sales();
//        dump($sales->add());
//        die;


        return new Response(self::$twig->render("page/index.html.twig"));
    }

}