<?php

namespace lib\url;

/**
 * Description of UrlHref
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Dec 16, 2014
 */
class UrlHref
{
    /**
     *
     */
    const ICON_RIGHT = 'icon_right';
    /**
     *
     */
    const ICON_LEFT = 'icon_left';
    /**
     *
     */
    const CLASS_LI = 'class_li';
    /**
     *
     */
    const CLASS_A = 'class_a';
    /**
     *
     */
    const TARGET = '';

    /**
     * @param array $pieces
     * @return string
     */
    private static function renderRelativeHref($pieces = [])
    {
        if(isset($pieces['app'])){
            $url = '/' . $pieces['app'];
        }
        if(isset($pieces['canonical']) && $pieces['canonical'] != 'index'){
            $url .= '/' . $pieces['canonical'];
        }
        if(isset($pieces['action'])){
            $url .= '/' . $pieces['action'];
        }
        if(isset($pieces['id'])){
            $url .= '/' . $pieces['id'];
        }
        if(isset($pieces['get'])){
            $url .= '?';
            foreach($pieces['get'] as $key=>$value){
                $url .= '&' . $key . '=' . $value;
            }
        }

        if($url == '/home'){
            $url = '/';
        }

        return $url;
    }

    /**
     * @param $url
     * @return string
     */
    public static function renderUrl($url)
    {
        if(is_array($url)){
            return self::renderRelativeHref($url);
        }else{
            return $url;
        }

    }

    /**
     * @param $param_url
     * @param $title
     * @param $param_target
     * @return string
     */
    public static function renderMenuUrl($param_url, $title, $param_target = null)
    {
        $url = self::renderUrl($param_url);
        $target = ($param_target == null)? '' : ' target="' . $target . '"';
        return '<li>
                    <a href="' . $url . '">' . $title . '</a>
                </li>';
    }


    /**
     * @param $param_url
     * @param $title
     * @param array $params
     * @return string
     */
    public static function renderMenuItem($param_url, $title, $params = [])
    {
        $url = self::renderUrl($param_url);
        $str = (isset($params[self::CLASS_LI])) ? '<li class="' . $params[self::CLASS_LI] .'">' : '<li>';
        $str .= '<a href="' . $url . '">';
        if(isset($params[self::ICON_LEFT])){
            $str .= '<i class="fa '.$params[self::ICON_LEFT].'"></i> ';
        }
        $str .= $title;
        if(isset($params[self::ICON_RIGHT])){
            $str .= ' <i class="fa '.$params[self::ICON_RIGHT].'"></i>';
        }

        return $str . '</a></li>';
    }


    /**
     * @param $li
     * @param $a
     * @param string $title
     * @param $href
     * @param $id
     * @return string
     */
    public static function renderButton($li, $a, $title = '', $href = null, $id = null)
    {
        $button = '<li class="' .$li. '"><a class="' .$a. '"';
        if($href != null){
            $button .= ' href="' . $href . '"';
        }
        if($id != null){
            $button .= ' id="' . $id . '"';
        }
        return $button . '>' . $title . '</a></li>';
    }



}
