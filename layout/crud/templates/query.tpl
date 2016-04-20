<?php
namespace model\querys;

use \model\models\%$className%;
use \lib\mysql\Mysql;

/**
 * Description of %$className%
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @%$dateCreated%
 * Updated @%$dateUpdated% *
 */
class %$className%Query extends \lib\model\QuerySelect {
    
    public static function start($merge = ALL){
        $obj = new %$className%Query(new \model\models\%$className%(), $merge);
        $obj->startPrimary($merge);
        return $obj;
    }
    
    public static function useModel($merge){
        $obj = new %$className%Query(new \model\models\%$className%());
        $obj->startJoin($merge);
        return $obj;
    }
    
    /**
     * Completes the join and return primary query,
     * because Netbeans we put child query on return, the program will get primary class function endUse()
     *
     * @return \model\querys\%$className%Query
     */
    public function endUse(){
        return parent::completeMerge();
    }
    
    
    /**
     * Completes query and return a collection of %$className% objects
     *
     * @return \model\models\%$className%[]
     */
    public function find() {
        return parent::find();
    }
    
    /**
     * Completes query with limit 1.
     *
     * @return \model\models\%$className%
     */
    public function findOne(){
        return parent::findOne();
    }
    
    /**
     * Completes query. If result is 0 create object
     *
     * @return \model\models\%$className%
     */
    public function findOneOrCreate(){
        return parent::findOneOrCreate();
    }
    

}
