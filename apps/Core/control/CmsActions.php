<?php

namespace apps\Core\control;

use \apps\Core\model\PagesQuery;
use \model\querys\LangsQuery;

/**
 * Description of CmsActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Aug 23, 2016
 */
class CmsActions extends \lib\control\ControllerAdmin {

    protected $query;
    

    /**
     * @param $app_slug
     * @return \model\querys\HtmPageQuery
     */
    protected function queryPages($app_slug){
         $query = PagesQuery::getList($app_slug)
                ->setSelect('GROUP_CONCAT(DISTINCT htm_page.langs_tld ORDER BY htm_page.langs_tld DESC SEPARATOR ", ")', 'langs')
                 ->groupByHtmId();
         return $query;
    }
    
    
    /**
     * get all langs used in project
     * 
     * @return array
     */
    protected function queryLangs(){
        $results = LangsQuery::start()->find();
        $arr = [];
        foreach($results as $lang){
            $arr[$lang->getTld()] = $lang->getName();
        }
        return $arr;
    }
    
    /**
     * 
     * @param string $url The url to process media
     */
    protected function addInputMedia($url){
        $input = \lib\form\widgets\FileInput::create()->addClass('input-group-lg');
        $input->setuploadUrl($url);
        $this->set('file-input', $input->render());
    }
    
    protected function saveMedia(\lib\media\UploadFile $upload){
        $media = new \model\models\HtmMedia();
        $media->setGenre($upload->getGenre());
        $media->setUrl($upload->getResult());
        $media->save();
        return $media->getId();
    }

}
