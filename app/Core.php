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

        $request = new Request();

        $this->cookies();

        // if !url use default route
        $url = $request->get('url', 'default');
        $url = rtrim($url, '@');

        // fetch route
        foreach ($route as $key => $value) {
            if ($url == $key) {
                $url = $value;
            }
        }

        // get controller & view name(s)
        $url = explode('@', $url);

        // if controller doesn't exist => load Errors view
        $file = __DIR__.'/../controllers/'.$url[0].'.php';
        if(! file_exists($file)) {
            $controller = new Errors();
        }
        else {
            // Load controller & call the wanted view
            require $file;
            $controller = new $url[0];
            if (isset($url[1])) {
              echo $controller->{$url[1]}();
            }
        }
    }

    /**
     * Define cookies
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
