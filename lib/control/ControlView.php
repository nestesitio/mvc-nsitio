<?php

namespace lib\control;

/**
 * Description of ControlView
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @May 16, 2016
 */
class ControlView
{
    private $view;
    private $name_folder;
    private $name_template;
    

    public function __construct($file, $folder = null)
    {
        // Create new Plates engine
        $this->view = new \lib\plates\Engine();
        // Sets the default file extension to ".tpl" after engine instantiation
        $this->setFileExtension();
        // Add any any additional folders
        $this->addLayoutFolders();
        //var_dump($file);
        //string(26) "apps/Home/view/default.htm"
        if($folder == null){
            $app_folder = str_replace(strrchr($file, '/'), '', $file);
            $this->name_folder = str_replace([strrchr($app_folder, '/'), 'apps/'], '', $app_folder);
            $this->view->addFolder($this->name_folder, ROOT . DS . $app_folder);
        }else{
            $this->name_folder = $folder;
        }
        $this->nameTemplate($file);



    }

    
    public function getExtend()
    {
        return $this->name_template;
    }
    

    public function display()
    {
        return $this->view->render($this->name_folder . '::' . $this->name_template);
    }

    public function getLayout()
    {
    }

    public function set($tag, $data)
    {
        $this->view->addData([$tag => $data]);
    }

    private function addLayoutFolders()
    {
        $this->view->addFolder('core', ROOT . '/layout/core');
        $this->view->addFolder('freelancer', ROOT . '/layout/freelancer');
        $this->view->addFolder('sb-admin', ROOT . '/layout/sb-admin');
    }

    private $file_extension = 'htm';

    private function setFileExtension()
    {
        $this->view->setFileExtension($this->file_extension);
    }

    private function nameTemplate($file)
    {
        $file = str_replace('.' . $this->file_extension, '', $file);
        if(strpos($file, '/')){
            $file = substr(strrchr($file, '/'), 1);
        }
        $this->name_template = $file;

    }

}
