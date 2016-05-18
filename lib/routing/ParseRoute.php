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
        $components = ['app' => 'Home', 'appslug'=> 'home',
            'canonical' => 'index', 'controller' => 'home', 'action' => 'default',
            'id' => null, 'slugvar' => null];
        $pieces = explode('/', $this->path);
        if (count($pieces) > 1) {
            foreach ($pieces as $x => $piece) {
                if (!empty($piece)) {
                    if ($x == 1 && preg_match('/^[a-z]{3}[a-z_]+$/', $piece)) {
                        $components['app'] = $piece;
                        $components['appslug'] = $piece;
                    } elseif ($x == 1 && preg_match('/^[a-z]{3}[a-z-]+[a-z](\.htm){1}$/', $piece)) {
                        $components['app'] = str_replace('.htm', '', $piece);
                    } elseif ($x == 2 && $components['id'] == null && preg_match('/^[a-z]{3}[a-z_]+$/', $piece)) {
                        $components['canonical'] = $components['action'] = $piece;
                    } elseif ($x == 2 && preg_match('/^[a-z]{3}[a-z-]+[a-z](\.htm){1}$/', $piece)) {
                        $components['canonical'] = $piece;
                    } elseif ($x > 2 && $components['id'] == null && preg_match('/^[0-9]{1,11}$/', $piece)) {
                        $components['id'] = $piece;
                    } elseif ($x > 2 && $components['id']== null && preg_match('/^[a-z]+$/', $piece)) {
                        $components['slugvar'] = $piece;
                    }
                }
            }
        }
        $components['canonical'] = str_replace('.htm', '', $components['canonical']);
        $components['canonical'] = StringTools::getStringAfterLastChar($components['canonical'], '_');
        $components['canonical'] = StringTools::getStringUntilLastChar($components['canonical'], '/');
        $components['controller'] = StringTools::getStringAfterLastChar($components['canonical'], '_');
        return $components;

    }

}
