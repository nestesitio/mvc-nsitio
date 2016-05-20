<?php

namespace lib\view;

use \lib\view\parsers\ParseInclude;

/**
 * Description of Parse
 * Parse the template file
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @May 18, 2016
 */
class Parse {

    /**
     * Stores the contents of the template file
     * @var string
     */
    private $output = null;

    function __construct($output) {
        $this->output = $output;
    }
    
    
    public function parseInclude(){
        return ParseInclude::parse($this->output);
    }
    
    

    

}
