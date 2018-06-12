<?php


namespace Joey\Helper;


class BaseController
{

    protected static $twig;
    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem(APP_DIR_VIEW);
        self::$twig = new \Twig_Environment($loader,array(
            'cache' => false,
            'debug' => true,
        ));

        self::$twig->addExtension(new \Twig_Extension_Debug());
    }
}