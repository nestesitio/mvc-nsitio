<?php
namespace model\forms;

use \model\models\%$className%;

/**
 * Description of %$className%Form
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @%$dateCreated%
 * Updated @%$dateUpdated% *
 */
class %$className%Form extends \lib\form\Form {

    public static function initialize($declare = true){
        $form = new %$className%Form();
        if($declare == true){
            $form->declareInputs();
        }
        return $form;
    }
    
    
    public function declareInputs(){
        $this->queue[] = %$className%::TABLE;
        $this->models[%$className%::TABLE] = new %$className%();
        
        #$this->set%$method%Input();
        return $this;
    }
    
    public function validate(){
        
        #$this->validate%$validateMethod%Input();
        
        return $this;
    }
    
    

}
