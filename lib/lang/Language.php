<?php

namespace lib\lang;

use \lib\register\Vars;
use \lib\session\Session;

use \lib\loader\Configurator;


/**
 * Description of Language
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Jun 30, 2016
 */
class Language {

    private static $lang;
    
    private static $locale;

    private function __construct() { }
    
    /**
     * 
     * @param string $lang
     */
    public static function setLang($lang = null){
        
        // look in the requests
        if($lang == null){
            $lang = Vars::getRequests(Session::SESS_LANG);
        }
        
        // look in the session
        if($lang == false){
            $lang = Session::getSessionVar(Session::SESS_LANG);
        }
        
        if($lang == false){
            //string(14) "en-US,en;q=0.5" 
            list($http_str, ) = explode(';', filter_input(INPUT_SERVER, 'HTTP_ACCEPT_LANGUAGE'));
            list(, $lang) = explode(',', $http_str);

        }
        
        self::checkLang($lang);
        
        
        Session::setSession(Session::SESS_LANG, self::$lang);
        
        setlocale(LC_ALL, self::$locale); 
        
    }
    

    /**
     * Validate lang along langs table or xml config default lang
     * 
     * @param string $lang
     */
    public static function checkLang($lang = null){
        if($lang != null){
            $model = \model\querys\LangsQuery::start()->filterByTld($lang)->findOne();
        }
        if($model == false){
            $lang = Configurator::getLangDefault();
            $model = \model\querys\LangsQuery::start()->filterByTld($lang)->findOne();
            
        }
        self::$lang = $model->getTld();
        self::$locale = $model->getLocale();
    }
    
    /**
     * 
     * @return lang
     */
    public static function getLang(){
        return self::$lang;
    }

}
