<?php

namespace apps\Home\control;

use \apps\User\model\UserQueries;

use \apps\User\tools\UserMenu;
use \lib\url\MenuRender;
use \lib\session\SessionUser;

/**
 * Description of HomeActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Feb 26, 2015
 */
class HomeActions extends \lib\control\Controller {

    /**
     * @var null
     */
    private $user = null;
    /**
     * @var null
     */
    private $group = null;
    /**
     * @var null
     */
    private $team = null;


    /**
     *
     */
    public function defaultAction() {
        $this->setView('default');

        $this->user = UserQueries::getUserData(SessionUser::getPlayer())->findOne();
        
        $this->sectionProfile();
        $this->set('teste', 'one');
        $this->set('a', 3);
        $this->set('list', [0=>['a'=>'var A1', 'b'=>'var B1'],1=>['a'=>'var A2', 'b'=>'var B2']]);
 
    }




    /**
     *
     */
    private function sectionProfile(){
        $value = (SessionUser::getPlayer() == false || SessionUser::haveUser() == false)? '' : $this->user->getName();
        $this->set('user-name', $value);
        if (SessionUser::haveUser() != false) {
            $this->group = $this->user->getUserGroup()->getName();
            $this->set('user-group', $this->group);
            
            
        }
        
    }
    
    
    
    

}
