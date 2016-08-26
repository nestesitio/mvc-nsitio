<?php

namespace lib\media;

use \lib\tools\StringTools;
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
    private $name = null;
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
     * 
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
    
    private $genre = '';

    /**
     * @param $type
     * @return string
     */
    private function getExtension($type)
    {
        if (($type == 'image/pjpeg' XOR $type == 'image/jpeg' XOR $type == 'image/jpg')) {
            $this->extension = 'jpg';
            $this->genre = 'img';
        } elseif ($type == 'image/png') {
            $this->extension = 'png';
            $this->genre = 'img';
        } elseif ($type == 'image/gif') {
            $this->extension = 'gif';
            $this->genre = 'img';
        } elseif ($type == 'audio/mpeg') {
            $this->extension = 'mp3';
            $this->genre = 'audio';
        } elseif ($type == 'application/x-shockwave-flash') {
            $this->extension = 'swf';
        } elseif ($type == 'application/pdf') {
            $this->extension = 'pdf';
            $this->genre = 'pdf';
        }
        return $this->extension;
    }
    
    public function getGenre(){
        return $this->genre;
    }

    /**
     * @param $width
     * @param $height
     */
    public function execute($width, $height)
    {
        /*
         * array(1) {["prizes_prize_item_large_image"]=>
         * array(5) {["name"]=>string(19) "20150222_152947.jpg"
         * ["type"]=>string(10) "image/jpeg"
         * ["tmp_name"]=>string(14) "/tmp/php8vlAl0"
         * ["error"]=>int(0)
         * ["size"]=>int(149362)
         */
        if (null != $_FILES) {
            
            foreach($_FILES as $key=> $data){
                $this->getExtension($data['type']);
                $fileName = $data["name"];
                $this->name = $fileName;
                
                if(!empty($width) || !empty($height)){
                    $image = new Image($data["tmp_name"]);
                    $image->resampleImageFile(HTMROOT . $this->folder . $fileName, $width, $height);
                }else{
                    move_uploaded_file($data["tmp_name"], HTMROOT . $this->folder . $fileName);
                }
                $this->result = $this->folder . $fileName;
                
                return $this->result;
            }
            
        }
    }

    /**
     * @return string|bool
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
        rename(HTMROOT . $file, HTMROOT . $this->result);
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
