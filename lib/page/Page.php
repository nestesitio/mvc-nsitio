<?php

namespace lib\page;

use \model\models\Htm;
use \lib\lang\Language;
use \model\models\HtmPage;
use \model\models\HtmTxt;

/**
 * Description of Page
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Aug 16, 2016
 */
class Page {
    
    private $model = [];

    private $id;
    private $stat;
    private $ord;
    private $app;

    

    /**
     * 
     * @param \model\models\Htm $model
     * @return \lib\page\Page
     */
    public static function initialize($model){
        $page = new Page($model);
        return $page;
    }
    
    /**
     * 
     * @param \model\models\Htm $model
     */
    function __construct(Htm $model) {
        $this->id = $model->getId();
        $this->model['id'] = $this->id;
        $this->stat = $model->getStat();
        $this->model['stat'] = $this->stat;
        $this->ord = $model->getOrd();
        $this->model['ord'] = $this->ord;
        $this->app = $model->getHtmApp()->getSlug();
        $this->model['app'] = $this->app;
        
        $this->setLangs();
        $this->setText();
        $this->setMedia($model);
        $this->setVarValue($model);
        $this->model['page-url'] = $this->getUrl();
    }
    
    public function getUrl(){
        return \lib\url\UrlHref::renderPageLink($this->app, $this->slug) . '.htm';
    }
    
    /**
     * 
     * @return integer
     */
    public function getId(){
        return $this->id;
    }
    
    /**
     * 
     * @return string
     */
    public function getStat(){
        return $this->stat;
    }
    
    /**
     * 
     * @return integer
     */
    public function getOrd(){
        return $this->ord;
    }
    
    /**
     * 
     * @return string
     */
    public function getApp(){
        return $this->app;
    }
    
    private $langmenu = [];
    private $page = null;
    
    /**
     * 
     */
    public function setLangs(){
         
        $pages = \model\querys\HtmPageQuery::start()->filterByHtmId($this->id)
                ->orderByFilter(HtmPage::FIELD_LANGS_TLD, Language::getTldArray())
                ->find();
        foreach ($pages as $page){
            if($this->page == null){
                $this->page = $page->getId();
                $this->model['page'] = $this->page;
                $this->setLangData($page);
            }
            
            $this->langmenu[$page->getLangsTld()] = 
                    ['app'=>  $this->app, 'slug'=> $page->getSlug(), 'tld'=>$page->getLangsTld()];
        }
        
    }
    
    private $lang;
    private $title;
    private $slug;
    private $menu;
    private $heading;
    private $updated;
    
    /**
     * 
     * @param HtmPage $page
     */
    private function setLangData(HtmPage $page){
        $this->lang = $page->getLangsTld();
        $this->model['lang'] = $this->lang;
        $this->title = $page->getTitle();
        $this->model['title'] = $this->title;
        $this->slug = $page->getSlug();
        $this->model['slug'] = $this->slug;
        $this->menu = $page->getMenu();
        $this->model['menu'] = $this->menu;
        $this->heading = $page->getHeading();
        $this->model['heading'] = $this->heading;
        $this->updated = $page->getUpdatedAt();
        $this->model['updated'] = $this->updated;
    }
    
    /**
     * 
     * @return string
     */
    public function getLang(){
        return $this->lang;
    }
    
    /**
     * 
     * @return string
     */
    public function getTitle(){
        return $this->title;
    }
    
    /**
     * 
     * @return string
     */
    public function getSlug(){
        return $this->slug;
    }
    
    /**
     * 
     * @return date
     */
    public function getUpdated(){
        return $this->updated;
    }
    
    public function getHeading(){
        return $this->heading;
    }
    
    /**
     * 
     * @return array
     */
    public function getLangMenu(){
        return $this->langmenu;
    }
    
    /**
     * 
     * @return array
     */
    public function getToArray(){
        return $this->model;
    }
    
    
    private $txt = '';
    private $obs = '';
    private $footer = '';
    
    public function setText(){
        $this->model[HtmTxt::FIELD_TXT] = $this->txt = '';
        $text = \model\querys\HtmTxtQuery::start()->filterByHtmPageId($this->page)->findOne();
        if($text != false){
            $this->model[HtmTxt::FIELD_TXT] = $this->txt = $text->getTxt();
        }
        
    }
    
    
    public function getTxt(){
        return $this->txt;
    }
    
    public function getObs(){
        return $this->obs;
    }
    
    public function getFooter(){
        return $this->footer;
    }
    
    private $mediasrc = null;
    
    public function setMedia(Htm $model){
        $media = $model->getHtmHasMedia()->getMedia();
        $src = $media->getSource();
        if($src != null){
           $this->mediasrc = $src;
           $this->model['media-src'] = $this->mediasrc;
        }
        
    }
    
    public function setMediaSrc($src){
        $this->mediasrc = $src;
        $this->model['media-src'] = $this->mediasrc;
    }
    
    public function getMediaSrc(){
        return $this->mediasrc;
    }
    
    /*vars*/
    public function setVarValue(Htm $model){
        $htmvar = $model->getHtmHasVars()->getHtmVars();
        $value = $htmvar->getValue();
        if($value != null){
            $this->model['var-value'] = $value;
            $this->model['var'] = $htmvar->getVar();
        }
    }
    
    /**
     * 
     * @param string $column
     * @param mixed $value
     */
    public function setColumnValue($column, $value){
        $this->model[$column] = $value;
    }
    
    

}
