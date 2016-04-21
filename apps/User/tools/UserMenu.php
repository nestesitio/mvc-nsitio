<?php

namespace apps\User\tools;

use \lib\session\SessionUser;
use \lib\url\MenuRender;
use \apps\User\model\UserGroupModel;
use \lib\loader\Configurator;

/**
 * Description of UserMenu
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Mar 7, 2016
 */
class UserMenu {

    /**
     * @return string
     */
    public static function backendMenu(){
        $item = new MenuRender();
        $item->setToogle('<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>');
        $item->setDropdown('dropdown-menu dropdown-user');
        if(SessionUser::haveUser() == false){
            $params = [MenuRender::ICON_LEFT=>'fa-sign-in fa-fw'];
            $item->addItem('/user/login', 'Login', $params);
        }else{
            $params = [MenuRender::ICON_LEFT=>'fa-user fa-fw'];
            $item->addItem('/user/profile', 'Perfil', $params);
            if(SessionUser::getPlayer() != SessionUser::getUserId()){
                $params = [MenuRender::ICON_LEFT=>'fa-user fa-fw'];
                $item->addItem('/user/reset_user', 'User Reset', $params);
            }
            $item->addDivider();
            $params = [MenuRender::ICON_LEFT=>'fa-sign-out fa-fw'];
            $item->addItem('/user/logout_user', 'Logout', $params);
        }
        
        return $item->renderString();
        
    }

    /**
     * @return string
     */
    public static function frontendMenu(){
        if(SessionUser::haveUser() == false){
            $params = [MenuRender::ICON_RIGHT => 'fa-sign-in'];
            return MenuRender::renderMenuItem('/user/login', 'Login', $params);
        }else{
            $item = new MenuRender();
            $item->setToogle('Perfil <i class="fa fa-user fa-fw"></i>');
            $item->setDropdown('dropdown-menu dropdown-user');
            $params = [MenuRender::ICON_LEFT=>'fa-user fa-fw'];
            $item->addItem('/user/profile', 'Perfil', $params);
            if(SessionUser::getPlayer() != SessionUser::getUserId()){
                $params = [MenuRender::ICON_LEFT=>'fa-user fa-fw'];
                $item->addItem('/user/reset_user', 'User Reset', $params);
            }
            $item->addDivider();
            $params = [MenuRender::ICON_LEFT=>'fa-sign-out fa-fw'];
            $item->addItem('/user/logout_user', 'Logout', $params);
            
            return $item->renderString();
        }
    }

    /**
     * @return string
     */
    public static function toolDebug(){
        if(SessionUser::getUserGroup() == UserGroupModel::GROUP_DEVELOPER ||
                Configurator::getDeveloperMode() == true){
            return MenuRender::renderButton('dev_button', 'fa fa-gear', '', '', 'dev_display');
        }
        return '';
    }

}
