<?php

namespace lib\cart;

use \lib\session\Session;

/**
 * Description of SessionCart
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Aug 24, 2016
 */
class SessionCart {

    private static $cart = [];
    
    public static function reset(){
        Session::setSession(Session::SESS_SHOP, null);
    }
    
    public static function addToCart($id, $quantity){
        $session = Session::getSessionVar(Session::SESS_SHOP);
        if(is_array($session)){
            array_unshift($session, ['id'=>$id, 'quantity' => $quantity]);
        }else{
            $session[] = ['id'=>$id, 'quantity' => $quantity];
        }
        self::$cart = $session;
        Session::setSession(Session::SESS_SHOP, $session);
    }
    
    public static function getCart(){
        return Session::getSessionVar(Session::SESS_SHOP);
    }

}
