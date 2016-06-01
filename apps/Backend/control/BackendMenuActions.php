<?php

namespace apps\Backend\control;

use \apps\User\tools\UserMenu;
use \lib\url\UrlHref;

/**
 * Description of BackendMenuActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Mar 7, 2016
 */
class BackendMenuActions extends \lib\control\Controller {

        /* Menu used on backend area */
    /**
     *
     */
    public function topmenuAction(){

        $this->set('user-menu', UserMenu::backendMenu());
        $this->set('tool-debug', UserMenu::toolDebug());
        return $this->dispatch();
    }


    /**
     *
     */
    public function navbackendAction(){
        $links = $mainlinks = [];
        $this->set('nav_home', UrlHref::renderUrl('/'));
        $this->set('nav_backend', UrlHref::renderMenuUrl(['app'=>'backend'], 'Backend'));
        $apps = \apps\Configs\model\AppsQuery::getAppsAccess();
        $pages = \apps\Core\model\PageQuery::getBackendPages()->find();
        foreach($pages as $page){
            $btn = UrlHref::renderMenuUrl(['app'=>$page->getHtm()->getHtmApp()->getSlug(),'canonical'=>$page->getSlug()], $page->getMenu());
            $links[$page->getHtm()->getHtmApp()->getSlug()][] = $btn;
        }
        foreach($apps as $app){
            $this->set('nav['.$app->getSlug().']', $app->getSlug());
            if (isset($links[$app->getSlug()])) {
                $navs = [];
                foreach ($links[$app->getSlug()] as $page) {
                   $navs[] = ['link'=>$page];
                }
                $this->set('navs['.$app->getSlug().']', $navs);
            }
        }
        
        
        return $this->dispatch();
    }

}
