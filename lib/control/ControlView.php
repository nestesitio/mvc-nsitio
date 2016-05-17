<?php

namespace lib\control;

/**
 * Description of ControlView
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @May 16, 2016
 */
class ControlView {

    private $view;

    function __construct($file) {
        
        //var_dump($file);
        //string(26) "apps/Home/view/default.htm" 
        
        // Create new Plates engine
        $this->view = new \lib\plates\Engine();
        // Sets the default file extension to ".tpl" after engine instantiation
        $this->view->setFileExtension('htm');
        // Add any any additional folders
        $this->addLayoutFolders();
        $this->view->addFolder('home', ROOT . '/apps/Home/view');
        
        
    }
    
    public function display(){
        return $this->view->render('home::default');
    }
    
    public function getLayout(){
        
    }
    
    public function set($tag, $data){
        $this->view->addData([$tag => $data]);
    }
    
    private function addLayoutFolders(){
        $this->view->addFolder('freelancer', ROOT . '/layout/freelancer');
        $this->view->addFolder('sb-admin', ROOT . '/layout/sb-admin');
    }

}
