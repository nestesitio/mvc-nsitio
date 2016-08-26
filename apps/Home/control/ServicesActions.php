<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace apps\Home\control;

use \lib\page\HtmQuerie;

/**
 * Description of ServicesActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Aug 20, 2016
 */
class ServicesActions extends \lib\control\Controller {

    public function servicesAction() {
        $pages = HtmQuerie::startQuery()->filterByVar('local', 'home-services')->getPages();
        

        foreach($pages as $page){
            $this->set('service-img' . $page->getOrd(), $page->getSlug());
            $this->set('service-title' . $page->getOrd(), $page->getTitle());

        }
        $this->renderCollection($pages, 'services');
    }

}
