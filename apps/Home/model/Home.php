<?php
/**
 * Description of Home 
 * created in 7/Nov/2014
 * @author $luispinto@nestesitio.net
 */
namespace apps\Home\model;

class Home extends \lib\model\Model {

  function __construct() {
    
  }
  
  public static function getPages(){
      //@example get('SELECT * FROM TABLE WHERE name=:user OR age<:age',array(name=>'Bond',age=>25))
      return self::select("SELECT SQL_CALC_FOUND_ROWS * FROM pag_content WHERE langs_tld=:langs_tld LIMIT 3", ['langs_tld'=>'pt']);
  }

  
}