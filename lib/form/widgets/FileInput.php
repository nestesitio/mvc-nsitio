<?php

namespace lib\form\widgets;

use \lib\form\Input;

/**
 * Description of FileInput
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Aug 23, 2016
 */
class FileInput {

    private $input = '';
    
    const NAME = 'file-data';
    
    public static function create()
    {
        $obj = new FileInput();
        $obj->setAllowed(['png', 'jpg', 'jpeg']);
        return $obj;
    }

    function __construct() {
        $this->design();
    }
    
    private function design(){
        $this->input = '<form enctype="multipart/form-data">';
        $this->input .= '<label class="control-label">LABEL</label>';
        $this->input .= '<input '
                . 'type="' . Input::TYPE_FILE . '"'
                . 'id="' . self::NAME . '" name="' . self::NAME . '"' . '" />';
        $this->input .= '<div id="file-input-messages"></div>';
        $this->input .= '</form>';
    }
    
    public function setLabel($label){
        $this->input = str_replace('LABEL', $label, $this->input);
        return $this;
    }
    
    private $class = 'file-input';
    
    public function addClass($class){
        $this->class .= ' ' . $class;
        return $this;
    }
    
    private $uploadurl = '';
    
    public function setuploadUrl($url){
        $this->uploadurl = $url;
        return $this;
    }
    
    private $allowed = [];
    
    public function setAllowed($extensions = []){
        $this->allowed = implode(',', $extensions);
        return $this;
    }
    
    
    public function setId($id){
        $this->input = preg_replace('id="[^"]+"', 'id="' . $id . '"', $this->input);
        $this->input = preg_replace('name="[^"]+"', 'name="' . $id . '"', $this->input);
        return $this;
    }
    
    /**
     * <form enctype="multipart/form-data">
            <label class="control-label">Select File</label>
            <input data-url="/core/bind_files" id="file-data" 
                   data-allowed="jpg,png" name="file-data" 
                   type="file" class="file-input input-group-lg">
            <div id="file-input-messages"></div>
        </form>
     */
    public function render(){
        $this->input = str_replace('LABEL', 'Select File', $this->input);
        $this->input = str_replace('/>', 'data-url="' . $this->uploadurl . '" />', $this->input);
        $this->input = str_replace('/>', 'class="' . $this->class . '" />', $this->input);
        $this->input = str_replace('/>', 'data-allowed="' . $this->allowed . '" />', $this->input);
        return $this->input;
    }

}
