<?php

namespace lib\view;

use \lib\view\ParseTemplate;
use \lib\view\StringTemplate;

/**
 * Description of View
 *
 * the ordered methods are called in Controller
 * construct -> getExtended -> parse -> set -> display
 *
 * created in 14/nov/2014
 * @author Luís Pinto - luis.nestesitio@gmail.com
 */
class View
{
    /**
     * @var \lib\view\StringTemplate
     */
    private $template;

     /**
     * Create the obect ParseTemplate
     * The first roun of included tag will be processed  in class ParseTemplate
     * {% include ('Home/view/include.htm') %}
      *
     * @param String $string The path of the template file
     *
     * @return void
     */
    public function __construct($string, $file = true)
    {
        if ($file == true) {
            /* Template process extends and css / js extensions */
            $this->template = new ParseTemplate($string);
            /*
             * The first round of included tag will be processed
             * {% include ('Home/view/include.htm') %}
             */
        } else {
            $this->template = new StringTemplate($string);
        }
    }

    /**
     * @return mixed
     */
    public function getExtend()
    {
        return $this->template->getExtends();
    }

    /**
     * look for tags and functions in template
     * {% while (item in list) %} ... {% endwhile %}
     * {% if (status='open') %} ... {% elseif (status='ok') %} ... {% else %} ... {% endif %}
     * {% embed ('Core\Menu::nav' @'layout/modern-business/nav.htm') %}
     * Create array of tags and contents
     *
     * @return void
     */
    public function parse()
    {
        $this->template->findTag('block');
        $this->template->setIncludes();
        $this->template->findTag('while');
        $this->template->findTag('embed');
        $this->template->findTag('if');
        $this->template->findTag('attr');
    }

    /**
     * Building the array of pairs tag => data
     * where data can be an array, string, int or empty
     * @param String $tag The tag to be replaced {{ tag }}
     * @param mixed $data The data to replace tag
     *
     * @return void
     */
    public function set($tag, $data = '')
    {
        $this->template->set($tag, $data);

    }

    /**
     * Process all the template, replacing tags for data
     *
     * @return String $this->template->getOutput() the completed html
     */
    public function display()
    {
        $this->template->parseAllPortions();
        $this->template->parseTags();
        return $this->template->getOutput();
    }

    #other methods

    /**
     * Get the complete HTML
     *
     * @return String $this->template->getOutput() the completed html
     */
    public function getOutput()
    {
        return $this->template->getOutput();
    }

    /**
     * @param $html
     */
    public function setOutput($html)
    {
        $this->template->setOutput($html);
    }

}
