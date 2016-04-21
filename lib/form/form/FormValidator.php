<?php

namespace lib\form\form;

use \lib\register\Registry;
use \lib\register\Monitor;
use \lib\register\VarsRegister as VarsRegister;

/**
 * Description of FormValidator
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Jan 13, 2015
 */
class FormValidator
{
    /**
     * @param $field
     * @param $query
     * @return array|bool|mixed|null
     */
    public static function validateId($field, $query)
    {
        $value = self::getValue($field);
        if(is_numeric($value) && $value > 0){
            Registry::setMonitor(Monitor::FORM, 'Validate Id');
            $result = $query->filterByColumn($field, $value)->findOne();
            if($result == false){
                Registry::setMonitor(Monitor::FORMERROR, $field . ' Validate Id for is false');
                return false;
            }else{
                return $value;
            }
        }else{
            Registry::setMonitor(Monitor::FORM, 'Validate Id is null');
            return null;
        }
    }

    /**
     * @param $field
     * @return mixed
     */
    public static function validateText($field)
    {
        return filter_var(self::getValue($field), FILTER_SANITIZE_STRING);
    }

    /**
     * @param $field
     * @param $label
     * @param $required
     * @param $max
     * @return int|null
     */
    public static function validateInt($field, $label, $required, $max)
    {
        $value = filter_var(self::getValue($field), FILTER_SANITIZE_STRING);
        $max = pow(10, $max) - 1;
        $value = str_replace(',', '.', $value);
        $result = filter_var($value, FILTER_VALIDATE_INT,
        ['options' => ['min_range' => ($max * -1), 'max_range' => $max]]);
        if($result === false && $required == true){
            Registry::setMonitor(Monitor::FORM, $field . ' value is not int ' . $value);
            Registry::setUserMessages(null, $label . ' value is not int');
            return null;
        }elseif($result === false){
            return 0;
        }else{
            return $result;
        }
    }

    /**
     * @param $field
     * @param $label
     * @param $required
     * @return float|null
     */
    public static function validateFloat($field, $label, $required)
    {
        $value = filter_var(self::getValue($field), FILTER_SANITIZE_STRING);
        $value = str_replace(',', '', $value);
        $options = ['decimal' => '.'];
        $result = filter_var($value, FILTER_VALIDATE_FLOAT, [['options' => $options]]);
        if($result === false && $required == true){
            Registry::setMonitor(Monitor::FORM, $field . ' value is not float ' . $value);
            Registry::setUserMessages(null, $label . ' value is not float');
            return null;
        }elseif($result === false){
            return 0.0;
        }else{
            return $result;
        }

    }


    /**
     * @param $field
     * @param $label
     * @param $required
     * @param $minlen
     * @param $maxlen
     * @return array|bool|mixed
     */
    public static function validateString($field, $label, $required, $minlen, $maxlen)
    {
        $value = self::getValue($field);

        if(empty($value) && $required == true){
            Registry::setMonitor(Monitor::FORM, $field . ' value is empty ');
            Registry::setUserMessages(null, $label . ' String value is empty');
            return false;
        }elseif(strlen($value) < $minlen){
            Registry::setMonitor(Monitor::FORM, $field . ' value is less than minimum lenght ');
            Registry::setUserMessages(null, $label . ' value is less than minimum lenght');
            return false;
        }elseif($maxlen > $minlen && strlen($value) > $maxlen){
            Registry::setMonitor(Monitor::FORM, $field . ' value exceeds the maximum lenght ');
            Registry::setUserMessages(null, $label . ' value exceeds the maximum lenght');
            return false;
        }else{
            return $value;
        }
    }

    /**
     * @param $field
     * @param $label
     * @return array|bool|mixed
     */
    public static function validateDate($field, $label)
    {
        $value = self::getValue($field);

        return $value;
    }

    /**
     * @param $field
     * @param $label
     * @param $query
     * @param $index
     * @param $required
     * @return array|bool
     */
    public static function validateMultipleModel($field, $label, $query, $index, $required)
    {
        $values = [];
        $key = self::correctKey($field);
        $posts = VarsRegister::getPosts();

        foreach($posts as $post => $value){
            if(strpos($post, $key) === 0 && !empty($value)){
                $values[] = $value;
            }
        }
        $result = $query->filterByColumn($index, $values)->find();
        if($result == false && $required == true){
            Registry::setMonitor(Monitor::FORMERROR, $field . ' result is false for foreign key ');
            Registry::setUserMessages(null, 'values are not valid for ' . $label);
            return false;
        }elseif(count($values) != count($result)){
            $newvalues = [];
            foreach($result as $row){
                $newvalues[] = $row->getColumnValue($index);
            }
            $diff = array_diff($values, $newvalues);
            Registry::setMonitor(Monitor::FORMERROR, $field . ' have different results for ' . implode(', ', $diff));
            $values = $newvalues;
        }
        Registry::setMonitor(Monitor::FORM, $field . ' result is true for ' . implode(', ', $values));
        return $values;
    }

    /**
     * @param $field
     * @param $label
     * @param $query
     * @param $index
     * @param $required
     * @param null $default
     * @return bool|null
     */
    public static function validateModel($field, $label, $query, $index, $required, $default = null)
    {
        $value = self::getValue($field);
        $result = $query->filterByColumn($index, $value)->findOne();
        if($result == false && $required == true){
            Registry::setMonitor(Monitor::FORMERROR, $field . ' result is false for foreign key ');
            Registry::setUserMessages(null, 'fk value is not valid for ' . $label);
            return ($default != null)? $default : false;
        }elseif($result != false){
            Registry::setMonitor(Monitor::FORM, $field . ' result is true ' . $result->getColumnValue($index));
            return $result->getColumnValue($index);
        }else{
            return false;
        }

    }

    /**
     * @param $field
     * @param $label
     * @param $possible_values
     * @param $required
     * @param null $default
     * @return array|bool|mixed|null
     */
    public static function validateValues($field, $label, $possible_values, $required, $default = null)
    {
        $value = self::getValue($field);

        if(in_array($value, $possible_values)){
            return $value;
        }elseif($required == true){
            if($default != null){
                Registry::setUserMessages(null, 'value "' . $value . '" is not permited for ' . $label);
                $value = $default;
            }else{
                Registry::setUserMessages(null, $label . ' value is empty');
               return false;
            }
        }
        return $value;
    }

    /**
     * @param $model
     * @param $field
     * @param $value
     * @param $label
     * @return bool
     */
    public static function validateUnique($model, $field, $value, $label)
    {
        $table = $model->getTableName();
        $query = Tools::buildModelQuery($table);
        foreach ($model->getPrimaryKey() as $pk) {
            $col = $table . '.' . $pk;
            $query->filterByColumn($col, $model->getColumnValue($col), Mysql::NOT_EQUAL);
        }
        $result = $query->filterByColumn($field, $value)->findOne();
        if($result != false){
            Registry::setMonitor(Monitor::FORMERROR, $value. ' is not unique value for ' . $field);
            Registry::setUserMessages(null, $value. ' must be unique for ' . $label );
            return false;
        }else{
            Registry::setMonitor(Monitor::FORM, $field . ' result is unique ' . $value);
            return $value;
        }
    }

    /**
     * @param $key
     * @param $fields
     * @return mixed
     */
    public static function compareKeyToFields($key, $fields)
    {
        //echo memory_get_usage() . '; ' . memory_get_peak_usage();
        $letters = str_split($key);
        foreach($letters as $k => $letter){
            foreach($fields as $i => $field){
                $w = substr($field, $k, 1);
                if($w != '.' && $letter != '_' && $w != $letter){
                    unset($fields[$i]);
                }
            }
        }
        reset($fields);
        return current($fields);
    }

    /**
     * @param $key
     * @return string
     */
    public static function correctKey($key)
    {
        #because javascript form submission alter keys when serializes data
        return VarsRegister::getCanonical() . '_' . str_replace('.', '_', $key);
    }

    /**
     * @param $field
     * @return mixed
     */
    public static function getColumnName($field)
    {
        list(, $column) = explode('.', $field);
        return $column;
    }

    /**
     * @param $field
     * @return array|bool|mixed
     */
    public static function getValue($field)
    {
        $key = FormValidator::correctKey($field);
        $value = VarsRegister::getPosts($key);

        if($value == false){
            $value = \lib\form\PostTool::getMultiplePost($key);
        }
        return $value;
    }

}
