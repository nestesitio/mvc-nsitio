<?php

namespace apps\Core\control;

use \lib\register\VarsRegister;
use \lib\register\Registry;

use \apps\Core\model\FilesQuery;
use \model\models\HtmMedia;
use \model\querys\HtmMediaQuery;
use \model\forms\HtmMediaForm;
use \lib\session\SessionConfig;
use \lib\bkegenerator\DataConfig;

/**
 * Description of FilesActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class FilesActions extends \lib\control\ControllerAdmin {
    
    public function imgFilesAction(){
        $this->setView('list_img');

        $query = FilesQuery::get()->orderByCreated(\lib\mysql\Mysql::DESC)
                ->filterByGenre(HtmMedia::GENRE_IMG)
                ->filterByPosition(VarsRegister::getRequests('position'))
                ->filterByHtmId(VarsRegister::getId());
        \lib\session\SessionConfig::addId(VarsRegister::getId());
        $this->listFiles($query);
    }

    private function listFiles($query){
        $configs = $this->getConfigs(VarsRegister::getPosts('position'));
        $this->set('action-remove', $configs['action-remove']);
        $this->set('data-insert', $configs['action-insert']);
        $this->set('data-id', VarsRegister::getId());
        $this->set('data-position', VarsRegister::getRequests('position'));
        //$results = $this->buildDataGrid('images', $query);
        $results = $this->getQueryToList($query);
        #here you can process the results
        $this->renderList($results);
        
    }
    
    private function getDataMime($genre){
        if($genre == 'img'){
            return 'image/*';
        }
        if($genre == 'txt'){
            return 'text/plain';
        }
        if($genre == 'pdf'){
            return '.pdf';
        }
        if($genre == 'csv'){
            return '.csv';
        }
        if($genre == 'xml'){
            return '.xml';
        }
    }
    
    public function newFilesAction() {
        $this->setView('fileinput');
        $this->set('data-url', '/core/upload_files');
        $this->set('data-position', VarsRegister::getRequests('position'));
        $this->set('data-mime', $this->getDataMime(VarsRegister::getRequests('genre')));
        
    }
    
    public function removeimgFilesAction(){
        $this->setView('file_remove');
        $query = HtmMediaQuery::start()->filterById(VarsRegister::getId())->findOne();
        $result = \lib\media\UploadFile::removeFile($query->getUrl());
        if($result == true){
            $this->delFilesAction();
        }  else {
            Registry::setUserMessages('file', 'File was not deleted...');
        }
        
        
    }
    
    private function getConfigs($node){
        $xml = SessionConfig::getXml();
        $configs = new DataConfig($xml);
        return $configs->getParams('configs/' . $node . '/*');
    }
    
    public function uploadFilesAction() {
        $this->layout = false;
        $this->setEmptyView();
        $configs = $this->getConfigs(VarsRegister::getPosts('position'));
        $this->id = SessionConfig::getId();
        $action = new \lib\media\UploadFile();
        $action->setFolder('userfiles/' . $configs['folder'] . '/');
        $action->execute($configs['width'], $configs['height']);
        $result = $action->getResult();
        if($result != false){
            $title = VarsRegister::getPosts('title');
            $media = new HtmMedia();
            $media->setHtmId($this->id);
            $media->setGenre($configs['genre']);
            $media->setUrl($result);
            $media->setPosition(VarsRegister::getPosts('position'));
            $media->setTitle($title);           
            $media->save();
            $name = $action->resolveName($title, $media->getId());
            $result = $action->rename($name);
            $media->setUrl($result);
            $media->save();
            echo json_encode(['url' => $result, 
                'id' => $media->getId(), 
                'action-remove' => $configs['action-remove'],
                'title' => $media->getTitle()]);
        }else{
            echo 'false';
        }
    }

    public function editFilesAction() {
        $query = FilesQuery::get()->filterById(VarsRegister::getId())->findOne();
        $form = HtmMediaForm::initialize()->setQueryValues($query);
        #more code about $form, $query, defaults and inputs    
        $this->renderForm($form, 'files');
    }
    
    
    
    public function bindFilesAction() {
        $form = HtmMediaForm::initialize()->validate();
        #more code for processing - example
        #$model = $form->getModels('table')->setColumnValue('field','value');
        #$form->setModel('table', $model);
        $model = $this->buildProcess($form, 'files');
        if($model !== false){
            #$result is a model
            if($model->getAction() == HtmMedia::ACTION_INSERT){
                #operations after inserted
                
            }elseif($model->getAction() == HtmMedia::ACTION_UPDATE){
                 #operations after updated
                
            }
            
            $this->showFilesAction();
        }
    }
    
    public function showFilesAction(){
        $model = FilesQuery::get()->filterById(VarsRegister::getId())->findOne();
        $this->renderValues($model, 'files');
    }
    
    public function delFilesAction() {
        $model = \model\querys\HtmMediaQuery::start()->filterById(VarsRegister::getId())->findOne();
        $this->deleteObject($model);
        
    }
    
    public function exportFilesAction(){
        $query = FilesQuery::get();
        $this->buildCsvExport($query);
    }

}
