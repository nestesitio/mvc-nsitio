<?php

namespace lib\control;

/**
 * Description of View
 * A interface between Control and View
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @May 18, 2016
 */
class View {

    /**
     * Define a class property to store the template 
     * @var object
     */
    private $view;
    
    /**
     * Define a class property to store the entries 
     * @var object
     */
    private $data;
    
    /*
     * Public method to output the result of the templating engine 
     */
    public function render(){
        
    }
    

    function __construct($file) {
        $this->loadTemplate($file);
        $this->parseTemplate();
    }
    
    /**
     * Method to load the template
     * 
     * @param string $file
     */
    private function loadTemplate($file){
        
    }
    
    /**
     * Method to parse the template
     */
    private function parseTemplate(){
        
    }
    
    /**
     * Method to replace the template tags with entry data
     * 
     * 
     * @param type $tag
     * @param type $data
     * @return \lib\control\View
     */
        public function set($tag, $data)
    {
       
            return $this;
    }
    

  
  
 //TODO: Write a private currying function to facilitate tag replacement 

}
