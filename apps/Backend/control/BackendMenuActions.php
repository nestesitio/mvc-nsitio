<?php

namespace apps\Backend\control;

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

        
        return $this->dispatch();
    }



}
