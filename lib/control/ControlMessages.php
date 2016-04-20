<?php

namespace lib\control;

use \lib\register\Registry;
use \lib\tools\MemoryTools as MemoryTools;
use \lib\session\SessionUser;
use \lib\loader\Configurator;
use \apps\User\model\UserGroupModel;

/**
 * Description of ControlMessages
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Dec 15, 2014
 */
class ControlMessages extends \lib\control\Controller {
    
    private $dev_messages = '';
    private $user_messages = '';
    
    
    public static function write($html, $extend = true){
        $messages = '';
        $flags = 0;
        $controller = new ControlMessages();
        if (SessionUser::getUserGroup() == UserGroupModel::GROUP_DEVELOPER ||
                Configurator::getDeveloperMode() == true) {
            $flags = $controller->processDevelopMessages();
            
            if ($flags > 0) {
                $controller->setView('layout' . DS . 'core' . DS . 'messages.htm');
                $controller->set('dev_messages', $controller->getMonitor());
                $controller->set('user_messages', $controller->getUserMessages());
                $messages = $controller->dispatch();
            }
            if ($extend == true) {
                $html = str_replace('{{ messages }}', $messages, $html);
            } else {
                $html .= '<div class="submessages">' . $messages . '</div>';
            }
        }else{
            $html = str_replace('{{ messages }}', '', $html);
        }
        return $html;
    }
    
    public function getMonitor(){
        return $this->dev_messages;
    }
    
    public function getUserMessages(){
        return $this->user_messages;
    }
    
    public function messagesAction(){
        return $this->getDevelopMessages();
    }


    public function processDevelopMessages() {
        $flag = 0;
        
        $errors = Registry::getErrorMessages();
        foreach ($errors as $error) {
            $this->dev_messages .= '<div class="dev_errors alert alert-warning"><b>ERROR: </b>' . $error . '</div>';
            $flag++;
        }
        $msgs = Registry::getMonitor();
        foreach ($msgs as $msg) {
            $this->dev_messages .= $msg->write();
            $flag++;
        }
        $this->dev_messages .= $this->getMemoryTest();
        return $flag;
    }
    
    private function getMemoryTest(){
        $type = \lib\register\Monitor::MEMORY;
        $string = '<div class="dm ' . $type . '"><b>' . $type . ':</b> ';
        $string .= ' Memory: ' . MemoryTools::getMemoryUsage() . ' Kb';
        $string .= ' in ' . ini_get('memory_limit') .' available; ';
        $string .= ' Time: ' . MemoryTools::getTimeExecution() . ' of ' . ini_get('max_execution_time') . ' sec';
        
        return '</div>' . $string;
    }

}
