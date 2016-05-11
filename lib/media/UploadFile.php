<?php

namespace lib\media;

use \lib\register\Vars;
use \lib\tools\StringTools;
use \model\querys\HtmMediaQuery;
use \lib\media\Image;

/**
 * Description of UploadFile
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Aug 18, 2015
 */
class UploadFile
{
    /**
     * @var string
     */
    private $folder = '';
    /**
     * @var array|bool
     */
    private $result = [];
    /**
     * @var
     */
    private $name;
    /**
     * @var
     */
    private $extension;

    /**
     * UploadFile constructor.
     */
    public function __construct()
    {
        $this->result = false;
    }

    /**
     * @param $folder
     */
    public function setFolder($folder)
    {
        $this->folder = $folder;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }


    /**
     * @param $title
     * @param $id
     * @return string
     */
    public function resolveName($title, $id)
    {
        $name = substr(StringTools::slugify($title), 0, 15);
        if(!empty($name)){
            $name .= '_';
        }
        $name .=  str_pad($id, 4, '0', STR_PAD_LEFT );

        return $name;
    }

    /**
     * @param $type
     * @return string
     */
    private function getExtension($type)
    {
        if (($type == 'image/pjpeg' XOR $type == 'image/jpeg' XOR $type == 'image/jpg')) {
            $this->extension = 'jpg';
        } elseif ($type == 'image/png') {
            $this->extension = 'png';
        } elseif ($type == 'image/gif') {
            $this->extension = 'gif';
        } elseif ($type == 'audio/mpeg') {
            $this->extension = 'mp3';
        } elseif ($type == 'application/x-shockwave-flash') {
            $this->extension = 'swf';
        } elseif ($type == 'application/pdf') {
            $this->extension = 'pdf';
        }
        return $this->extension;
    }

    /**
     * @param $width
     * @param $height
     */
    public function execute($width, $height)
    {
        if (isset($_FILES)) {
            //You need to handle  both cases
            //If Any browser does not support serializing of multiple files using FormData()
            if (!is_array($_FILES['myfile']['name'])) { //single file
                $this->getExtension($_FILES['myfile']['type']);
                $fileName = $_FILES["myfile"]["name"];
                $this->name = $fileName;
                if(!empty($width) || !empty($height)){

                    $image = new Image($_FILES["myfile"]["tmp_name"]);
                    $image->resampleImageFile($this->folder . $fileName, $width, $height);
                }else{
                    move_uploaded_file($_FILES["myfile"]["tmp_name"], $this->folder . $fileName);
                }
                $this->result = $this->folder . $fileName;
            }
        }
    }

    /**
     * @return array|bool
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param $name
     * @return array|bool
     */
    public function rename($name)
    {
        $file = $this->result;
        $this->result = str_replace($this->name, $name . '.' . $this->extension, $this->result);
        rename(HTMROOT . DS . $file, HTMROOT . DS . $this->result);
        return $this->result;
    }


    /**
     * @param $file
     * @return bool
     */
    public static function removeFile($file)
    {
        if(is_file(HTMROOT . DS . $file)){
            return unlink(HTMROOT . DS . $file);
        }
        return false;
    }

}
