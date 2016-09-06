<?php

namespace lib\lang;

use \lib\xml\XmlFile;
use \lib\lang\Language;

/**
 * Description of Labels
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Sep 5, 2016
 */
class Labels {

    private static $xml;
    
    
                
    function __construct() {
        $this->loadFile();
    }
    
    /**
     *
     */
    private function loadFile()
    {
        self::$xml = XmlFile::getXmlFromFile('config/labels.xml');

    }
    
    /**
     * 
     * @param string $key
     * @return string
     */
    public static function getLabel($key){

        foreach (self::$xml->getElementsByTagName('word') as $node) {
            
            $attr = XmlFile::getAtribute($node, 'key');
            if($attr != false && $attr == $key){
                
                foreach (Language::getTldArray() as $lang) {
                    foreach ($node->childNodes as $item) {
                        if(XmlFile::getAtribute($item, 'lang') == $lang){
                            return $item->nodeValue;
                        }
                    }
                }

            }
        }
        return ucwords($key);
    }

}
