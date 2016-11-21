<?php

namespace apps\Home\control;

use \apps\Vendor\model\HtmQuerie;



/**
 * Description of HomeActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Feb 26, 2015
 */
class HomeActions extends \lib\control\Controller {



    /**
     *
     */
    public function defaultAction() {
        $this->setView('layout/agency/home');
        
        $page = HtmQuerie::startQuery()->getPage();
        $this->set('about', $page->getTxt());
        $this->sectionServices();
 
    }
    
    private function sectionServices(){
        $pages = HtmQuerie::startQuery()->filterByVar('local', 'home-services')->getPages();
        

        foreach($pages as $page){
            $this->set('service-img' . $page->getOrd(), $page->getSlug());
            $this->set('service-title' . $page->getOrd(), $page->getTitle());

        }
        $this->renderCollection($pages, 'services');
        
        
        
    }



    
    
    
    

}
