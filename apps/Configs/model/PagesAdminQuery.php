<?php

namespace apps\Configs\model;

/**
 * Description of PagesAdminQuery
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Dec 16, 2014
 */
class PagesAdminQuery {

    /**
     * @return mixed
     */
    public static function getHtm(){
        return \model\querys\HtmQuery::start()->orderByName();
    }

}
