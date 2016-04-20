<?php

namespace lib\form\form;

use \lib\bkegenerator\Config;
use \lib\form\Input;
use \lib\form\Form;

/**
 * Description of FormRender
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Jan 27, 2015
 */
class FormRender {
    
    public static function renderHiddenFields($queue, $forminputs, $actionclass = null){
        $inputs = '';
        $queue = array_merge($queue, [Form::VIRTUALTABLE]);
        foreach ($queue as $table) {
            if (isset($forminputs[$table])) {
                foreach ($forminputs[$table] as $input) {
                    if ($input->getInputType() == 'hidden') {
                        if (null != $actionclass) {
                            $name = $actionclass . '_' . $input->getName();
                            $input->setName($name)->setId($name);
                        }
                        $inputs .= $input->parseInput();
                    }
                }
            }
        }
        return $inputs;
    }
    
    public static function getTableByColumn($key) {
        return substr($key, 0, strpos($key, '.'));
    }
    
    public static function getFieldByColumn($key){
        return substr($key, strpos($key, '.') + 1);
    }

    //public static function renderInputs($forminputs, $formlabels, $fieldsandlabels = [], $actionclass = '', $ranges = null) {
    public static function renderInputs($forminputs, $formlabels, $actionclass, Config $config) {
        $inputs = [];
        $fields = $config->getIndexes();
        foreach ($fields as $field) {
            $table = self::getTableByColumn($field);
            if(isset($forminputs[Form::VIRTUALTABLE][$field])){
                $table = Form::VIRTUALTABLE;
            }
            if (isset($forminputs[$table][$field])) {
                $input = $forminputs[$table][$field];
                $config->setIndex($field);
                if ($input->getInputType() != Input::TYPE_HIDDEN) {
                    if($config->getConfigValue('data-link') != null && $config->getConfigValue('data-range') != null){
                        $name = self::renderName($config->getConfigValue('data-link'), $actionclass, $config);
                        $input->setDataAttribute('data-link', $name);
                        $input->setDataAttribute('data-range', $config->getConfigValue('data-range'));
                    }
                    if ($input->getRange() != null) {
                        $config->setConfigValue('range', $input->getRange());
                    }
                    $name = self::renderName($input->getName(), $actionclass, $config);
                    $input->setName($name)->setId($name);
                    $label = ($config->getConfigValue('label') != null) ? $config->getConfigValue('label') : $formlabels[$table][$field];
                    $pack = self::getInput($field, $input, $name, $label, $config);
                    $inputs = array_merge($inputs, $pack);
                    
                }
            }
        }

        return $inputs;
    }
    
    public static function renderName($oldname, $actionclass, $config = null){
        $name = $actionclass . '_';
        $name .= str_replace('.', '_', $oldname);
        if(null != $config){
            $name .= (!is_null($config->getConfigValue('range')) && $config->getConfigValue('range') == 'range') ? '_min' : '';
        }
        return $name;
    }
    
    private static function getInput($field, Input $input, $name, $label, Config $config){
        $inputs = [];
        $input->setName($name)->setId($name);
        if($input->getInputType() == Input::TYPE_CHECKBOX){
            $inputs[$field]['input'] = $input->parseInput($label);
            $inputs[$field]['label'] = '';
        }else{
            if($config->getConfigValue('convert') != null){
                $input->convertValuesByXml('model/enum/' . $config->getConfigValue('convert'));
                
            }
            $inputs[$field]['input'] = $input->parseInput();
            $inputs[$field]['label'] = $label . ': ';
        }
        $inputs[$field]['field'] = $name;
        if (!is_null($config->getConfigValue('range'))){
            if ($config->getConfigValue('range') == 'range') {
                $twin_inputs = self::cloneInput($input, $name);
                $inputs[$field]['input'] = $twin_inputs['min']->parseInput();
                $inputs[$field]['label'] = $label . ' from : ';
                
                $inputs[$field . '_max']['input'] = $twin_inputs['max']->parseInput();
                $inputs[$field . '_max']['label'] = ' to';
                $inputs[$field . '_max']['field'] = str_replace('_min_', '_max_', $name);
            } elseif ($config->getConfigValue('range') == 'multiple') {
                $input->setMultiple();
                $inputs[$field]['input'] = $input->parseInput();
                
            }
        }
        
        return $inputs;
    }
    
    private static function cloneInput($input, $name){
        $clone_input = clone $input;
        $clone_input->setDataAttribute('data-link', $name);
        $clone_input->setDataAttribute('data-range', 'max');
        $name = str_replace('_min', '_max', $name);
        $clone_input->setName($name)->setId($name);
        $input->setDataAttribute('data-link', $name);
        $input->setDataAttribute('data-range', 'min');
        $value = $input->getValue();
        if (!empty($value)) {
            list($val1, $val2) = explode('&&', $value);
            $input->setValue($val1);
            $clone_input->setValue($val2);
        }
        return ['min'=>$input, 'max'=>$clone_input];
    }

}