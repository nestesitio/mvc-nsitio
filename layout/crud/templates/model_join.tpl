    /**
    * Return model object
    * 
    * @return new \model\models\%$tableJoin%;
    */
    public function get%$tableJoin%() {
        $obj = new \model\models\%$tableJoin%();
        $obj->merge($this);
        return $obj;
    }  
    
