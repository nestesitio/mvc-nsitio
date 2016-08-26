<?php

namespace lib\page;

/**
 * Description of Media
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Aug 25, 2016
 */
class Media {

    private $model = [];

    private $id;
    

    /**
     * 
     * @param \model\models\Htm $model
     * @return \lib\page\Page
     */
    public static function initialize($model){
        $page = new Media($model);
        return $page;
    }

    function __construct() {
        
    }

}
