<?php

namespace apps\Core\control;

/**
 * Description of ErrorActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Feb 26, 2015
 */
class ErrorActions extends \lib\control\Controller {

    /**
     *
     */
    public function ajaxAction(){
        $this->setView('error'); 
        
    }

    /**
     *
     */
    public function pageAction(){
        $this->setView('errorpage');
        $this->set('h1','Error Page');
        $this->set('nav_home','/');
    }

    /**
     * @param $tag
     * @param $data
     */
    public function haveError($tag, $data){
        $this->setView('errorpage');
        $this->set($tag, $data);
    }

    /**
     *
     */
    public function embedAction(){
        $this->setView('error');
        $this->set('error', 'EMBED NOT FOUND');
    }

}
