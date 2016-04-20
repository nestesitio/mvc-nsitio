<?php

namespace apps\User\model;

use \lib\register\Registry;
use \lib\register\Monitor;

use \model\querys\UserLogQuery;
use \model\models\UserLog;
use \model\querys\UserInfoQuery;

/**
 * Description of UserComponents
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Oct 27, 2015
 */
class UserComponents {

    public static function createUser($id){
        Registry::setMonitor(Monitor::BOOKMARK, 'Created');
        UserLogQuery::start()->filterByEvent(UserLog::EVENT_CREATED)->filterByUserId($id)->findOneOrCreate();
    }
    
    public static function createInfo($id){
        UserInfoQuery::start()->filterByUserId($id)->findOneOrCreate();
    }

}
