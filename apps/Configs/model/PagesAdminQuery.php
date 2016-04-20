<?php

namespace apps\Backend\model;

/**
 * Description of PagesAdminQuery
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Dec 16, 2014
 */
class PagesAdminQuery {

    public static function getHtm(){
        return \model\querys\HtmQuery::start()->orderByName();
    }

}
