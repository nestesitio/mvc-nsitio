<?php

namespace lib\url;

use \apps\Core\model\PageQuery;
use \lib\url\UrlHref;

/**
 * Description of Redirect
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Apr 8, 2015
 */
class Redirect {
    
    public static function redirectToUrl($url){
        header('Location:' . $url);
    }

    public static function redirectByPageNumber($id){
        $page = PageQuery::getPageById($id);
        if ($page != false) {
            $url = UrlHref::renderUrl(['app' => $page->getHtm()->getHtmApp()->getSlug(), 'canonical' => $page->getSlug()]);
            header('Location:' . $url);
        } else {
            header('Location: /');
        }
    }
    
    public static function redirectHome(){
        header('Location: /');
    }
    
    public static function redirectLogin(){
        $url = UrlHref::renderUrl(['app' => 'user', 'canonical' => 'login']);
        header('Location:' . $url);
    }

}