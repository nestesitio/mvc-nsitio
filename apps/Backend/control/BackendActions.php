<?php

namespace apps\Backend\control;

use \lib\register\VarsRegister;
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
        $this->set('h1', VarsRegister::getHeading());
        
    }
    

}
