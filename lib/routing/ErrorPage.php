<?php

namespace lib\routing;

use \lib\register\VarsRegister;
use \lib\session\SessionUser;
use \apps\User\model\UserGroupModel;
use \lib\loader\Configurator;
use \lib\register\Registry;

/**
 * Description of ErrorPage
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @May 2, 2016
 */
class ErrorPage {
    
    /**
     *
     */
    const ERROR_CONTROLLER = '\\apps\\Core\\control\\ErrorActions';

    public static function execute($extended){
        
        $class = self::ERROR_CONTROLLER;
        $controller = new $class();
        if(VarsRegister::getRequests('js') == false){
            $controller->pageAction();
        }else{
            $controller->ajaxAction();
        }
        
        //$msg = self::setMessage($page, $message);
        self::dev();
        $controller->haveError(Registry::getErrorMessages());
        
        echo self::output($controller, $extended);
    }
    
    
    private static function output($controller, $extend) {
        $output = $controller->dispatch();
        $html = \lib\control\ControlMessages::write($output, $extend);
        
        return $html;
    }

    function __construct() {}
    
    public static function dev(){
        if (SessionUser::getUserGroup() == UserGroupModel::GROUP_DEVELOPER ||
                Configurator::getDeveloperMode() == true) {
            Registry::setErrorMessages(null, ['message'=>'App: ' . VarsRegister::getApp()]);
            Registry::setErrorMessages(null, ['message'=>'Action: ' . VarsRegister::getAction()]);
            Registry::setErrorMessages(null, ['message'=>'Canonical: ' . VarsRegister::getCanonical()]);
            Registry::setErrorMessages(null, ['message'=>'View: ' . VarsRegister::getView()]);
            Registry::setErrorMessages(null, ['message'=>'Group: ' . SessionUser::getUserGroup()]);
        }
    }
    

}
