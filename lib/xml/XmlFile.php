<?php

namespace lib\xml;

use DOMDocument;
use \lib\register\Registry;
use \lib\register\Monitor;

/**
 * Description of XmlFile
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Nov 24, 2014
 */
class XmlFile extends \lib\xml\Xml {

    function __construct($file) {
        if (strpos($file, '.xml') && is_file(ROOT . DS . $file)) {
            $this->xml = new DOMDocument();
            $this->xml->preserveWhiteSpace = FALSE;
            $this->xml->formatOutput = true;
            $this->xml->load(ROOT . DS . $file);
            Registry::setMonitor(Monitor::XML, $file);
        }else{
            Registry::setErrorMessages(null, 'Xml file is not valid: ' . $file);
        }
    }

}
