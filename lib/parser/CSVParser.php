<?php

namespace lib\parser;

use lib\bkegenerator\Config;

/**
 * Description of CSVParser 
 * created in 30/mar/2015
 * @author Luís Pinto - luis.nestesitio@gmail.com
 */
class CSVParser {

    private $configs;
    private $outstream;
    private $delimeter;
    private $filename;
    
    function __construct($filename, $delimeter = ';') {
        $this->filename = $filename . '.csv';
        $this->outstream = fopen("php://output", "w");
        $this->delimeter = $delimeter;
        
        $this->sendHeaders();
    }
    
    private function sendHeaders(){
        # output headers so that the file is downloaded rather than displayed
        header("Content-Type: text/csv");
        header('Content-Disposition: attachment; filename="' . $this->filename . '"');
        # Disable caching - HTTP 1.1
        header("Cache-Control: no-cache, no-store, must-revalidate");
        # Disable caching - HTTP 1.0
        header("Pragma: no-cache");
        # Disable caching - Proxies
        header("Expires: 0");
        
    }

    public function put(Array $line) {
        fputcsv($this->outstream, $line, $this->delimeter);
    }

    public function close() {
        
        fclose($this->outstream);
    }
    
    public static function outputConfigurate($filename, Config $configs, $result){
        $csv = new CSVParser($filename);
        $csv->put($csv->parseHeadLine($configs));
        foreach ($result as $data) {
            
            $csv->put($csv->parseConfigLine($configs, $data));
        }

        return $csv->close();
    }
    
    public function parseHeadLine(Config $configs) {
        foreach ($configs->getIndexes() as $index) {
            $line[] = $configs->getIndexedValue($index, 'head');
        }
        return $line;
    }
    
    public function parseConfigLine(Config $configs, $data) {
        foreach ($configs->getIndexes() as $index) {
            $col = $configs->getIndexedValue($index, 'field');
            $line[] = $data->getColumnValue($col);
        }
        return $line;
    }
    
    public function parseRow($line){
        fputcsv($this->outstream, $line, $this->delimeter);
    }
    
    public static function formatNum($value){
        return number_format($value, 1);
    }

}
