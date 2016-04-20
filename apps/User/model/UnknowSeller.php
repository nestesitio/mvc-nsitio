<?php

namespace apps\User\model;

use \model\querys\UserBaseQuery;

/**
 * Description of UnknowSeller
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Sep 15, 2015
 */
class UnknowSeller {

    /**
    * Get the unknow seller
    *
    * @return \model\models\UserBase;
    */
    public static function getUnknowSeller(){
        return UserBaseQuery::start()->filterByUsername('unknow_seller')->findOne();
    }

}
