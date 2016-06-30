<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace lib\routing;

use \lib\tools\StringTools;

/**
 * Description of ParseRoute
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Apr 27, 2016
 */
class ParseRoute
{
    /**
     * @var String
     */
    private $route;

    /**
     * @var String
     */
    private $path;


    /**
     * Instantiate the class
     *
     * @param String $route The sanitized url
     */
    public function __construct($route)
    {
        $this->route = $route;
    }



    /**
     * Get the url query string portion
     * @return string
     */
    public function getQueryString()
    {
        // parse path info according to url query string
        $params = '';
        if (isset($this->route)) {
            // the request path
            $this->path = $this->route;
            if (strpos($this->path, '&')) {
                $pos = strpos($this->path, '&');
                $this->path = substr($this->path, 0, $pos);
                $params = substr($this->route, $pos);
            }
        }
        return $params;
    }


    /**
     *
     * @return array
     */
    public function getRoutePortions()
    {
        $components = $this->getComponentsArray();
        $pieces = explode('/', $this->path);
        if (count($pieces) > 1) {
            foreach ($pieces as $x => $piece) {
                if (!empty($piece)) {
                    if ($x >= 1 && preg_match('/^[a-z]{2}$/', $piece)) {
                        $components[self::PART_LANG] = $piece;
                    } elseif ($x == 1 && preg_match('/^[a-z]{3}[a-z_]+$/', $piece)) {
                        $components[self::PART_APP] = $piece;
                        $components[self::PART_APPSLUG] = $piece;
                    } elseif ($x == 1 && preg_match('/^[a-z]{3}[a-z-]+[a-z](\.htm){1}$/', $piece)) {
                        $components[self::PART_APP] = str_replace('.htm', '', $piece);
                    } elseif ($x == 2 && $components[self::PART_ID] == null && preg_match('/^[a-z]{3}[a-z_]+$/', $piece)) {
                        $components[self::PART_CANONICAL] = $components['action'] = $piece;
                    } elseif ($x == 2 && preg_match('/^[a-z]{3}[a-z-]+[a-z](\.htm){1}$/', $piece)) {
                        $components[self::PART_CANONICAL] = $piece;
                    } elseif ($x > 2 && $components[self::PART_ID] == null && preg_match('/^[0-9]{1,11}$/', $piece)) {
                        $components[self::PART_ID] = $piece;
                    } elseif ($x > 2 && $components[self::PART_ID]== null && preg_match('/^[a-z]+$/', $piece)) {
                        $components['slugvar'] = $piece;
                    }
                }
            }
        }
        $components[self::PART_CANONICAL] = str_replace('.htm', '', $components[self::PART_CANONICAL]);
        $components[self::PART_CANONICAL] = StringTools::getStringAfterLastChar($components[self::PART_CANONICAL], '_');
        $components[self::PART_CANONICAL] = StringTools::getStringUntilLastChar($components[self::PART_CANONICAL], '/');
        $components[self::PART_CONTROLLER] = StringTools::getStringAfterLastChar($components[self::PART_CANONICAL], '_');
        return $components;

    }
    
    private function getComponentsArray(){
        return [self::PART_APP => 'Home', self::PART_APPSLUG=> 'home',
            self::PART_CANONICAL => 'index', self::PART_CONTROLLER => 'home', 
            self::PART_ACTION => 'default',
            self::PART_ID => null, self::PART_LANG => null, 
            'slugvar' => null];
    }
    
    const PART_APP = 'app';
    
    const PART_APPSLUG = 'appslug';
    
    const PART_CANONICAL = 'canonical';
    
    const PART_CONTROLLER = 'controller';
    
    const PART_ACTION = 'action';
    
    const PART_ID = 'id';
    
    const PART_LANG = 'lang';

}
