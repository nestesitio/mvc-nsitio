<?php

namespace lib\xml;

use DOMXPath;

/**
 * Description of XmlSimple
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Sep 1, 2015
 */
class XmlSimple extends \lib\xml\XmlFile
{
    /**
     * @param $file
     * @param $value
     * @param string $lang
     * @return string
     */
    public static function getConvertedValue($file, $value, $lang = 'pt')
    {
        $obj = new XmlSimple($file. '.xml');
        $value = $obj->getNodeValue($value, $lang);
        return $value;
    }

    /**
     * @param $file
     * @param string $lang
     * @return array
     */
    public static function getConvertedList($file, $lang = 'pt')
    {
        $obj = new XmlSimple($file. '.xml');
        $values = $obj->getListValues($lang);
        return $values;
    }

    /**
     * @param $lang
     * @return array
     */
    public function getListValues($lang)
    {
        $values = [];
        $xpath = new DOMXPath($this->xml);
        $items = $xpath->query('/root/*');
        foreach ($items as $item) {
            $key = $this->getAtributes($item, 'index');
            $values[$key] = $this->getLangValue($item, $lang);
        }
        return $values;
    }

    /**
     * @param $value
     * @param $lang
     * @return string
     */
    public function getNodeValue($value, $lang)
    {
        $xpath = new DOMXPath($this->xml);
        $items = $xpath->query('/root/*');
        foreach ($items as $item) {
            if($value == $this->getAtributes($item, 'index')){
                $nodes = $item->childNodes;
                if(null == $nodes && null != $this->getAtributes($item, 'value')){
                    return $this->getAtributes($item, 'value');
                }
                return $this->getLangValue($item, $lang);
            }
        }

        return $value;
    }

    /**
     * @param $item
     * @param $lang
     * @return mixed
     */
    private function getLangValue($item, $lang)
    {
        $nodes = $item->childNodes;
        foreach ($nodes as $node) {
            if ($lang == $this->getAtributes($node, 'lang')) {
                return $node->nodeValue;
            }
        }
    }

}
