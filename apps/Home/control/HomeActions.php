<?php

namespace apps\Home\control;

use \apps\User\model\UserQueries;

use \apps\User\tools\UserMenu;
use \lib\url\MenuRender;
use \lib\session\SessionUser;
use \apps\User\model\UserGroupModel;
use \apps\Home\model\UtilsQueries;
use \lib\register\VarsRegister;

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
 
    }


    /**
     *
     */
    public function homenavAction() {
        $link = (\lib\session\SessionUserTools::haveAccess('backend') == true)? 
                MenuRender::renderMenuItem(['app'=>'backend'], 'Backend', [MenuRender::ICON_RIGHT => 'fa-tachometer']): '';
        $this->set('nav_backend', $link);
        $this->set('user-menu', UserMenu::frontendMenu());
        $this->set('tool-debug', UserMenu::toolDebug());
        return $this->dispatch();
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
            if($this->group == UserGroupModel::GROUP_SELLER 
                    || $this->group == UserGroupModel::GROUP_TEAMLEADER ){
                $this->set('user-salesforce', 1);
                $this->set('user-points', round($this->user->getColumnValue('points')));
                $this->set('user-shop', 1);
            }
            
        }
        
    }
    
    
    
    

}
