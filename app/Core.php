<?php

namespace App;

use \App\Errors as Errors;

/**
 * Core Class
 */
class Core
{
    /**
     * Constructor
     *
     * @return $this
     */
    public function __construct()
    {
        require __DIR__.'/../conf/Routes.php';

        $this->cookies();

        // if !url
        $url = (isset($_GET['url']) != null ? $_GET['url'] : $route['default']);
        $url = rtrim($url, '@');

        foreach ($route as $key => $value) {
            if($url == $key){
                $url = $value;
            }
        }
        $url = explode('@', $url);

        $file = __DIR__.'/../controllers/'.$url[0].'.php';
        if(!file_exists($file)) {
            $controller = new Errors();
            return false;
        }
        else {
            require $file;
            $controller = new $url[0];
            if(isset($url[1])) {
                $controller->{$url[1]}();
            }
        }
    }

    /**
     * Define cookies constants
     */
    private function cookies()
    {
        define('CN',    'DYNAMICWEB');
        define('XPB',   'ASP.NET');
        define('XAV',   '4.0.30319');
        define('XAMV',  '5.1');
        define('XFO',   'SAMEORIGIN');
        define('CDN',   'Incapsula');
        define('CACHE', 'no-cache, no-store, must-revalidate');
        define('AID',    'appId=cid-vfx:'.rand(1,999999).'-'.rand(1,999999).'-'.rand(1,999999).'-'.rand(1,999999).'-'.rand(1,999999).'');
        define('XSS',    '1; mode=block');
        define('XCTO',   'nosniff');
        header('Cache-Control:'.CACHE);
        header('Request-Context: '.AID);
        header('X-Powered-By: '.XPB);
        header('X-AspNet-Version: '.XAV);
        header('X-AspNetMvc-Version: '.XAMV);
        header('X-Frame-Options: '.XFO);
        header('X-CDN: '.CDN);
        header('X-XSS-Protection: '.XSS);
        header('X-Content-Type-Options: '.XCTO);
        header('CIP: '.IP());
        header('Pragma: no-cache');
        header('Expires: 0');
        $cv = date('ymd').time().rand(1,1000000000);
        setcookie(CN, $cv, time() + (86400 * 30), "/");
    }
}
