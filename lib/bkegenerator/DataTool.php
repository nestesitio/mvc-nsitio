<?php

namespace lib\bkegenerator;

/**
 * Description of DataTool
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Jul 30, 2015
 */
class DataTool {

    private $ul;
    private $ul_hidden;

    function __construct() {
        $this->ul_hidden = '<li class="row_tool">';
        $this->ul = '<li class="row_tool">';
    }
    
    public function setLink($link, $id, $window = null){
        $this->ul_hidden .= '<a href="' . $link . '"';
        $this->ul .= '<a href="' . $link . '{{ item.' . $id . ' }}' . '"';
        if($window == 'blank'){
            $this->ul .= ' target="_blank"';
        }
    }
    
    
    public function setEditable($editable, $id, $select) {
        $this->ul_hidden .= '<a ';
        $this->ul .= '<a data-edit="' . $editable . '" data-id="{{ item.' . $id . ' }}"';
        if (!empty($select)) {
            $this->ul .= ' data-select="' . $select . '"';
        }
    }
    
    public function setRowAction($action, $val) {
        $this->ul_hidden .= '<a data-action="' . $action . '"';
        $this->ul .= '<a data-action="' . $action . '"';
        if (!empty($val)) {
            $this->ul .= ' data-id="{{ item.' . $val . ' }}"';
        }
    }
    
    public function setLangAction($action, $val) {
        $str = '<a class="row-action fa" data-action="' . $action . '" data-command="edit"';
        $this->ul_hidden .= $str;
        $this->ul .= $str;
        if (!empty($val)) {
            $this->ul .= ' data-id="' . $val . '"';
        }
        $this->ul_hidden .= '>';
        $this->ul .= '>';
        $this->close();
        //echo htmlentities($this->ul).'<br />';
    }
    
    public function setFileAction($file, $val){
        $this->ul_hidden .= '<a data-action="core/' . $file . '_files"';
        $this->ul .= '<a data-action="core/' . $file . '_files"';
        if (!empty($val)) {
            $this->ul .= ' data-id="{{ item.' . $val . ' }}"';
        }
    }
    
    public function setFlag($flag){
       $this->ul = str_replace('class="row-action fa"', 'class="row-action flag-icon flag-icon-' . $flag . '"', $this->ul); 
       $this->ul = str_replace('>', ' data-lang="'.$flag.'">', $this->ul); 
    }
    
    public function haveNoLang(){
       $this->ul = str_replace('<a', '<a style="opacity: 0.4;"', $this->ul); 
    }
    
    public function setLabel($label){
        $this->ul .= ' title="' . $label . '"';
    }
    
    public function setVars($vars){
        $this->ul .= $vars;
    }

    public function complete($node, $class, $editable){
        $this->ul .= ' data-command="' . $node . '"';
        $this->ul_hidden .= ' data-command="' . $node . '"';
        $this->ul .= ' class="row-action fa ' . $class . '">';
        $this->ul_hidden .= ' class="row-action fa ' . $class . '">';
        if(!empty($editable)){
            $this->ul .= '<div class="row-editable" style="display:none"></div>';
        }
        $this->close();
    }
    
    public function close(){
        $this->ul .= '</a></li>';
        $this->ul_hidden .= '</a></li>';
    }
    
    
    public function getLangTools(){
        return ['ul' => '{{ item.langs }}', 'hidden' => '{{ langs }}'];
    }
    
    public function getHidden(){
        return $this->ul_hidden;
    }
    
    public function getUl(){
        return $this->ul;
    }


    public function render(){
        return ['ul' => $this->ul, 'hidden' => $this->ul_hidden];
    }

}
