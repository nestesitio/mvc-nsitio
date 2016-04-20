<?php

namespace apps\User\model;

/**
 * Description of UserGroupModel
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Feb 25, 2015
 */
class UserGroupModel {

    const GROUP_VISITOR = 'visitor';
    const GROUP_USER = 'user';
    const GROUP_OWNER = 'owner';
    const GROUP_ADMIN = 'admin';
    const GROUP_DEVELOPER = 'dev';
    
    const GROUP_ACNT = 'account';
    const GROUP_DIST = 'distributor';
    const GROUP_TEAMCOORD = 'team-coordinator';
    const GROUP_TEAMLEADER = 'team-leader';
    const GROUP_SELLER = 'seller';
    const GROUP_VIRTUAL = 'virtual';
    
    const CONFIG_MODE_DEV = 'develop';
    const CONFIG_MODE_PROD = 'production';
    
    public static $team_groups = [self::GROUP_SELLER, self::GROUP_TEAMLEADER, self::GROUP_TEAMCOORD, self::GROUP_DIST];

}
