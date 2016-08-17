<?php

namespace apps\Home\control;

use \apps\Core\model\PagesQuery;



/**
 * Description of HomeActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Feb 26, 2015
 */
class HomeActions extends \lib\control\Controller {

    /**
     * @var null
     */
    private $user = null;
    /**
     * @var null
     */
    private $group = null;
    /**
     * @var null
     */
    private $team = null;


    /**
     *
     */
    public function defaultAction() {
        $this->setView('layout/agency/home');
        $page = PagesQuery::getPage('home');
        $page = PagesQuery::getHtmByOrd('home', 'desc', 'pt')
                ->joinHtmPageHasVars()->joinHtmVars()
                ->filterByVar('local')->filterByValue('home-quem-somos')
                ->endUse()->endUse()->findOne();
        $this->set('about', $page->getHtmPage()->getHtmTxt()->getTxt());
        $this->sectionServices();
 
    }
    
    private function sectionServices(){
        $pages = PagesQuery::getHtmByOrd('home', 'desc', 'pt')
                ->joinHtmPageHasVars()->joinHtmVars()
                ->filterByVar('local')->filterByValue('home-services')
                ->endUse()->endUse()->find();
        
        foreach($pages as $page){
            $this->set('service-img' . $page->getOrd(), $page->getHtmPage()->getSlug());
            $this->set('service-title' . $page->getOrd(), $page->getHtmPage()->getTitle());
        }
        $this->renderCollection($pages, 'services');
        
        
    }



    
    
    
    

}
