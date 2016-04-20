<?php //

namespace lib\tools;

/**
 * Description of StringTools
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Jan 27, 2015
 */
class StringTools {

    public static function getStringUntilLastChar($haystack, $needle) {
        return str_replace(substr(strrchr($haystack, $needle), 1), '', $haystack);
    }
    
    public static function getStringAfterLastChar($haystack, $needle){
        return str_replace(strstr($haystack, $needle, true) . $needle, '', $haystack);
    }
    
    public static function replaceFromBegin($string, $removes = []) {
        foreach($removes as $remove){
            $string = substr($string, strlen($remove));
        }
        return $string;
    }
    
    public static function output($string) {
        echo " " . $string;
    }
    
    public static function outputLine($string) {
        echo " " . $string . "<br />";
        ob_flush();
        flush();
        usleep(1);
    }
    
    /**
     * Perform a regular expression search and replace
     * @param String $string
     * 
     * @return String
     */
    public static function slugify($string){

	$slug = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
	$slug = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $slug);
	$slug = strtolower(trim($slug, '-'));
        //$pattern, $replacement, $subject, $limit = -1, &$count = null
	$slug = preg_replace("/[\/_|+ -]+/", '-', $slug);

	return $slug;
    }
    
    public static function cleanStringCode($stringValue = null) {
        // chars to trim
        $charList = ['*', '#', '$', '%', '&', '/', '(', ')', '=', '?', '»', '«', '!', '\\', '\"', '\'', '"', '\''];

        if ($stringValue != null) {
            return str_replace($charList, '', $stringValue);
        }

        return false;
    }
    
    public static function cleanTIN($txt) {
        return \lib\tools\TinTools::cleanTIN($txt);
    }
    
    public static function trimZipCode($txt) {
        return substr(preg_replace("/[^0-9-]/i", "", $txt), 0, 8);
    }
    
    public static function ucString($name) {
        $name = strtolower($name);
        $name = mb_convert_case($name, MB_CASE_TITLE, "UTF-8");
        $name = str_replace([' Da ', ' De ', ' Do ', ' E '], [' da ', ' de ', ' do ', ' e '], $name);
        return $name;
        
    }

}