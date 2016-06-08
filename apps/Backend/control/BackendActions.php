<?php

namespace apps\Backend\control;

use \lib\register\Vars;
use \model\querys\ProjectQuery;

/**
 * Description of BackendActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Feb 19, 2015
 */
class BackendActions extends \lib\control\Controller {

    /**
     *
     */
    public function defaultAction() {
        $this->setView('dashboard');
        $this->set('heading', Vars::getHeading());
        
    }
    

}
