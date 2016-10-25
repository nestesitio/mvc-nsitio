<?php

namespace apps\%$nameApp%\control;

use \lib\register\Vars;

/**
 * Description of %$className%Actions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class %$className%Actions extends \lib\control\Controller {

    public function %$fileName%Action(){
        $this->set('heading', Vars::getHeading());
        
        
    }
    
    public function page%$className%Action(){
        $this->set('heading', Vars::getHeading());
        
    }
    
    

}
