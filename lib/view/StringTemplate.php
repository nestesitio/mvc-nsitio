<?php

namespace lib\view;



/**
 * Description of StringTemplate
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @May 18, 2015
 */
class StringTemplate extends \lib\view\ParseTemplate
{
    /**
     * StringTemplate constructor.
     * @param $html
     */
    public function __construct($html = null)
    {
        parent::__construct();
        parent::setOutput($html);
    }

}
