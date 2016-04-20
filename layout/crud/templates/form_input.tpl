    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\%$inputMethod%;
    */
    public function set%$method%Input($input = null) {
        if($input == null){
            $input = \lib\form\input\%$inputMethod%::create(%$field%);
        }else{
            $input->setElementId(%$field%); 
        }
        
        $this->setFieldLabel(%$table%, %$field%, '%$label%');
        $this->setFieldInput(%$table%, %$field%, $input);
        
        return $input;
    }
    
    public function set%$method%Default($value) {
        $this->setDefault(%$table%, %$field%, $value);
    }
    
    public function unset%$method%Input() {
        $this->unsetFieldInput(%$table%, %$field%);
    }
    
    /**
    * @return \lib\form\input\%$inputMethod%;
    */
    public function get%$method%Input(){
        return $this->forminputs[%$table%][%$field%];
    }
    
    public function get%$method%Value(){
        return $this->getInputValue(%$table%, %$field%);
    }
    
    public function validate%$method%Input() {
        $value = $this->validate%$valmethod%(%$table%, %$field%, %$args%);
        return $value;
    }
    
