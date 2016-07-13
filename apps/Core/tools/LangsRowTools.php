<?php

namespace apps\Core\tools;

use \lib\bkegenerator\DataTool;

/**
 * Description of LangsRowTools
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Jul 13, 2016
 */
class LangsRowTools {

    public static function renderLangsTemplate($langs, $action_url){
        $str = '';
        foreach($langs as $lang){
            
            $tool = new DataTool();
            $tool->setLangAction($action_url, 0);
            $tool->setFlag($lang);
            $tool->haveNoLang();
            $str .= $tool->getUl();
        }
        
        return $str;
    }
    
    /**
     * @param $results
     * @param $langs
     * @return mixed
     */
    public static function renderLangTools($results, $langs, $action_url){
        foreach($results as $row){
            $result = $row->getColumnValue('langs');
            $str = '';
            foreach($langs as $lang){
                $tool = new DataTool();
                $tool->setLangAction($action_url, $row->getHtmId());
                $tool->setFlag($lang);
                if(strpos($result, $lang) === false){
                    $tool->haveNoLang();
                }
                $str .= $tool->getUl();
            }
            $row->setColumnValue('langs', $str);
        }
        
        return $results;
    }

}
