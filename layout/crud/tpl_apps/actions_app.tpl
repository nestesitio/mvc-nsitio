<?php

namespace apps\%$nameApp%\control;

use \lib\register\VarsRegister;
use \apps\%$nameApp%\model\%$className%Queries;
use \model\models\%$modelName%;

/**
 * Description of %$className%Actions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class %$className%Actions extends \lib\control\Controller {

    public function %$fileName%Action(){
        $this->set('h1', VarsRegister::getHeading());
        $query = %$className%Queries::get();
        
    }
    
    public function page%$className%Action(){
        $this->set('h1', VarsRegister::getHeading());
        $query = %$className%Queries::get();
    }
    
    

}
