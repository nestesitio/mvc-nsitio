<?php

namespace lib\url;

/**
 * Description of MenuRender
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Mar 7, 2016
 */
class MenuRender extends \lib\url\UrlHref {


    private $string = '';
    private $list = [];
    
    function __construct() {
        
    }
    
    public function setToogle($title){
        $this->string .= '<a class="dropdown-toggle" data-toggle="dropdown" href="#">';
        $this->string .= $title;
        $this->string .= '</a>';
    }
    
    public function setDropdown($class){
        $this->string .= '<ul class="' . $class . '">$ul</ul>';
    }
    
    public function addItem($url, $title, $params=[]){
        $this->list[] = self::renderMenuItem($url, $title, $params);
    }
    
    public function addDivider(){
        $this->list[] = '<li class="divider"></li>';
    }
    
    public function renderString(){
        foreach($this->list as $list){
            $this->string = str_replace('$ul', $list . '$ul', $this->string);
        }
        $this->string = str_replace('$ul', '', $this->string);
        return $this->string;
    }

}
