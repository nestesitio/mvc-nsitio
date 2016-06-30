<?php

namespace apps\%$nameApp%\control;

use \lib\register\Vars;
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
        $this->set('heading', Vars::getHeading());
        $itens = %$className%Queries::get()->find();
        $this->renderCollection($itens, 'list');
        
    }
    
    public function page%$className%Action(){
        $this->set('heading', Vars::getHeading());
        $query = %$className%Queries::get();
    }
    
    

}
